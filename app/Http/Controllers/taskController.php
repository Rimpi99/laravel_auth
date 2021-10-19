<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class taskController extends Controller
{
    public function get_all_task()
    {
        return task::all();
    }

    public function add_task(Request $request)
    {

        // return $request->all();
        $task = new task();
        $task->user_id = $request->user_id;
        $task->task = $request->task;
        $s = $task->save();
        if ($s) {
            return response()->json([
                "data" => $task,
                "message" => "successfully created a task",
                "status" => 1,
            ]);
        }
        return ["fail" => "Something Went Wrong"];
    }

    public function update_status(Request $request)
    {

        // return $request->all();
        $task = task::where("id", "=", $request->task_id)->first();
        $task->status = $request->status;
        $s = $task->save();
        if ($s) {
            return response()->json([
                "data" => $task,
                "message" => "Marked task as $request->status",
                "status" => 1,
            ]);
        }
        return ["fail" => "Something Went Wrong"];
    }
}
