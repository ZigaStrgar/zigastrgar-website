<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;


class CoursesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = Tag::where('name', 'Course')->first();

        $posts_ids = $tag->posts->pluck('id')->toArray();

        $courses = Post::whereRaw('id IN (' . implode(",", $posts_ids) . ')')->get();

        dd($courses);

        return view('courses.index', compact('courses'));
    }
}
