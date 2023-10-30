<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="login-form">
    <?php flash('login_message'); ?>
    <form action="<?= URLROOT ?>/users/login" method="POST">
        <input class="input-text  universal-size" required type="text" name="username" id="username" placeholder="Username">
        <input class="input-text  universal-size" required type="password" name="password" id="password" placeholder="Password">
        <input class="btn universal-size" type="submit" value="Login">
    </form>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>