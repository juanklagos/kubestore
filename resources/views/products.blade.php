@extends('layouts.app')

@section('content')
    <style>
        img {
            height: 170px;
            width: 140px
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Filtros</div>
                    <div class="card-body">
                        <form method="get" action="{{url('products')}}" id="formFilter">
                            <div class="form-group">
                                <label>Escribe el producto que buscas:</label>
                                <input class="form-control" value="{{empty($search) ? '':$search}}" type="text"
                                       placeholder="Nombre, descripción" name="search">
                            </div>
                            <div class="form-group">
                                <label>Precio minimo</label>
                                <input class="form-control" type="number" name="price_min" placeholder="Precio minimo"
                                       value="{{empty($price_min) ? 1:$price_min}}">
                            </div>
                            <div class="form-group">
                                <label>Precio maximo</label>
                                <input class="form-control" type="number" name="price_max" placeholder="Precio maximo"
                                       value="{{empty($price_max) ? 1000:$price_max}}">
                            </div>

                            <button class="btn btn-primary" type="submit">Aplicar filtro</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Productos</div>
                    <div class="card-body">
                        <div class="row">
                            @if(count($products)>0)
                                @foreach($products as $item)
                                    <div class="col-lg-12 mx-auto">
                                        <!-- List group-->
                                        <ul class="list-group shadow">
                                            <!-- list group item-->
                                            <li class="list-group-item">
                                                <!-- Custom content-->
                                                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                                                    <div class="media-body order-2 order-lg-1">
                                                        <h5 class="mt-0 font-weight-bold mb-2">{{$item->title}}</h5>
                                                        <p class="font-italic text-muted mb-0 small">{{$item->description}}</p>
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mt-1">
                                                            <h6 class="font-weight-bold my-2">${{$item->price}}</h6>
                                                            <ul class="list-inline small">
                                                                <li class="list-inline-item m-0"><i
                                                                        class="fa fa-star text-success"></i></li>
                                                                <li class="list-inline-item m-0"><i
                                                                        class="fa fa-star text-success"></i></li>
                                                                <li class="list-inline-item m-0"><i
                                                                        class="fa fa-star text-success"></i></li>
                                                                <li class="list-inline-item m-0"><i
                                                                        class="fa fa-star text-success"></i></li>
                                                                <li class="list-inline-item m-0"><i
                                                                        class="fa fa-star-o text-gray"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <img src="{{$item->getFirstMediaUrl('image')}}"
                                                         alt="Generic placeholder image" width="200"
                                                         class="ml-lg-5 order-1 order-lg-2">
                                                </div> <!-- End -->
                                            </li> <!-- End -->
                                        </ul>
                                    </div>
                                @endforeach
                            @else
                                <h3>No se encontraron productos</h3>
                            @endif
                        </div>
                        <div style="margin-top: 10px;align-items: center">
                            {{ $products->appends(['search' => $search, 'price_min'=> $price_min, 'price_max'=>$price_max])->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
