@extends("dashboard")

@section("title")
Skills
@endsection
@section("css")

@endsection
@section("content")
<div class="container">
    <div class="container">
        <div class="container shadow-lg mt-5">
            <table class="table table-bordered table-head-bg-primary table-bordered-bd-info mt-4  ">
                <thead>
                    <tr class="text-center ">
                        <th class="fs-5">ID</th>
                        <th class="fs-5">Skill</th>
                        <!-- <th>Show</th> -->
                        <th class="fs-5">Update</th>
                        <th class="fs-5">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($technologys as $technology)
                        <tr class="text-center">
                            <td>{{$technology->id}}</td>
                            <td>{{$technology->technology_name}}</td>
                            <!-- <td>
                            <a href="{{route('skills.show', $technology->id)}}" class='btn btn-info btn-sm px-4 mt-2 '>View</a>
                        </td> -->
                            <td>
                                <a href="{{route('skills.edit', $technology->id)}}"
                                    class='btn btn-success btn-sm px-4 mt-2 fs-6 '>Edit</a>
                            </td>
                            <td>
                                <form style="display: inline" method="POST"
                                    action="{{route('skills.destroy', $technology->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class='btn btn-danger btn-sm px-3 mt-2  fs-6'>Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach()

                </tbody>
            </table>
            <div class="text-center">
                <a type="button" href="{{route('skills.create')}}" class="btn btn-primary px-4 my-4 mx-3 fs-6">Create
                    Skill</a>
            </div>

        </div>
    </div>
</div>
@endsection
@section("script")

@endsection