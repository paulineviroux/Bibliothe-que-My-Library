<div class="content">
        <div class="mainSign">
            <section class ="sign">
                <h2 class="sign__head"><?php echo $datas['resource_title']; ?></h2>

                <form class="sign__form" action="index.php?e=auth&a=postRegister" method="post">

                    <!--Email-->

                    <?php if(isset($_SESSION['errors']['email'])): ?>
                        <div class="error"><p><?php echo $_SESSION['errors']['email']; ?></p></div>
                    <?php endif; ?>

                        <div>
                            <label class="sign__label" for="email">Email</label>
                            <input class="sign__input" type="text" id="email" name="email" placeholder="me@company.com" value="<?php echo isset($_SESSION['old_datas']['email']) ? $_SESSION['old_datas']['email'] : ''; ?>">
                        </div>

                    <!--Pseudo-->
                    
                    <?php if(isset($_SESSION['errors']['pseudo'])): ?>
                        <div class="error"><p><?php echo $_SESSION['errors']['pseudo']; ?></p></div>
                    <?php endif; ?>    
                        <div>
                            <label class="sign__label" for="pseudo">Pseudo</label>
                            <input class="sign__input" type="text" id="pseudo" name="pseudo" placeholder="Paulinette" value="<?php echo isset($_SESSION['old_datas']['pseudo']) ? $_SESSION['old_datas']['pseudo'] : ''; ?>">
                        </div>
                    
                    <!--Password-->

                    <?php if(isset($_SESSION['errors']['password'])): ?>
                        <div class="error"><p><?php echo $_SESSION['errors']['password']; ?></p></div>
                    <?php endif; ?>
                        <div>
                            <label class="sign__label" for="password">Password</label>
                            <input class="sign__input" type="password" id="password" name="password" value="<?php echo isset($_SESSION['old_datas']['password']) ? $_SESSION['old_datas']['password'] : ''; ?>">
                        </div>

                    <div>
                        <button class="sign__submit" type="submit">Sign up</button>
                    </div>

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
            </section>
        </div>
    </div>
