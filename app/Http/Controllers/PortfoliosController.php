<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioRequest;
use App\Image;
use App\Portfolio;
use Illuminate\Http\Request;

use App\Http\Requests;

class PortfoliosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', [ 'except' => [ 'index' ] ]);
        $this->middleware('admin', [ 'except' => [ 'index' ] ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::all();

        return view('portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\PortfolioRequest|\Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioRequest $request)
    {
        $portfolio = Portfolio::create($request->all());

        if ( $request->hasFile('image') ) {
            $path = $request->file('image')->store('images', ['disk' => 'public']);
            $portfolio->image()->create([ 'resource' => 'portfolio', 'path' => $path ]);
        }

        return redirect('portfolio');
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
        $portfolio = Portfolio::findOrFail($id);

        return view('portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\PortfolioRequest|\Illuminate\Http\Request $request
     * @param  int                                                         $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PortfolioRequest $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $data      =
            ( $request->has('mobile') ) ? $request->all() : array_merge($request->all(), [ 'mobile' => false ]);

        $portfolio->update($data);

        if ( $request->hasFile('image') ) {
            if ( is_null($portfolio->image) ) {
                $portfolio->image->create([
                    'path'     => $request->file('image')->store('images', ['disk' => 'public']),
                    'resource' => 'portfolio'
                ]);
            } else {
                $portfolio->image->update([
                    'path' => $request->file('image')->store('images', ['disk' => 'public'])
                ]);
            }
        }

        return redirect('portfolio');
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
        $portfolio = Portfolio::findOrFail($id);

        if ( !is_null($portfolio->image) ) {
            $portfolio->image->where('resource', 'portfolio')->where('resource_id', $id)->delete();
        }

        $portfolio->delete();

        return "success";
    }
}
