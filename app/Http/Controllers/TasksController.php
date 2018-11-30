<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Task;

class TasksController extends Controller
{
    //
    function index(Request $request)
    {
      $tasks = Task::orderBy('created_at', 'ASC');

      if($request->has('status')){
        $tasks = $tasks->where('status', $request->status);
      }

      $tasks = $tasks->get();

      return response()->json([
        'status' => 'ok',
        'tasks' => $tasks
      ]);
    }

    function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'description' => 'required'
      ]);

      if($validator->fails()){
        return response()->json([
          'status' => 'error',
          'errors' => $validator->errors()->all()
        ]);
      }

      $task = Task::create($request->all());
      return response()->json([
        'status' => 'ok',
        'task' => $task
      ]);
    }

    function update(Request $request, Task $task)
    {
      $task->update($request->all());
      return response()->json([
        'status' => 'ok',
        'task' => $task
      ]);
    }

    function delete(Task $task)
    {
      $task->delete();
      return response()->json([
        'status' => 'ok',
      ]);
    }


}
