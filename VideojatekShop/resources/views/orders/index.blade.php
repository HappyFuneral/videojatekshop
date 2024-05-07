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
                    <form action="{{ route('orders.show_deleted') }}">
                        @csrf
                        <button type="submit" class="btn show_deleted-btn">Törölt adatok</button>
                    </form>
                @endif
                <table class="table table-dark" id="listTable">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Felhasználói ID</th>
                            <th scope="col">Ár</th>
                            <th scope="col">Postal</th>
                            <th scope="col">Ország</th>
                            <th scope="col">Megye</th>
                            <th scope="col">Város</th>
                            <th scope="col">Cím</th>
                            <th scope="col">Rendelés állapota</th>
                            <th scope="col">Létrehozás dátuma</th>
                            <th scope="col">Létrehozója</th>
                            <th scope="col">Utolsó módosítás</th>
                            <th scope="col">Módosította</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($orders as $item)
                            <tr class="">
                                <td scope="row">{{ $item->id }}</td>
                                <td>{{ App\Models\User::all()->find($item->user_id)->name }}</td>
                                <td>{{App\Models\Order::all()->find($item->id)->price}}</td>
                                <td>{{ $item->postal }}</td>
                                <td>{{ $item->country }}</td>
                                <td>{{ $item->province }}</td>
                                <td>{{ $item->city }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ \App\Models\OrderState::all()->find($item->orderState_id)->state }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ App\Models\User::all()->find($item->created_by)->name  }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>{{ $item->updated_by }}</td>
                                <td>
                                    <form action="{{ route('orders.edit', $item) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-warning">Módosítás</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('orders.show', $item) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-warning">Kinézet</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('orders.destroy', $item) }}" method="POST">
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
