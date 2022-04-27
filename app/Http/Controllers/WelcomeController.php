<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class WelcomeController extends Controller
{
    public function index()
    {
        $event = Event::orderBy('created_at', 'DESC')->take(4)->get();
        return view('index', compact('event'));
    }
}
