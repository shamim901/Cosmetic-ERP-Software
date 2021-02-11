@php
    use Illuminate\Support\Facades\Route;
@endphp
        <!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="hostname" content="{{ env('APP_URL') }}">
    <title>@yield('title', app_name())</title>

    <!-- Meta -->
    <meta name="description"
          content="@yield('meta_description', 'Islamic Foundation (Book Management System) Multi store')">
    <meta name="author" content="@yield('meta_author', 'Worldtech')">
    <meta name="keywords" content="@yield('meta_keywords', 'Book Management System')">
@yield('meta')

<!-- Styles -->
@yield('before-styles')

<!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    @langrtl
    {{ Html::style(getRtlCss(mix('css/frontend.css'))) }}
    @else
        {{ Html::style(mix('css/frontend.css')) }}
        @endlangrtl
        {{ Html::style(mix('css/frontend-custom.css')) }}
        {{--        {!! Html::style('js/select2/select2.min.css') !!}--}}
        @yield('after-styles')

    <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(), 'hostname' => env('APP_URL')]); ?>
        </script>
        <?php
        if (!empty($google_analytics)) {
            echo $google_analytics;
        }
        ?>
</head>
<body id="app-layout">
<div id="app">
    @include('includes.partials.logged-in-as')
    @include('frontend.includes.nav')

    <div class="container">
        @include('includes.partials.messages')
        @yield('content')
    </div><!-- container -->
    <footer class="footer">
        <div class="container">
            <p class="text-center">Copyright ©2020 All rights reserved. Development by <a href="#">World Tech</a>.</p>
        </div>
    </footer>
</div><!--#app-->

<!-- Scripts -->
@yield('before-scripts')
{!! Html::script(mix('js/frontend.js')) !!}
@yield('after-scripts')
{{ Html::script('js/jquerysession.min.js') }}
{{ Html::script('js/frontend/frontend.min.js') }}
{{--        {!! Html::script('js/select2/select2.min.js') !!}--}}

<script type="text/javascript">
    if ("{{Route::currentRouteName()}}" !== "frontend.user.account") {
        $.session.clear();
    }
</script>
{{--        @include('includes.partials.ga')--}}
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="{{ asset('js/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/jquery-validation/dist/additional-methods.min.js')}}" type="text/javascript"></script>

<script>
    $(function () {
        $("#saveMosjid").on('click', function () {
            var isValid = true;
            $(".required").each(function () {
                if ($(this).val() === "") {
                    isValid = false;
                }
            });

            if (isValid == false) {
                alert('All Field is required');
                return false;
            }
        });
    });
</script>
</body>
</html>

