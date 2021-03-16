<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class PostController extends Controller
{    
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth')->except('index, show');
    }

    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        $users = User::has('posts')->with('posts')->get();

        return response()->json([
            'posts' => $posts,
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        // validation

        // dd(Auth::user()); // null
        dd(Auth::check(), $request->all()); // null

        $post = new Post([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            // 'user_id' => auth()->user()->id
            'user_id' => 1
        ]);

        $post->save();

        return response()->json('Post successfully created!');
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

        return response()->json('Post successfully updated!');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return response()->json('Post successfully deleted!');
    }
}