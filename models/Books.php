<?php
namespace Model;


//Models\Books

class Books extends Model
{
    protected $table = 'books';


    public function add($data){

        $author_id = array_pop($data);
        $pdoStmnt = $this->save($data);
        $book_id = $this->cn->lastInsertId('books');

        
        $sql = "INSERT INTO author_book(author_id, book_id) VALUE ($author_id, $book_id)";
        $pdoStmnt = $this->cn->prepare($sql);
        $pdoStmnt->execute();

    }

    public function getBooksByAuthorsId($id){
        $sql = ' SELECT DISTINCT books.* 
                FROM books 
                JOIN author_book ON books.id=author_book.book_id
                WHERE author_book.author_id = :id'; 

        $pdoStmnt = $this->cn->prepare($sql);
        $pdoStmnt->execute([':id'=>$id]);

        return $pdoStmnt->fetchAll(); 
    }

    public function getBooksList(){
        $sql = 'SELECT id, title, cover FROM books';

        $bookManyAuthors = 'SELECT author.id, author.name FROM author_book
                            JOIN authors ON authors.id = author_book.author_id
                            WHERE author_book.book_id = :id';

        $pdoStmnt = $this->cn->prepare($sql);
        $pdoStmnt->execute();

        return $pdoStmnt->fetchAll(); 

        foreach ($books as $book) {
            $getBookAuthors = $this->cn->prepare($bookManyAuthors);
            $getBookAuthors->execute(['id' => $book->id]);
            $authors = $getBookAuthors->fetchAll();
            $book->authors = $authors;
        }

        return $books;
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
                GROUP BY books_id ORDER BY books_id DESC LIMIT 5'; 

        $pdoStmnt = $this->cn->prepare($sql);
        $pdoStmnt->execute();

        return $pdoStmnt->fetchAll();

         
    }

}
