<!DOCTYPE html>
<html lang="es">
<head>
    <title>E-Shoes ¡Todo tipo de calzado!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
</head>
<body>
@php
$firstThreeProducts = $products->take(3); // Toma solo los primeros 3 productos
@endphp

    <!-- Invoque Header -->
    @include('header')

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Buscar ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/banner_img_01.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>E-Shoes</b> ¡Encuentra todo tipo de calzado!</h1>
                                <h3 class="h2">Tenemos tus marcas favoritas</h3>
                                <p>
                                    <a rel="sponsored" class="text-success" href="" target="_blank">Nike</a>,
                                    <a rel="sponsored" class="text-success" href="" target="_blank">Adidas</a>,
                                    <a rel="sponsored" class="text-success" href="" target="_blank">Rebook</a>,
                                    <a rel="sponsored" class="text-success" href="" target="_blank">New Balance</a>,
                                    <a rel="sponsored" class="text-success" href="" target="_blank">y muchas mas...</a>,
                                </p>
                                <!-- Button to view products -->
                                <p class="text-center"><a href="{{ route('shop') }}" class="btn btn-success">Ver Productos</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Remaining carousel items -->
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/banner_img_02.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Nueva Colección</h1>
                                <h3 class="h2">¡Encuentra aqui las tendencias del momento!</h3>
                                <p class="text-center"><a href="{{ route('shop') }}" class="btn btn-success">Comprar</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/banner_img_03.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Tu estilo es <strong>UNICO</strong></h1>
                                <h3 class="h2">!En E-Shoes encuentras todo lo que te gusta!</h3>
                                <p>
                                    Tenemos la mejor calidad de calzado, para todo tipo de gustos y estilos.
                                </p>
                                <p class="text-center"><a href="{{ route('shop') }}" class="btn btn-success">Ver Categorias</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->

    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Categorias Disponibles</h1>
                <p>
                    Descubre nuestra amplia selección de zapatos cuidadosamente organizados en diversas categorías para satisfacer tus necesidades de estilo y comodidad.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="{{ route('shop') }}"><img src="./assets/img/category_img_01.jpg" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">Deportivas</h5>
                <p class="text-center"><a href="{{ route('shop') }}" class="btn btn-success">Comprar</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="{{ route('shop') }}"><img src="./assets/img/category_img_02.jpg" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Elegantes</h2>
                <p class="text-center"><a href="{{ route('shop') }}" class="btn btn-success">Comprar</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="{{ route('shop') }}"><img src="./assets/img/category_img_03.jpg" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Casuales</h2>
                <p class="text-center"><a href="{{ route('shop') }}" class="btn btn-success">Comprar</a></p>
            </div>
        </div>
    </section>
    <!-- End Categories of The Month -->

    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Productos destacados</h1>
                    <p>
                        ¡Aqui podrás encontrar los productos más destacados de nuestra página!
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        @if($firstThreeProducts->get(0))
                            <a href="{{route('products.show', $firstThreeProducts[0]->id)}}">
                            <img src="{{ asset('assets/img/' . $firstThreeProducts[0]->image) }}"  class="card-img-top" alt="...">
                        </a>

                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">{{$firstThreeProducts->get(0)->price}}</li>
                            </ul>
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark"> {{ $firstThreeProducts->get(0)->brand }}</a>
                            <p class="card-text">
                                {{ $firstThreeProducts->get(0)->description }}
                            </p>
                            <p class="text-muted">Reviews (24)</p>

                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        @if($firstThreeProducts->get(1))
                        <a href="{{route('products.show', $firstThreeProducts->get(1)->id)}}">
                        <img src="{{ asset('assets/img/' . $firstThreeProducts->get(1)->image) }}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">{{$firstThreeProducts->get(1)->price}}</li>
                            </ul>
                            <a href="shop" class="h2 text-decoration-none text-dark">{{$firstThreeProducts->get(1)->brand}}</a>
                            <p class="card-text">
                                {{$firstThreeProducts->get(1)->description}}
                            </p>
                            <p class="text-muted">Reviews (48)</p>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        @if($firstThreeProducts->get(2))
                        <a href="{{route('products.show', $firstThreeProducts->get(2)->id)}}">
                        <img src="{{ asset('assets/img/' . $firstThreeProducts->get(2)->image) }}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">{{$firstThreeProducts->get(2)->price}}</li>
                            </ul>
                            <a href="shop" class="h2 text-decoration-none text-dark">{{$firstThreeProducts->get(2)->brand}}</a>
                            <p class="card-text">
                                {{$firstThreeProducts->get(2)->description}}
                            </p>
                            <p class="text-muted">Reviews (15)</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- End Featured Product -->

    <!-- Invoque Footer -->
    @include('footer')

    <!-- Start Script -->
    <script src="{{ asset('assets/js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/templatemo.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- End Script -->
</body>
</html>
