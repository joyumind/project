<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مشروعي الاحترافي</title>
    <style>
        :root { --primary: #2c3e50; --accent: #3498db; --danger: #e74c3c; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f7f6; margin: 0; padding: 0; }
        nav { background: var(--primary); padding: 1rem; color: white; display: flex; justify-content: space-between; }
        nav a { color: white; text-decoration: none; margin: 0 10px; }
        .container { max-width: 900px; margin: 2rem auto; background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .btn { padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; color: white; background: var(--accent); }
        .alert { padding: 10px; margin-bottom: 20px; border-radius: 4px; background: #d4edda; color: #155724; }
    </style>
</head>
<body>
<nav>
    <div><strong>MySystem</strong></div>
    <div>
        <?php if(isset($_SESSION['user_id'])): ?>
            <a href="<?= BASE_URL ?>/dashboard">الرئيسية</a>
            <a href="<?= BASE_URL ?>/profile">الملف الشخصي</a>
            <a href="<?= BASE_URL ?>/logout" style="color: #ff7675;">خروج</a>
        <?php else: ?>
            <a href="<?= BASE_URL ?>/login">دخول</a>
        <?php endif; ?>
    </div>
</nav>
<div class="container">