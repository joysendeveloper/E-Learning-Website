@extends("layouts.admin.main")
@section("main-section")
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <!-- Add Category  -->
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Subcategories</h4>
                        <form class="forms-sample" method="POST" action="{{url('/admin/editsubcate/'.$subcategory->id)}}">
                            @csrf
                            <div class="form-group">
                                <label for="main_category">Select Category</label>
                                <select class="form-control" id="main_category" name="main_category">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->cate_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subcategory">Subcategories</label>
                                <input type="text" class="form-control" id="subcategory" placeholder="subcategory" name="subcategory" value="{{$subcategory->sub_cate_name}}">
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- partial -->
</div>
@endsection