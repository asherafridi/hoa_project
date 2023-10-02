<!DOCTYPE html>
<!-- saved from url=(0038)https://template66387.motopreview.com/ -->
<html lang="en" data-ng-app="website">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style type="text/css">
        @charset "UTF-8";

        [ng\:cloak],
        [ng-cloak],
        [data-ng-cloak],
        [x-ng-cloak],
        .ng-cloak,
        .x-ng-cloak,
        .ng-hide:not(.ng-hide-animate) {
            display: none !important;
        }

        ng\:form {
            display: block;
        }

        .ng-animate-shim {
            visibility: hidden;
        }

        .ng-anchor {
            position: absolute;
        }
    </style>



    <title>Home - {{settings('website_name','Ashir')}}</title>
    <link rel="SHORTCUT ICON"
        href="https://template66387.motopreview.com/mt-demo/66300/66387/mt-content/uploads/2018/03/favicon-1359.ico?_build=1692954414"
        type="image/vnd.microsoft.icon">


    <link rel="canonical" href="https://template66387.motopreview.com/">
    <meta property="og:title" content="Home">
    <meta property="og:url" content="https://template66387.motopreview.com/">
    <meta property="og:type" content="website">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">




    <link rel="preload" as="font" type="font/woff2" crossorigin=""
        href="https://template66387.motopreview.com/mt-includes/fonts/fontawesome-webfont.woff2?v=4.7.0">
    <link rel="stylesheet" href="{{ asset('frontend/assets.min.css') }}">
    <style>
        @import url(//fonts.googleapis.com/css?family=Eczar:regular,500,600,700,800|Lato:100,100italic,300,300italic,regular,italic,700,700italic,900,900italic|Montserrat:200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic&subset=latin);
    </style>
    <link rel="stylesheet" href="{{ asset('frontend/styles.css') }}" id="moto-website-style">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.min.css" integrity="sha512-W/zrbCncQnky/EzL+/AYwTtosvrM+YG/V6piQLSe2HuKS6cmbw89kjYkp3tWFn1dkWV7L1ruvJyKbLz73Vlgfg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">








    <script src="chrome-extension://lghjfnfolmcikomdjmoiemllfnlmmoko/js/webScript.js"></script>
    <script src="./Home_files/moment.min.js.download"></script>
    <script src="./Home_files/detector.js.download"></script>
</head>

<body class="moto-background moto-website_live moto-browser_chrome" data-new-gr-c-s-check-loaded="14.1121.0"
    data-gr-ext-installed="" cnet-shopping-enabled="true" cz-shortcut-listen="true">






    <div class="page">
        @if (Route::current()->getName() == 'home')
            
        @include('frontend.basic.partials.header')
        @else
            
        @include('frontend.basic.partials.breadcrumb')
        @endif

        <section id="section-content" class="content page-1 moto-section" data-widget="section"
            data-container="section">
            @yield('content')
            
        </section>
    </div>
        @include('frontend.basic.partials.footer')


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script type="text/javascript" data-cfasync="false">
        var websiteConfig = websiteConfig || {};
        websiteConfig.address = 'https://template66387.motopreview.com/';
        websiteConfig.relativeAddress = '/';
        websiteConfig.addressHash = '6b98816cacf94c78109e1db93ec4c0da';
        websiteConfig.apiUrl = '/api.php';
        websiteConfig.preferredLocale = 'en_US';
        websiteConfig.preferredLanguage = websiteConfig.preferredLocale.substring(0, 2);
        websiteConfig.back_to_top_button = {
            "topOffset": 300,
            "animationTime": 500,
            "type": "theme"
        };
        websiteConfig.popup_preferences = {
            "loading_error_message": "The content could not be loaded."
        };
        websiteConfig.lazy_loading = {
            "enabled": true
        };
        websiteConfig.cookie_notification = {
            "enabled": false,
            "content": "<p class=\"moto-text_normal\">This website uses cookies to ensure you get the best experience on our website.<\/p>",
            "content_hash": "6610aef7f7138423e25ee33c75f23279",
            "controls": {
                "visible": "close,accept",
                "accept": {
                    "label": "Got it",
                    "preset": "default",
                    "size": "medium",
                    "cookie_lifetime": 365
                }
            }
        };
        if (window.websiteConfig.lazy_loading && !window.websiteConfig.lazy_loading.enabled) {
            window.lazySizesConfig = window.lazySizesConfig || {};
            window.lazySizesConfig.preloadAfterLoad = true;
        }
    </script>
    <script src="{{asset('frontend/assets.min.js')}}" type="text/javascript" data-cfasync="false"></script>
    <script type="text/javascript" data-cfasync="false">
        angular.module('website.plugins', []);
    </script>
    <script src="{{asset('frontend/website.min.js.download')}}" type="text/javascript" data-cfasync="false"></script>
    <script type="text/javascript">
        $.fn.motoGoogleMap.setApiKey('AIzaSyCPbz3W389x_owB2TlrqPuMEYCTFVuRvMY');
    </script>




</body>
</html>
