<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.partials.css')

    <style type="text/css">
        .content
        {
            text-align: center;
            padding-top: 30px;
        }

        .style
        {
            font-size: 20px;
            padding-bottom: 30px;
        }
        .form-control{
            background-color: white;
        }
        .tableClass {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 40px;
            border: 2px solid grey;
        }
    </style>

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

                @if (session()->has('message'))

                    <div class="alert alert-success">

                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('message')}}
                       
                    </div>
                    
                @endif

            
                <div class="content">
                    <h2 class="style">Ajouter un Produit</h2>

                    <form action="{{ url('/add_product') }}" method="POST" class="well col-md-6 mx-auto my-5" enctype="multipart/form-data" autocomplete="off">

                        @csrf

                        <div class="form-group">
                            <label class="control-label" for="name">Nom Produit</label>
                            <input type="text" class="form-control" id="name" name="product_name" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="description">description</label>
                            <input type="text" class="form-control" id="description" name="description" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="price">Prix</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="discount_price">Prix Réduit</label>
                            <input type="number" class="form-control" id="discount_price" name="discount_price" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="quantity">Quantité</label>
                            <input type="number" min="0" class="form-control" id="quantity" name="quantity" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="category">Catégorie</label>
                            <select name="category" id="">
                                <option value="" selected="">Selectionner une catégorie</option>
                               
                                @foreach ($category as $category)
                                
                                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>

                                @endforeach
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="image">Image Produit</label>
                            <input type="file" name="image">
                            
                        </div>
                        
                        <br>
                        <input type="submit" class="btn btn-primary" value="Ajout Produit" name="Add_produit">
                        <br><br>
                    </form>
                
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