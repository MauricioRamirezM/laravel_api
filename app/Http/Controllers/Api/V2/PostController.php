<?php
// HERE WE CAN HAVE DIFFERENT TYPES OF VERSION OF OURS APIS, HAVING DIFFERENTS FOLDERS WITH THE "SAME" CONTROLLER, THE DIFFERENCE IS ONLY THE "V2


namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return PostResource::collection(Post::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        $data['author_id'] = 1;
        $post = Post::create($data);
        return response()->json(new PostResource($post), 201);
    }

    /**
     * Display the specified resource.
     */

    /*IF WE PASS THE INSTANCE OF OUR POST::CLASS AND A $post VARIABLE, LARAVEL IS SMART ENOGHT TO KNOW WE ARE TRYING TO GET THE POST THAT WE SEND IN THE URL, IF IT DOES NOT FIND IT GONNA MAKE THE SAME AS THE COMMENTED FUNCTION (findOrFail())
    */
    public function show(Post $post)
    {
        // $post = Post::findOrFail($id);
        return response()->json( new PostResource($post));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validated([
            'title' => 'required|string|min:2',
            'body' => ['required', 'string', 'min:2']
        ]);
        $post->update($data);
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->noContent();
    }
}
