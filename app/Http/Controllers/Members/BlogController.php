<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\FilmDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function showpost()
    {
        $list_post = Post::orderBy('id', 'DESC')->get();
        $post = Post::orderBy('id', 'DESC')->get();
        return view('page.showblog')->with(compact('list_post'));
    }

    public function createpost()
    {
        $film = FilmDetail::orderBy('id', 'DESC')->get();

        return view('page.create-post')->with(compact('film'));
    }

    public function storepost(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->account_id = Auth()->user()->id;
        $save = $post->save();

        if ($save) {
            return redirect()->back()->with('success', 'Thêm bài post thành công ');
        }

        return redirect()->back()->with('fail', 'Thêm thất bại');
    }

    public function showpostsinger($id)
    {
        $post = Post::where('id', $id)->first();
        return view('page.blogsinger')->with(compact('post'));
    }
}
