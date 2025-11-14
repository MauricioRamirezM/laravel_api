<?php

// HERE WE CAN HAVE DIFFERENT TYPES OF VERSION OF OURS APIS, HAVING DIFFERENTS FOLDERS WITH THE "SAME" CONTROLLER, THE DIFFERENCE IS ONLY THE "V2"



namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json([
             'id'=> 1,
            'title' => 'Test',
            'body' => 'descxription',
        ], 
        201);
        // ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
            'data' => [
            'id'=> 1,
            'title' => 'Test',
            'budy' => 'decription'
            ],
            'message' => 'hello' 
        ])->header('Test', 'Mau')
        ->header('Test2', 'Mau2');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
