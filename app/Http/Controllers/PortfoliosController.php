<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioRequest;
use App\Portfolio;
use Illuminate\Http\Request;

use App\Http\Requests;

class PortfoliosController extends Controller
{


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

        $path = $request->file('image')->store('public/images');
        $portfolio->image()->create([ 'resource' => 'portfolio', 'path' => $path ]);

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
        $portfolio->update($request->all());

        if ( $request->hasFile('image') ) {
            $portfolio->image->where('resource', 'portfolio')->update([
                'path' => $request->file('image')->store('public/images')
            ]);
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
        $portfolio->image->where('resource', 'portfolio')->delete();
        $portfolio->delete();

        return "success";
    }
}
