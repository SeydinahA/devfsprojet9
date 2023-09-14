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
      <div class="hero_area">
         <!-- header section strats -->
         @include('partials.header')
         <!-- end header section -->
         
         <div class="main-panel">
            <div class="content-wrapper">

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
                                <th>Status Paiement</th>
                                <th>Status Traitement</th>
                                <th>Image Produit</th>
                                <th>Annuler la Commande</th>
                            </tr>
                        </thead>
            
                        <tbody>
            
            
                            @foreach ($order as $order)
            
                                <td>{{ $order->product_name }}</td>
                                <td>{{ $order->quantity }}</td> 
                                <td>CFA{{ $order->price }}</td> 
                                <td>{{ $order->payment_status}}</td> 
                                <td>{{ $order->delivery_status}}</td> 
                                <td>
                                    <img style="width: 90px; height: 100px; border-radius: 0;" src="/public/product/{{ $order->image }}" alt="Image du produit">
                                </td>
                                <td>
        
                                    @if($order->delivery_status == 'traitement')
        
                                    <a onclick="return Confirm('Etes-vous sur de vouloir annulé la commande?')" 
                                    class="btn btn-danger" href="{{url('cancel_order', $order->id)}}">Annuler</a>
                                    
                                    @else
        
                                    <p class="btn btn-primary">Impossible</p>
        
                                    @endif
                                </td>
                            </tr>
            
                            @endforeach
                        </tbody>
                    </table>
            
                </div>

            </div>
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
