@extends("dashboard")

@section("title")
    Categories
@endsection

@section("css")

@endsection

@section("content")
    <div class="container">
        <h1>Categories</h1>
        <a href="{{ route('category.create') }}" class="btn btn-primary">Create Category</a>

        @if(session('success'))
            <div class="alert alert-success mt-2">{{ session('success') }}</div>
        @endif

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <!-- <th>Description</th> -->
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
    </div>
@endsection

@section("script")

@endsection
