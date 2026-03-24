<?php require __DIR__ . '/../layout/header.php'; ?>

<h2>إنشاء حساب جديد</h2>
<?php if(isset($error)): ?> <p style="color:red;"><?= htmlspecialchars($error) ?></p> <?php endif; ?>

<form method="POST" action="<?= BASE_URL ?>/register">
    <input type="text" name="name" placeholder="الاسم الكامل" required><br><br>
    <input type="email" name="email" placeholder="البريد الإلكتروني" required><br><br>
    <input type="password" name="password" placeholder="كلمة المرور" required><br><br>
    <button type="submit" class="btn">تسجيل</button>
</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>