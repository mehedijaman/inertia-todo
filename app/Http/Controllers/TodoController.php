<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Request;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::where('user_id', Auth::id())->get();
        return Inertia::render('Todo', ['todos' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $todo = new Todo();
        $todo->todo = $request->todo;
        $todo->user_id = Auth::id();
        $todo->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        // return Inertia::render('/resources/js/Components/Modal', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Todo::find($id)->update(['todo' => $request->todo]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Todo::destroy($id);
        return back();
    }

    public function toggle($id)
    {
        $todo = Todo::find($id);
        if(is_null($todo->completed_at))
        {
            $todo->completed_at = Carbon::now();
        }
        else{
            $todo->completed_at = null;
        }

        $todo->save();
        return back();
    }
}
