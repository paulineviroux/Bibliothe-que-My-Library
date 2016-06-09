<div class="content">
    <div class="mainPage">
        <section class="homepage">
            <h2 class="homepage__head">Recently Added</h2>

            <?php foreach ($datas[ 'books' ] as $book) : ?>
                <div class="homepage__item">
                    <h3 class="homepage__title">
                        <a class="homepage__title__a" href="index.php?a=show&e=books&id=<?php echo $book['book_id']; ?>&with=authors,editors"><?php echo $book['title'] ?></a>
                    </h3>
                    <img src="<?php echo $book['cover']; ?>" alt="Couverture de <?php echo $book['title'] ?>">
                    <cite>
                        <?php foreach ($book['authors'] as $author):  ?>
                            <a class="homepage__author" href="index.php?a=show&e=authors&id=<?php echo $author['id']; ?>&with=editors,books"><?php echo $author['name'] ?></a>
                        <?php endforeach; ?>
                    </cite>
                </div>
            <?php endforeach; ?>
            
        </section>
        <section class="homepage">
            <h2 class="homepage__head">Discover an author</h2>
            <div class="homepage__item">
                <?foreach ($datas[ 'authors' ] as $author): ?>

                        <a class="homepage__title" href="index.php?a=show&e=authors&id=<?php echo $author['id']; ?>&with=editors,books"><?php  echo $author['name']?></a>
                    </h3>
                    <img src="<?php echo $author -> photo; ?>">
                <?php endforeach; ?>
            </div>
        </section>
    </div>
</div>