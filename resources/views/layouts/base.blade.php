<!DOCTYPE html>
<html lang="vi" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>{{ $site->title ?? 'Portfolio' }} | {{ $site->name ?? 'Data Analyst' }}</title>
  <meta name="description" content="{{ $site->tagline ?? '' }}">
  <meta name="author" content="{{ $site->name ?? '' }}">
  <meta name="keywords" content="data intern, IT intern, portfolio, python, sql, machine learning, NLP, MIS, phân tích dữ liệu">
  
  <meta property="og:title" content="{{ $site->title ?? '' }} | {{ $site->name ?? '' }}">
  <meta property="og:description" content="{{ $site->tagline ?? '' }}">
  <meta property="og:type" content="website">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
  
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          fontFamily: {
            sans: ['Inter', 'system-ui', 'sans-serif'],
            mono: ['JetBrains Mono', 'monospace'],
          },
          colors: {
            navy: {
              50:  '#eef2f7',
              100: '#d4dce8',
              200: '#a9b9d1',
              300: '#7e96ba',
              400: '#5373a3',
              500: '#3b5998',
              600: '#2d4a80',
              700: '#1e3a5f',
              800: '#152b47',
              900: '#0b1b2f',
              950: '#060f1a',
            },
            accent: {
              DEFAULT: '#2563eb',
              light: '#60a5fa',
              dark: '#1d4ed8',
            }
          }
        }
      }
    }
  </script>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
  
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-white dark:bg-navy-950 text-gray-800 dark:text-gray-200 font-sans transition-colors duration-300">
  
  @include('components.nav')
  
  <main>
    @yield('content')
  </main>
  
  @include('components.footer')
  
  <script src="{{ asset('js/script.js') }}"></script>
  
  <script>
    lucide.createIcons();
  </script>
</body>
</html>
