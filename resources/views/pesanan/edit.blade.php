@extends('layout.master')

@section('title', 'Halaman Tambah Pesanan')

@section('content1')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Tambah Pesanan </h4>
                <form class="forms-sample" method="POST" action="{{ route ('pesanan.update', $pesanan)}}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group row">
                        <label for="id_film" class="col-sm-3 col-form-label">Nama Film</label>
                        <div class="col-sm-9">
                            <select name="id_jadwal" class="form-control" value="{{$pesanan->id_jadwal}}">
                                @foreach ($jadwal as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->film->judul}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah" class="col-sm-3 col-form-label">jumlah</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="jumlah" placeholder="Jumlah" name="jumlah"" value="{{$pesanan->jumlah}}">
                            </div>
                        </div>
                        <label for="id_pembayaran" class="col-sm-3 col-form-label">Metode Pembayaran</label>
                        <div class="col-sm-9">
                            <select name="id_pembayaran" class="form-control"  value="{{$pesanan->id_pembayaran}}">
                                @foreach ($pembayaran as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->metode_pembayaran}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route ('pesanan.index') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection