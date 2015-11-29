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
    public function getIndex(Request $request) {
        // return 'List all the books';
        return view('books.index');
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
        [
          'title' => 'required|min:5',
          'author' => 'required|min:5',
          'cover' => 'required|url',
          'published' => 'required|min:4',
        ]
      );

      // Code here to enter book into the database
        $book = new \App\Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->author_id = 1;
        $book->cover = $request->cover;
        $book->published = $request->published;
        $book->purchase_link = $request->purchase_link;
//code below adds new row to database
        $book->save();

        // return 'Process adding new book'.$_POST['title'];
        //gg return 'Process adding new book: '.$request->input('title');
        return redirect('/books');
    }
}
