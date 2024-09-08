@extends("welcome")

@section("title")
    @if (\Illuminate\Support\Facades\Auth::user()->role)
        {{\Illuminate\Support\Facades\Auth::user()->role}} Dashboard
    @endif
@endsection
@section("css")

@endsection
@section("content")


@endsection
@section("script")

@endsection

