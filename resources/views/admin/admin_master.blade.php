<!DOCTYPE html>

@if (Auth::guest())
    <script>
        window.location.href = "{{ route('login') }}";
    </script>
@endif
@php
$route = Route::current()->getName()
@endphp

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
      <meta name="title"
            content="Pacmedia Creatives - Tactical Digital Solutions | Brand Strategy & Performance Engineering" />
      <meta name="description"
            content="Pacmedia Creatives deploys tactical digital solutions for ambitious companies worldwide. Expert brand identity systems, high-performance web development, and intelligent AI automation." />
      <meta name="keywords"
            content="Pacmedia Creatives, tactical digital solutions, brand strategy, brand identity design, performance web development, AI automation systems, custom web development, conversion-focused design, intelligent automation, digital presence strategy, UI/UX design, React development, brand architecture, global digital agency" />
      <meta name="author" content="Pacmedia Creatives" />
      <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
      <link rel="canonical" href="https://thepacmedia.com/" />
    <title>Web Editor</title>
    <link rel="apple-touch-icon" href="{{ asset('backend/assets/images/favicon/recordia-apple-touch-icon-152x152.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/assets/images/favicon/favicon.png') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendors/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendors/animate-css/animate.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendors/data-tables/css/jquery.dataTables.min.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendors/hover-effects/media-hover-effects.css') }}"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendors/data-tables/css/dataTables.checkboxes.css') }}">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/themes/vertical-modern-menu-template/materialize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/themes/vertical-modern-menu-template/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/pages/dashboard-modern.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/pages/app-invoice.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/pages/page-users.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/pages/page-account-settings.css') }}"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/pages/advance-ui-media.css') }}">
    @yield('styles')
    @yield('headScript')
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/custom/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/custom/toast.css') }}" >
    <!-- END: Custom CSS-->
<style type="text/css">
  form:invalid button {
   pointer-events: none;
   opacity: 0.5;
}
</style>
  </head>
  <!-- END: Head-->
  <body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns {{ ($route == 'dashboard')? 'menu-collapse' : '' }}  " data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">


    @include('admin.body.header')



    @include('admin.body.sidebar')

    <!-- BEGIN: Page Main-->

    @yield('admin')



    <!-- BEGIN: Footer-->

   @include('admin.body.footer')

    <!-- END: Footer-->
    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('backend/assets/js/vendors.min.js') }}"></script>
    @yield('scripts')
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('backend/assets/vendors/data-tables/js/jquery.dataTables.min.js') }}"></script>
    <!-- <script src="{{ asset('backend/assets/vendors/jquery-validation/jquery.validate.min.js') }}"></script> -->
    <script src="{{ asset('backend/assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/data-tables/js/datatables.checkboxes.min.js') }}"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="{{ asset('backend/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('backend/assets/js/search.js') }}"></script>
    <script src="{{ asset('backend/assets/js/custom/custom-script.js') }}"></script>
    <script src="{{ asset('backend/assets/js/custom/sweetalert.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/custom/sweetalert_init.js') }}"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('backend/assets/js/scripts/dashboard-modern.js') }}"></script>
    <script src="{{ asset('backend/assets/js/scripts/page-users.js') }}"></script>
    <script src="{{ asset('backend/assets/js/scripts/app-invoice.js') }}"></script>
    <script src="{{ asset('backend/assets/js/scripts/page-account-settings.js') }}"></script>
    <script src="{{ asset('backend/assets/js/scripts/advance-ui-modals.js') }}"></script>
{{--    <script src="{{ asset('backend/assets/js/scripts/ui-alerts.js') }}"></script>--}}
    <script src="{{ asset('backend/assets/js/scripts/advance-ui-media.js') }}"></script>
    <script src="{{ asset('backend/assets/js/scripts/cards-extended.js') }}"></script>
    <!-- END PAGE LEVEL JS-->

<script>




 @if(Session::has('message'))

  setTimeout(function () {
    var toastHTML = "{{ Session::get('message') }}";
    M.toast({html: toastHTML})
  }, 2000);

 @endif

</script>
  </body>
</html>

