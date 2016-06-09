<?php
namespace Controller;

use Model\Books;
use Model\Authors;
use Model\Editors;

class PageController 
{
    private $books_model = null;

    public function __construct() 
    {
        $this -> books_model = new Books();
        $this -> authors_model = new Authors(); 
    }

    public function index() {

        $data['page_title'] = 'MyLibrary';
        $data[ 'view' ] = 'views/home.php';
        return $data;
    }

    public function show() {
        $author =$this -> authors_model -> find( $id ); // ?
        $book = $this -> books_model -> find( $id) ;    // ?

        return [    'books' => $book,
                    'view' => $view,
                    'page_title' => 'ebooks - ' . $editor -> name,
                    'authors' => $author ];

    }
    public function home(){
        $last5books =  $this -> books_model -> getLast5Books();
        $last3authors = $this -> authors_model -> getLast3Authors();

        return ['view' => 'home.php', 'page_title' => 'My Library', 'header'=>'partials/_header_big.php', 'books' => $last5books, 'authors' => $last3authors ];
    }

}