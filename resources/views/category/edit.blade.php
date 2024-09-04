@extends("dashboard")

@section("title")
    Edit Category
@endsection

@section("css")
@endsection

@section("content")
    <div class="container">
        <h1>Edit Category</h1>
        <form action="{{ route('category.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="category_name">Name</label>
                <input type="text" name="category_name" class="form-control" value="{{old('category_name',$category->category_name)}}" required>
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
