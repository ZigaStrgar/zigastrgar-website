<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\SkillRequest;
use App\Skill;
use Illuminate\Http\Request;

use App\Http\Requests;

class SkillsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', [ 'except' => [ 'index' ] ]);
        $this->middleware('auth', [ 'except' => [ 'index' ] ]);
    }

    public function index()
    {
        $categories = Category::all();

        return view('skills.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('skills.create', compact('categories'));
    }

    public function store(SkillRequest $request)
    {
        Skill::create($request->all());

        return redirect("skills/create");
    }

    public function edit($id)
    {
        $skill      = Skill::findOrFail($id);
        $categories = Category::all();

        return view('skills.edit', compact('skill', 'categories'));
    }

    public function update(SkillRequest $request, $id)
    {
        Skill::findOrFail($id)->update($request->all());

        return redirect('skills');
    }

    public function destroy($id)
    {
        Skill::findOrFail($id)->delete();

        return "success";
    }
}
