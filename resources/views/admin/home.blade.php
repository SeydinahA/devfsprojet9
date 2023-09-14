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
        @include('admin.partials.body')
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.partials.script')
    <!-- End custom js for this page -->
  </body>
</html>