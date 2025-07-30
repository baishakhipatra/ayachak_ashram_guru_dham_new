<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ayachak Ashram</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">
</head>
<body>

@include('front/layout/section/header')

  <!-- Layout Content -->
  @yield('content')
  <!--/ Layout Content -->

@include('front/layout/section/footer')

@yield('script')
</body>
</html>