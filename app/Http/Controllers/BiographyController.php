<?php

namespace App\Http\Controllers;

use App\Biography;
use App\Http\Requests\BiographyRequest;
use Illuminate\Http\Request;

use App\Http\Requests;

class BiographyController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin', [ 'except' => [ 'index' ] ]);
        $this->middleware('auth', [ 'except' => [ 'index' ] ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biographies = Biography::orderBy('created_at', 'desc')->get();

        return view('biography.index', compact('biographies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('biography.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\BiographyRequest|\Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BiographyRequest $request)
    {
        Biography::create($request->all());

        return redirect('biography');
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
        $biography = Biography::findOrFail($id);

        return view('biography.edit', compact('biography'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\BiographyRequest|\Illuminate\Http\Request $request
     * @param  int                                                         $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(BiographyRequest $request, $id)
    {
        $biography = Biography::findOrFail($id);
        $biography->update($request->all());

        return redirect('biography');
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
        Biography::findOrFail($id)->delete();

        return "success";
    }
}
