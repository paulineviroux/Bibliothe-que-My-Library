<div class="mainAuthors">
    <section class="authors">
        <h2 class="authors__title">Authors</h2>
        <ul class="authors__list">
            <?php foreach ( $datas[ 'authors' ] as $author ) :?>
                <li class="authors__item">
                    <a class="authors__author" href="index.php?a=show&e=authors&id=<?php echo $author -> id; ?>&with=editors,books"><?php echo $author -> name; ?></a>
                    <img src="<?php echo $author->photo; ?>" alt="<?php if(isset($author->photo)): ?>Portrait de <?php echo $author -> name; ?><?php endif; ?>"/>
                    <a class="authors__profile" href="index.php?a=show&e=authors&id=<?php echo $author -> id; ?>&with=editors,books">Voir son profil</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
</div>
