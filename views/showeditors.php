<div class="mainEditor">
            <section class="editor">
                <h2 class="editor__head" ><?php echo $datas[ 'editors' ] -> name; ?></h2>
                <div class="editor__text">
                    <?php echo $datas[ 'editors' ] -> summary; ?>
                </div>
                <div class="editor__book">
                    <h3 class="editor__title" >Books of <?php echo $datas[ 'editors' ] -> name; ?></h3>
                    <ul class="editor__list">
                        <?php foreach ($datas['books'] as $book): ?>
                            <li class="editor__item">
                                <a class="editor__link" href="?a=show&e=books&id=<?php echo $author->id; ?>&with=authors,editors"><?php echo $book-> title; ?></a>
                            </li>
                        <?php endforeach; ?>    
                    </ul>
                </div>

                <div>
                    <?php if ( $datas[ 'authors' ]): ?>
                        <h3 class="editor__title">Auhtors</h3>
                        <ul class="editor__list">
                            <?php foreach ($datas['authors'] as $author): ?>
                                <li class="editor__item">
                                    <a class="editor__link" href="?a=show&e=authors&id=<?php echo $author->id; ?>&with=books"><?php echo $author-> name;?></a>
                                </li>
                            <?php endforeach; ?>    
                        </ul>
                    <?php endif; ?>
                </div>
            </section>
        </div>