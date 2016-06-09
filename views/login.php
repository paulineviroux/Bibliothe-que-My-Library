<h1><?php echo $datas['resource_title']; ?></h1>

<form action="index.php" method="post">
    <div><label for="email">Email</label><input type="email" id="email" name="email" placeholder="me@company.com"></div>
    <div><label for="password">Password</label><input type="password" id="password" name="password"></div>
    <div><button type="submit">Envoyer</button></div>

    <div>
        <input type="hidden" name="a" value="postLogin">
        <input type="hidden" name="e" value="auth">
    </div>
    
</form>