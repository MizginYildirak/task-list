@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mb-4">
            <label for="title" class='block uppercase text-slate-700 mb-2'>
                Title
            </label>
            <input class="shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none"
                type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}"
                @class(['border-red-500' => $errors->has('title')]) @value=' {{ $task->title ?? old('title') }} ' />

            @error('title')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class='block
                uppercase text-slate-700 mb-2' for="description">Description</label>
            <textarea class="shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none"
                @class(['border-red-500' => $errors->has('title')]) name="description" id="description" rows="5">{{ $task->title ?? old('description') }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class='block uppercase text-slate-700 mb-2' for="long_description">Long Description</label>
            <textarea class="shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none"
                @class(['border-red-500' => $errors->has('title')]) name="long_description" id="long_description" rows="10">{{ $task->title ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class='flex gap-2 items-center gap-2'>
            <button type="submit" class="btn">
                @isset($task)
                    Update Task
                @else
                    Add Task
                @endisset
            </button>
            <a href='{{ route('tasks.index') }}'>Cancel</a>
        </div>
    </form>
@endsection
