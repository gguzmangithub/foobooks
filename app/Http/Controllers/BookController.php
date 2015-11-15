<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
    * Responds to requests to GET /books
    */
    public function getIndex() {
        return 'List all the books';
    }

    /**
     * Responds to requests to GET /books/show/{id}
     */
    public function getShow($title = null) {
      //gg  return 'Show book: '.$title;
//
// line below makes the following assumptions:
// resources/views/
// books/
// show.blade.php
      return view('books.show')->with('title',$title);
    }

/**
* Responds to requests to GET /books/create
*/
public function getCreate() {
  return view('books.create');
}

    /**
     * Responds to requests to POST /books/create
     */
    public function postCreate(Request $request) {

      $this->validate(
        $request,
        ['title' => 'required|min:2',
        ]
      );
        // return 'Process adding new book'.$_POST['title'];
        return 'Process adding new book: '.$request->input('title');
    }
}
