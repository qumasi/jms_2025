<?php
session_start();
require 'db.php';

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) die("⚠️ Invalid case ID");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("⚠️ CSRF validation failed!");
    }

    $status = trim(filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING));
    if ($status) {
        $stmt = $pdo->prepare("UPDATE cases SET status = ? WHERE id = ?");
        $stmt->execute([$status, $id]);
        $message = "✅ Case status updated!";
    }
}

$stmt = $pdo->prepare("SELECT * FROM cases WHERE id = ?");
$stmt->execute([$id]);
$case = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$case) die("⚠️ Case not found");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Case Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3>Update Case Status</h3>
        </div>
        <div class="card-body">
            <?php if (!empty($message)): ?>
                <div class="alert alert-success"><?= $message ?></div>
            <?php endif; ?>
            <form method="POST" action="">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                <div class="mb-3">
                    <label class="form-label">Case Title</label>
                    <input type="text" class="form-control" value="<?= htmlspecialchars($case['title']) ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select id="status" name="status" class="form-select">
                        <option value="Open" <?= $case['status']=='Open'?'selected':'' ?>>Open</option>
                        <option value="Pending" <?= $case['status']=='Pending'?'selected':'' ?>>Pending</option>
                        <option value="Closed" <?= $case['status']=='Closed'?'selected':'' ?>>Closed</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">💾 Update Status</button>
                <a href="index.php" class="btn btn-secondary">⬅ Back</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
