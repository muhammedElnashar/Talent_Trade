@extends("dashboard")

@section("title")
    Edit Category
@endsection

@section("css")
    <style>
        .container {
            display: flex;
            flex-direction: column; /* Ensures vertical stacking of form and table */
            justify-content: flex-start; /* Start from the top */
            align-items: center;
            min-height: 60vh;
            padding: 20px;
        }

        form {
            width: 50%;
            max-width: 600px;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            margin-bottom: 20px; /* Add margin between form and table */
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
        }

        .text-danger {
            margin-top: 5px;
            font-size: 14px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
@endsection

@section("content")
    <div class="container">
        <h1>Edit Category</h1>
        <form action="{{ route('category.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="category_name">Name</label>
                <input type="text" name="category_name" class="form-control" value="{{ old('category_name', $category->category_name) }}" required>
                @error('category_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

@section("script")
@endsection
