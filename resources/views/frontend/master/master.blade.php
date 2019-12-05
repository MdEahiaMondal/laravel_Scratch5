
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title> @yield('title')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">

    <!-- Bootstrap core CSS -->

    <!-- Custom styles for this template -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/blog.css') }}" rel="stylesheet">
</head>

<body>

<div class="container" id="app">
   @include('frontend.partials.header')
    </div>

    @yield('feature_post')
</div>

<main role="main" class="container">

    <div class="row">
        @yield('mainContent')

        @yield('sidebar')
    </div><!-- /.row -->




</main><!-- /.container -->

@include('frontend.partials.footer')

<script src="{{ mix('js/app.js') }}"></script>

<script>
    Echo.channel('post.created')
        .listen('PostCreated', (e) => {

            $.notify(e.post.title + " has been created");
        });

</script>
</body>
</html>
