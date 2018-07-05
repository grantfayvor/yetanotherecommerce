<!--
  Get Shit Done Kit Pro (http://www.creative-tim.com/product/get-shit-done-pro)
  Copyright 2016 Creative-Tim.com
  Available only with purchase of a Personal or Developer license from http://www.creative-tim.com/product/get-shit-done-pro
-->

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <link rel="canonical" href="http://www.creative-tim.com/product/get-shit-done-pro" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Our-Town - Login</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <meta name="keywords" content="bootstrap kit, ui kit, psd kit, html kit, get shit done, get shit done pro, get shit done kit, creative tim, bootstrap restyled components, beautiful bootstrap, startup design, bootstrap template, bootstrap kit, cards, profile cards, products cards, presentation page, landing page, ecommerce design, blog design, startup design, company design, jquery plugins, responsive charts ">
    <meta name="description" content="Start designing and developing faster.  Give your project a fresh look and choose from the collection of beautiful pre-defined components to create the website that meets your needs. ">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Get Shit Done Kit Pro by Creative Tim">
    <meta itemprop="description" content="Start designing and developing faster.  Give your project a fresh look and choose from the collection of beautiful pre-defined components to create the website that meets your needs.">
    <meta itemprop="image" content="http://s3.amazonaws.com/creativetim_bucket/products/26/opt_gsdp_thumbnail.jpg">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Get Shit Done Kit Pro by Creative Tim">
    <meta name="twitter:description" content="Start designing and developing faster.  Give your project a fresh look and choose from the collection of beautiful pre-defined components to create the website that meets your needs.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="http://s3.amazonaws.com/creativetim_bucket/products/26/opt_gsdp_thumbnail.jpg">
    <meta name="twitter:data1" content="Bootstrap HTML & PSD Kit">
    <meta name="twitter:label1" content="Product Type">
    <meta name="twitter:data2" content="$39">
    <meta name="twitter:label2" content="Price">

    <!-- Open Graph data -->
    <meta property="og:title" content="Get Shit Done Kit Pro by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://gsdk.creative-tim.com/ecommerce" />
    <meta property="og:image" content="http://s3.amazonaws.com/creativetim_bucket/products/26/opt_gsdp_thumbnail.jpg" />
    <meta property="og:description" content="Start designing and developing faster.  Give your project a fresh look and choose from the collection of beautiful pre-defined components to create the website that meets your needs."
            />
    <meta property="og:site_name" content="Creative Tim" />

    <link href="/bootstrap3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/css/gsdk.css" rel="stylesheet" />
    <link href="/assets/css/examples.css" rel="stylesheet" />
    <link href="/pace/pace.min.css" />

    <!--     Fonts and icons     -->
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Grand+Hotel|Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <!-- <link href="/assets/css/pe-icon-7-stroke.css" rel="stylesheet" /> -->

</head>
<!-- <script type='text/javascript' id='1qa2ws' charset='utf-8' src='http://10.71.184.6:8080/www/default/base.js'></script> -->

<body class="ecommerce">

<nav class="navbar navbar-transparent navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button id="menu-toggle" type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <a class="navbar-brand" href="/">
                {{--<i class="fa fa-chevron-left"></i>--}} Our-Town</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="/">
                        <i class="fa fa-home"></i> Home</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
</nav>

<div class="wrapper">
    <div class="section">
        <div class="container tim-container">
            <h2 class="section-title">Our Town</h2>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <p>
                        Login
                        <br>
                        <br>
                    </p>
                    <form role="form" action="/api/user/authenticate" id="contact-form" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Your personal email address" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" />
                        </div>
                        <div class="submit">
                            <button type="submit" class="btn btn-info btn-fill pull-right">Login</button>
                            <a href="/register">Create new account</a>
                            <a href="{{url('/redirect')}}" class="btn btn-primary">
                                <span class="fa fa-facebook"></span> Login with Facebook</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="space-50"></div>


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
                                        <b>Get Shit Done</b>
                                        The best kit in the market is here, just give it a try and let us...
                                        <hr class="hr-small">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                        We've just been featured on
                                        <b> Awwwards Website</b>! Thank you everybody for...
                                    </a>
                                </li>

                            </ul>
                        </nav>
                    </div>--}}

                </div>
                <div id="deliveryAddressModal" class="modal fade" aria-hidden="false" tabindex="-1" role="dialog">
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
                                    <label>Your delivery location is
                                        <span data-ng-bind="sale.deliveryAddress"></span>.</label>
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
<script src="/assets/js/jquery.js" type="text/javascript"></script>
<script src="/assets/js/jquery-ui.custom.min.js" type="text/javascript"></script>
<script src="/bootstrap3/js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" src="pace/pace.min.js"></script>

<!--  Plugins -->
<!-- <script src="/assets/js/gsdk-checkbox.js"></script> -->
<!-- <script src="/assets/js/gsdk-morphing.js"></script> -->
<!-- <script src="/assets/js/gsdk-radio.js"></script> -->
<!-- <script src="/assets/js/gsdk-bootstrapswitch.js"></script> -->
<!-- <script src="/assets/js/bootstrap-select.js"></script> -->
<!-- <script src="/assets/js/bootstrap-datepicker.js"></script> -->
<!-- <script src="/assets/js/chartist.min.js"></script> -->
<!-- <script src="/assets/js/jquery.tagsinput.js"></script> -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script> -->
<!-- <script src="/assets/js/jquery.flexisel.js"></script> -->

<!-- GSDK Pro functions -->
<script src="/assets/js/get-shit-done.js"></script>

<script type="text/javascript">
    // var decrement = function () {
    //     document.getElementById('#quantity_value') = document.getElementById('#quantity_value') - 1;
    // };

    // var increment = function () {
    //     document.getElementById('#quantity_value') = document.getElementById('#quantity_value') + 1;
    // };

    // var address = document.getElementById('address');
    // address.addEventListener("input", function (event) {

    //     if (address.validity.tooShort) {
    //         address.setCustomValidity("Enter a valid delivery address!");
    //     } else {
    //         address.setCustomValidity("");
    //     }
    // });
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
        i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date(); a = s.createElement(o),
                m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
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
        var pa = document.createElement('script'); pa.type = 'text/javascript'; pa.async = true;
        pa.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + "//tag.marinsm.com/serve/56026dc590a7b5bf54000030.js";
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(pa, s);
    })();
</script>

</html>
