<section class="product_section layout_padding">
    
    
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">
    
            @foreach ($product as $products)
    
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{ url('product_details', $products->id) }}" class="option1">
                                Détails du produit
                            </a>
                            
                            <form action="{{ url('add_cart', $products->id) }}" method="POST">

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
                    <div class="img-box">
                        <img src="/public/product/{{ $products->image }}" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            {{ $products->product_name }}
                        </h5>
    
                        @if ($products->discount_price != null)
                            <h6>
                                CFA{{ $products->discount_price }}
                                @if ($products->price != null)
                                    <span style="text-decoration: line-through; color: blue;">
                                        CFA{{ $products->price }}
                                    </span>
                                @endif
                            </h6>  
                        @else
                            @if ($products->price != null)
                                <h6 style="color: blue">
                                    CFA{{ $products->price }}
                                </h6>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
    
            @endforeach   
    
            <div class="row">
                <div class="col-md-12">
                    {{ $product->WithQueryString()->links('pagination::bootstrap-5') }}
                </div>
            </div> 
        </div>
    </div>
    
    
</section>
      <!-- end product section -->
      <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
    <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
      <!-- custom js -->
    <script src="js/custom.js"></script>
</body>
</html>