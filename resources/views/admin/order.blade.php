<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.partials.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin/partials.sidebar')
      <!-- partial -->
      @include('admin.partials.header')
        <!-- partial -->
        
        <div class="main-panel">
            <div class="content-wrapper">

                <h2 class="text-center">TOUTES LES COMMANDES</h2>

                <div class="text-center">
                    <form action="{{ url('search') }}" method="get" class="well col-md-6 mx-auto my-5" autocomplete="off">
                       
                       
                        @csrf

                        <div class="form-group">
                            <label class="control-label" for="search"></label>
                            <br><br>
                            <input type="text" class="form-control" id="search" name="search" required style="background-color: white">
                        </div>
                        <br>
                        <input type="submit" class="btn btn-primary" value="Recherche" name="Search">
                        <br><br>
                    </form>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nom Client</th>
                                <th>email</th>
                                <th>Adresse</th>
                                <th>Telephone</th>
                                <th>Nom Produit</th>
                                <th>Quantité</th>
                                <th>Prix</th>
                                <th>Status du paiement</th>
                                <th>Status de la Livraison</th>
                                <th>Image Produit</th>
                                <th>Livraison</th>
                            </tr>
                        </thead>
        
                        <tbody>
                            @forelse ($order as $order)
                            <tr>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->adresse }}</td>
                                <td>{{ $order->telephone }}</td>
                                <td>{{ $order->product_name }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->price }}</td>
                                <td>{{ $order->payment_status }}</td>
                                <td>{{ $order->delivery_status }}</td>
                                <td>
                                    <img style="width: 90px; height: 100px; border-radius: 0;" src="/public/product/{{ $order->image }}" alt="Image du produit">
                                </td>
                                <td>

                                    @if ($order->delivery_status == 'traitement')

                                    <a href="{{ url('delivered',$order->id) }}" onclick="return confirm('Produit livré avec succès.')" 
                                        class="btn btn-primary">Livraison</a>
                                    
                                    @else
                                    
                                    <p class="btn btn-success">Livraison</p>
                                    
                                    @endif
                                </td>
                            
                            </tr>

                            @empty

                                <div>
                                    <p class="text-center">Utilisateur non reconnu</p>
                                </div>

                            @endforelse
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.partials.script')
    <!-- End custom js for this page -->
  </body>
</html>