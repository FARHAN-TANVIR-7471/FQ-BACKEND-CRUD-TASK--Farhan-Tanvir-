<?php

namespace App\Http\Controllers;

use App\Model\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    
    public function index()
    {
        $todo = ToDo::get();

        return response()->json([
            'data' => $todo,
            'state' => 'success'
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo = new ToDo();

        $todo->title = $request->title;
        $todo->date = $request->date;
        $todo->time = $request->time;
        
        $todo->save();

        return response()->json([
            'success' => $todo,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\ToDo  $toDo
     * @return \Illuminate\Http\Response
     */
    public function show(ToDo $toDo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\ToDo  $toDo
     * @return \Illuminate\Http\Response
     */
    public function edit(ToDo $toDo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\ToDo  $toDo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $todo = ToDo::findOrFail($request->id);
        
        $todo->title = $request->get('title');
        $todo->date = $request->get('date');
        $todo->time = $request->get('time');

        $todo->save();

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\ToDo  $toDo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $todo = ToDo::where('id', $request->id);
        $todo->delete();

        return response()->json([
            'success' => true,
        ]);
    }
}
