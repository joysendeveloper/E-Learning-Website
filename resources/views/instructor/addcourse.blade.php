@extends('layouts.instructor.main')
@section("main-section")
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add Course Details</h4>
            @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            <form class="form-sample" action="{{url('/instructor/course')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3">Select Category</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="category_id" id="selectCate">
                        <option value="0">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->cate_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3">Subcategory</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="subcate_id" id="selectSubCate">
                        <option>Select Subcategory</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3">Course Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="course_title">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3">Instructor Name</label>
                    <div class="col-sm-9">
                      <input type="text" value="Joy Sen" class="form-control" name="instructor_name">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-12">
                  <label for="course_description" class="form-label">Course Description</label>
                  <textarea style="height: 120px;" class="form-control" id="course_description" rows="10" name="course_description"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <div class="col-sm-3">
                      <label>Course Image</label>
                    </div>
                    <div class="col-sm-9">
                      <input class="form-control" type="file" name="image">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3">Lessons</label>
                    <div class="col-sm-9">
                      <input type="number" name="lessons" class="form-control" placeholder="10">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3">Regular Price</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" name="regular_price">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3">Discounted Price</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" name="discount_price">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Show Courses  -->
    <div class="row pt-3 pb-5">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped text-center mb-3">
                <thead>
                  <tr>
                    <th>
                      Thumbnail
                    </th>
                    <th>
                      Course title
                    </th>
                    <th>
                      Course Desc.
                    </th>
                    <th>
                      Price
                    </th>
                    <th>
                      Lessons
                    </th>
                    <th>
                      Active
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($courses as $course)
                  <tr>
                    <td class="py-1">
                      <img src="{{url('/storage/images/'.$course->image)}}" alt="image">
                    </td>
                    <td>
                      {{$course->course_title}}
                    </td>
                    <td>
                      @php
                      echo substr($course->course_description,0, 30).'.....';
                      @endphp
                    </td>
                    <td>
                      {{$course->discount_price}}
                    </td>
                    <td>
                      {{$course->lessons}}
                    </td>
                    <td>
                      @if($course->show_on_user)
                      <span class="badge badge-primary">Active</span>
                      @else
                      <span class="badge badge-danger">Inactive</span>
                      @endif
                    </td>
                    <td class="d-flex">
                      <form class="ms-2" action="{{url('instructor/course/'.$course->id.'/edit')}}" method="POST">
                        @csrf
                        {{ method_field('GET') }}
                        <button type="submit" class="btn btn-primary btn-icon-text btn-sm">
                          Edit
                        </button>
                      </form>
                      <form class="ms-2" action="{{url('instructor/course/'.$course->id)}}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-icon-text btn-sm">
                          Delete
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- //Pagination -->
              {{$courses->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- partial -->
</div>
@endsection
@section('script')
<script>
  // Get Sub Category With Ajax
  $(document).ready(() => {
    $('#selectCate').on("change", () => {
      var cat_id = $('#selectCate').find(":selected").val();

      $.ajax({
        url: "{{URL::to('instructor/get_sub_cate')}}",
        type: "POST",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          id: cat_id
        },
        success: function(data) {
          var subCate = $('#selectSubCate');
          option = `<option>Select Subcategory</option>`;
          console.log(data);
          data.forEach((value) => {
            option += `<option value="${value.id}">${value.sub_cate_name}</option>`;
          });
          subCate.html(option);
        }
      });
    });
  });
</script>
@endsection