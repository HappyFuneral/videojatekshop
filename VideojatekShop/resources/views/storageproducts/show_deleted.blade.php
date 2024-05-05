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
                <table class="table table-dark" id="listTable">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Mennyiség</th>
                            <th scope="col">Termék</th>
                            <th scope="col">Raktár</th>
                            <th scope="col">Felvétele időpontja</th>
                            <th scope="col">Alkalmazott</th>
                            <th scope="col">Törlés időpontja</th>
                            <th scope="col">Végrehajtó</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($storageproducts as $item)
                            <tr class="">
                                <td scope="row">{{ $item->id }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ \App\Models\Product::all()->find($item->product_id)->name }}</td>
                                <td>{{ \App\Models\Storage::all()->find($item->storage_id)->storageName}}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->created_by }}</td>
                                <td>{{ $item->deleted_at}}</td>
                                <td>{{ $item->deleted_by}}</td>
                                <td>
                                    <form action="{{ route('storageproducts.restore', ['storageproduct' => $item]) }}" method="PUT">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-info">Visszaállítás</button>
                                    </form> 
                                </td>
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
