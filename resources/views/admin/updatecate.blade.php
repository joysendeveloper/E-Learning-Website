@extends("layouts.admin.main")
@section("main-section")
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <!-- Add Category  -->
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Categories</h4>
                        <form class="forms-sample" action="{{url('admin/editcate/'.$category->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Update Categories</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="category" value="{{$category->cate_name}}" name="category">
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- partial -->
</div>
@endsection