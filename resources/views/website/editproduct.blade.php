@extends('website.layout.main')

@section('main_code')


<div class="container mt-3">
  <h2>Add Product</h2>
  <form action="{{ url('updateproduct/' . $data->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 mt-3">
      <label for="name">Product Name:</label>
      <input type="text" value="{{$data->name}}" class="form-control" id="name" placeholder="Enter Product Name" name="name">
    </div>
    <div class="mb-3">
      <label for="img">Password:</label>
      <input type="file" value="{{$data->img}}" class="form-control" id="img" placeholder="Enter img" name="img">
      <img src="../website/img/product/{{$data->img}}" width="50px" alt="">

    </div>
    <div class="mb-3 mt-3">
      <label for="price">Product Price:</label>
      <input type="number" value="{{$data->price}}" class="form-control" id="price" placeholder="Enter Product Price" name="price">
    </div>
    <div class="mb-3">
      <label for="description">Product Description:</label>
      <input type="text" value="{{$data->description}}" class="form-control" id="description" placeholder="Enter Product Description" name="description">
    </div>
    
    <button type="submit" name="submit" class="btn btn-primary">Submit</button><br><br>
    <a href="manage_product" class="btn btn-success">Back</a>
  </form>
</div>


@endsection