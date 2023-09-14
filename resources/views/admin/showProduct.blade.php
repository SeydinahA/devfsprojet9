<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.partials.css')

    <!--<style>
        .center {
            text-align: center;
            font-size: 20px;
        }
        .tr_color
        {
            background: skyblue;
        }
        .th_color
        {
            padding: 20px;
        }
    </style>-->
</head>
<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin/partials.sidebar')
        <!-- partial -->
        @include('admin.partials.header')
      <!-- partial -->
      
      <!--<div class="main-panel">
          <div class="content-wrapper">

            <h2 class="center">Tout les Produits</h2>

                <table>
                    <tr class="tr_color">
                        <th class="th_color">Nom Produit</th>
                        <th class="th_color">Description</th>
                        <th class="th_color">Prix</th>
                        <th class="th_color">Quantité</th>
                        <th class="th_color">Catégorie</th>
                        <th class="th_color">Prix Réduit</th>
                        <th class="th_color">Image Produit</th>
                    </tr>

                    
                    {{-- @foreach ($product as $product) --}}
                        
                    <tr>
                        {{-- <td>{{$product->product_name }}</td> --}}
                        {{-- <td>{{ $product->description }}</td> --}}
                        {{-- <td>{{ $product->price }}</td> --}}
                        {{-- <td>{{ $product->quantity }}</td> --}}
                        {{-- <td>{{ $product->category }}</td> --}}
                        {{-- <td>{{ $product->discount_price }}</td> --}}
                        {{-- <td> --}}
                            {{-- <img style="height: 100px" src="/public/product/{{ $product->image }}" alt=""> --}}
                        {{-- </td> --}}
                    {{-- </tr> --}}

                    {{-- @endforeach --}}
                    
                </table>
            </div>
        </div>-->

        <div class="main-panel">
            <div class="content-wrapper">

                @if (session()->has('message'))

                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message')}}
                   
                </div>
                
                @endif
        
                <h2 class="text-center">Tous les Produits</h2>
        
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nom Produit</th>
                                <th>Description</th>
                                <th>Prix</th>
                                <th>Prix Réduit</th>
                                <th>Quantité</th>
                                <th>Catégorie</th>
                                <th>Image Produit</th>
                                <th>Editer</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
        
                        <tbody>
                            @foreach ($product as $product)
                            <tr>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ Str::limit($product->description, 10) }}</td> <!-- Limiter la description à 100 caractères -->
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->discount_price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->category }}</td>
                                <td>
                                    <img style="width: 90px; height: 100px; border-radius: 0;" src="/public/product/{{ $product->image }}" alt="Image du produit">
                                    {{-- <img style="max-height: 400px;" src="/public/product/{{ $product->image }}" alt="Image du produit"> --}}
                                </td>

                                <td>
                                    <a class="btn btn-success" 
                                    href="{{ url('update_product', $product->id) }}">Editer</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" onclick="return confirm('Etes-vous sur de vouloir supprimer le produit?')" 
                                    href="{{ url('delete_product', $product->id) }}">Supprimer</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        
            </div>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.partials.script')
    <!-- End custom js for this page -->
  </body>
</html>