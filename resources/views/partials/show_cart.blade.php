<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
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
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
   </head>
   <body>
      {{-- <div class="hero_area"> --}}
         <!-- header section strats -->
         @include('partials.header')
         <!-- end header section -->
         
      {{-- </div> --}}
      <!-- why section -->
      

        @if (session()->has('message'))

            <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message')}}
            </div>
        @endif


      <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nom Produit</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th>Image Produit</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <?php $totalprice = 0; ?>

                @foreach ($cart as $cart)

                    <td>{{ $cart->product_name }}</td>
                    <td>{{ $cart->quantity }}</td> 
                    <td>CFA{{ $cart->price }}</td> 
                    <td>
                        <img style="width: 90px; height: 100px; border-radius: 0;" src="/public/product/{{ $cart->image }}" alt="Image du produit">
                        {{-- <img style="max-height: 400px;" src="/public/product/{{ $product->image }}" alt="Image du produit"> --}}
                    </td>
                    <td>
                        <a class="btn btn-danger" onclick="return confirm('Etes-vous sur de vouloir enlever le produit du panier?')" 
                        href="{{ url('remove_product', $cart->id) }}">Enlever le Produit</a>
                    </td>
                </tr>

                <?php $totalprice = $totalprice + $cart->price ?>

                @endforeach
            </tbody>
        </table>

        <div>
            <h1>Prix Total : CFA{{ $totalprice }}</h1>
        </div>

        <div class="text-center" style="margin-bottom: 50px">
            <h1>Proceder au Paiement</h1>
        
            <a class="btn btn-danger" 
            href="{{ url('cash_order') }}">Paiement à la livraison</a>
            
            <td>
                <a class="btn btn-danger" 
                href="{{ url('delete_product') }}">Payer avec une carte</a>
            </td>
        
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
