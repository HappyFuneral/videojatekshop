@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="table-responsive">

                <table class="table table-dark" id="listTable">
                    <thead>
                        <tr>
                            <th scope="col">Ár</th>
                            <th scope="col">Postal</th>
                            <th scope="col">Ország</th>
                            <th scope="col">Megye</th>
                            <th scope="col">Város</th>
                            <th scope="col">Cím</th>
                            <th scope="col">Kézbesítő</th>
                            <th scope="col">Rendelés állapota</th>
                            <th scope="col">Rendelés időpontja</th>
                            <th></th>                    
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($orders as $item)
                            <tr class="">
                                <td>{{$item->price}}</td>
                                <td>{{ $item->postal }}</td>
                                <td>{{ $item->country }}</td>
                                <td>{{ $item->province }}</td>
                                <td>{{ $item->city }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->delivery_details }}</td>
                                <td>{{ $item->delivery_date }}</td>
                                <td>{{ \App\Models\OrderState::all()->find($item->orderState_id)->state }}</td>
                                <td>
                                    <form action="{{ route('orders.show', $item) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-warning">Termékek</button>
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
