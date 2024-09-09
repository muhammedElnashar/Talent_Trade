@php
$user =\Illuminate\Support\Facades\Auth::user();
@endphp
@extends("welcome")

@section("title")
    @if ($user->role)
        {{$user->role}} Dashboard
    @endif
@endsection
@section("css")

@endsection
@section("content")


@endsection
@section("script")

@endsection

