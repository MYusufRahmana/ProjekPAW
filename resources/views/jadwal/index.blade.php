@extends('layout.master')

@section('title', 'Halaman Jadwal')

@section('content')

<div class="add-cinema-button">
    <a href="{{ route('jadwal.create') }}" class="btn btn-success mb-2 w-10"><i class="fa-solid fa-plus"></i> Add Jadwal</a>
</div>

<div class="cinema-list">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Jam Tayang</th>
                    <th>Harga</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jadwal as $data)
                <tr>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->jam_tayang }}</td>
                    <td>{{ $data->harga }}</td>
                    
                    <td>
                        <div class="btn-group">
                            <form method="POST" action="{{ route('jadwal.destroy', $data->id) }}">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('jadwal.edit', $data->id) }}" class="btn btn-xs btn-secondary btn-flat btn-edit">Edit</a>
                                <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm btn-delete" data-name="{{ $data->tanggal }}">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    .cinema-list table {
        width: 100%;
    }

    .cinema-list th,
    .cinema-list td {
        padding: 10px;
        text-align: center;
    }

    .cinema-list th:first-child,
    .cinema-list td:first-child {
        text-align: center;
    }

    .cinema-list .btn-group .btn {
        margin-right: 5px;
    }

    .btn-edit:hover,
    .btn-delete:hover {
        transform: scale(1.1);
    }

    @media (max-width: 800px) {
        .table-responsive {
            overflow-x: auto;
        }
    }
</style>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
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
    });
</script>

@endsection
