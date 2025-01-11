<!DOCTYPE html>
<html lang="en" class="dark scroll-smooth" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <title>DOOR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Real Estate Website Landing Page" name="description" />
    <meta content="Real Estate, buy, sell, Rent, tailwind Css" name="keywords" />
    <meta name="author" content="Shreethemes" />
    <meta name="website" content="https://shreethemes.in" />
    <meta name="email" content="support@shreethemes.in" />
    <meta name="version" content="2.2.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- CSS Files -->
    <link href="/assets/libs/tiny-slider/tiny-slider.css" rel="stylesheet">
    <link href="/assets/libs/tobii/css/tobii.min.css" rel="stylesheet">
    <link href="/assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet">
    <link href="/assets/libs/swiper/css/swiper.min.css" rel="stylesheet">
    <link href="/assets/libs/@iconscout/unicons/css/line.css" type="text/css" rel="stylesheet" />
    <link href="/assets/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" type="text/css">
    @vite('resources/css/app.css')
</head>
<body class="dark:bg-slate-900">

<!-- Navbar -->
<nav id="topnav" class="defaultscroll is-sticky">
    <div class="container relative">
        <!-- Logo -->
        <a class="logo" href="index.html">
            <span class="inline-block dark:hidden">
                 <img src="assets/images/logo-dark.png" class="l-dark" width="36px" height="36px" alt=""> 
                 <img src="assets/images/logo-light.png" class="l-light" width="36px"  height="36px" alt="">
            </span>
            <img src="assets/images/logo-light.png" width="36px" height="36px" class="hidden dark:inline-block" alt="">
        </a>

        <!-- Menu Extras -->
        <div class="menu-extras">
            <div class="menu-item">
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </div>
        </div>

        <!-- Buy Button -->
        <ul class="buy-button list-none mb-0">
           
            <li class="sm:inline ps-1 mb-0 hidden">
                <a href="/" 
                   class="btn bg-green-600 hover:bg-green-700 border-green-600 dark:border-green-600 text-white rounded-full">
                    Sotuv bo'limi
                </a>
            </li>

            <li class="sm:inline ps-1 mb-0 hidden">
                <a href="/home" 
                   class="btn bg-green-600 hover:bg-green-700 border-green-600 dark:border-green-600 text-white rounded-full">
                    Bosh sahifa
                </a>
            </li>
            {{-- <form method="POST" action="{{ route('logout') }}" style="display: inline-block;">
                @csrf
                <button type="submit" class="btn bg-green-600 hover:bg-green-700 border-green-600 dark:border-green-600 text-white rounded-full">
                    Logout
                </button>
            </form> --}}
        </ul>

        
     
        <div id="navigation">
            <ul class="navigation-menu justify-end nav-light">
                <li class="has-submenu parent-parent-menu-item"></li>
            </ul>
        </div>
    </div>
</nav>

</body>
</html>
