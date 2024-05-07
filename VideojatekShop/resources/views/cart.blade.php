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
            <table class="table table-dark cart-table">
                    <thead>
                        <tr>
                            <th scope="col">Cím</th>
                            <th scope="col">Ár</th>
                            <th scope="col">Mennyiség</th>
                            <th scope="col">Termék Típus</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0 @endphp
                        @foreach (session()->get('cart') as $item)
                            <tr class="">
                                <td>{{\App\Models\Product::all()->find( \App\Models\StorageProduct::all()->find($item['product_id'])->product_id)->name }}</td>
                                <td>{{ \App\Models\Product::all()->find(\App\Models\StorageProduct::all()->find($item['product_id'])->product_id)->price }}</td>
                                <td>
                                    <form action="{{route('updateCart')}}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="id" value="{{$item['product_id']}}">
                                        <input type="number" name="quantity" class="" value="{{ $item['quantity']}}"/>
                                        <button type="submit" class="btn btn-danger">Frissít</button>
                                    </form>                        
                                </td>
                              
                                <td>{{ \App\Models\ProductType::all()->find(\App\Models\Product::all()->find(\App\Models\StorageProduct::all()->find($item['product_id'])->product_id)->product_type_id)->name }}</td>
                                
                                <td>
                                    <form action="{{ route('deleteProduct') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{$item['product_id']}}">
                                        <button type="submit" class="btn btn-danger">Törlés</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="table-foot" rowspan="2" colspan="5"><h3><strong>Total ${{ $total }}</strong></h3><a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Még vásárolok</a>
                                <a href={{route('orders.create')}} class="btn btn-success"><i class="fa fa-money"></i> Rendelés</a></td>
                        </tr>
                        <tr>
                        </tr>
                    </tfoot>
                </table>
            </div>
        
        </div>
        <div class="col-2"></div>
    </div>

@endsection
