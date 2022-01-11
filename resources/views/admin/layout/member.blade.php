<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PolluxUI Admin</title>
  <link rel="stylesheet" href="{{ URL::to('admin/vendors/typicons/typicons.css') }}">
  <link rel="stylesheet" href="{{ URL::to('admin/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ URL::to('admin/css/vertical-layout-light/style.css') }}">
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
        @yield('content')
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="{{ URL::asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ URL::asset('admin/js/off-canvas.js') }}"></script>
  <script src="{{ URL::asset('admin/js/hoverable-collapse.js') }}"></script>
  <script src="{{ URL::asset('admin/js/template.js') }}"></script>
  <script src="{{ URL::asset('admin/js/settings.js') }}"></script>

  <!-- endinject -->
</body>

</html>
