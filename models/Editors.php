<?php
namespace Model;


//Models\Editors

class Editors extends Model
{
    protected $table = 'editors';

    public function getEditorsByBooksId($id){
        $sql = ' SELECT editors.* FROM editors JOIN books ON editor_id=editors.id WHERE books.id = :id';

        $pdoStmnt = $this->cn->prepare($sql);
        $pdoStmnt->execute([':id'=>$id]);

        return $pdoStmnt->fetchAll(); 
    }

    public function getEditorsByAuthorsId($id){
        $sql = 'SELECT editors.*
                FROM editors
                JOIN books on books.editor_id = editors.id
                JOIN author_book ON author_book.book_id = books.id
                JOIN authors ON author_book.author_id = authors.id
                WHERE authors.id = :id';

        $pdoStmnt = $this->cn->prepare($sql); 
        $pdoStmnt->execute([':id'=>$id]);

        return $pdoStmnt->fetchAll(); 
    }
}
