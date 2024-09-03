@extends("dashboard")

@section("title")
    Create Job
@endsection
@section("css")
    .input-group-append {
    cursor: pointer;
    }
@endsection
@section("content")

    <form method="post" action="{{route('jobPosts.store')}}" enctype="multipart/form-data">
        @csrf
  <div class="conatiner my-5 p-5">
      <div class="mb-3">
          <label for="jobTitle" class="form-label">Job Title</label>
          <input type="text" class="form-control" id="jobTitle" name="title" placeholder="Job Title">
      </div>
      <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Job Description</label>
          <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
          @error('description')
          <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>
      <div class="mb-3">
          <label for="expectedSalary" class="form-label">Salary Expected</label>
          <input type="text" name="salary" class="form-control" id="expectedSalary" placeholder="Expected Salary">
      </div>
          <div class="row d-flex">

              <div class="col-6">
                  <label for="exampleFormControlInput1" class="form-label">Job Location</label>

                  <input type="text" class="form-control" name="location"  placeholder="City" aria-label="City">
              </div>
              <div class="col-4">
                  <label class="form-label" for="autoSizingSelect">Location Type </label>
                  <select class="form-select p-2" name="work_type" id="autoSizingSelect">
                      <option value="1">On-site</option>
                      <option value="2" selected>Remote</option>
                      <option value="3">Hybrid</option>
                  </select>
              </div>
          </div>
      <div class="my-5">
          <label for="expectedSalary" class="form-label">Deadline</label>
          <input type="date" name="dead_line" class="form-control" id="Deadline" placeholder="Deadline">
      </div>
      <div class="col-4">
          <label class="form-label" for="autoSizingSelect">Category</label>
          <select class="form-select p-2" name="category_id" id="autoSizingSelect">
            @foreach($categories as $category)
              <option value="{{$category->id}}">{{$category->category_name}}</option>
              @endforeach
          </select>
      </div>
      <div class="my-5 ">
          <label for="exampleFormControlInput1" class="form-label">Upload Your CV</label>

          <input type="file" class="form-control" aria-label="file example">
          <div class="invalid-feedback">Example invalid form file feedback</div>
      </div>
      <div class="my-3">
          <button class="btn btn-success" type="Create Job" >Submit form</button>
      </div>
  </div>

    </form>
@endsection
@section("script")
    ('#datepicker').datepicker({
    uiLibrary: 'bootstrap5'
    });
@endsection
