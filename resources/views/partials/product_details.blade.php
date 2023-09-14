<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <base href="/public">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
</head>
<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('partials.header')
        <!-- end header section -->

    

    <div class="col-sm-6 col-md-4 col-lg-3">

            <div class="img-box">
                <img style="width: 300px; height: 300px;" src="/public/product/{{ $product->image }}" alt="">
            </div>
            <div class="detail-box">
                <h5>
                    {{ $product->product_name }}
                </h5>

                @if ($product->discount_price != null)
                    <h6>
                        CFA{{ $product->discount_price }}
                        @if ($product->price != null)
                            <span style="text-decoration: line-through; color: blue;">
                                CFA{{ $product->price }}
                            </span>
                        @endif
                    </h6>  
                @else
                    @if ($product->price != null)
                        <h6 style="color: blue">
                            CFA{{ $product->price }}
                        </h6>
                    @endif
                @endif

                <h6>Description du Produit: <br>{{ $product->description }}</h6>
                
                <h6>Quantité disponible en stock: {{ $product->quantity }}</h6>
                
                {{-- <a href="" class="btn btn-primary">Ajouter au Panier</a> --}}

                <form action="{{ url('add_cart', $product->id) }}" method="POST">

                    @csrf

                    <div class="row">

                        <div class="col-md-4">
                            <input type="number" name="quantity" value="1" min = "1" style="width:80px; border-radius:30px;">
                        </div>

                        <div class="col-md-4">
                            <input type="submit" value = "Ajout Panier">
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
      <!-- footer start -->
        @include('partials.footer')
      <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
        </p>
    </div>
    <!-- jQery -->
<script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
<script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
<script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
<script src="home/js/custom.js"></script>
</body>
</html>