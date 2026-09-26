@extends('layouts.app')

@section('content')

    <div class="page-header">
        <div>
            <h1>Edit Task</h1>
            <p>Update your task information or change its status.</p>
        </div>
    </div>

    <div class="card form-card">

        <form action="{{ route('tasks.update', $task) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="task_name">Task Name</label>

                <input
                    type="text"
                    id="task_name"
                    name="task_name"
                    value="{{ $task->task_name }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="description">Description</label>

                <textarea
                    id="description"
                    name="description"
                >{{ $task->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="status">Status</label>

                <select id="status" name="status" required>

                    <option value="Pending"
                        {{ $task->status == 'Pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="Completed"
                        {{ $task->status == 'Completed' ? 'selected' : '' }}>
                        Completed
                    </option>

                </select>
            </div>

            <div class="form-group">
                <label for="due_date">Due Date</label>

                <input
                    type="date"
                    id="due_date"
                    name="due_date"
                    value="{{ $task->due_date }}"
                >
            </div>

            <div class="form-buttons">

                <button type="submit" class="btn btn-primary">
                    Update Task
                </button>

                <a href="{{ route('tasks.index') }}" class="btn btn-edit">
                    Cancel
                </a>

            </div>

        </form>

    </div>

@endsection