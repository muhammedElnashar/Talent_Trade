@extends("welcome")

@section("title")
    Categories
@endsection

@push("css")

@endpush

@section("content")

    <div class="container">

        @if(session('success'))
            <div class="alert alert-success mt-2">{{ session('success') }}</div>
        @endif


    </div>
@endsection

@push("script")
@endpush
