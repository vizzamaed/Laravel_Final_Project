<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class TaskController extends Controller
{
   
    public function index()
    {
        return view('task');
    }

    
    public function show(string $id)
    {
        //$data=Tasks::findOrFail($id);
      //  dd($data);
       // return view('tasks.index',['tasks'=>$data]);
    }

    public function create() {
        return view('tasks.create');
    }

}
