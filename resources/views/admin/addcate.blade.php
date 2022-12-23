@extends("layouts.admin.main")
@section("main-section")
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <!-- Add Category  -->
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add Categories</h4>
            <form class="forms-sample" action="{{url('/admin/addcate')}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="exampleInputUsername1">Categories</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="category" name="category">
              </div>
              <button type="submit" class="btn btn-primary me-2">Add</button>
            </form>
          </div>
        </div>
      </div>

      <!-- Add Subategory  -->
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Add Subategories</h4>
            <form class="forms-sample" method="POST" action="{{url('/admin/addsubcate')}}">
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
                <input type="text" class="form-control" id="subcategory" placeholder="subcategory" name="subcategory">
              </div>
              <button type="submit" class="btn btn-primary me-2">Add</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <!-- Show Categories Table  -->
      <div class="col-12 col-lg-6 stretch-card">
        <div class="table-responsive">
          <h5 class="mx-2">Categories</h5>
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($categories as $category)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$category->cate_name}}</td>
                <td>
                  <a href="{{url('admin/updatecate/'.$category->id)}}">
                    <button type="button" class="btn btn-primary btn-sm btn-rounded btn-fw">Update</button>
                  </a>
                  <a href="{{url('admin/deletecate/'.$category->id)}}">
                    <button type="button" class="btn btn-danger btn-sm btn-rounded btn-fw">Delete</button>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <!-- Show Subategories Table  -->
      <div class="col-12 col-lg-6 stretch-card">
        <div class="table-responsive">
          <h5 class="mx-2">Subcategories</h5>
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($innerJoin as $subcategory)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$subcategory->cate_name}}</td>
                <td>{{$subcategory->sub_cate_name}}</td>
                <td>
                  <a href="{{url('admin/updatesubcate/'.$subcategory->id)}}">
                    <button type="button" class="btn btn-primary btn-sm btn-rounded btn-fw">Update</button>
                  </a>
                  <a href="{{url('admin/deletesubcate/'.$subcategory->id)}}">
                    <button type="button" class="btn btn-danger btn-sm btn-rounded btn-fw">Delete</button>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
  <!-- partial -->
</div>
@endsection