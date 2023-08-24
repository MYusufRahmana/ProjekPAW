@extends('layout.master')

@section('title', 'Halaman Film')

@section('content')

<div class="film-details">
    <div class="film-info">
        <div class="film-image">
            <img src="{{ asset('images/'.$film->foto) }}" alt="Film Image">
        </div>
        <div class="film-info-details">
            <h1 class="film-title">{{ $film->judul }}</h1>
            <p class="film-duration">Durasi: {{ $film->durasi }}</p>
            <p class="film-genre">{{ $film->genre }}</p>
            <p class="film-genre">Deskripsi :</p>
            <p>{{ $film->deskripsi }}</p>
        </div>
       
    </div>
    <!-- Tampilkan detail film lainnya -->
</div>
<style>
    .film-details {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.film-info {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.film-image {
    width: 60%;
    margin-right: 10px;
}

.film-image img {
    width: 60%;
    height: auto;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.film-info-details {
    flex-grow: 1;
}

.film-title {
    font-size: 40px;
    margin-bottom: 5px;
}

.film-duration {
    font-size: 20px;
    color: #888;
    margin-bottom: 5px;
}

.film-genre {
    font-size: 20px;
    color: #555;
    font-weight: bold;
    margin-bottom: 5px;
}


</style>

@endsection
