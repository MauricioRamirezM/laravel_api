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
    //HERE WE WILL RECIVE A STATUSCODE 200
    {
        return [
            [
                'id' => 1,
                'title' => 'Test',
                'body' => 'descxription',
            ]
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    //HERE WE WILL RECIVE STATUSCODE 201
    {
        //WHIT THIS LINE WE RETURN EVERYTHING THAT THE USER SENDS
        // $data = $request->all();

        //HERE WE ONLY RETURN A SPECIFIED FILEDS, IN OUR CASE ONLY WE WANT TO SEND THE TITLE OF OUR POSTS
        $data = $request->only('title', 'body');
        // return $data;


        //HERE WE SEND A RESPONSE MADE IT BY OURSELVES every time we send a POST request
        return response()->json([
            'id' => 1,
            'title' => $data['title'],
            'body' => $data['body']
        ],  201);
        // ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
            'data' => [
                'id' => 1,
                'title' => 'Test',
                'budy' => 'decription'
            ],
            'message' => 'hello'
        ])
            //WE CAN SEND INFORMATION TO OUR CLIENT THROGHT THE HEADERES
            ->header('Test', 'Mau')
            ->header('Test2', 'Mau2');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        /*HERE WE ARE VALIDATING THE INPUTS, AND IF ONE OF THEM IS WRONG WE RECIVE AND LARAVEL'S ERROR:
        {
            "message": "The body field is required.",
                "errors": {
                    "body": [
                        "The body field is required."
                    ]
                }
        }
*/
        $data = $request->validate([
            'title' => 'required|string|min:2',
            'body' => ['required', 'string', 'min:2']
        ]);

        return $data;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //THIS LINE MEANS THAT EVERITHIG WAS OK AND RETURN A 204 CODE
        return response()->noContent();
    }
}
