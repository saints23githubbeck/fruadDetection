<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link href="/css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
  {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}

  {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}
  {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>--}}
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('css')
    <script>
        window.APP = <?php echo json_encode([
            'currency_symbol' => config('settings.currency_symbol')
]) ?>
    </script>
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    @include('layouts.partials.navbar')
    @include('layouts.partials.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>@yield('content-header')</h1>
            </div>
            <div class="col-sm-6 text-right">
              @yield('content-actions')
            </div><!-- /.col -->
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        @include('layouts.partials.alert.success')
        @include('layouts.partials.alert.error')
        @yield('content')
      </section>

    </div>
    <!-- /.content-wrapper -->

    @include('layouts.partials.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
          integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
          crossorigin="anonymous"></script>

  {{--<script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>--}}

  {{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>--}}
  {{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>--}}


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script>
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#blah')
                  .css({'background': 'url('+e.target.result+') center center no-repeat','background-size':'cover'});
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
  <script src="{{ asset('js/app.js') }}"></script>
  {{--<script src="{{ asset('js/typehead.js') }}"></script>--}}
  {{--<script src="{{ asset('../assets/js/my.js') }}"></script>--}}
  <script>
    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
      $(".alert").slideUp(500);
    });
  </script>
  @yield('js')

  {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha512-bnIvzh6FU75ZKxp0GXLH9bewza/OIw6dLVh9ICg0gogclmYGguQJWl8U30WpbsGTqbIiAwxTsbe76DErLq5EDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}


  {{--<script src="{{asset('../assets/vendor/jquery/dist/jquery.min.js')}}"></script>--}}
  {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
  {{--<script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>--}}
  {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js" ></script>--}}
   {{--<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js" integrity="sha256-hlKLmzaRlE8SCJC1Kw8zoUbU8BxA+8kR3gseuKfMjxA=" crossorigin="anonymous"></script>--}}

  {{--<script src="{{asset('../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>--}}
  {{--<script src="{{asset('../assets/vendor/js-cookie/js.cookie.js')}}"></script>--}}
  {{--<script src="{{asset('../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>--}}
  {{--<script src="{{asset('../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>--}}
  {{--<script src="{{asset('../assets/vendor/tavo-calendar/moment.js')}}"></script>--}}
  {{--<script src="{{asset('../assets/vendor/tavo-calendar/tavo-calendar.js')}}"></script>--}}

  {{--<!-- Optional JS -->--}}
  {{--<script src="{{asset('../assets/vendor/chart.js/dist/Chart.min.js')}}"></script>--}}
  {{--<script src="{{asset('../assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>--}}
  {{--<!-- Argon JS -->--}}
  {{--<script src="{{asset('../assets/js/argon.js?v=1.2.0')}}"></script>--}}
  <script src="/js/jquery.js"></script>
  <script src="/js/jquery-ui.min.js" type="text/javascript"></script>
  <script src="/js/adminlte.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!--typehead js--------->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

  {{--TYPEHEAD LOGIC HERE--}}
  <script>
    var path = "";
    $('.typeahead').typeahead({
      source:  function (query, process) {
        return $.get(path, { name: query }, function (data) {
          return process(data);
        });
      },
      item: '<li class="dropdown-item "><a class="dropdown-item" href="#" role="option"></a></li>'
    }).on('typeahead:selected', function (e, datum) {
      console.log(datum);
    });

  </script>

  <script>
    var Cuspath = "";
    $('.customer').typeahead({
      source:  function (query, process) {
        return $.get(Cuspath, { name: query }, function (data) {
          return process(data);
        });
      },
      item: '<li class="dropdown-item "><a class="dropdown-item" href="#" role="option"></a></li>'
    }).on('typeahead:selected', function (e, datum) {
      console.log(datum);
    });

  </script>
</body>

</html>
