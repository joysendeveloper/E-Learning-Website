@extends('layouts.instructor.main')
@section("main-section")
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
                        <form class="form-sample" action="{{url('/instructor/course/'.$course->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3">Select Category</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="category_id" id="selectCate">
                                                @foreach($categories as $category)
                                                @if($category->id == $course->category_id)
                                                <option selected="selected" value="{{$category->id}}">{{$category->cate_name}}</option>
                                                @else
                                                <option value="{{$category->id}}">{{$category->cate_name}}</option>
                                                @endif
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
                                                <option value="0">Select Subcategory</option>
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
                                            <input type="text" value="{{$course->course_title}}" class="form-control" name="course_title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3">Instructor Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{$course->instructor_name}}" class="form-control" name="instructor_name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="course_description" class="form-label">Course Description</label>
                                    <textarea style="height: 120px;" class="form-control" id="course_description" rows="10" name="course_description">{{$course->course_description}}
                                    </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label>Course Image</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input class="form-control" value="C:\Users\Joy Sen\Desktop\IMG20221208202139edit.jpg" type="file" name="image" id="image">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3">Lessons</label>
                                        <div class="col-sm-9">
                                            <input type="number" value="{{$course->lessons}}" name="lessons" class="form-control" placeholder="10">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3">Regular Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" value="{{$course->regular_price}}" class="form-control" name="regular_price">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3">Discounted Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" value="{{$course->discount_price}}" class="form-control" name="discount_price">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-dark" type="submit">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
    // Get a reference to our file input
    const fileInput = document.querySelector('input[type="file"]');

    // Create a new File object
    const myFile = new File(['image'], "{{$course->image}}", {
        type: 'text/plain',
        lastModified: new Date(),
    });
    // Now let's create a DataTransfer to get a FileList
    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(myFile);
    fileInput.files = dataTransfer.files;

    // Get Sub Category With Ajax 
    $(document).ready(() => {
        getSubCate();
        $('#selectCate').on("change", () => {
            getSubCate();
        });

        function getSubCate() {
            var cat_id = $('#selectCate').find(":selected").val();
            $.ajax({
                url: "{{URL::to('instructor/get_sub_cate ')}}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: cat_id
                },
                success: function(data) {
                    var subCate = $('#selectSubCate');
                    console.log(data);
                    option = '';
                    data.forEach((value) => {
                        option += `<option value="${value.id}">${value.sub_cate_name}</option>`;
                    });
                    subCate.html(option);
                }
            });
        }
    });
</script>

@endsection