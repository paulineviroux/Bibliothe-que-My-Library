    <div class="content">
        <div class="mainSign">
            <section class="sign">
            <h2 class="sign__head"><?php echo $datas['resource_title']; ?></h2>
            <form action="index.php" method="post">
                <div>
                    <label class="sign__label" for="email">Email</label>
                    <input class="sign__input" type="email" id="email" name="email" placeholder="me@company.me" required="">
                </div>
                <div>
                    <label class="sign__label" for="password">Password</label>
                    <input class="sign__input" type="password" id="password" name="password" required="">
                </div>
                <div>
                    <button class="sign__submit" type="submit">Log in</button>
                </div>

                <div>
                    <input type="hidden" name="a" value="postLogin">
                    <input type="hidden" name="e" value="auth">
                </div>
                
            </form>
            </section>
        </div>
    </div>

    