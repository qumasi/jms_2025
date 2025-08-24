<?php
session_start();
require 'db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) die("⚠️ Invalid case ID");

$stmt = $pdo->prepare("SELECT * FROM cases WHERE id = ?");
$stmt->execute([$id]);
$case = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$case) die("⚠️ Case not found");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Case Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3>Case Details</h3>
        </div>
        <div class="card-body">
            <p><strong>Title:</strong> <?= htmlspecialchars($case['title']) ?></p>
            <p><strong>Description:</strong> <?= nl2br(htmlspecialchars($case['description'])) ?></p>
            <p><strong>Status:</strong> <?= htmlspecialchars($case['status']) ?></p>
            <p><strong>Created At:</strong> <?= htmlspecialchars($case['created_at']) ?></p>

            <a href="index.php" class="btn btn-secondary">⬅ Back</a>
            <a href="update.php?id=<?= $case['id'] ?>" class="btn btn-warning">✏ Edit Status</a>

            <form method="POST" action="delete.php" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this case?');">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                <input type="hidden" name="id" value="<?= $case['id'] ?>">
                <button type="submit" class="btn btn-danger">🗑 Delete</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
