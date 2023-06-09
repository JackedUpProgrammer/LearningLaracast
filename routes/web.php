<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Scalar\MagicConst\Dir;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    return view('posts', 
    [   
        'posts' => Post::all()
    ]
);

});



Route::get('posts/{post}', function($slug) {
    //find a post by its slug and pass it to a view called "post"
        return view(
            //this post is a view
            'post', 
            [    //first post is a variable name and second post is a model
                'post' => Post::find($slug),
            ]
        );
       
})->where('post', '[A-z_\-]+');
