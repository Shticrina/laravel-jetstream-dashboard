<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->get();
        $users = User::has('posts')->with('posts')->get();

        return response()->json([
            'posts' => $posts,
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $post = new Post([
            'name' => $request->input('name'),
            'detail' => $request->input('detail')
        ]);
        $post->save();

        return response()->json('Post created!');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }

    public function update($id, Request $request)
    {
        $post = Post::find($id);
        $post->update($request->all());

        return response()->json('Post updated!');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return response()->json('Post deleted!');
    }
}