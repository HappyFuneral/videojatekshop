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
                    <form action="{{ route('products.create') }}">
                        @csrf
                        <button type="submit" class="btn create-btn">+ Hozzáadás</button>
                    </form>
                @endif

                <!--
                <form action="{{ route('products.show_deleted') }}">
                    @csrf
                    <button type="submit" class="btn show_deleted-btn">Törölt adatok</button>
                </form>
                -->

                <table class="table table-dark" id="listTable">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Árú Kód</th>
                            <th scope="col">Cím</th>
                            <th scope="col">Ár</th>
                            <th scope="col">Mennyiség</th>
                            <th scope="col">Tariffa szám</th>
                            <th scope="col">Tariffa szöveg</th>
                            <th scope="col">Termék Típus</th>
                            <th scope="col">Platform</th>
                            <th scope="col">Kiadó</th>
                            <th scope="col">Létrehozás dátuma</th>
                            <th scope="col">Létrehozója</th>
                            <th scope="col">Utolsó módosítás</th>
                            <th scope="col">Módosította</th>
                            <th scope="col"></th>
                            @if (Auth::user()->role_id == 1)
                                <th scope="col"></th>
                                <th scope="col"></th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $item)
                            <tr class="">
                                <td scope="row">{{ $item->id }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{App\Models\Product::productQuantity($item->id)}}</td>
                                <td>{{ $item->tariff_number }}</td>
                                <td>{{ $item->tariff_description }}</td>
                                <td>{{ \App\Models\ProductType::all()->find($item->product_type_id)->name }}</td>
                                <td>{{ \App\Models\Platform::all()->find($item->platform_id)->name }}</td>
                                <td>{{ \App\Models\Publisher::all()->find($item->publisher_id)->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->created_by }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>{{ $item->updated_by }}</td>
                                @if (Auth::user()->role_id == 1)
                                    <td>
                                        <form action="{{ route('products.edit', $item) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-warning">Módosítás</button>
                                        </form>
                                    </td>
                                @endif
                                <td>
                                    <form action="{{ route('products.show', $item) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-warning">Kinézet</button>
                                    </form>
                                </td>
                                @if (Auth::user()->role_id == 1)
                                    <td>
                                        <form action="{{ route('products.destroy', $item) }}" method="POST">
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
