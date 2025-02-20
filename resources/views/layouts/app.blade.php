<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        #map {
            height: 100vh;
            width: 100%;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar a {
            color: white;
            text-decoration: none;
        }
        .dropdown-menu a {
            color: #000;
        }
        .legend {
            line-height: 18px;
            color: #555;
        }
        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }

        .info {
            padding: 6px 8px;
            /*font: 14px/16px Arial, Helvetica, sans-serif;*/
            background: white;
            background: rgba(255,255,255,0.8);
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            border-radius: 5px;
        }

        .info h4 {
            margin: 0 0 5px;
            color: #777;
        }
    </style>
    @stack('styles')
</head>
<body>
    @include('partials.navbar')
    @yield('content')
    <!-- Leaflet JS -->
      <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
      <script src="https://unpkg.com/leaflet-ajax/dist/leaflet.ajax.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
      <script src="{{ asset('js/geojson/sumatera_utara.js') }}"></script>
      <script src="{{ asset('js/geojson/all_kabkota_ind.js') }}"></script>
      <script src="{{ asset('js/geojson/all_prov_ind.js') }}"></script>
      <footer class="bg-dark text-white text-center py-3">
          <div class="container">
              <p class="mb-0">
                  &copy; <span id="year"></span> Hidesec. Dibuat dengan
                  <i class="bi bi-cup-hot-fill text-warning"></i>
                  &
                  <i class="bi bi-heart-fill text-danger"></i>
                  .
              </p>
          </div>
      </footer>
      <script>
          document.getElementById('year').textContent = new Date().getFullYear();
      </script>
    @stack('scripts')
</body>
</html>
