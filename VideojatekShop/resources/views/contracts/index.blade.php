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

                <form action="{{ route('contracts.create') }}">
                    @csrf
                    <button type="submit" class="btn create-btn">+ Hozzáadás</button>
                </form>
                <form action="{{ route('contracts.show_deleted') }}">
                    @csrf
                    <button type="submit" class="btn show_deleted-btn">Törölt adatok</button>
                </form>

                <table class="table table-dark" id="listTable">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Cím</th>
                            <th scope="col">Ügyfél</th>
                            <th scope="col">PDF fájl</th>
                            <th scope="col">Szerződés Típus</th>
                            <th scope="col">Létrehozás dátuma</th>
                            <th scope="col">Létrehozója</th>
                            <th scope="col">Utolsó módosítás</th>
                            <th scope="col">Módosította</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($contracts as $item)
                            <tr class="">
                                <td scope="row">{{ $item->id }}</td>
                                <td>{{ $item->contract_name }}</td>
                                <td>{{ $item->contract_owner }}</td>
                                <td>{{ $item->pdf }}</td>
                                <td>{{ \App\Models\ContractType::all()->find($item->contract_type_id)->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->created_by }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>{{ $item->updated_by }}</td>
                                <td>
                                    <form action="{{ route('contracts.edit', $item) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-warning">Módosítás</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('contracts.destroy', $item) }}" method="POST">
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
