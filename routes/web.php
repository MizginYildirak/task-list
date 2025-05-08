<?php

use App\Models\Task;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        "tasks" => Task::latest()->paginate(5)

    ]);
})->name("tasks.index");

Route::view("/tasks/create", "create");


Route::get('/tasks/{id}/edit', function ($id) {
    return view('edit', ['task' => Task::findOrFail($id)]);
})->name("tasks.edit");

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', ['task' => $task]);
})->name("tasks.show");


Route::post("/tasks", function (TaskRequest $request):mixed {

    $task = Task::create($request->validated());

    return redirect()->route("tasks.show", ["task" => $task->id])
        ->with("success", "Task created successfully!");
})->name("tasks.store");


Route::put("/tasks/{task}", function (Task $task, TaskRequest $request) {

    $task->update($request->validated());

    return redirect()->route("tasks.show", ["task" => $task->id])
        ->with("success", "Task updated successfully!");
})->name("tasks.update");

Route::delete("tasks/{task}", function(Task $task) {
    $task->delete();

    return redirect()->route('tasks.index')
    ->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');

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
