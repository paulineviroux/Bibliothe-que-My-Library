
<div class="mainBooks">
    <section class ="books">
        <h2 class="books__head">Books</h2>
        <div class="books__allBooks">
            <ul class="books__list">
                <?php foreach ( $datas[ 'books' ] as $book ) :?>
                    <li class="books__book">
                        <a class="books__title" href="index.php?a=show&e=books&id=<?php echo $books -> id; ?>&with=authors,editors"><?php echo $book -> title; ?></a>
                        <img src="<?php echo $book -> cover; ?>" alt="<?php if(isset($book->cover)): ?>Portrait de <?php echo $book -> title; ?><?php endif; ?>" />
                        <?php if ( $datas[ 'authors' ]): ?>
                        <?php foreach ($datas['authors'] as $author): ?>
                            <a class="books__author" href="?a=show&e=authors&id=<?php echo $author->id; ?>&with=books"><?php echo $author['name'];?></a>
                        <?php endforeach; ?> 
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>  
    </section>
</div>