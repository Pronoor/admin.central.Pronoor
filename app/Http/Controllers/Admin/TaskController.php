<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.task.index',[
            'tasks' => Task::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.task.create',[
            'users' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        try {
            Task::insert([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status,
                'assignee' => $request->assignee,
                'deadline' => $request->deadline,
            ]);
            return redirect()->action([TaskController::class, 'index'])->with('status', 'Task Added Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([TaskController::class, 'index'])->with('status', 'Something Went Wrong!');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.task.edit',[
            'tasks' => Task::find($id),
            'users' => User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTaskRequest $request, $id)
    {
        
        try {
            // dd($request);
            $task =Task::find($id);
            
            $task->update([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status,
                'assignee' => $request->assignee,
                'deadline' => $request->deadline,
            ]);
            dd($task);
            return redirect()->action([TaskController::class, 'index'])->with('status', 'Task Update Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([TaskController::class, 'index'])->with('status', 'Something Went Wrong!');;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // dd($request);
            $task =Task::findOrFail($id);
            $task->delete();
            return redirect()->action([TaskController::class, 'index'])->with('status', 'Task Delete Successfully!');;
        } catch (\Exception $exception) {
            return redirect()->action([TaskController::class, 'index'])->with('status', 'Something Went Wrong!');;
        }
    }
}
