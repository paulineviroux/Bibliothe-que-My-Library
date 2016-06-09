<div class="mainEditors">
    <section class="editors">
        <h2 class="editors__title">Editors</h2>
        <ul class="editors__list">
            <?php foreach ($datas['editors'] as $editor): ?> 
                <li class="editors__item">
                    <a class="editors__editor" href="?a=show&e=editors&id=<?php echo $editor -> id; ?>&with=authors,books"><?php echo $editor -> name; ?></a>
                </li>  
            <?php endforeach; ?>           
        </ul>
    </section>   
</div>
