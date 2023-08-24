@extends('layout.master')

@section('title', 'Halaman Film')

@section('content')

<div class="add-film-button">
    <a href="{{ route('film.create') }}" class="btn btn-success mb-2 w-10"><i class="fa-solid fa-plus"></i> Add Film</a>
</div>
<div class="film-list">
    <div class="row">
        @foreach($film as $data)
        <div class="col-md-3">
            <div class="film-card">
                <div class="film-image">
                    <img src="{{ asset('images/'.$data->foto) }}" alt="Film Image">
                    <a href="{{ route('pesanan.index')}}" class="btn btn-get-tiket">Get Tiket</a>
                    <!-- Dalam loop foreach -->
                    <a href="{{ route('film.deskripsi', $data->id) }}" class="btn btn-deskripsi">Deskripsi</a>

                </div>
                <div class="film-details">
                    <h1 class="film-title">{{ $data->judul }}</h1>
                    <p class="film-genre">{{ $data->genre }}</p>
                    <div class="btn-group">
                        <a href="{{ route('film.edit', $data->id) }}" class="btn btn-xs btn-secondary btn-flat">Edit</a>
                        <form method="POST" action="{{ route('film.destroy', $data->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-name="{{ $data->judul }}">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .film-list .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .film-card {
        flex: 0 0 20%;
        margin-bottom: 5px;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .film-image {
        position: relative;
    }

    .film-image img {
        width: 100%;
        height: auto;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .film-image:hover img {
        transform: scale(1.1);
    }

    .btn-get-tiket {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        width: 300px;
        opacity: 0;
        transition: opacity 0.3s ease;
        border-radius: 20px;
    }

    .btn-get-tiket:hover {
        background-color: #FFD95A;
    }

    .film-image:hover .btn-get-tiket {
        opacity: 1;
    }

    .btn-deskripsi {
        position: absolute;
        top: 65%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 10px 20px;
        background-color: #F1F6F9;
        color: #212A3E;
        text-decoration: none;
        width: 300px;
        opacity: 0;
        transition: opacity 0.3s ease;
        border-radius: 20px;
    }

    .btn-deskripsi:hover {
        background-color: #B0A4A4;
    }

    .film-image:hover .btn-deskripsi {
        opacity: 1;
    }

    .film-details {
        padding: 10px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .film-title {
        font-size: 20px;
        margin-bottom: 5px;
        text-align: center;
    }

    .film-genre {
        font-size: 14px;
        color: #888;
        text-align: center;
    }

    .film-details .btn-group {
        margin-top: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .film-details .btn-group .btn {
        margin-right: 5px;
    }

    @media screen and (max-width: 768px) {
        .film-card {
            flex: 0 0 100%;
        }
    }

    .add-film-button {
        margin-bottom: 20px;
    }
</style>


<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `Apakah Anda Yakin Ingin Menghapus Data ${name}?`,
                text: "Jika Anda Menghapus ini, Data ini Akan Hilang.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>

@endsection