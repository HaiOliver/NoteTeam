<?php

namespace App\Http\Controllers;
use app\Note;
use app\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use app\Http\Requests\Note\StoreNoteRequest;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $note = DB::table('notes')->where('user_id', Auth::id())->get();
//        return view('notes.index')->with('notes',\App\Note::all());
        return view('notes.index')->with('notes',$note);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('notes.create')->with('users',\App\User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'noteContent'=>'required',
            'quote'=>'required',
            'link'=>'required',
            'image'=>'required'
        ]);
        //        $nNote->noteContent = request('noteContent');
//        Testing add id user

        $user = Auth::user();
//        dd($user->id);
        $user_id = $user->id;
        $image = $request->image->store('posts');
        $nNote = new \App\Note();
        $nNote->user_id = $user_id;
        $nNote->noteContent = $request->noteContent;
        $nNote->quote = $request->quote;
        $nNote->link = $request->link;
        $nNote->image = $image;

        $nNote->save();

        session()->flash('success','Note created successfully.');
        return redirect(route('note.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Note $note
     * @return Factory|View
     */
    public function edit(\App\Note $note)
    {
        return view('notes.create')->with('note',$note);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  Note  $note
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request,\App\Note $note)
    {
        $this->validate($request,[
            'noteContent'=>'required',
            'quote'=> 'required',
            'link'=> 'required'
        ]);

        $data = $request->only(['noteContent','quote','link']);

//        delete old one
        if($request->hasFile('image')){
            $image = $request->image->store('posts');
            Storage::delete($note->image);
            $data['image']=$image;
        }

        $note->update($data);

        session()->flash('success','Note update successfully');



//        $note->noteContent = $request->noteContent;
//
//        $note->save();



        return redirect(route('note.index'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Note $note
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Note $note)
    {
        $note->delete();
        session()->flash('success','delete successfully note.');
        return redirect(route('note.index'));
    }
}
