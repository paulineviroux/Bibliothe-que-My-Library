<div class="content">
    <div class="mainAdmin">
        <div class="new">
        <h2 class="new__head">Add a book</h2>
            <form class="new__form" action="#" method="post">
                <label class="new__label" for="title">Title</label>
                <input class="new__input" type="text" placeholder="Titre" name="title" id="title" required>
                <label class="new__label" for="author">Author</label>
                <select class="author" name="author">
                    <optgroup label="Choisir ...">
                <?php foreach ($datas['authors'] as $author) : ?>
                    <option value="<?= $author->id ?>"><?= $author->name; ?></option>
                <?php endforeach; ?>
                </select>

                <label class="new__label" for="summary">Resume</label>
                <textarea class="new__textarea" name="summary" id="summary" rows="10" cols="10" required>Add a short resume of the book.</textarea>

                <label class="new__label" for="isbn">ISBN</label>
                <input class="new__input" type="text" placeholder="ISBN" name="isbn" id="isbn" required>

                <label class="new__label" for="cover" >Cover</label>
                <input class="new__input" type="text" placeholder="Lorem Picsum" name="cover" id="cover" required>

                <input class="new__submit" type="submit" value="Add">
            </form>
        </div>
    </div>
</div>
