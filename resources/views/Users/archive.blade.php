@extends("dashboard")

@section("title")
    Trash
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

        /* Make the table medium-sized */
        .table {
            width: 80%; /* Adjusted to a medium size */
            margin: auto;
        }

        /* Styling for the title above the table */
        .table-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Table styling */
        .table th, .table td {
            text-align: center; /* Center align text in table */
        }

        /* Dark table header */
        .thead-dark th {
            background-color: #343a40;
            color: #fff;
        }

        /* Button styling */
        .btn-sm {
            padding: .25rem .5rem;
            font-size: .875rem;
        }

        /* Table hover effect */
        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }

        /* Error alert styling */
        .alert-danger {
            margin: 20px auto;
            width: 80%; /* Align error box width to match the table */
        }

        /* Spacing between buttons */
        .table-actions {
            display: flex;
            gap: 10px;
        }
    </style>
@endsection

@section("content")
<div class="table-container">
    <!-- Title for the table -->
    <div class="table-title">Trash</div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table class="table table-hover table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <div class="table-actions">
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section("script")
@endsection
