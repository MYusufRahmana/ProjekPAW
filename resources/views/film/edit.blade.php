
@extends('layout.master')

@section('title', 'Halaman Tambah Film')

@section('content1')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Tambah Film </h4>
                <form class="forms-sample" method="post" action="{{ route ('film.update', $film->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group row">
                        <label for="judul" class="col-sm-3 col-form-label">Nama Film</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Nama Film" value="{{$film->judul}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi"
                            value="{{$film->deskripsi}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="durasi" class="col-sm-3 col-form-label">Durasi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="durasi" name="durasi" placeholder="durasi"
                            value="{{$film->durasi}}">
                        </div>
                        <div class="form-group row">
                            <label for="genre" class="col-sm-3 col-form-label">Genre</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="genre" name="genre" placeholder="genre"
                                value="{{$film->genre}}">
                            </div>
                            <div class="form-group row">
                                <label for="foto" class="col-sm-3 col-form-label">Foto</label>
                                    <div class="col-sm-9">
                                     <input type="file" class="form-control-file" id="foto" name="foto">
                                    </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route ('film.index') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection