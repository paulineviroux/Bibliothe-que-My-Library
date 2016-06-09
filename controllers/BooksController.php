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
        $data[ 'books' ] = $this -> books_model -> getBooksList();
        $data[ 'view' ] = 'views/' . $GLOBALS[ 'a' ] . $GLOBALS[ 'e' ] . '.php';
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

        $view = 'showBooks.php';

        return ['book' => $book, 
                'view' => $view, 
                'page_title' => 'My Library' . $book -> title, 
                'authors' => $authors, 
                'editors' => $editors ];

    }
    public function add(){

        // Si l'utiliateur est connecté !
        if(isset($_SESSION['user'])){

            $return = ["view" => "addbooks.php", "page_title" => "Ajouter un livre"];

            if(isset($_POST['title'])){

                $errors = [];

                if(count($errors) > 0){
                } else {

                    $data = [
                        "title" => $_POST['title'],
                        "cover" => $_POST['cover'],
                        "summary" => $_POST['summary'],
                        "isbn" => $_POST['isbn'],
                        "author_id" => $_POST['author_id']
                   ];

                    $this -> books_model -> add($data);
                    
                }

            } else {

                $authors_model = new Authors();
                $return['authors'] = $authors_model->all();
            }

            return $return;

        } else {
            header('Location : ?a=getLogin&e=auth');
        }
    }

}
