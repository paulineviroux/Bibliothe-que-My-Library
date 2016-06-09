<?php
namespace Controller;

use Model\Editors;
use Model\Books;
use Model\Authors;

class EditorsController
{
    private $editors_model = null;

    public function __construct() 
    {
        $this -> editors_model = new Editors(); 
    }

    public function index()
    {
        $data['page_title'] = 'Editors - MyLibrary';
        $data[ 'editors' ] = $this -> editors_model -> all();
        $data[ 'view' ] = 'views/indexeditors.php';
        $data[ 'header' ] = 'views/partials/_header_small.php';
        
        return $data;
    }

    public function show()
    {
        if (!isset($_GET['id'])) {
            die( 'il manque l\'id de votre livre' );
        }
        $id = intval($_GET[ 'id' ]);
        $editor = $this->editors_model->find($id);
        $books = null;
        $authors = null;

        if( isset($_GET['with'])){
            $with = explode(',', $_GET[ 'with' ]);
            if( in_array( 'books', $with ) ){
                $books_model = new Books();
                $book = $books_model -> getBooksByEditorsId( $editor -> id ); 
            }
        }
        if( isset($_GET['with'])){
            $with = explode(',', $_GET[ 'with' ]);
            if( in_array( 'authors', $with ) ){
                $authors_model = new Authors();
                $author = $authors_model -> getAuthorsByEditorsId( $editor -> id ); 
            }
        }

        $view = 'showEditors.php';

        return [    'editors' => $editor,
                    'books' => $book,
                    'view' => $view,
                    'page_title' => 'ebooks - ' . $editor -> name,
                    'authors' => $author];
    }
}


















