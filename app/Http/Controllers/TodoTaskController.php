<?php

namespace App\Http\Controllers;

use App\Models\Task;

use Illuminate\Http\Request;

class TodoTaskController extends Controller
{
    public function index(){
        $tasks = Task::all();

        return view('home1', [
            'tasks' => $tasks,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
        'task' => 'required|min:5',
        ],
        [
            'task.required' => 'Tugas harus diisi',
            'task.min'      => 'Tugas minimal 5 karakter',
        ]
        
    );
        Task::create([
            'task' => $request->task,
            'tanggal' => NOW(),
        ]);

        return redirect('/');
    }
    public function hapus(Request $request)
    {
        Task::destroy($request->id);
        return redirect('/');
    }
}