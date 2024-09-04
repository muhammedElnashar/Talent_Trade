@extends("dashboard")

@section("title")
    Uodate Employee
@endsection
@section("css")

@endsection
@section("content")
    <div class="container">
        <h1>Edit Employee</h1>

        <form action="{{ route('employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mt-3">
                <label for="company_name">Company Name</label>
                <input type="text" name="company_name" class="form-control" value="{{$employee->company_name}}">
                @error('company_name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="location">Location</label>
                <input type="text" name="location" class="form-control" value="{{$employee->location}}">
                @error('location')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="logo">Logo</label>
                <input type="file" name="logo" class="form-control">
                @if($employee->logo)
                    <img src="{{ asset('images/logos/' . $employee->logo) }}" alt="Logo" width="100" class="mt-3">
                @endif
                @error('logo')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="user_id">User ID</label>
                <input type="number" name="user_id" class="form-control"  value="{{ $employee->user_id }}">
                @error('user_id')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Employee</button>
        </form>
    </div>
@endsection
@section("script")

@endsection
