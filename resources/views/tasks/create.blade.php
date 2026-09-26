@extends('layouts.app')

@section('content')

    <div class="page-header">
        <div>
            <h1>Add New Task</h1>
            <p>Create a new task and keep track of your deadline.</p>
        </div>
    </div>

    <div class="card form-card">

        <form action="{{ route('tasks.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <label for="task_name">Task Name</label>
                <input
                    type="text"
                    id="task_name"
                    name="task_name"
                    placeholder="Enter task name"
                    required
                >
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea
                    id="description"
                    name="description"
                    placeholder="Enter task description"
                ></textarea>
            </div>

            <div class="form-group">
                <label for="status">Status</label>

                <select id="status" name="status" required>
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>

            <div class="form-group">
                <label for="due_date">Due Date</label>

                <input
                    type="date"
                    id="due_date"
                    name="due_date"
                >
            </div>

            <div class="form-buttons">

                <button type="submit" class="btn btn-primary">
                    Save Task
                </button>

                <a href="{{ route('tasks.index') }}" class="btn btn-edit">
                    Cancel
                </a>

            </div>

        </form>

    </div>

@endsection