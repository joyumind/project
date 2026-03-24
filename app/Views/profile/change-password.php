<?php require 'layout/header.php'; ?>
<div class="container">
    <h2>تغيير كلمة المرور</h2>

    <?php if(!empty($errors)): ?>
        <?php foreach($errors as $error): ?>
            <p style="color:red;"><?= htmlspecialchars($error) ?></p>
        <?php endforeach; ?>
    <?php endif; ?>

    <form method="POST" action="<?= BASE_URL ?>/change-password">
        <div>
            <label>كلمة المرور القديمة:</label><br>
            <input type="password" name="old_password" required>
        </div>
        <div>
            <label>كلمة المرور الجديدة:</label><br>
            <input type="password" name="new_password" required>
        </div>
        <div>
            <label>تأكيد الكلمة الجديدة:</label><br>
            <input type="password" name="confirm_password" required>
        </div>
        <br>
        <button type="submit">تحديث كلمة المرور</button>
        <a href="<?= BASE_URL ?>/dashboard">إلغاء</a>
    </form>
</div>
<?php require 'layout/footer.php'; ?>