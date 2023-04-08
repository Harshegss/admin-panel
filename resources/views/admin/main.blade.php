@if(Auth::check())
<!DOCTYPE html>
<html lang="en">

<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>Dashboard - {{env('APP_NAME')}}</title>

<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">
<link rel="shortcut icon" href="{{asset('favicon-1.png')}}">

<!-- Sweet Alert -->
<link type="text/css" href="{{asset('admin/vendor/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">

<!-- Notyf -->
<link type="text/css" href="{{asset('admin/vendor/notyf/notyf.min.css')}}" rel="stylesheet">

<!-- Volt CSS -->
<link type="text/css" href="{{asset('admin/css/volt.css')}}" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</head>

<body>
  
        <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
        
        <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
    <a class="navbar-brand me-lg-5" href="{{url('/')}}">
      {{env('APP_NAME')}}
    </a>
    <div class="d-flex align-items-center">
        <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

        <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
  <div class="sidebar-inner px-4 pt-3">
    <div id="mainForm">

      {{-- <div id="text">
          <label for="sdscvxc" class="form-label">Text</label>
          <textarea name="" id="sdscvxc" cols="30" rows="3" class="form-control mb-3"></textarea>
      </div>
      <div id="content">
          <label for="uroiuro" class="form-label">Content</label>
          <textarea name="" id="uroiuro" cols="30" rows="5" class="form-control mb-3"></textarea>
      </div>
      <div id="image">
          <img src="https://choosemypower.us/storage/app/public/uploads/KWDL5greqzIZuXuTapEEwI0pnRqu5X1cDBOYPngV.jpg"
              alt="" class="rounded mb-3">
          <label for="wertyui" class="form-label">Image</label>
          <input type="file" class="form-control form-control-sm mb-3" id="wertyui">
      </div> --}}
  </div>
    <ul class="nav flex-column pt-3 pt-md-0">
      
      
      <li role="separator" ></li>

      
      <li class="nav-item" role="separator">
        {{-- <a href="{{url('dashboard/logout')}}"
          class="btn btn-secondary d-flex align-items-center justify-content-center btn-upgrade-pro">
          <span class="sidebar-icon d-inline-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="15" height="15" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class="me-2"><g><g><path d="m15 13c-.553 0-1 .448-1 1v4c0 .551-.448 1-1 1h-3v-15c0-.854-.544-1.617-1.362-1.901l-.296-.099h4.658c.552 0 1 .449 1 1v3c0 .552.447 1 1 1s1-.448 1-1v-3c0-1.654-1.346-3-3-3h-10.75c-.038 0-.07.017-.107.022-.048-.004-.094-.022-.143-.022-1.103 0-2 .897-2 2v18c0 .854.544 1.617 1.362 1.901l6.018 2.006c.204.063.407.093.62.093 1.103 0 2-.897 2-2v-1h3c1.654 0 3-1.346 3-3v-4c0-.552-.447-1-1-1z" fill="#1F2937" data-original="#1F2937"></path><path d="m23.707 9.293-4-4c-.286-.286-.716-.372-1.09-.217-.373.155-.617.52-.617.924v3h-4c-.552 0-1 .448-1 1s.448 1 1 1h4v3c0 .404.244.769.617.924.374.155.804.069 1.09-.217l4-4c.391-.391.391-1.023 0-1.414z" fill="#1F2937" data-original="#1F2937"></path></g></g></svg>
          </span> 
          <span>Update</span>
        </a> --}}
        <button type="button" id="updateMyElement" class="btn btn-secondary d-flex align-items-center justify-content-center btn-upgrade-pro fw-bold" >Update</button>
      </li>
    </ul>


  </div>
</nav>
@if(Session::has('message'))
<div class="toast show position-fixed" role="alert" aria-live="assertive" aria-atomic="true" style="z-index: 9999999; bottom:20px; right:20px; box-shadow: 0 1px 13px 3px rgb(0 0 0 / 10%), 0 1px 2px 0 rgb(0 0 0 / 6%);">
  <div class="toast-header">
    <img src="{{asset('assets/img/favicon.png')}}" class="rounded me-2" alt="...">
    <strong class="me-auto">{{env('APP_NAME')}}</strong>
    <small></small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    {{ Session::get('message') }}
  </div>
</div>
@endif
        <main class="content vh-100 py-4">
@yield('content')
        

{{-- <footer class="bg-white rounded shadow p-5 mb-4 mt-4">
  <div class="row">
      <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
          <p class="mb-0 text-center text-lg-start">© 2022 -<span class="current-year"></span> Developed By <a class="text-primary fw-normal" href="https://zonewebsites.us" target="_blank">Zonewebsites</a></p>
      </div>
      <div class="col-12 col-md-8 col-xl-6 text-center text-lg-start">
          <ul class="list-inline list-group-flush list-group-borderless text-md-end mb-0">
              <li class="list-inline-item px-0 px-sm-2">
                  <a href="#">Home</a>
              </li>
              <li class="list-inline-item px-0 px-sm-2">
                  <a href="#">About</a>
              </li>
              <li class="list-inline-item px-0 px-sm-2">
                  <a href="@">Themes</a>
              </li>
              <li class="list-inline-item px-0 px-sm-2">
                  <a href="#">Blog</a>
              </li>
              <li class="list-inline-item px-0 px-sm-2">
                  <a href="#">Contact</a>
              </li>
          </ul>
      </div>
  </div>
</footer> --}}

        </main>

    <!-- Core -->
<script src="{{asset('admin/vendor/@popperjs/core/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('admin/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Volt JS -->
<script src="{{asset('admin/js/volt.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
{{-- <script>
  CKEDITOR.replace( 'content' );
</script> --}}
<script>
  $('.contents_textarea').each(function () {
      CKEDITOR.replace($(this).prop('id'));
  });

</script>

</body>

</html>
@else
<script>window.location="{{url('dashboard/sign-in')}}"</script>
@endif