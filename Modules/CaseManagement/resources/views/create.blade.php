<?php
session_start();
require 'db.php';

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("⚠️ CSRF validation failed!");
    }

    $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
    $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));
    $status = trim(filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING));

    if ($title && $description) {
        $stmt = $pdo->prepare("INSERT INTO cases (title, description, status) VALUES (?, ?, ?)");
        $stmt->execute([$title, $description, $status]);
        $message = "✅ Case Saved: " . htmlspecialchars($title) . " (" . htmlspecialchars($status) . ")";
    } else {
        $message = "⚠️ Please fill all fields correctly.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Case</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3>Add New Case</h3>
        </div>
        <div class="card-body">
            <?php if (!empty($message)): ?>
                <div class="alert alert-info"><?= $message ?></div>
            <?php endif; ?>
            <form method="POST" action="">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                <div class="mb-3">
                    <label for="title" class="form-label">Case Title</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Case Description</label>
                    <textarea id="description" name="description" rows="4" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Case Status</label>
                    <select id="status" name="status" class="form-select">
                        <option value="Open">Open</option>
                        <option value="Closed">Closed</option>
                        <option value="Pending">Pending</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">💾 Save Case</button>
                <a href="index.php" class="btn btn-secondary">⬅ Back</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
