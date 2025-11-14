<?php

use App\Http\Controllers\Api\v1\PostController as V1PostController;
use App\Http\Controllers\Api\v2\PostController as V2POstController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// HERE WE CAN HAVE DIFFERENT TYPES OF VERSION OF OURS APIS, HAVING DIFFERENTS FOLDERS WITH THE "SAME" CONTROLLER, THE DIFFERENCE IS ONLY THE "V2

// CHECK THE V1 AND V2 FOLDERS TO SEE THE DIFFERENT CONTROLLERS 


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/hello', function() {
    return ["message" => "Hello Laavel API" ];
});
/*The PREFIX method is to set a string right before of the route ("/posts"), normalyy we have: api/posts/{post}
but with this method we have api/v1/posts/{post (it adds the V1)
*/
Route::prefix('v1')->group(function (){
    Route::apiResource('/posts', V1PostController::class);
});
// here we add the prefix v2 to say that this controller is for the secod version of our API


Route::prefix('v2')->group(function (){
    Route::apiResource('/posts', V2POstController::class);
});
 