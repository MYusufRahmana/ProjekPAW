@extends('layout.master')

@section('title', 'Halaman Tambah Pesanan')

@section('content1')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            @if ($errors->any())
                                {!! implode('', $errors->all('<div>:message</div>')) !!}
                            @endif
                <h4 class="card-title"> Tambah Pembayaran </h4>
                <form class="forms-sample" method="post" action="{{ route ('pembayaran.update',$pembayaran)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="metode_pembayaran" class="col-sm-3 col-form-label">Metode Pembayaran</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="metode_pembayaran" placeholder="Metode Pembayaran" name="metode_pembayaran" value="{{$pembayaran->metode_pembayaran}}">
                        </div>
                    </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route ('pembayaran.index') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection