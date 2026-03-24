<?php require __DIR__ . '/../layout/header.php'; ?>
<form method="POST" action="<?= BASE_URL ?>/login">
    <h2>تسجيل الدخول</h2>
    
    <?php if(isset($error)): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <input type="email" name="email" placeholder="البريد الإلكتروني" required>
    <input type="password" name="password" placeholder="كلمة المرور" required>
    
    <button type="submit">دخول</button>
</form>
<?php require __DIR__ . '/../layout/footer.php'; ?>