<?php if (!isset($_SESSION['user'])): ?>
    
    <div class="connect">
        <a class="connect__button" href="?a=getLogin&e=auth">Log in</a>
        <a class="connect__signin" href="?a=getRegister&e=auth">Sign up</a>
        <a class="connect__link" href="?a=getAdmin&e=auth">Admin</a>
    </div>
<?php else: ?>
        <?php $user = json_decode($_SESSION['user']); ?>
        <div>
            <a href="#"><?php echo $user->email; ?></a> - <a href="?a=getLogout&e=auth">Log out</a>
        </div> - <a href="?a=admin&e=page">Admin</a>
<?php endif; ?>