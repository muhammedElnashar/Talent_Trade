@extends("dashboard")

@section("title")
    Categories
@endsection

@section("css")
    <style>
        /* Center the table in the middle of the screen */
        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 60vh; /* Ensures it's centered vertically */
            flex-direction: column; /* Stack the title above the table */
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 80vh;
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
            text-align: center;
        }
        .table {
            width: 80%; /* Adjusted to a medium size */
            margin: auto;
        }

        table {
            width: 80%; 
            margin: 0 auto; 
            border-collapse: collapse;
            background-color: #f9f9f9;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #343a40; 
            color: white;
            text-transform: uppercase;
        }

        td {
            background-color: #ffffff;
        }

        tbody tr:hover {
            background-color: #ddd; /* Highlight row on hover */
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2; /* Alternating row color */
        }

        .btn-warning, .btn-danger {
            padding: 8px 12px;
            font-size: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #000;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-warning:hover, .btn-danger:hover {
            opacity: 0.9;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }
        

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            table {
                width: 90%; /* Adjust table width for mobile */
            }
        }

        .thead-dark th {
            background-color: #343a40;
            color: #fff;
        }
    </style>
@endsection

@section("content")
    <div class="container">
        <h1>Categories</h1>

        @if(session('success'))
            <div class="alert alert-success mt-2">{{ session('success') }}</div>
        @endif

        <table class="table mt-3">
            <thead class="thead-dark">
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->category_name }}</td>
                        <td>
                            <a href="{{ route('category.edit', $category) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('category.destroy', $category) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('category.create') }}" class="btn btn-primary">Create Category</a>
    </div>
@endsection

@section("script")
@endsection
