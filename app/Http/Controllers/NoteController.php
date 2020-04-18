<?php

namespace App\Http\Controllers;
use app\Note;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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

        return view('notes.index')->with('notes',\App\Note::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('notes.create');
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
           'noteContent'=>'required'
        ]);

        $nNote = new \App\Note();

//        $nNote->noteContent = $request->noteContent;
        $nNote->noteContent = request('noteContent');
        $nNote->save();
//        \App\Note::create([
//            'noteContent'=>$request->noteContent
//        ]);
//        Note::create($request->all());
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('notes.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  Note  $note
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request,Note $note)
    {
        $this->validate($request,[
            'noteContent'=>'required'
        ]);

        $note->noteContent = $request->noteContent;

        $note->save();

        session()->flash('success','Note update successfully');

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
