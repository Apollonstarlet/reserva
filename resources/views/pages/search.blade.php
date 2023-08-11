{{-- extend layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title', 'Search')

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/magnific-popup.css">
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="css/aos.css">
<link rel="stylesheet" href="css/bootstrap/style.css">
<link rel="stylesheet" href="fonts/icomoon/style.css">
@endsection

@section('menu')
@endsection

{{-- page content --}}
@section('content')
<!--APARTADI DE ACTIVIDADES-->
<section class="turismo" style="background: white;">

    <div class="container">

        <div class="row mb-5">
            <div class="col-md-9 order-2">

                <div class="row">
                    <div class="col-md-12 mb-5">
                        <div class="float-md-left mb-4">
                            <h2 class="text-black">Buscando resultados para {{ count($data['rooms'])}}</h2>
                        </div>
                        <div class="d-flex">
                            <div class="dropdown mr-1 ml-md-auto">
                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Categories
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                    @foreach ($data['categories'] as $category)
                                        <a class="dropdown-item" href="$category">{{$category['name']}}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                    <a class="dropdown-item" href="#">Relevance</a>
                                    <a class="dropdown-item" href="#">Name, A to Z</a>
                                    <a class="dropdown-item" href="#">Name, Z to A</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Price, low to high</a>
                                    <a class="dropdown-item" href="#">Price, high to low</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                  @if(count($data['rooms']) > 0)
                    @foreach ($data['rooms'] as $room)
                      <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                        <div class="block-4 text-center border">
                            <figure class="block-4-image">
                                <a href="shop-single.php?id={{$room['id']}}">
                                    <img src="images/{{$room['image']}}" alt="{{$room['image']}}" class="img-fluid"></a>
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="shop-single.php?id={{$room['id']}}">{{$room['name']}}</a></h3><br><br>
                                <p><i class="fa-solid fa-bed"></i> {{$room['rooms']}} camas<br>
                                    <i class="fa-solid fa-user"></i> Capacidad maxima: {{$room['max']}}<br><br>
                                </p>
                                <p class="mb-0">{{$room['description']}}</p>
                                <p class="text-primary font-weight-bold">${{$room['price']}}</p>
                            </div>
                        </div>
                      </div>
                    @endforeach
                  @else
                    <h2>Sin resultados</h2>
                  @endif
                </div>
                <!--
                <div class="row" data-aos="fade-up">
                    <div class="col-md-12 text-center">
                        <div class="site-block-27">
                            <ul>
                                <li><a href="#">&lt;</a></li>
                                <li class="active"><span>1</span></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">&gt;</a></li>
                            </ul>
                        </div>
                    </div>
                </div> -->
            </div>

            <div class="col-md-3 order-1 mb-5 mb-md-0">
                
                <div class="border p-4 rounded mb-4">
                    <h3 class="mb-3 text-uppercase text-black d-block">Filter</h3>
                    <p><i class="fa-solid fa-bed"></i> Camas: {{$data['room']}}</p>
                    <p><i class="fa-solid fa-user"></i> Capacidad maxima: {{$data['adultos']}}</p>
                    <p> {{$data['date']}}</p>
                </div>

                <div class="border p-4 rounded mb-4">
                    <div class="mb-4">
                        <h3 class="mb-3 text-uppercase text-black d-block">Filter by Price</h3>
                        <div id="slider-range" class="border-primary"></div>
                        <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
                        <input type="hidden" id="amount1" value="0" />
                        <input type="hidden" id="amount2" value="10000" />
                    </div>

                    <div class="mb-4">
                        <h3 class="mb-3 text-uppercase text-black d-block">Metros cuadrados</h3>
                        <label for="s_sm" class="d-flex">
                            <a id="area_1">
                                <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">45m²</span>
                            </a>

                        </label>
                        <label for="s_sm" class="d-flex">
                            <a id="area_2">
                                <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">40m²</span>
                            </a>
                        </label>
                        <label for="s_sm" class="d-flex">
                            <a id="area_3">
                                <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">50m²</span>
                            </a>
                        </label>
                    </div>

                </div>
            </div>
        </div>

    </div>

</section>
@endsection

{{-- vendor script --}}
@section('vendor-script')
@endsection

{{-- page script --}}
@section('page-script')
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/main.js"></script>
@endsection