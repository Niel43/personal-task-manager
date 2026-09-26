@extends('layouts.app')

@section('content')

    <div class="page-header">
        <div>
            <h1>My Tasks</h1>
            <p>Keep track of your personal tasks and deadlines.</p>
        </div>

        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
            + Add New Task
        </a>
    </div>

    <div class="card">

        @if($tasks->count() > 0)

            <table>
                <thead>
                    <tr>
                        <th>Task Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($tasks as $task)

                        <tr>

                            <td>
                                <strong>{{ $task->task_name }}</strong>
                            </td>

                            <td>
                                {{ $task->description ?: 'No description' }}
                            </td>

                            <td>
                                <span class="status {{ strtolower($task->status) }}">
                                    {{ $task->status }}
                                </span>
                            </td>

                            <td>
                                {{ $task->due_date ?? 'No due date' }}
                            </td>

                            <td>
                                <div class="actions">

                                    <a href="{{ route('tasks.edit', $task) }}"
                                       class="btn btn-edit">
                                        Edit
                                    </a>

                                    <form action="{{ route('tasks.destroy', $task) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-delete"
                                                onclick="return confirm('Are you sure you want to delete this task?')">
                                            Delete
                                        </button>

                                    </form>

                                </div>
                            </td>

                        </tr>

                    @endforeach

                </tbody>
            </table>

        @else

            <div class="empty">
                <h3>No tasks yet</h3>
                <p>Click "Add New Task" to create your first task.</p>
            </div>

        @endif

    </div>

@endsection