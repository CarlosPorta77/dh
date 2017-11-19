<!DOCTYPE html>
<html lang="es">
@include('includes.head')

<body>

<main>
  @include('includes.header')

  @yield('content')

  @include('includes.footer')
</main>

@include('includes.scripts')
</body>
</html>
