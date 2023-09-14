<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ url('/') }}"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
              
               <form class="d-flex" role="search" style="padding-right: 100px">
                  <div class="input-group">
                      <input class="form-control py-2" type="search" placeholder="Rechercher..." aria-label="Search">
                      <div class="input-group-append">
                          <button class="btn btn-primary" type="submit">
                              <i class="fa fa-search"></i>
                          </button>
                      </div>
                  </div>
              </form>
                <li class="nav-item active">
                   <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="about.html">About</a></li>
                      <li><a href="testimonial.html">Testimonial</a></li>
                   </ul>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="product.html">Products</a>
                </li>
                {{-- <li class="nav-item">
                   <a class="nav-link" href="contact.html">Contact</a>
                </li> --}}

                <li class="nav-item">
                  <a class="nav-link" href="{{ url('show_order') }}">Commande</a>
               </li>

                <li class="nav-item">
                  <a class="nav-link active" href="{{ url('show_cart') }}"><i class="bi bi-bag"></i></a>
                </li>

               @if (Route::has('login'))

               @auth
               <li class="nav-item">
                  <a class="btn btn-primary" id="csslogin" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                     Deconnexion
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST"  name="logout" style="display: none;">
                     @csrf
                  </form>  
               </li>

               @else

                <li class="nav-item">
                  <a class="btn btn-primary" id="csslogin" href="{{ route('login') }}">Login</a>
                </li>

                <li class="nav-item">
                  <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                </li>
               @endauth

               @endif

             </ul>
          </div>
       </nav>
    </div>
 </header>

