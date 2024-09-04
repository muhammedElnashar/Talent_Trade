@extends("dashboard")

@section("title")
jopPost
@endsection
@section("css")

@endsection
@section("content")
<div class="container p-5 ms-5" style="margin-top: 7rem;width: 75%">
<table class="table table-borderless">
    @foreach ($JobPosts as $jobPost)
    <tr class="p-5">
    <div class="card">
  <h5 class="card-header">Job #{{$jobPost->id }}</h5>
  <div class="card-body">
    <h5 class="card-title">{{ $jobPost->title }}</h5>
    <p class="card-text">Description:
        {{ $jobPost->description }}</p>
    <p class="card-text">Salary: {{ $jobPost->salary }}</p>
    <a href="{{ route('jobPosts.show', $jobPost->id) }}" class="btn btn-primary">More Details</a>

  </div>
</div>
    </tr>
    @endforeach
</table>
</div>
@endsection
@section("script")

@endsection
