@extends("dashboard")

@section("title")
    Candidate
@endsection
@section("css")

@endsection
@section("content")
<div class="container">
    @foreach ($candidates as $candidate )
    <h1>{{$candidate->cv}}</h1>
    <a href="{{route('candidate.show', $candidate->id)}}" class='btn btn-info btn-sm px-4 mt-2 '>View</a>    
    @endforeach
</div>
@endsection
@section("script")

@endsection