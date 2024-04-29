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
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Kiadó</th>
                            <th scope="col" colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($publishers as $item)
                            <tr class="">
                                <td scope="row">{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <form action="{{ route('publishers.edit', $item) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-warning">Módosítás</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('publishers.destroy', $item) }}" method="POST">
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
@endsection
