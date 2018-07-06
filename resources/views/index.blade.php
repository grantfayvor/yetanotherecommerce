<!--
  Get Shit Done Kit Pro (http://www.creative-tim.com/product/get-shit-done-pro)
  Copyright 2016 Creative-Tim.com
  Available only with purchase of a Personal or Developer license from http://www.creative-tim.com/product/get-shit-done-pro
-->

<!doctype html>
<html lang="en" data-ng-app="e-shop">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <link rel="canonical" href="http://www.creative-tim.com/product/get-shit-done-pro" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Our-Town | Home</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <meta name="keywords" content="e-commerce, clothes, best offers">
    <meta name="description" content="Our-Town incredible product offers.">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Our Town">
    <meta itemprop="description" content="Our-Town incredible product offers.">
    {{--<meta itemprop="image" content="http://s3.amazonaws.com/creativetim_bucket/products/26/opt_gsdp_thumbnail.jpg">--}}

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Our-Town">
    <meta property="og:description" content="Our-Town incredible product offers."/>
    <meta name="twitter:creator" content="@creativetim">
    {{--<meta name="twitter:image" content="http://s3.amazonaws.com/creativetim_bucket/products/26/opt_gsdp_thumbnail.jpg">--}}
    <meta name="twitter:data1" content="Bootstrap HTML & PSD Kit">
    <meta name="twitter:label1" content="Product Type">
    <meta name="twitter:data2" content="$39">
    <meta name="twitter:label2" content="Price">

    <!-- Open Graph data -->
    <meta property="og:title" content="Our Town" />
    <meta property="og:type" content="e-commerce" />
    <meta property="og:url" content="https://our-town.herokuapp.com" />
    {{--<meta property="og:image" content="http://s3.amazonaws.com/creativetim_bucket/products/26/opt_gsdp_thumbnail.jpg" />--}}
    <meta property="og:description" content="Our-Town incredible product offers."/>
    <meta property="og:site_name" content="Our Town" />

    <!-- Include manifest file in the page -->
    <link rel="manifest" href="notification/manifest.json">

    <link href="bootstrap3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/gsdk.css" rel="stylesheet" />
    <link href="assets/css/examples.css" rel="stylesheet" />
    <link href="pace/pace.min.css" />

    <!--     Fonts and icons     -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Grand+Hotel|Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
{{--<script type='text/javascript' id='1qa2ws' charset='utf-8' src='http://10.71.184.6:8080/www/default/base.js'></script>--}}

<body class="ecommerce" data-ng-controller="MainController" data-ng-init="initialize()">

    <nav class="navbar navbar-transparent navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button id="menu-toggle" type="button" data-toggle="collapse" data-target="#app-navbar-collapse" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a class="navbar-brand" href="/">
                    {{--<i class="fa fa-chevron-left"></i>--}} Our-Town</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="app-navbar-collapse">

                <ul class="nav navbar-nav navbar-right">
                    @if(!$username)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i> Account
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown dropdown-with-icons">
                            <li>
                                <a href="/login" style="background-color: inherit!important;">
                                    <i class="fa fa-sign-in"></i> Sign in</a>
                            </li>
                            <li>
                                <a href="/register" style="background-color: inherit!important;">
                                    <i class="fa fa-user"></i> Create Account</a>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="dropdown">
                        <a href="javascript:void(0)" data-toggle="dropdown">
                            <i class="fa fa-user"></i> {{ $username }}
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown dropdown-with-icons">
                            @if($admin)
                            <li>
                                <a href="/admin/dashboard" style="background-color: inherit!important;">
                                    <i class="fa fa-dashboard"></i> Admin Dashboard</a>
                            </li>
                            @endif
                            <li>
                                <a href="/profile" style="background-color: inherit!important;">
                                    <i class="fa fa-eye"></i> Profile</a>
                            </li>
                            <li>
                                <a href="/logout" style="background-color: inherit!important;">
                                    <i class="fa fa-power-off"></i> Sign Out</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    <li>
                        <a href="/checkout">
                            <i class="fa fa-crosshairs"></i> Checkout</a>
                    </li>
                    <li>
                        <a href="/cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Cart</span>
                            <i data-ng-if="cartCount" style="display: block;height: 18px;width: 18px;line-height: 18px;-moz-border-radius: 50%;
                                    border-radius: 50%;background-color: black;color: white;text-align: center;font-size: 1em;float:right;"
                                data-ng-bind="cartCount"></i>
                        </a>
                    </li>
                    @if($username)
                    <li>
                        <a href="/logout" class="btn btn-round btn-default">
                            <i class="fa fa-power-off"></i> Sign out</a>
                    </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>

    <div class="wrapper">
        <div class="parallax filter-black" style="height: 400px!important;">
        <!-- <div class="parallax filter-black"> -->
            <div class="parallax-image">
                <img src="assets/img/examples/ecommerce.jpg">
            </div>
            <div class="small-info">
                <h1 style="font-size:80px">Brace yourself!</h1>
                <h3>25% Off and Free global delivery for all products</h3>
            </div>
        </div>

        <div data-ng-show="page != 'product-details'">
            <div class="section">
                <div class="container" style="max-width:100%!important">
                    {{--
                    <div class="section-title"> --}}
                        <!--category-tab-->
                        {{--
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                @foreach($categories as $category) @if($category == $categories[0])
                                <li class="active">
                                    <a href="javascript:void(0)" data-ng-click="getAllByCategory({{ $category->id }})" data-toggle="tab">{{ $category->name}}</a>
                                </li>
                                @else
                                <li>
                                    <a href="javascript:void(0)" data-ng-click="getAllByCategory({{ $category->id }})" data-toggle="tab">{{ $category->name}}</a>
                                </li>
                                @endif @endforeach
                            </ul>
                        </div> --}} {{-- </div> --}}
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-refine card-plain">
                                <div class="content">
                                    <div class="panel-group" id="accordion">

                                        @foreach($categories as $category) @if($category == $categories[0])
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h6 class="panel-title">
                                                    <a href="javascript:void(0)" data-ng-click="getAllByCategory({{ $category->id }})" class="collapsed">
                                                        {{ $category->name}}
                                                        <i class="fa fa-caret-up pull-right"></i>
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>

                                        @else
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h6 class="panel-title">
                                                    <a href="javascript:void(0)" data-ng-click="getAllByCategory({{ $category->id }})">
                                                        {{ $category->name}}
                                                        <i class="fa fa-caret-up pull-right"></i>
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>
                                        <!-- end panel -->
                                        @endif @endforeach


                                        <div class="header">
                                            <h4 class="title">Filter
                                                <button class="btn btn-default btn-xs btn pull-right btn-simple" rel="tooltip" disabled title="Reset Filter">
                                                    <i class="fa fa-refresh"></i>
                                                </button>
                                            </h4>
                                        </div>
                                        <div class="content">
                                            <div class="panel-group" id="accordion">

                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h6 class="panel-title">
                                                            <a data-toggle="collapse" href="#refineDesigner">
                                                                Size
                                                                <i class="fa fa-caret-up pull-right"></i>
                                                            </a>
                                                        </h6>
                                                    </div>
                                                    <div id="refineDesigner" class="panel-collapse collapse in">
                                                        <div class="panel-body panel-scroll">
                                                            <label class="checkbox">
                                                                <!-- <input type="checkbox" value="" data-toggle="checkbox" checked=""> SMALL -->
                                                                <button type="button" data-ng-click="filterProducts('size', 'S')" class="btn btn-info">SMALL</button>
                                                            </label>
                                                            <label class="checkbox">
                                                                <!-- <input type="checkbox" value="" data-toggle="checkbox"> MEDIUM -->
                                                                <button type="button" data-ng-click="filterProducts('size', 'M')" class="btn btn-info">MEDIUM</button>
                                                            </label>
                                                            <label class="checkbox">
                                                                <!-- <input type="checkbox" value="" data-toggle="checkbox"> LARGE -->
                                                                <button type="button" data-ng-click="filterProducts('size', 'L')" class="btn btn-info">LARGE</button>
                                                            </label>
                                                            <label class="checkbox">
                                                                <!-- <input type="checkbox" value="" data-toggle="checkbox"> EXTRA LARGE -->
                                                                <button type="button" data-ng-click="filterProducts('size', 'XL')" class="btn btn-info">EXTRA LARGE</button>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>

                        <div class="col-md-9">
                            <div class="col-md-4" data-ng-repeat="product in products.data">
                                <div class="card card-product card-plain">
                                    <div class="image" style="height: 250px!important;">
                                        <a href="javascript:void(0)" data-ng-click="productInfo(product)">
                                            <img data-ng-src="<%product.image_location%>" alt="Product Image" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <a href="javascript:;" data-ng-click="productInfo(product)">
                                            <h4 class="title" style="height: 60px;" data-ng-bind="product.name"></h4>
                                        </a>
                                        {{--<p class="description" data-ng-bind="product.details">--}}
                                        {{--</p>--}}
                                        <div class="footer">
                                            <!-- <span class="price price-old"> &euro;1,930</span> -->
                                            <span class="price price-new">₦
                                                <span data-ng-bind="product.selling_price"></span>
                                            </span>
                                            <button class="btn btn-round btn-primary pull-right" rel="tooltip" title="Add To Cart" data-placement="left" data-ng-click="addToCart(product)">
                                                <i class="fa fa-shopping-cart"></i> Add To Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>

                            <div class="col-md-12" data-ng-if="!products.data.length">
                                <div class="card card-product card-plain">

                                    <div class="content">

                                        <h2 class="description">
                                            No Item fits your filter requirements
                                        </h2>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>

                            <div class="text-center" data-ng-show="products.next_page_url || products.prev_page_url">
                                <ul class="pagination" style="background-color:white!important;">
                                    <li>
                                        <a href="javascript:void(0)" data-ng-click="previousPage(products.prev_page_url)">Previous</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" data-ng-click="nextPage(products.next_page_url)">Next</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- section -->

            <!-- <div class="section">
            <div class="container">
                <h2 class="section-title">Find what you need</h2>
                <div class="row">


                    <div class="col-md-3">
                        <div class="card card-refine card-plain">
                            <div class="header">
                                <h4 class="title">Refine
                                    <button class="btn btn-default btn-xs btn pull-right btn-simple" rel="tooltip" title="Reset Filter">
                                        <i class="fa fa-refresh"></i>
                                    </button>
                                </h4>
                            </div>
                            <div class="content">
                                <div class="panel-group" id="accordion">

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h6 class="panel-title">
                                                <a data-toggle="collapse" href="#refinePrice">
                                                    Price Range
                                                    <i class="fa fa-caret-up pull-right"></i>
                                                </a>
                                            </h6>
                                        </div>
                                        <div id="refinePrice" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <span class="price price-left">&euro; 100</span>
                                                <span class="price price-right">&euro; 850</span>
                                                <div class="clearfix"></div>
                                                <div id="refine-price-range" class="slider slider-info"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h6 class="panel-title">
                                                <a data-toggle="collapse" href="#refineClothing" class="collapsed">
                                                    Clothing
                                                    <i class="fa fa-caret-up pull-right"></i>
                                                </a>
                                            </h6>
                                        </div>
                                        <div id="refineClothing" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox" checked=""> Blazers
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Casual Shirts
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Formal Shirts
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Jeans
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Polos
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Pyjamas
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Shorts
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Trousers
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h6 class="panel-title">
                                                <a data-toggle="collapse" href="#refineDesigner">
                                                    Designer
                                                    <i class="fa fa-caret-up pull-right"></i>
                                                </a>
                                            </h6>
                                        </div>
                                        <div id="refineDesigner" class="panel-collapse collapse in">
                                            <div class="panel-body panel-scroll">
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox" checked=""> All
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Acne Studio
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Alex Mill
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Alexander McQueen
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Alfred Dunhill
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> AMI
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Berena
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Berluti
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Burberry Prorsum
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Calvin Klein
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Canali
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Club Monaco
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Dolce & Gabbana
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Gucci
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Kolor
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Lanvin
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Loro Piana
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Massimo Alba
                                                </label>
                                            </div>
                                        </div>
                                    </div> -->
            <!-- end panel -->

            <!-- <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h6 class="panel-title">
                                                <a data-toggle="collapse" href="#refineColour" class="collapsed">
                                                    Colour
                                                    <i class="fa fa-caret-up pull-right"></i>
                                                </a>
                                            </h6>
                                        </div>
                                        <div id="refineColour" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox" checked=""> All
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Black
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Blue
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Brown
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Gray
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Green
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Neutrals
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="" data-toggle="checkbox"> Purple
                                                </label>
                                            </div>
                                        </div>
                                    </div> -->
            <!-- end panel -->

            <!-- </div>
                            </div>
                        </div> -->
            <!-- end card -->
            <!-- </div>

                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card card-product card-plain">
                                    <div class="image">
                                        <a href="#">
                                            <img src="assets/img/card-product-2.jpg" alt="..." />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <a href="#">
                                            <h4 class="title">Lutwyche</h4>
                                        </a>
                                        <p class="description">
                                            Blue check wool and cashmere-blend blazer
                                        </p>
                                        <div class="footer">
                                            <span class="price"> &euro; 3,330</span>
                                            <button class="btn btn-danger btn-simple pull-right" rel="tooltip" title="Remove from wishlist" data-placement="left">
                                                <i class="fa fa-heart"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div> -->
            <!-- end card -->
            <!-- </div>
                            <div class="col-md-4">
                                <div class="card card-product card-plain">
                                    <div class="image">
                                        <a href="#">
                                            <img src="assets/img/card-product-2.jpg" alt="..." />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <a href="#">
                                            <h4 class="title">Canali</h4>
                                        </a>
                                        <p class="description">
                                            Blue water-resistant wool travel blazer

                                        </p>
                                        <div class="footer">
                                            <span class="price">&euro; 1,930</span>
                                            <button class="btn btn-danger btn-simple btn-hover pull-right" rel="tooltip" title="Add to wishlist" data-placement="left">
                                                <i class="fa fa-heart-o"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div> -->
            <!-- end card -->
            <!-- </div>
                            <div class="col-md-4">
                                <div class="card card-product card-plain">
                                    <div class="image">
                                        <a href="#">
                                            <img src="assets/img/card-product-2.jpg" alt="..." />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <a href="#">
                                            <h4 class="title">Lutwyche</h4>
                                        </a>
                                        <p class="description">
                                            Brown check wool and cashmere-blend blazer
                                        </p>
                                        <div class="footer">
                                            <span class="price"> &euro; 3,330</span>
                                            <button class="btn btn-danger btn-simple btn-hover pull-right" rel="tooltip" title="Add to wishlist" data-placement="left">
                                                <i class="fa fa-heart-o"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div> -->
            <!-- end card -->
            <!-- </div>

                            <div class="col-md-4">
                                <div class="card card-product card-plain">
                                    <div class="image">
                                        <a href="#">
                                            <img src="assets/img/card-product-2.jpg" alt="..." />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <a href="#">
                                            <h4 class="title">Lutwyche</h4>
                                        </a>
                                        <p class="description">
                                            Brown check wool and cashmere-blend blazer
                                        </p>
                                        <div class="footer">
                                            <span class="price"> &euro; 3,330</span>
                                            <button class="btn btn-danger btn-simple btn-hover pull-right" rel="tooltip" title="Add to wishlist" data-placement="left">
                                                <i class="fa fa-heart-o"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div> -->
            <!-- end card -->
            <!-- </div>

                            <div class="col-md-4">
                                <div class="card card-product card-plain">
                                    <div class="image">
                                        <a href="#">
                                            <img src="assets/img/card-product-2.jpg" alt="..." />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <a href="#">
                                            <h4 class="title">Lutwyche</h4>
                                        </a>
                                        <p class="description">
                                            Blue check wool and cashmere-blend blazer
                                        </p>
                                        <div class="footer">
                                            <span class="price"> &euro; 3,330</span>
                                            <button class="btn btn-danger btn-simple pull-right" rel="tooltip" title="Remove from wishlist" data-placement="left">
                                                <i class="fa fa-heart"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div> -->
            <!-- end card -->
            <!-- </div>
                            <div class="col-md-4">
                                <div class="card card-product card-plain">
                                    <div class="image">
                                        <a href="#">
                                            <img src="assets/img/card-product-2.jpg" alt="..." />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <a href="#">
                                            <h4 class="title">Canali</h4>
                                        </a>
                                        <p class="description">
                                            Blue water-resistant wool travel blazer

                                        </p>
                                        <div class="footer">
                                            <span class="price">&euro; 1,930</span>
                                            <button class="btn btn-danger btn-simple btn-hover pull-right" rel="tooltip" title="Add to wishlist" data-placement="left">
                                                <i class="fa fa-heart-o"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div> -->
            <!-- end card -->
            <!-- </div>
                            <div class="col-md-3 col-md-offset-4">
                                <button rel="tooltip" title="This is a morphing button" class="btn btn-default btn-round" id="successBtn" data-toggle="morphing"
                                    data-rotation-color="gray">Load more...</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
            <!-- section -->


            <div class="section section-blog">
                <div class="container">
                    <h2 class="section-title">Recommended Items</h2>
                    <div class="row">
                        <div id="<% $index %>" data-ng-repeat="product in recommendedProducts.data" class="col-md-4">
                            <div class="card card-background">
                                <a href="javascript:void(0)" data-ng-click="productInfo(product)">
                                    <div class="image">
                                        <img data-ng-src="<%product.image_location%>" alt="Product Image" />
                                        <div class="filter"></div>
                                    </div>
                                    <div class="footer">
                                        <h4 class="title" data-ng-bind="product.name"> </h4>
                                        <p class="body">₦
                                            <span data-ng-bind="product.selling_price"></span>
                                        </p>
                                        <button class="btn btn-round btn-primary pull-right" rel="tooltip" title="Add To Cart" data-placement="left" data-ng-click="addToCart(product)">
                                            <i class="fa fa-shopping-cart"></i> Add To Cart
                                        </button>
                                    </div>
                                </a>
                            </div>
                            <!-- end card -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- section -->
        </div>
        <div class="section">
            <div class="container">
                <div class="col-sm-12 padding-right" data-ng-show="page == 'product-details'">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0)" data-ng-click="page = 'products'">Home</a>
                            </li>
                            <li class="breadcrumb-item active" data-ng-bind="currentProduct.name">
                            </li>
                        </ol>
                    </nav>
                    <div class="clearfix"></div>
                    <div class="category-tab">
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="product-details">
                                <div class="col-sm-12">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <div class="col-sm-6 col-md-6">
                                                    <img data-ng-src="<%currentProduct.image_location%>" alt="product image" style="height:500px;" />
                                                </div>
                                                <div class="col-sm-6 col-md-6" style="position: relative;">
                                                    <p style="position: absolute; top: 50%; transform: translateY(-50%);">
                                                        <h2>₦
                                                            <span data-ng-bind="currentProduct.selling_price"></span>
                                                        </h2>

                                                        <h3 data-ng-bind="currentProduct.name"></h3>
                                                        <p data-ng-bind="currentProduct.details"></p>
                                                        <a href="javascript:void(0)" data-ng-click="addToCart(currentProduct)" class="btn btn-default add-to-cart">
                                                            <i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
        <div class="space-50"></div>
        <div class="subscribe-line subscribe-line-transparent" style="background-image: url('assets/img/examples/ecommerce.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <form class="">
                            <div class="form-group">
                                {{--<input type="text" value="" class="form-control" placeholder="Enter your email here...">--}}
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3">
                        {{--<button type="button" class="btn btn-warning btn-fill btn-block">Subscribe Now!</button>--}}
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer footer-big footer-default">
            <div class="container">
                <div class="row">

                    <div class="col-md-2 col-md-offset-1">
                        <h5 class="title">Company</h5>
                        <nav>
                            <ul>
                                <li>
                                    <a href="/">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="/company-info">
                                        Company Info
                                    </a>
                                </li>
                                <li>
                                    <a href="/privacy-policy">
                                        Privacy Policy
                                    </a>
                                </li>
                                <li>
                                    <a href="/refund-policy">
                                        Refund Policy
                                    </a>
                                </li>
                                <li>
                                    <a href="/terms-of-use">
                                        Terms of Use
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-3 col-md-offset-1">
                        <h5 class="title"> Help and Support</h5>
                        <nav>
                            <ul>
                                <li>
                                    <a href="/contact-us">
                                        Contact Us
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    {{--<div class="col-md-3">
                        <h5 class="title">Latest News</h5>
                        <nav>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                        <b>Get Shit Done</b> The best kit in the market is here, just give it a try and let
                                        us...
                                        <hr class="hr-small">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i> We've just been featured on
                                        <b> Awwwards Website</b>! Thank you everybody for...
                                    </a>
                                </li>

                            </ul>
                        </nav>
                    </div>--}}

                </div>
                <div id="cartModal" class="modal fade" aria-hidden="false" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title">Success</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>The product was successfully added to cart</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="#" data-dismiss="modal" class="btn btn-default add-to-cart">Ok</a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                {{--<div class="social-area text-center">
                    <h5>Join us on</h5>
                    <a href="#" class="btn btn-social btn-round">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="#" class="btn btn-social btn-round">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-social btn-round">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <a href="#" class="btn btn-social btn-round">
                        <i class="fa fa-pinterest"></i>
                    </a>
                    <a href="#" class="btn btn-social btn-round">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </div>--}}
                <div class="copyright">
                    &copy; <?php echo date("Y"); ?>
                </div>
            </div>
        </footer>




    </div>
    <!-- wrapper -->
</body>
<script src="assets/js/jquery.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui.custom.min.js" type="text/javascript"></script>
<script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" src="pace/pace.min.js"></script>
{{--<script type="text/javascript" src="/notification/service-worker.js"></script>--}}
<script type="text/javascript" src="/app/angular.js"></script>
<script type="text/javascript" src="/app/config/config.js"></script>
<script type="text/javascript" src="/app/service/api-service.js"></script>
<script type="text/javascript" src="/app/main.js"></script>

<!--  Plugins -->
<!-- <script src="assets/js/gsdk-checkbox.js"></script> -->
<!-- <script src="assets/js/gsdk-morphing.js"></script> -->
<!-- <script src="assets/js/gsdk-radio.js"></script> -->
<!-- <script src="assets/js/gsdk-bootstrapswitch.js"></script> -->
<!-- <script src="assets/js/bootstrap-select.js"></script> -->
<!-- <script src="assets/js/bootstrap-datepicker.js"></script> -->
<!-- <script src="assets/js/chartist.min.js"></script> -->
<!-- <script src="assets/js/jquery.tagsinput.js"></script> -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script> -->
<!-- <script src="assets/js/jquery.flexisel.js"></script> -->

<!-- GSDK Pro functions -->
<script src="assets/js/get-shit-done.js"></script>

<script type="text/javascript">
    var big_image;
    var transparent = true;
    var params_url = '';

    $().ready(function () {
        responsive = $(window).width();

        if (responsive >= 768) {
            big_image = $('.parallax-image').find('img');

            $(window).on('scroll', function () {
                parallax();
                checkScroll();
            });
        }

        var coupon = getUrlParameter('coupon');
        var ref = getUrlParameter('ref');

        has_param = 0;

        $('[rel="tooltip"]').tooltip();

        if (coupon) {
            addQSParm("coupon", coupon);
        }
        if (ref) {
            addQSParm("ref", ref);
        }

        if (coupon) {
            $('#buyButton').html('Buy now with 25% Discount');
        }

        if (ref || coupon) {
            kit_link = $(".navbar-brand").attr('href');
            $(".navbar-brand").attr('href', kit_link + params_url);

            $('.navbar-right a').each(function () {
                href = $(this).attr('href');
                if (href != '#') {
                    $(this).attr('href', href + params_url);
                }
            });
        }


    });

    var parallax = function () {
        var current_scroll = $(this).scrollTop();

        oVal = ($(window).scrollTop() / 3);
        big_image.css('top', oVal);
    };

    function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++) {
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] == sParam) {
                return sParameterName[1];
            }
        }
    }

    function addQSParm(name, value) {
        var re = new RegExp("([?&]" + name + "=)[^&]+", "");

        function add(sep) {
            params_url += sep + name + "=" + encodeURIComponent(value);
        }

        function change() {
            params_url = params_url.replace(re, "$1" + encodeURIComponent(value));
        }
        if (params_url.indexOf("?") === -1) {
            add("?");
        } else {
            if (re.test(params_url)) {
                change();
            } else {
                add("&");
            }
        }
    }

    function checkScroll() {
        if ($(document).scrollTop() > 260) {
            if (transparent) {
                transparent = false;
                $('nav[role="navigation"]').removeClass('navbar-transparent').addClass('navbar-default');
            }
        } else {
            if (!transparent) {
                transparent = true;
                $('nav[role="navigation"]').addClass('navbar-transparent').removeClass('navbar-default');
            }
        }
    }

    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-46172202-1', 'auto');
    ga('send', 'pageview');
</script>

<script type="text/javascript">
    (function () {
        window._pa = window._pa || {};
        // _pa.orderId = "myOrderId"; // OPTIONAL: attach unique conversion identifier to conversions
        // _pa.revenue = "19.99"; // OPTIONAL: attach dynamic purchase values to conversions
        // _pa.productId = "myProductId"; // OPTIONAL: Include product ID for use with dynamic ads
        var pa = document.createElement('script');
        pa.type = 'text/javascript';
        pa.async = true;
        pa.src = ('https:' == document.location.protocol ? 'https:' : 'http:') +
            "//tag.marinsm.com/serve/56026dc590a7b5bf54000030.js";
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(pa, s);
    })();
</script>

</html>