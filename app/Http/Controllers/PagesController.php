<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function sendMessage(ContactRequest $request)
    {
        dd("sending message");
    }

    public function portfolio()
    {
        return view('pages.portfolio');
    }

    public function dashboard()
    {
        return view('dashboard.index');
    }
}
