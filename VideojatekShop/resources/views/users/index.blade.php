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
                            <th scope="col">Jogosultság</th>
                            <th scope="col">Név</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telefon</th>
                            <th scope="col">Létrehozás dátuma</th>
                            <th scope="col">Létrehozója</th>
                            <th scope="col">Utolsó módosítás</th>
                            <th scope="col">Módosította</th>                            
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $item)
                            <tr class="">
                                <td scope="row">{{ $item->id }}</td>
                                <td>{{ \App\Models\role::all()->find($item->role_id)->slug }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phoneNumber }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->created_by }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>{{ $item->updated_by }}</td>
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
