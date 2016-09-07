<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMe;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;

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
        Mail::to("me@zigastrgar.com")->send(new ContactMe($request));
        flash('Message sent successfuly', 'success');

        return view('pages.contact');
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
