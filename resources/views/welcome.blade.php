<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        

        <!-- Styles -->
        <style>
            
    body {
        font-family: 'Figtree', sans-serif;
        background-color: #f3f4f6; /* Background color */
        color: #333; /* Text color */
        margin: 0;
        padding: 0;
    }

    .todo-container {
        max-width: 400px;
        margin: 0 auto;
        background-color: #fff; /* Container background color */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Box shadow */
    }

    h1 {
        color: #fff;
        text-align: center;
        font-size: 24px;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 0;
        border-bottom: 1px solid #ddd;
    }

    form {
        display: flex;
        align-items: center;
    }

    label {
        flex: 1;
        margin-right: 8px;
    }

    input[type="text"] {
        flex: 2;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px 0 0 4px; /* Rounded left corners */
    }

    button[type="submit"] {
        background-color: #3490dc;
        color: white;
        border: 1px solid #3490dc; /* Add a border to visually separate it */
        padding: 8px 16px;
        cursor: pointer;
        border-radius: 0 4px 4px 0; /* Rounded right corners */
    }

    button[type="submit"]:hover {
        background-color: #2779bd;
        border-color: #2779bd; /* Adjust border color on hover */
    }

    /* Dark mode styles */
    @media (prefers-color-scheme: dark) {
        body {
            background-color: #111827;
            color: #d1d5db;
        }

        .todo-container {
            background-color: #1f2937;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
        }

        label, button[type="submit"] {
            background-color: #4b5563;
            color: #fff;
        }

        label {
            margin-right: 8px;
        }

        input[type="text"] {
            border: 1px solid #4b5563;
        }

        button[type="submit"]:hover {
            background-color: #475569;
        }
    }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="todo-container">
        <h1>To-Do List</h1>
        <ul id="todo-list">
            @foreach ($listItems as $listItem)
                <li>
                    <span>{{ $listItem->name }}</span>
                    <form action="{{ route('markComplete', $listItem->id) }}" method="post">
                    {{ csrf_field() }}
                    <button type="submit">Complete</button>
                    </form>
                </li>
            @endforeach
        </ul>
        <div>
            <form action="{{ route('saveItem') }}" method="post">
                {{ csrf_field() }}
                <label for="new-task">New Task</label>
                <input type="text" id="new-task" name="new-task"
                placeholder="New Task">
                <button type="submit"">Add</button>
            </form>
        </div>
    </div>

        </div>
    </body>
</html>
