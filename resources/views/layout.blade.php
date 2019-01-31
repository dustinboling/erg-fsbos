<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Willamette Valley FSBOs')</title>
</head>
<body>
  <nav><ul>
    <li><a href="/">Home</a></li>
    <li><a href="/about">About</a></li>
    <li><a href="/contact">Contact</a></li>
    <li><a href="/listings">Search Listings</a></li>
  </ul></nav>

    @yield('content')

</body>
</html>