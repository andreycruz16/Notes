<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->take(5)->get();
        // $notes = DB::table('notes')->limit(5)->get();
        $notesCount = Note::all()->Where('user_id', Auth::user()->id)->count();
        return view('home', compact('notes', 'notesCount'));
    }
}
