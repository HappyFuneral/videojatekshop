@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
           
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>Holy guacamole!</strong>
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">
                                <div class="mb-2">
                                <label for="exampleDataList" class="form-label">Product name</label>
                                <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                                <datalist id="datalistOptions">
                                    @foreach($products as $value)
                                        <option value="{{$value->name}}">
                                    @endforeach
                                </datalist>
                            </div>
                           </th>
                            <th scope="col">
                                    <div class="mb-2">
                                    <label for="exampleDataList" class="form-label">Product title</label>
                                    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                                    <datalist id="datalistOptions">
                                        @foreach($products as $value)
                                            <option value="{{$value->title}}">
                                        @endforeach
                                    </datalist>
                                </div>
                            </th>
                            <th scope="col" colspan="3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $item)
                            <tr class="">
                                <td scope="row">{{ $item->name }}</td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <form action="{{ route('products.edit', $item) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-warning">Edit</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('products.destroy', $item) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td>

                                    <form action="{{ route('products.show', $item) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-info">Show data</button>
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
@endsection
