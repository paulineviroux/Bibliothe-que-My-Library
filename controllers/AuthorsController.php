<?php
namespace Controller;

use Model\Authors;
use Model\Books;
use Model\Editors;

class AuthorsController
{
    private $authors_model = null;

    public function __construct() 
    {
        $this -> authors_model = new Authors(); 
    }

    public function index() {
        $data[ 'page_title' ] = 'Auhtors - MyLibrary';
        $data[ 'authors' ] = $this -> authors_model -> all();
        $data[ 'view' ] = 'views/' . $GLOBALS[ 'a' ] . $GLOBALS[ 'e' ] . '.php';
        
        return $data;
    }

    public function show() {

        if ( !isset( $_GET[ 'id' ] ) ) {
            die( 'Il manque l\'id' );
        }
        $id = intval( $_GET[ 'id' ] );
        $book= null;
        $editors = null;
        $author =$this -> authors_model -> find( $id );

        if ( isset( $_GET[ 'with' ] ) ) {
            $with= explode(',',$_GET['with']); 
            if(in_array('books', $with)){
                $books_model = new Books();
                $books= $books_model->getBooksByAuthorsId($author->id);
            }
            if(in_array('editors', $with)){
                $editors_model = new Editors();
                $editors= $editors_model->getEditorsByAuthorsId($author->id);
            }   
        };

            return [    'authors' => $author, 
                        'view' => 'showauthors.php',
                        'page_title' => 'My Library' . $author -> name,
                        'books' => $books,
                        'editors' => $editors]; 
        } 
    
}
