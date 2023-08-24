@extends('layout.master')

@section('title', 'Halaman Tambah Jadwal')

@section('content1')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Tambah Jadwal </h4>
                <form class="forms-sample" method="post" action="{{ route ('jadwal.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="Tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jam_tayang" class="col-sm-3 col-form-label">Jam Tayang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="jam_tayang" name="jam_tayang" placeholder="Jam Tayang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_film" class="col-sm-3 col-form-label">Film</label>
                        <div class="col-sm-9">
                            <select name="id_film" class="form-control">
                                @foreach ($film as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->judul }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_cinema" class="col-sm-3 col-form-label">Cinema</label>
                        <div class="col-sm-9">
                            <select name="id_cinema" class="form-control">
                                @foreach ($cinema as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item -> nama_ruangan }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kategori" class="col-sm-3 col-form-label">harga</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="harga" name="harga" placeholder="harga">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route ('cinema.index') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection