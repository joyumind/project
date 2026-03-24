<?php require_once __DIR__ . '/../layout/header.php'; ?>
<div class="container">
    <h2>تعديل الملف الشخصي</h2>
    
    <?php if(!empty($errors)): ?>
        <?php foreach($errors as $error): ?>
            <p style="color:red;"><?= htmlspecialchars($error) ?></p>
        <?php endforeach; ?>
    <?php endif; ?>

    <form method="POST" action="<?= BASE_URL ?>/profile/update">
        <label>الاسم:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($userData['name']) ?>" required>
        
        <label>البريد الإلكتروني:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($userData['email']) ?>" required>
        
        <button type="submit">حفظ التغييرات</button>
    </form>
    <a href="<?= BASE_URL ?>/dashboard">إلغاء</a>
</div>
<?php require_once __DIR__ . '/../layout/footer.php'; ?>