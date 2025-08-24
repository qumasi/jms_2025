<?php
session_start();
require 'db.php';

// CSRF Token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// فلترة البحث حسب الحالة
$filter_status = filter_input(INPUT_GET, 'status', FILTER_SANITIZE_STRING);
$query = "SELECT * FROM cases";
$params = [];

if ($filter_status && in_array($filter_status, ['Open','Pending','Closed'])) {
    $query .= " WHERE status = ?";
    $params[] = $filter_status;
}

$query .= " ORDER BY created_at DESC";
$stmt = $pdo->prepare($query);
$stmt->execute($params);
$cases = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cases Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">📂 Cases Management</h2>

    <div class="mb-3">
        <a href="create.php" class="btn btn-primary">➕ Add New Case</a>
        <form method="GET" class="d-inline-block ms-3">
            <select name="status" class="form-select d-inline-block" style="width:auto;" onchange="this.form.submit()">
                <option value="">All Status</option>
                <option value="Open" <?= ($filter_status=='Open')?'selected':'' ?>>Open</option>
                <option value="Pending" <?= ($filter_status=='Pending')?'selected':'' ?>>Pending</option>
                <option value="Closed" <?= ($filter_status=='Closed')?'selected':'' ?>>Closed</option>
            </select>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Case Title</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($cases as $case): ?>
            <tr>
                <td><?= htmlspecialchars($case['id']) ?></td>
                <td><?= htmlspecialchars($case['title']) ?></td>
                <td>
                    <?php
                    $status = $case['status'];
                    if ($status === "Open") echo '<span class="badge bg-success">Open</span>';
                    elseif ($status === "Pending") echo '<span class="badge bg-warning">Pending</span>';
                    else echo '<span class="badge bg-danger">Closed</span>';
                    ?>
                </td>
                <td><?= htmlspecialchars($case['created_at']) ?></td>
                <td>
                    <a href="view.php?id=<?= $case['id'] ?>" class="btn btn-info btn-sm">View</a>
                    <a href="update.php?id=<?= $case['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form method="POST" action="delete.php" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                        <input type="hidden" name="id" value="<?= $case['id'] ?>">
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
