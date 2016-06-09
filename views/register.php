<h1><?php echo $datas['resource_title']; ?></h1>

<form action="index.php" method="post">
    <?php if(isset($_SESSION['errors']['email'])): ?>
        <div class="error"><p><?php echo $_SESSION['errors']['email']; ?></p></div>
    <?php endif; ?>

        <div>
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="me@company.com" value="<?php echo isset($_SESSION['old_datas']['email']) ? $_SESSION['old_datas']['email'] : ''; ?>">
        </div>
    

    
    <?php if(isset($_SESSION['errors']['pseudo'])): ?>
        <div class="error"><p><?php echo $_SESSION['errors']['pseudo']; ?></p></div>
    <?php endif; ?>    
        <div>
            <label for="pseudo">Pseudo</label>
            <input type="text" id="pseudo" name="pseudo" placeholder="Paulinette" value="<?php echo isset($_SESSION['old_datas']['pseudo']) ? $_SESSION['old_datas']['pseudo'] : ''; ?>">
        </div>
    


    <?php if(isset($_SESSION['errors']['password'])): ?>
        <div class="error"><p><?php echo $_SESSION['errors']['password']; ?></p></div>
    <?php endif; ?>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="<?php echo isset($_SESSION['old_datas']['password']) ? $_SESSION['old_datas']['password'] : ''; ?>">
        </div>
   


    <div><button type="submit">Envoyer</button></div>

    <div>
        <input type="hidden" name="a" value="postRegister">
        <input type="hidden" name="e" value="auth">
    </div>
    
</form>

<?php if(isset($_SESSION['errors'])) {
    unset($_SESSION['errors']); 
} ?>
<?php if(isset($_SESSION['old_datas'])) {
    unset($_SESSION['errors']); 
} ?>
