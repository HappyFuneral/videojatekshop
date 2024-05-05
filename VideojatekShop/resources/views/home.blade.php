@extends('layouts.app')

@section('content')




<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
         
            <div class="me-sm-2">
                <div id="filter" class="p-2 bg-light ms-md-4 ms-sm-2 border">
                    <form action="" method="post">
                        <div class="border-bottom h5 text-uppercase">Szűrés</div>
                            <div class="box">
                                <div class="box-label text-uppercase d-flex align-items-center">
                                    <div class="input-group">
                                        <input type="text" name="searchitem" class="form-control form-control-sm" placeholder="Keresés">
                                        <button type="submit" name="category_search" class="btn btn-primary text-center p-2 " href=""><i class="fa fa-search text-white me-2 text-center"></i></button>
                                    </div>
                                </div>
                            </div>
                        <div class="box border-bottom">
                            <div class="box-label text-uppercase d-flex align-items-center">
            
                            </div>
                        </div>
                        <div class="box border-bottom">
                            <div class="box-label text-uppercase d-flex align-items-center">Ár szerint
                                <button class="btn ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#inner-box" aria-expanded="false" aria-controls="inner-box">
                                    <span class="fas fa-plus"></span>
                                </button>
                            </div>
                            <div id="inner-box" class="collapse show">
                                <div class="my-1">
                                    <label class="tick">Less than 2000 <input type="checkbox" checked="checked"> <span class="check"></span> </label>
                                </div>
                                <div class="my-1">
                                    <label class="tick">2000 - 3000 <input type="checkbox"> <span class="check"></span> </label>
                                </div>
                                <div class="my-1">
                                    <label class="tick">3000 - 4500 <input type="checkbox"> <span class="check"></span> </label>
                                </div>
                                <div class="my-1">
                                    <label class="tick">4500 - 6000 <input type="checkbox"> <span class="check"></span></label>
                                </div>
                                <div class="my-1">
                                    <label class="tick">6000 - 8000 <input type="checkbox"> <span class="check"></span></label>
                                </div>
                                <div class="my-1"> <label class="tick">8000 -10,000 <input type="checkbox" checked> <span class="check"></span>
                                    </label>
                                </div>
                                <div class="my-1">
                                    <label class="tick">10,000 and Above <input type="checkbox"> <span class="check"></span> </label>
                                </div>
                            </div>
                        </div>
                        <div class="box border-bottom">
                            <div class="box-label text-uppercase d-flex align-items-center">Kategória szerint
                                <button class="btn ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#property" aria-expanded="false" aria-controls="property"> <span class="fas fa-plus"></span> </button>
                            </div>
                            <div id="property" class="collapse">
                              
                                @foreach (\App\Models\ProductType::all() as $product) 
                                 <div class="my-1">
                                    <label class="tick">{{$product->name}} <input type="checkbox" name="productTypes[]" value="{{$product->id}}"> <span class="check"></span> </label>
                                </div>
                                
                                @endforeach
                            </div>
                        </div>
                        <div class="box border-bottom">
                            <div class="box-label text-uppercase d-flex align-items-center">Virágfajta szerint
                                <button class="btn ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#amenities" aria-expanded="false" aria-controls="amenities"> <span class="fas fa-plus"></span> </button>
                            </div>
                            <div id="amenities" class="collapse show">
                              
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-label text-uppercase d-flex align-items-center">Virágszín szerint
                                <button class="btn ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#room-facilities" aria-expanded="false" aria-controls="room-facilities"> <span class="fas fa-plus"></span> </button>
                            </div>
                            <div id="room-facilities" class="collapse">
                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
           
            @foreach(App\Models\StorageProduct::all() as $storageProduct)
            {{$product = App\Models\Product::all()->find($storageProduct->product_id)}}
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                    <!-- Product image-->
                    <img class="card-img-top" src="{{asset('storage/products/'.$product->product_img)}}" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{$product->title}}</h5>
                            <!-- Product reviews-->
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <!-- Product price-->
                           {{$product->price}} <span class="italic">FT</span>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><form method="GET" action={{}}>@csrf @method('GET') value=""> <button class="btn btn-outline-dark mt-auto" href="">Add to cart</a></form></div>
                    </div>
                </div>
            </div>
            @endforeach

        
        </div>
    </div>
</section>

@endsection
