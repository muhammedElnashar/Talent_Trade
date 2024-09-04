@extends("dashboard")

@section("title")
jobPostShow
@endsection

@section("css")
<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
    }

    .card {
        border-radius: 12px;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
        border: none;
    }

    .card-header {
        background-color: #007bff;
        color: white;
        font-weight: bold;
        border-radius: 12px 12px 0 0;
        padding: 15px;
        font-size: 1.25rem;
    }

    .card-title {
        font-size: 2rem;
        font-weight: 700;
        color: #343a40;
        margin-bottom: 20px;
    }

    .card-text {
        font-size: 1.1rem;
        color: #495057;
        margin-bottom: 15px;
    }

    .btn-primary {
        background-color: #007bff;
        border-radius: 20px;
        padding: 10px 20px;
        font-weight: bold;
    }

    .card-footer {
        background-color: #f8f9fa;
        color: #6c757d;
        font-size: 0.9rem;
        text-align: right;
        border-radius: 0 0 12px 12px;
        padding: 10px;
    }

    .input-group-text {
        background-color: #007bff;
        color: white;
        border-radius: 20px 0 0 20px;
    }

    .form-control {
        border-radius: 0 20px 20px 0;
        box-shadow: none;
    }

    .comments-section {
        margin-top: 40px;
    }

    .comments-section h5 {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 20px;
        color: #343a40;
    }

    .comments-section .card {
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        border: none;
        margin-bottom: 20px;
    }

    .comments-section .card-body {
        padding: 15px;
        font-size: 1rem;
    }

    .comments-section .card-text {
        margin-bottom: 10px;
        color: #495057;
    }

    .text-muted {
        font-size: 0.85rem;
    }
</style>
@endsection

@section("content")
<div class="row">
            <div class="col-md-8 offset-md-2">
<div class="container" style="margin-top: 100px">
    <div class="card p-5">
        <div class="card-header">
            Post Details
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$jobPost->title}}</h5>
            <p class="card-text"><strong>Description:</strong> {{$jobPost->description}}</p>
            <p class="card-text"><strong>Salary:</strong> {{$jobPost->salary}}</p>
            <p class="card-text"><strong>Location:</strong> {{$jobPost->location}}</p>
            <p class="card-text"><strong>Work Type:</strong> {{$jobPost->work_type}}</p>
            <p class="card-text"><strong>Application Deadline:</strong> {{$jobPost->dead_line}}</p>
            <a href="/jobPosts" class="btn btn-primary">Go Back</a>
        </div>
        <div class="card-footer">
            Created at {{$jobPost->created_at}}
        </div>

        <!-- Comments Form -->
        @auth
        <form action="{{ route('comments.store') }}" method="POST" class="row row-cols-lg-auto g-3 align-items-center mt-4">
            @csrf
            <input type="hidden" name="job_post_id" value="{{$jobPost->id}}">
            <div class="col-12">
                <label class="visually-hidden" for="comment">Comment</label>
                <div class="input-group">
                    <div class="input-group-text"><i class="fa fa-comment"></i></div>
                    <input type="text" class="form-control" id="comment" name="body" placeholder="Write a comment..." >
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit Comment</button>
            </div>
        </form>
        @endauth

        <!-- Display Comments -->
        <div class="comments-section">
            <h5>Comments</h5>
            @foreach($comments as $comment)
                <div class="card">
                    <div class="card-body">
                        <p class="card-text"><strong>{{ $users->find($comment->candidate_id)->name }}</strong></p>
                        <p class="card-text">{{ $comment->body }}</p>
                        <p class="text-muted">Posted on {{ $comment->created_at->format('F j, Y, g:i a') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</div>
</div>
@endsection
