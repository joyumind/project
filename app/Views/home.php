<?php require 'layout/header.php'; ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>الرئيسية - مشروع احترافي</title>
</head>
<body>
    <h1>قائمة المستخدمين</h1>
    <ul>
        <?php foreach($users as $user): ?>
            <li><?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
<?php require 'layout/footer.php'; ?>