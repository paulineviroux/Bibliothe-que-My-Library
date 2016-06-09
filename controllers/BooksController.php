<?php
namespace Controller;

use Model\Books;
use Model\Authors;
use Model\Editors;

class BooksController 
{
    private $books_model = null;

    public function __construct() 
    {
        $this -> books_model = new Books(); 
    }


    public function index() {
        $data[ 'page_title' ] = 'Books - MyLibrary';
        $data[ 'books' ] = $this -> books_model -> all(); 
        $data[ 'view' ] = 'views/' . $GLOBALS[ 'a' ] . $GLOBALS[ 'e' ] . '.php'; 
        $data[ 'header' ] = 'views/partials/_header_small.php';
        return $data;
    }

    public function show() {
        if (!isset($_GET['id'])){
            die('Il manque l\'identifiant de votre livre');
        }

        $id = intval( $_GET[ 'id' ] );
        $book = $this->books_model->find( $id) ;
        $authors = null;
        $editors = null;

        if ( isset( $_GET[ 'with' ] ) ) {
            $with= explode(',',$_GET['with']); 
            if(in_array('authors', $with)){
                $authors_model = new Authors();
                $authors = $authors_model -> getAuthorsByBooksId($book->id);
            }
            if(in_array('editors', $with)){
                $editors_model = new Editors();
                $editors = $editors_model->getEditorsByBooksId($book->id);
            }
        }


        return [ 'books' => $book, 'view' => 'showbooks.php', 'page_title' => 'ebooks -' . $book -> title, 'authors' => $authors, 'editors' => $editors ];

    }

}
