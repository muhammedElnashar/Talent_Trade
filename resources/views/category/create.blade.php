@extends("dashboard")

@section("title")
    Create Category
@endsection

@section("css")

@endsection

@section("content")
    <div class="container">
        <h1>Create Category</h1>
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="category_name">Name</label>
                <input type="text" name="category_name" class="form-control">
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
