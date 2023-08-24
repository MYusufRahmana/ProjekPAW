@extends('layout.master')

@section('title', 'Halaman Tambah Cinema')

@section('content1')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
    @if ($errors->any())
                                {!! implode('', $errors->all('<div>:message</div>')) !!}
                            @endif
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Tambah Cinema </h4>
                <form class="forms-sample" method="post" action="{{ route ('cinema.update', $cinema)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="judul" class="col-sm-3 col-form-label">Nama Film</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" placeholder="Nama Ruangan" value="{{$cinema->nama_ruangan}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori" value="{{$cinema->kategori}}">
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route ('cinema.index') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection