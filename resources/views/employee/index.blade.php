@extends("dashboard")

@section("title")
    Employee
@endsection
@section("css")

@endsection
@section("content")
    <div class="container">
        <h1>Employees</h1>
        <a href="{{ route('employee.create') }}" class="btn btn-primary">Add New Employee</a>
        <table class="table mt-4">
            <thead>
            <tr>
                <th>ID</th>
                <th>Company Name</th>
                <th>Location</th>
                <th>Logo</th>
                <th>User ID</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->company_name }}</td>
                    <td>{{ $employee->location }}</td>
                    <td><img src="{{ asset('images/users/' . $employee->logo) }}" alt="Logo" width="100" class="rounded mt-3"></td>
                    <td>{{ $employee->user_id }}</td>
                    <td>
                        <a href="{{route('employee.show',$employee->id)}}" class='btn btn-primary btn-sm'>View</a>

                        <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section("script")

@endsection
