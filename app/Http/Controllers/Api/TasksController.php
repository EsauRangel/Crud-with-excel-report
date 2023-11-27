<?php

namespace App\Http\Controllers\Api;

use App\Exports\TaskExport;
use App\Http\Controllers\Controller;
use App\Models\Task;
use Maatwebsite\Excel\Facades\Excel;

class TasksController extends Controller
{

    public function show()
    {
        $query = request()->q ?? "";
        $per_page = request()->per_page ? request()->per_page : 5;
        $report = request()->report ?? false;

        $tasks = Task::active()->search($query)->with("place");

        if ($report) {
            $tasks = $tasks->get();

            ob_end_clean();
            // return Excel::download(new TaskExport($tasks), "Tasks.xlsx");

        } else {
            $tasks = $tasks->paginate($per_page);
        }

        return response()->json(["success" => $tasks], 200);

    }

    public function create()
    {
        request()->validate([
            "title" => "required|string|min:5|max:20",
            "description" => "required|string|min:10|max:50",
            "place_id" => "required|integer|exists:places,id",
            "expiration_date" => "required|date",
        ]);

        $task = Task::create([
            "title" => request()->title,
            "description" => request()->description,
            "place_id" => request()->place_id,
            "expiration_date" => request()->expiration_date,
        ]);

        return response()->json(["success" => $task], 201);
    }

    public function edit(Task $task)
    {
        if (!$task) {
            return response()->json(["error" => ["msg" => "resource not found"]], 404);
        }
        if (request()->has("title")) {
            request()->validate(["title" => "required|string|min:5|max:20"]);
            $task->title = request()->title;
            $task->save();
        }
        if (request()->has("description")) {
            request()->validate(["description" => "required|string|min:10|max:50"]);
            $task->description = request()->description;
            $task->save();
        }
        if (request()->has("place_id")) {
            request()->validate(["place_id" => "required|integer|exists:places,id"]);
            $task->place_id = request()->place_id;
            $task->save();
        }
        if (request()->has("expiration_date")) {
            request()->validate(["expiration_date" => "required|date"]);
            $task->expiration_date = request()->expiration_date;
            $task->save();
        }

        $task->load("place");

        return response()->json(["success" => $task], 200);
    }

    public function delete(Task $task)
    {
        if (!$task || !$task->active) {
            return response()->json(["error" => ["msg" => "El recurso no existe."]], 200);
        }

        $task->active = false;
        $task->save();

        return response()->json("success", 204);
    }
}
