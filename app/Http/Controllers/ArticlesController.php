<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin', [ 'except' => [ 'index', 'show' ] ]);
        $this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
    }

    public function index()
    {
        $posts = Post::all();

        return view('articles.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::where('slug', $id)->first();
        $post->clicks()->create([
            'ip'      => $_SERVER['REMOTE_ADDR'],
            'agent'   => $_SERVER['HTTP_USER_AGENT'],
            'user_id' => ( Auth::check() ) ? Auth::user()->id : 0
        ]);

        return view('articles.article', compact('post'));
    }

    public function create()
    {
        $tags = Tag::pluck('name', 'id');

        return view('articles.create', compact('tags'));
    }

    public function store(ArticleRequest $request)
    {
        $article = Auth::user()->posts()->create($request->all());
        $this->syncTags($article, $request->input('tag_list'));

        return redirect('blog');
    }

    public function edit($id)
    {
        $tags = Tag::pluck('name', 'id');
        $post = Post::where('slug', $id)->first();

        return view('articles.edit', compact('tags', 'post'));
    }

    public function update(ArticleRequest $request, $id)
    {
        $article = Post::findOrFail($id);

        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return redirect('blog/' . $article->slug);
    }

    public function destroy($id)
    {
        Post::findOrFail($id)->delete();

        return "success";
    }

    private function syncTags(Post $article, array $tags)
    {
        foreach ( $tags as $tag ) {
            if ( is_numeric($tag) ) {
                $ids[] = $tag;
            } else {
                $tag   = Tag::firstOrCreate([ 'name' => $tag ]);
                $ids[] = $tag->id;
            }
        }
        $article->tags()->sync($ids);
    }
}
