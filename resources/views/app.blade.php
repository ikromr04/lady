<!DOCTYPE html>
<html class="page" lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- ---------Meta tags start--------- --}}
  {{-- Same metas for all routes --}}
  <meta property="og:site_name" content="Lady Healthcare">
  <meta property="og:type" content="object" />
  <meta name="twitter:card" content="summary_large_image">

  @hasSection('meta-tags')
    @yield('meta-tags')
  @else
    <meta name="description" content="Lady Healthcare – инновационная фармацевтическая компания с давней традицией исследовательских разработок. Lady Healthcare успешно применяет новейшие научные достижения для решения важнейших глобальных задач и предлагает инновационные разработки, способные удовлетворить актуальные потребности клиентов.">
    <meta property="og:description" content="Lady Healthcare – инновационная фармацевтическая компания с давней традицией исследовательских разработок. Lady Healthcare успешно применяет новейшие научные достижения для решения важнейших глобальных задач и предлагает инновационные разработки, способные удовлетворить актуальные потребности клиентов.">
    <meta property="og:title" content="Lady Healthcare" />
    <meta property="og:image" content="{{ asset('images/main-logo.svg') }}">
    <meta property="og:image:alt" content="Lady Healthcare – Лого">
    <meta name="twitter:title" content="Lady Healthcare">
    <meta name="twitter:image" content="{{ asset('images/main-logo.svg') }}">
  @endif
  {{-- --------- Meta tags end--------- --}}

  <link rel="icon" href="{{ asset('favicon.ico') }}">
  <link rel="icon" href="{{ asset('favicons/icon.svg') }}" type="image/svg+xml">
  <link rel="apple-touch-icon" href="{{ asset('favicons/180x180.png') }}">
  <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">

  <link rel="stylesheet" href="{{ mix('css/style.min.css') }}">

  @if (session('loggedUser'))
    <link rel="stylesheet" href="{{ asset('simditor/simditor.css') }}">
  @endif

  <title>@yield('title')</title>
</head>

<body class="page__body">
  <x-icons />

  <x-page-header />

  @yield('content')

  <x-page-footer />

  @if (session('loggedUser'))
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('simditor/module.js') }}"></script>
    <script src="{{ asset('simditor/hotkeys.js') }}"></script>
    <script src="{{ asset('simditor/uploader.js') }}"></script>
    <script src="{{ asset('simditor/simditor.js') }}"></script>
    <script src="{{ asset('js/text.js') }}"></script>
  @endif

  <script src="{{ mix('js/app.js') }}"></script>

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-123986695-20"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-123986695-20');
  </script>

  <!-- Yandex.Metrika counter -->
  <script type="text/javascript">
    (function(m, e, t, r, i, k, a) {
      m[i] = m[i] || function() {
        (m[i].a = m[i].a || []).push(arguments)
      };
      m[i].l = 1 * new Date();
      for (var j = 0; j < document.scripts.length; j++) {
        if (document.scripts[j].src === r) {
          return;
        }
      }
      k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(48785576, "init", {
      clickmap: true,
      trackLinks: true,
      accurateTrackBounce: true,
      webvisor: true
    });
  </script>
  <!-- /Yandex.Metrika counter -->
</body>

</html>
