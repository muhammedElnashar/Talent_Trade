@extends("test")

@section("title")
    View Category
@endsection

@section("css")
@endsection

@section("content")
    <div class="container">
        <h1>Category Details</h1>
        <div class="card">
            <div class="card-header">
                <h2>{{ $category->name }}</h2>
            </div>
            <div class="card-body">
                <p><strong>Description:</strong> {{ $category->description }}</p>
                <p><strong>Created At:</strong> {{ $category->created_at->format('d-m-Y H:i') }}</p>
                <p><strong>Updated At:</strong> {{ $category->updated_at->format('d-m-Y H:i') }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
            </div>
        </div>
    </div>
@endsection

@section("script")
@endsection
