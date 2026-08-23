<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

use function Laravel\Prompts\task;

class TaskController extends Controller
{


    public function addcategoryToTask(Request $request, $taskId)
    {
        $task = Task::findOrFail($taskId);
        $task->category()->attach($request->category_id);


    }
    public function getTasksUser($id)
    {
        //
        $user=User::find($id)->user;
        return response()->json($user,200);
    }


    public function getTaskCategories($taskId)
    {
        //
        $category=Task::findOrFail($taskId)->category;
        return response()->json($category,200);
    }


    public function getCategoriesTasks($categoryId)
    {
        //
        $task=category::findOrFail($categoryId)->tasks;
        return response()->json($task,200);
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $task=Task::all();
        return response()->json($task ,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        //
        // جلب البيانات التي اجتازت التحقق فقط
        $validated = $request->validated();
        
    //    $task=Task::create([
    //         'title'=>$request->title,
    //         'description'=>$request->description,
    //         'is_completed'=>$request->is_completed,
    //     ]);
     $task=Task::create($validated);

       return response()->json($task , 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $task=Task::find($id);
        return response()->json($task,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, $id)
    {
        //
        // جلب البيانات التي اجتازت التحقق فقط
        $validated = $request->validated();
        // عمل بحث لايجاد البروفيل المراد تحديثه
        $task=Task::findOrfail($id);
        //تحديث البينات 
        $task->update($validated);
        // ارجاع البينات التي تم تحديتها
        return response()->json($task,200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $task=Task::findOrfail($id);
        $task->delete();

        return response()->json(null,204);
    }


    
}