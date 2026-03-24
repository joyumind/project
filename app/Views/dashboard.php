<?php require 'layout/header.php'; ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم | <?= htmlspecialchars($userData['name']) ?></title>
    <style>
        .container { width: 80%; margin: 50px auto; font-family: Arial, sans-serif; }
        .card { border: 1px solid #ddd; padding: 20px; border-radius: 8px; background: #f9f9f9; }
        .btn-logout { color: red; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>مرحباً بك، <?= htmlspecialchars($userData['name']) ?> 👋</h1>
            <p><strong>البريد الإلكتروني:</strong> <?= htmlspecialchars($userData['email']) ?></p>
            <hr>
            <nav>
                <a href="<?= BASE_URL ?>/profile">تعديل الملف الشخصي</a> | 
                <a href="<?= BASE_URL ?>/logout" class="btn-logout">تسجيل الخروج</a>
            </nav>
        </div>
    </div>
</body>
</html>
<?php require 'layout/footer.php'; ?>