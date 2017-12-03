<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use Auth;
use DB;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()) {
            $notes = Note::all()->Where('user_id', Auth::user()->id);
            return view('note.home', compact('notes'));
        } else {
            $notes = Note::all()->shuffle();
            return view('note.home', compact('notes'));
        //     return redirect()->action('HomeController@index');      
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('note.create');
        } else {
            return redirect()->action('HomeController@index');      
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $note = new Note;
            $this->validate($request, [
                    'title'=>'required|unique:notes',
                    'body'=>'required',
                ]);
            $note->title = $request->title;
            $note->user_id = Auth::user()->id;
            $note->body = $request->body;
            $note->save();
            session()->flash('message', 'New Note Created Successfully');
            return redirect('/note');
         } else {
            return redirect()->action('HomeController@index');      
        }
        // return $note;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::find($id);
        return view('note.show', compact('note'));
        // return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check()) {
            $note = Note::find($id);
            return view('note.edit', compact('note'));
        } else {
            return redirect()->action('HomeController@index');      
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::check()) {
            $note = Note::find($id);
            $this->validate($request, [
                    'title'=>'required',
                    'body'=>'required',
                ]);
            $note->title = $request->title;
            $note->body = $request->body;
            $note->save();
            session()->flash('message', 'Updated Successfully');
            return redirect('note/'.$id.'/edit');
        } else {
            return redirect()->action('HomeController@index');      
        }
        // return $note;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            $note = Note::find($id);
            $note->delete();
            session()->flash('message', 'Delete Successfully');
            return redirect('/note');
        } else {
            return redirect()->action('HomeController@index');      
        }
        // return $id;
    }
}
