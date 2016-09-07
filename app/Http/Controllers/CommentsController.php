<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\Post;

class CommentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', [ 'except' => [ 'index', 'show', 'create' ] ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\CommentRequest|\Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     * @internal param $slug
     *
     */
    public function store(CommentRequest $request)
    {
        // TODO Check for valid slug
        $post = Post::where('slug', $request->input('slug'))->firstOrFail();

        $request->user()->comments()->create(array_merge($request->all(), [ 'post_id' => $post->id ]));

        return redirect('blog/' . $post->slug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Comment::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\CommentRequest|\Illuminate\Http\Request $request
     * @param  int                                                       $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, $id)
    {
        // TODO Check for user id

        $comment = Comment::findOrFail($id)->update($request->all());

        return redirect('blog/' . $comment->post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // TODO Check for user id
    }
}
