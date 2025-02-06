<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <!-- Include Tailwind CSS or your preferred styles -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

  <div class="flex-1">
    @yield('content') <!-- This is where your page content will go -->
  </div>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white text-center py-4 mt-auto">
    <p class="text-sm">© 2025 Event Management</p>
  </footer>

</body>

</html>