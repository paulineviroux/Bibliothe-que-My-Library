<div class="mainBook">
    <section class="book">
        <h2 class="book__title"><?php echo $datas[ 'book' ] -> title; ?></h2>
        <div class="book__profil">
            <?php if ( $datas[ 'book' ] -> cover ): ?>
                    <img src="<?php echo $datas[ 'book' ] -> cover; ?>" alt="" />
            <?php endif; ?>
            <?php if ( $datas[ 'authors' ]): ?>
                    <?php foreach ($datas['authors'] as $author): ?>
                        <cite><a class="book__author" href="?a=show&e=authors&id=<?php echo $author->id; ?>&with=books"><?php echo $author-> name;?></a></cite>
                    <?php endforeach; ?>
            <?php endif; ?>
            <?php if ( $datas[ 'editors' ]): ?>
                <p class="book__edited">Edited by </p>
                    <?php foreach ($datas['editors'] as $editor): ?>
                        <a class="book__editor" href="?a=show&e=editors&id=<?php echo $editor->id; ?>&with=authors,books"><?php echo $editor-> name;?></a>
                        <?php endforeach; ?>
                <?php endif; ?>
                <?php if ( $datas[ 'book' ] -> summary ): ?>
                    <p class="book__text">
                        <?php echo $datas[ 'book' ] -> summary; ?>
                    </p>
                <?php endif; ?>
            </div> 
    </section>
</div>
