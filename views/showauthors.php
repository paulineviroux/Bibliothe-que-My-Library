
<div class="mainAuthor">
    <section class="author">
    <h2 class="author__head"><?php echo $datas[ 'authors' ] -> name; ?></h2>
        <?php if ( $datas[ 'authors' ] -> photo ): ?>
            <div>
                <img src="<?php echo $datas[ 'authors' ] -> photo; ?>" alt="" />
            </div>
        <?php endif; ?>
        <div class="Bio">
            <?php if ( $datas[ 'authors' ] -> bio ): ?>
                <div class="author__text">
                    <?php echo $datas[ 'authors' ] -> bio; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="author__books">
            <?php if ( $datas[ 'books' ]): ?>
            <h3 class="author__title">Books of the author</h3>
                <ul class="books">
                <?php foreach ($datas['books'] as $book): ?>
                    <li class="author__item">
                        <a class="author__link" href="?a=show&e=books&id=<?php echo $book->id; ?>&with=authors,editors"><?php echo $book-> title; ?></a>
                    </li>
                <?php endforeach; ?>    
                </ul>
            <?php endif; ?> 
        </div>
    </section>
</div>
