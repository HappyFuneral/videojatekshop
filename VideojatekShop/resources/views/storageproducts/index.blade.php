@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>Success!</strong>
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-dark" id="listTable">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Code</th>
                            <th scope="col">Termék</th>
                            <th scope="col">Raktár</th>
                            <th scope="col">Felvétele</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($storageproducts as $item)
                            <tr class="">
                                <td scope="row">{{ $item->id }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->product_id }}</td>
                                <td>{{ $item->storage_id }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <form action="{{ route('storageproducts.edit', $item) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-warning">Módosítás</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('storageproducts.destroy', $item) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Törlés</button>
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
