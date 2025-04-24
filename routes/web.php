<?php

use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        "tasks" => Task::latest()->where("completed", true)->get()

    ]);
})->name("tasks.index");

Route::view("/tasks/create", "create");

Route::get('/tasks/{id}', function ($id) {
    return view('show', ['task' => Task::findOrFail($id)]);
})->name("tasks.show");

Route::post("/tasks", function (Request $request) {
  $data = $request->validate([
    "title" => "required|max:255",
    "description" => "required",
    "long_description" => "required",
  ]);

  $task = new Task;
  $task->title = $data["title"];
  $task->description = $data["description"];
  $task->long_description = $data["long_description"];
  $task->save();

  return redirect()->route("tasks.show", ["id" => $task->id])
  ->with("success", "Task created successfully!");
})->name("tasks.store");


// "/hello" is not always a static url, it is rather a URL pattern.
// Route::get("/hello", function () {
//     return "Hello";
// });

// Route::get("/greet/{name}", function ($name) {
//     return "Hello " . $name . "!";
// });

// Route::get("/xxx", function () {
//     return redirect()->route("hello");
// });

// Route::get("/hello", function () {
//     return "Hello";
// })->name("hello");

// Route::fallback(function () {
//     return "Still got somewhere!";
// });


// GET
// POST
// PUT
// DELETE
