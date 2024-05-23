@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>Siker!</strong>
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
            <div class="table-responsive">

                @if (Auth::user()->role_id == 1)
                    <form action="{{ route('storages.create') }}">
                        @csrf
                        <button type="submit" class="btn create-btn">+ Hozzáadás</button>
                    </form>
                @endif

                <!--
                <form action="{{ route('storages.show_deleted') }}">
                    @csrf
                    <button type="submit" class="btn show_deleted-btn">Törölt adatok</button>
                </form>
                -->

                <table class="table table-dark" id="listTable">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Név</th>
                            <th scope="col">Postal</th>
                            <th scope="col">Ország</th>
                            <th scope="col">Megye</th>
                            <th scope="col">Város</th>
                            <th scope="col">Cím</th>
                            <th scope="col"></th>
                            @if (Auth::user()->role_id == 1)
                                <th scope="col"></th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($storages as $item)
                            <tr class="">
                                <td scope="row">{{ $item->id }}</td>
                                <td>{{ $item->storageName }}</td>
                                <td>{{ $item->postal }}</td>
                                <td>{{ $item->country}}</td>
                                <td>{{ $item->province }}</td>
                                <td>{{ $item->city}}</td>
                                <td>{{ $item->address}}</td>
                                <td>
                                    <form action="{{ route('storages.edit', $item) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-warning">Módosítás</button>
                                    </form>
                                </td>
                                @if (Auth::user()->role_id == 1)
                                    <td>
                                        <form action="{{ route('storages.destroy', $item) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Törlés</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        
        </div>
        <div class="col-2"></div>
    </div>

    <script>
        $(document).ready(function() {
            $('#listTable').DataTable({
                "language": {
                    url: '//cdn.datatables.net/plug-ins/2.0.5/i18n/hu.json',
                },
                retrieve: true,
                responsive: true
            });
        });

        let table = new DataTable('#listTable');
         
    </script>
@endsection
