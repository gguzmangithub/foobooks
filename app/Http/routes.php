<?php
// line below is handy when using a certain package a lot.
//gg use Rych\Random\Random;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// get, post, put, delete

//Route::get('/', function () {
//    return view('welcome');
//});

// Explicit routing Controller
//Explicit routes always have to go before implicet routes
Route::get('/', 'BookController@getIndex');
Route::get('/books', 'BookController@getIndex');
Route::get('/books/show/{title?}', 'BookController@getShow');
Route::get('/books/create', 'BookController@getCreate');
Route::post('/books/create', 'BookController@postCreate');

// Implicit route Controller
// The line below could replace the four lines above
//Route::controller('/books','BookController');

//log route
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


//this is in case things get messed upc in the environment

Route::get('/practice', function() {

//g1  echo config('app.debug');
//g2 Debugbar::info(Array('foo' => 'bar'));
//g2 Debugbar::error('Error!');
//g2 Debugbar::warning('Watch out…');
//g2 Debugbar::addMessage('Another message', 'mylabel');
//g2 return 'Practice';
//gg $random = new Rych\Random\Random();
// the line below only works withput the use of fullnamesapcing because
// I did the 'use" command aboove'
$random = new Random();
// Generate a 16-byte string of random raw data
//gg return $random->getRandomBytes(16);
// Get a random 8-character string using the
// character set A-Za-z0-9./
return $random->getRandomString(8);
});

Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});
