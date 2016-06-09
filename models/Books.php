<?php
namespace Model;


//Models\Books

class Books extends Model
{
    protected $table = 'books';

    public function getBooksByAuthorsId($id){
        $sql = ' SELECT DISTINCT books.* FROM books JOIN author_book ON books.id=author_book.book_id JOIN authors ON author_book.book_id=authors.id WHERE books.id = :id '; //books of the author??

        $pdoStmnt = $this->cn->prepare($sql);
        $pdoStmnt->execute([':id'=>$id]);

        return $pdoStmnt->fetchAll(); 
    }
    public function getBooksByEditorsId($id){
        $sql = 'SELECT books.*
                FROM books
                JOIN editors ON editors.id = books.editor_id
                WHERE editors.id = :id';

        $pdoStmnt = $this->cn->prepare($sql); 
        $pdoStmnt->execute([':id'=>$id]);

        return $pdoStmnt->fetchAll(); 
    }
    public function getLast5Books(){
        $sql = 'SELECT books.title, authors.name, books.cover as cover, books.id as books_id, authors.id as authors_id FROM books 
                JOIN author_book ON books.id = author_book.book_id 
                JOIN authors ON author_book.author_id = authors.id 
                ORDER BY books_id DESC LIMIT 5'; //requete pas terminée. Me renvoie des livres similaires(auteurs diff)

        $pdoStmnt = $this->cn->prepare($sql);
        $pdoStmnt->execute();

        $result = $pdoStmnt->fetchAll();

        $books = array();

        foreach ($result as $key => $book) {
            
            if(array_key_exists($book->books_id, $books)) {
                $books[$book->books_id]['authors'][] = ['id' => $book->authors_id, 'name' => $book->name]; //[] ajoute une entrée au tableau courant
            } else {
                $books[$book->books_id] = array(
                    'title' => $book->title,
                    'book_id' => $book->books_id,
                    'cover'   => $book->cover  
                );
                $books[$book->books_id]['authors'][] = ['id' => $book->authors_id, 'name' => $book->name];
            }
        }

        return $books; 
    }

}
