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
                    <h2 class="style">Ajouter une Catégorie</h2>

                    <form action="{{ url('/add_category') }}" method="POST" class="well col-md-6 mx-auto my-5">
                        <div class="form-group">
                            @csrf

                            <label for="Category"> </label>
                            <input type="category" class="form-control" id="" name="category" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajout Catégorie</button>
                    </form>
                </div>

                <table class="tableClass">
                    <tr> 
                        <td>Nom Catégorie</td>
                        <td>Action</td>
                    </tr>


                    @foreach ($data as $data)
                      
                    <tr>
                        <td>{{ $data->category_name }}</td>
                            
                        <td>
                            <a onclick="return confirm('Etes-vous sur de vouloir supprimer cette catégorie?')" class="btn btn-danger" 
                            href="{{ url('delete_category', $data->id) }}">Supprimer</a>
                        </td>          
                    </tr>

                    @endforeach


                </table>
            </div>
        </div>
      <!-- container-scroller -->
      <!-- plugins:js -->
      @include('admin.partials.script')
      <!-- End custom js for this page -->
</body>
</html>