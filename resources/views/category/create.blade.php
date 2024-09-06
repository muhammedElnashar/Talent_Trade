@extends("dashboard")

@section("title")
    Create Category
@endsection

@section("css")
    <style>
        /* Center the form container */
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 60vh; /* Ensures it's centered vertically */
            flex-direction: column;
        }

        /* Make the form medium-sized */
        .form-container form {
            width: 60%; /* Adjusted to a medium size */
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Styling for the title */
        .form-container h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Form group styling */
        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 10px;
            width: 100%;
        }

        /* Validation error styling */
        .text-danger {
            margin-top: 5px;
            font-size: 14px;
        }

        /* Button styling */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        /* Error alert styling */
        .alert-danger {
            margin: 20px auto;
            width: 60%; /* Align error box width to match the form */
        }
    </style>
@endsection

@section("content")
    <div class="form-container">
        <h1>Create Category</h1>
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="category_name">Name</label>
                <input type="text" name="category_name" class="form-control" id="category_name">
                @error('category_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection

@section("script")

@endsection
