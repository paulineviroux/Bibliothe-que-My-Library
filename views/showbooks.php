
<div class="mainBook">
    <section class="book">
        <h2 class="book__title"><?php echo $datas[ 'books' ] -> title; ?></h2>
        <div class="book__profil">
            <?php if ( $datas[ 'books' ] -> cover ): ?>
                <div>
                    <img src="<?php echo $datas[ 'books' ] -> cover; ?>" alt="" />
                </div>
            <?php endif; ?>
            <?php if ( $datas[ 'authors' ]): ?>
                <ul class="authors">
                    <?php foreach ($datas['authors'] as $author): ?>
                        <li class="author">
                            <a class="book__author" href="?a=show&e=authors&id=<?php echo $author->id; ?>&with=books"><?php echo $author-> name;?></a>
                        </li>
                    <?php endforeach; ?>    
                </ul>
            <?php endif; ?>
            <?php if ( $datas[ 'editors' ]): ?>
                <p class="book__edited">Edited by </p>
                <ul class="editors">
                    <?php foreach ($datas['editors'] as $editor): ?>
                        <li class="editors">
                            <a href="?a=show&e=editors&id=<?php echo $editor->id; ?>&with=books"><?php echo $editor-> name;?></a>
                        </li>
                    <?php endforeach; ?>    
                </ul>
            <?php endif; ?>
            <?php if ( $datas[ 'books' ] -> published_at ): ?>
                <div>
                    <p>Published on</p>
                    <?php echo $datas[ 'books' ] -> published_at; ?>
                </div>
            <?php endif; ?>
            <?php if ( $datas[ 'books' ] -> summary ): ?>
                <div class="book__text">
                    <?php echo $datas[ 'books' ] -> summary; ?>
                </div>
            <?php endif; ?>
            <div>
                <a href="index.php">All books</a>
            </div>
        </div> 
    </section>
</div>
