<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div style="max-width: 400px; margin: auto;">
    <h2>إنشاء حساب جديد</h2>

    <?php if(!empty($errors)): ?>
        <div style="color: red; margin-bottom: 15px;">
            <?php foreach($errors as $error): echo "• " . htmlspecialchars($error) . "<br>"; endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?= BASE_URL ?>/register">
        <div style="margin-bottom: 10px;">
            <label>الاسم الكامل:</label><br>
            <input type="text" name="name" style="width: 100%; padding: 8px;" required>
        </div>
        <div style="margin-bottom: 10px;">
            <label>البريد الإلكتروني:</label><br>
            <input type="email" name="email" style="width: 100%; padding: 8px;" required>
        </div>
        <div style="margin-bottom: 15px;">
            <label>كلمة المرور:</label><br>
            <input type="password" name="password" style="width: 100%; padding: 8px;" required>
        </div>
        <button type="submit" class="btn" style="width: 100%;">فتح حساب</button>
    </form>
    
    <p style="text-align: center; margin-top: 15px;">
        لديك حساب بالفعل؟ <a href="<?= BASE_URL ?>/login">سجل دخولك هنا</a>
    </p>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>