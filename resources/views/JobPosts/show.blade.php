@extends("dashboard")

@section("title")
jobPostShow
@endsection

@section("css")
@endsection

@section("content")
<div class="container" style="margin-top: 100px">
    <div class="card p-5">
        <div class="card-header">
            Post Details
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$jobPost->title}}</h5>
            <p class="card-text">Description: {{$jobPost->description}}</p>
            <p class="card-text">Salary: {{$jobPost->salary}}</p>
            <p class="card-text">Location: {{$jobPost->location}}</p>
            <p class="card-text">{{$jobPost->work_type}}</p>
{{--            <p class="card-text">{{$jobPost->category}}</p>--}}
            <p class="card-text">{{$jobPost->dead_line}}</p>
            <a href="/jobPosts" class="btn btn-primary">GO Back</a>
        </div>
        <div class="card-footer text-body-secondary">
            created at {{$jobPost->created_at}}
        </div>

        <!-- Comments Form -->
        @auth
        <form action="{{ route('comments.store') }}" method="POST" class="row row-cols-lg-auto g-3 align-items-center">
            @csrf
            <input type="hidden" name="job_post_id" value="{{$jobPost->id}}">
            <div class="col-12">
                <label class="visually-hidden" for="comment">Comment</label>
                <div class="input-group">
                    <div class="input-group-text">Comment</div>
                    <input type="text" class="form-control" id="comment" name="body" placeholder="Enter your comment" required>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        @endauth

        <!-- Display Comments -->
        <div class="mt-5">
            <h5>Comments</h5>
            @foreach($comments as $comment)
                <div class="card mb-2">
                    <div class="card-body">
                        <p class="card-text">{{ $users->find($comment->candidate_id)->name }}</p>
                        <p>{{ $comment->body }}</p>
                        <p class="text-muted">Posted on {{ $comment->created_at->format('F j, Y, g:i a') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section("script")
@endsection
