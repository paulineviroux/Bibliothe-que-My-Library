<?php
namespace Model;


//Models\Authors

class Authors extends Model
{
    protected $table = 'authors';

    public function getAuthorsByBooksId( $id ){
        $sql = 'SELECT authors.* 
                FROM authors 
                JOIN author_book ON authors.id = author_book.author_id 
                JOIN books ON author_book.book_id = books.id 
                WHERE books.id = :id';

        $pdoStmnt = $this->cn->prepare($sql); 
        $pdoStmnt->execute([':id'=>$id]);

        return $pdoStmnt->fetchAll(); 
    }
    public function getAuthorsByEditorsId( $id ){
        $sql = 'SELECT DISTINCT authors.*
                FROM authors
                JOIN author_book ON authors.id = author_book.author_id
                JOIN books ON author_book.book_id = books.id
                JOIN editors ON books.editor_id = editors.id
                WHERE editors.id = :id';

        $pdoStmnt = $this->cn->prepare($sql); 

        return $pdoStmnt->fetchAll(); 
    }

    public function getLast3Authors(){
        $sql = 'SELECT authors.name, authors.photo FROM authors ORDER BY id DESC LIMIT 3';

        $pdoStmnt = $this->cn->prepare($sql);

        return $pdoStmnt->fetchAll(); 
    }
    
}
