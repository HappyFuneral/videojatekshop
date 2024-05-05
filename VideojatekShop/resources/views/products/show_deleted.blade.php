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
                            <th scope="col">Cím</th>
                            <th scope="col">Ár</th>
                            <th scope="col">Mennyiség</th>
                            <th scope="col">Tariffa szám</th>
                            <th scope="col">Tariffa szöveg</th>
                            <th scope="col">Termék Típus</th>
                            <th scope="col">Létrehozás dátuma</th>
                            <th scope="col">Létrehozója</th>
                            <th scope="col">Utolsó módosítás</th>
                            <th scope="col">Módosította</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $item)
                            <tr class="">
                                <td scope="row">{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->tariff_number }}</td>
                                <td>{{ $item->tariff_description }}</td>
                                <td>{{ \App\Models\ProductType::all()->find($item->product_type_id)->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->created_by }}</td>
                                <td>{{ $item->deleted_at }}</td>
                                <td>{{ $item->deleted_by }}</td>
                                <td>
                                    <form action="{{ route('products.restore', ['products' => $item]) }}" method="POST">
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
