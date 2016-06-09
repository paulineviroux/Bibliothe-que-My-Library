<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title><?php echo $datas['page_title']; ?></title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <?php include( 'views/partials/_header_big.php'); ?>
        <?php include( 'views/partials/_connect.php'); ?>
        <?php include( $datas[ 'view' ] );  ?>
        <?php include( 'views/partials/_footer.php' ); ?> 
    </body>
</html>
