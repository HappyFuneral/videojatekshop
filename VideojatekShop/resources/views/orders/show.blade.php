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

                <form action="{{ route('products.create') }}">
                    @csrf
                    <button type="submit" class="btn create-btn">+ Hozzáadás</button>
                </form>
                <form action="{{ route('products.show_deleted') }}">
                    @csrf
                    <button type="submit" class="btn show_deleted-btn">Törölt adatok</button>
                </form>

                <table class="table table-dark" id="listTable">
                    <thead>
                        <tr>
                            <th scope="col">Árú Kód</th>
                            <th scope="col">Cím</th>
                            <th scope="col">Ár</th>
                            <th scope="col">Mennyiség</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach (\App\Models\OrderProduct::where('order_id',$order->id)->get() as $item)
                            <tr class="">
                                <td>{{ \App\Models\Product::find(\App\Models\StorageProduct::find($item->storage_product_id)->product_id)->code }}</td>
                                <td>{{ \App\Models\Product::find(\App\Models\StorageProduct::find($item->storage_product_id)->product_id)->name }}</td>
                                <td>{{ \App\Models\Product::find(\App\Models\StorageProduct::find($item->storage_product_id)->product_id)->price }} FT</td>
                                <td>{{ $item->quantity }}</td>
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
