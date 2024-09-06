@extends("dashboard")

@section("title")
Candidate
@endsection
@section("css")

@endsection
@section("content")
<a class="container">
    @foreach ($candidates as $candidate)
        <h1> cv :{{$candidate->cv}}</h1>
        <h1> about :{{$candidate->about}}</h1>
        <a href="{{route('candidate.show', $candidate->id)}}" class='btn btn-info btn-sm px-4 mt-2 '>View</a>
        <a href="{{route('candidate.edit', $candidate->id)}}" class='btn btn-primary btn-sm px-4 mt-2 '> Update</a>
    @endforeach
    </div>
    @endsection
    @section("script")

    @endsection