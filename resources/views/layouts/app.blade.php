<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Aplikasi Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin: 0; font-family: Arial, sans-serif;">
  @include('components.sidebar')

  <div style="margin-left: 220px; padding: 20px;">
    @yield('content')
  </div>
</body>
</html>
