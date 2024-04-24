@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col"></div>
        <div class="col">
            <div class="card bg-white text-black border-dark">
                <div class="card-body">
                    <h4 class="card-title">Add a Teacher</h4>
                    <p class="card-text text-danger">Inputs marked with * shall be filled.</p>

                    @if ($errors->any())
                        <div class="mb-3 mt-3">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <strong>Holy guacamole!</strong>

                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         
                            <strong>Holy guacamole!</strong> 
                            <p>{{Session::get('success')}}</p>
                        </div>
                    @endif

                    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control @if($errors->has('name')) border border-danger @endif"
                                placeholder="Teacher Name" aria-describedby="helpId" value="{{old('name', $product->name)}}">

                            @if ($errors->has('name'))
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            @else
                                <small id="helpId" class="text-muted">The name of the teacher to be created.</small>
                            @endif

                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                placeholder="f.e. Game controller" aria-describedby="helpId" maxlength="255" value="{{old('title', $product->title)}}"> 
                            <small id="helpId" class="text-muted">The email the teacher has expertise in.</small>
                        </div>
                        <div class="mb-3">
                            <label for="degree" class="form-label">Degree</label>
                            <input type="text" name="description" id="degree" class="form-control"
                                placeholder="f.e. example@test.hu" aria-describedby="helpId" maxlength="255" value="{{old('description', $product->description)}}">
                            <small id="helpId" class="text-muted">The degree the teacher has expertise in.</small>
                        </div>
                        <div class="mb-3">
                            <label for="subjects" class="form-label">Subjects</label>
                            <input type="number" name="price" id="subjects" class="form-control"
                                placeholder="f.e. Web development" aria-describedby="helpId" maxlength="255" value="{{old('subjects', $product->price)}}">
                            <small id="helpId" class="text-muted">The subjects the teacher has expertise in.</small>
                        </div>
                        <div class="mb-3">
                            <label for="picture" class="form-label">Profil image</label>
                            <input type="file" name="picture" id="picture" class="form-control"
                                aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Portrait image of the teacher</small>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-warning">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>

@endsection

