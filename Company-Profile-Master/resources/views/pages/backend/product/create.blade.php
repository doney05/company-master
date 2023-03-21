@extends('layout.backend.app');

@section('content')
<div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-database-plus "></i>
      </span> Tambah Produk
    </h3>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <form  action="{{ route('product.store') }}" method="POST"
            enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Upload Foto Banner</label>
                    <input type="file" class="form-control" name="banner[]" multiple>
                </div>
                <div class="form-group">
                    <label>Upload Foto Product</label>
                    <input type="file" class="form-control" name="foto_produk[]" multiple>
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Name">
                </div>
                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
            </div>
        </div>
    </div>
@endsection
