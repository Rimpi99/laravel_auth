<?php

namespace App\Http\Controllers;

use App\Models\task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class taskController extends Controller
{
    public function get_all_task()
    {
        return task::with("getUserRelation")->get();
    }

    public function add_task(Request $request)
    {

        $rules = [
            "task" => ["required", "string", "min:10"],
        ];
        $valid = FacadesValidator::make($request->all(), $rules);
        if ($valid->fails()) {
            return $valid->errors();
        }

        $task = new task();
        $task->task = $request->task;

        $user = User::where("id", "=", $request->id)->get()->first();
        $s = $user->getTasksRelation()->save($task);
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
        $task = task::with("getUserRelation")->where("id", "=", $request->task_id)->first();
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
