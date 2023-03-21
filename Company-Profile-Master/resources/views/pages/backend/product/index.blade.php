@extends('layout.backend.app')

@section('content')
    <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-crosshairs-gps"></i>
      </span> Kategori Produk
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <a href="{{ route('product.create') }}">
                <span></span>Tambah Produk <i class="mdi mdi-database-plus icon-sm text-white align-middle"></i>
            </a>
          </li>
        </ul>
      </nav>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="container-fluid">
        <div class="card">
            <div class="card-body" style="overflow-y: scroll">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Foto Banner Product</th>
                            <th>Foto Product</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $item)
                        <tr>
                           <?php foreach ( explode(",", $item->banner) as $banners ) { ?>
                            {{-- {{ dd( $banners  ) }} --}}
                                <td><img src="{{ asset('public/backend/multiple-image/' . $banners ) }}" width="100px"></td>
                            <?php }?>


                            <td><img src="{{ asset($item->foto_produk) }}" width="100px"></td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="#">
                                    <i class="mdi mdi-lead-pencil">Edit</i>
                                </a>
                                <a href="#">
                                    <i class="mdi mdi-delete-forever">Delete</i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        nav ul .breadcrumb-item a{
            background-color: rgb(102, 9, 99);
            padding: 12px 16px;
            border-radius: 5px;
            color: rgb(197, 196, 196);
            text-decoration: none;
            font-weight: 600;
        }
        nav ul .breadcrumb-item a:hover{
            background-color: rgb(161, 1, 156);
            padding: 12px 16px;
            border-radius: 5px;
            color: rgb(255, 255, 255);
            text-decoration: none;
            font-weight: 600;
        }
        .card-body table{
            padding-top: 5px;
        }
        .card-body table thead tr th {
            font-weight: bold;
            font-size: 16px
        }
        .card-body table tbody tr td {
            font-size: 14px
        }
        .card-body table tbody tr td a {
            text-decoration: none;
        }
        .card-body table tbody tr td a:hover {
            text-decoration: none;
            color: blue;
        }
    </style>
@endpush
