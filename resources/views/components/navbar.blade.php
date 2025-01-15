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
        <br>
        <a class="logo" href="index.html">
            
            <span class="inline-block dark:hidden">
                 <img src="assets/images/logo-dark.png" class="l-dark" height="40px" width="40px"  alt=""> 
                 <img src="assets/images/logo-light.png" class="l-light" height="40px" width="40px"  alt="">
            </span>
            <img src="assets/images/logo-light.png" height="40px" width="40px" class="hidden dark:inline-block" alt="">
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
          
          
        <ul class="buy-button list-none mb-0 flex flex-wrap space-x-4 justify-center">
            <li class="sm:block ps-1 mb-4 w-auto"> <!-- margin-bottom qo'shildi -->
                <a href="/" 
                   class="btn bg-green-600 hover:bg-green-700 border-green-600 dark:border-green-600 text-white rounded-full px-6 py-3">
                    Sotuv bo'limi
                </a>
            </li>
        
            <li class="sm:block ps-1 mb-4 w-auto"> <!-- margin-bottom qo'shildi -->
                <a href="/home" 
                   class="btn bg-green-600 hover:bg-green-700 border-green-600 dark:border-green-600 text-white rounded-full px-6 py-3">
                    Bosh sahifa
                </a>
            </li>
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
