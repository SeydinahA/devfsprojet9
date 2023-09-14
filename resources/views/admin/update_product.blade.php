<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <base href="/public">

    @include('admin.partials.css')
</head>
<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin/partials.sidebar')
        <!-- partial -->
        @include('admin.partials.header')


        <div class="main-panel">
            <div class="content-wrapper">

                @if (session()->has('message'))

                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message')}}
                   
                </div>
                
                @endif

                <h2 class="text-center">Modifier le Produit</h2>

                <form action="{{ url('/update_product_confirm', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="product_name">Nom Produit</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product->product_name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required>{{ $product->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Prix</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                    </div>

                    <div class="form-group">
                        <label for="discount_price">Prix Réduit</label>
                        <input type="text" class="form-control" id="discount_price" name="discount_price" value="{{ $product->discount_price }}">
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantité</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}" required>
                    </div>
        
                    <div class="form-group">
                        <label for="category">Catégorie</label>
                        <select name="category" id="">
                            <option class="form-control" value="{{ $product->category }}">{{ $product->category }}</option>
                            {{-- <input type="text" class="form-control" id="category" name="category" value="{{ $product->category }}" required> --}}
                        
                            @foreach ($category as $category)
                                
                            <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>

                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Image Produit</label>
                        {{-- <input type="file" class="form-control-file" id="image" name="image"> --}}
                        <img style="width: 90px; height: 100px; border-radius: 0;" src="/public/product/{{ $product->image }}" alt="Image du produit">
                    </div>

                    <div class="form-group">
                        <label for="image">Image Produit à Modifier</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>

                    <button type="submit" class="btn btn-primary">Sauvegarder les modifications</button>
                </form>
            </div>
        </div>
    </div>
<!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.partials.script')
    <!-- End custom js for this page -->
</body>
</html>
