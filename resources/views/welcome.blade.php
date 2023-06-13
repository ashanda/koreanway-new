<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Koreanway</title>
    <meta name="keywords" content="Koreanway">
    <meta name="description" content="Koreanway">
    <link rel="stylesheet" href="{{ asset('inc/css/slick.css') }}" />
    <link rel="stylesheet" href="{{ asset('inc/css/slick-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('inc/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('inc/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('inc/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('inc/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('inc/css/hover.css') }}">
    <link rel="stylesheet" href="{{ asset('inc/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('inc/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('inc/css/lightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('inc/css/slider.css') }}">
    <link rel="stylesheet" href="{{ asset('inc/css/stylesheet.css') }}">

    <link href="{{ asset('inc/images/favicon.ico') }}" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
    <!-- end css -->

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kavoon&family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>

    <!-- Preloader -->
    <section>
        <div id="preloader">
            <div id="ctn-preloader" class="ctn-preloader">
                <div class="animation-preloader">
                    <div class="spinner"></div>
                    <div class="txt-loading">
                        <span data-text-preloader="L" class="letters-loading">
                            L
                        </span>
                        <span data-text-preloader="O" class="letters-loading">
                            O
                        </span>
                        <span data-text-preloader="A" class="letters-loading">
                            A
                        </span>
                        <span data-text-preloader="D" class="letters-loading">
                            D
                        </span>
                        <span data-text-preloader="I" class="letters-loading">
                            I
                        </span>
                        <span data-text-preloader="N" class="letters-loading">
                            N
                        </span>
                        <span data-text-preloader="G" class="letters-loading">
                            G
                        </span>


                        <span data-text-preloader="." class="letters-loading">
                            .
                        </span>
                        <span data-text-preloader="." class="letters-loading">
                            .
                        </span>
                        <span data-text-preloader="." class="letters-loading">
                            .
                        </span>

                    </div>
                </div>
                <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>
            </div>
        </div>
    </section>
    <div class="container-fluid header-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-3 col-md-3 header-logo ">
                    <!--<a href="" title="Koreanway | Home "> <img src="{{ asset('inc/images/logo.png') }}" class="img-responsive" alt="Koreanway"></a>-->
                </div>
                <div class="col-xs-12 col-sm-9 col-md-9 header-right">
                    <nav class="navbar navbar-inverse">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <!--<a class="navbar-brand visible-xs">Menu</a>-->
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav">

                                <li class="active"><a href="/">Home</a></li>
                                <!-- <li><a href="#">About Us </a></li>
                                <li><a href="#">Contact Us </a></li> -->
                                <li><a href="{{ url('login') }}">LOGIN</a></li>
                                <li><a href="{{ url('register') }}">REGISTER</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- slider-wrapper -->
    <div class="container-fluid slider-wrapper">
        <div class="row">
            <div id="carousel-example-generic" class="carousel slide carousel-fade " data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="{{ asset('inc/images/korea8.jpg') }}" class="img-responsive" alt="Koreanway">
                        <h2 class="main-title">KOREANWAY</h2>
                        <p class="sub-title">The best way to learn korean</p>
                        <div class="wrap">
                            <button class="button">LEARN MORE</button>
                        </div>
                    </div>
                    <div class="item ">
                        <img src="{{ asset('inc/images/eople-write-hang-ema-wood-tag-wooden-label-praying-good-luck-happy-other-sanya-china_126267-4564.jpg') }}" class="img-responsive" alt="Koreanway">
                        <div class="main">
                            <h2 class="main-title">KOREANWAY</h2>
                            <p class="sub-title">The best way to learn korean</p>
                            <div class="wrap">
                                <button class="button">LEARN MORE</button>
                            </div>

                        </div>
                    </div>
                    <div class="item ">
                        <img src="{{ asset('inc/images/korea3.jpg') }}" class="img-responsive" alt="Koreanway">
                        <div class="main">
                            <h2 class="main-title">KOREANWAY</h2>
                            <p class="sub-title">The best way to learn korean</p>
                            <div class="wrap">
                                <button class="button">LEARN MORE</button>
                            </div>
                        </div>
                    </div>
                    <div class="item ">
                        <img src="{{ asset('inc/images/side-view-hands-holding-wooden-plate_23-2149406819.jpg') }}" class="img-responsive" alt="Koreanway">
                        <div class="main">
                            <h2 class="main-title">KOREANWAY</h2>
                            <p class="sub-title">The best way to learn korean</p>
                            <div class="wrap">
                                <button class="button">Submit</button>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- section-wrapper -->

    <div class="container-fluid owl-caro1">
        <div class="text-center owl-caro-titile">
            <div class="line3"></div>
            <p>Welcome to Korean Way</p>
            <h6>Let's learn korean</h6>
        </div>

        <div class="owl-carousel owl-theme">
            <div class="item">
                <h4><img src="{{ asset('inc/images/20211231_194526-scaled.jpg') }}" alt="image" /></h4>
            </div>
            <div class="item">
                <h4><img src="{{ asset('inc/images/20211231_202721.jpg') }}" alt="image" /></h4>
            </div>
            <div class="item">
                <h4><img src="{{ asset('inc/images/20211231_203041-scaled.jpg') }}" alt="image" /></h4>
            </div>
            <div class="item">
                <h4><img src="{{ asset('inc/images/20211231_203858-scaled.jpg') }}" alt="image" /></h4>
            </div>
        </div>
    </div>

    <div class="container course-details">
        <div class="text-center course-title">
            <div class="line4"></div>
            <p>Our Course Details</p>
            <h6>Find online courses and a wide range of related learning content.</h6>
        </div>
        <div class="course">
            <div class="card">
                <div class="imgBx">
                    <img src="{{ asset('inc/images/don-3565703_1280-2-300x200 (1).jpg') }}" alt="" class="w-100">
                </div>
                <div class="content">
                    <h3 class="price">$20</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half"></i>
                    </div>
                    <a href="#" class="title">Learn front end development</a>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius esse voluptates nostrum, distinctio nam
                        sunt. Ad consequatur sequi debitis corporis, quo fuga animi numquam officiis eius, aperiam
                        voluptatibus eligendi saepe!</p>
                    <div class="info">
                        <h3><i class="far fa-clock"></i>2 hours</h3>
                        <h3><i class="far fa-calendar-alt"></i>6 months</h3>
                        <h3><i class="fas fa-book"></i>12 modules</h3>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="imgBx">
                    <img src="{{ asset('inc/images/IMG_20220105_115022-1-300x276.jpg') }}" alt="" class="w-100">
                </div>
                <div class="content">
                    <h3 class="price">$20</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half"></i>
                    </div>
                    <a href="#" class="title">Learn front end development</a>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius esse voluptates nostrum, distinctio nam
                        sunt. Ad consequatur sequi debitis corporis, quo fuga animi numquam officiis eius, aperiam
                        voluptatibus eligendi saepe!</p>
                    <div class="info">
                        <h3><i class="far fa-clock"></i>2 hours</h3>
                        <h3><i class="far fa-calendar-alt"></i>6 months</h3>
                        <h3><i class="fas fa-book"></i>12 modules</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="container-fluid staf-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 staf-top ">
                    <h2>කඩයිම් ජයගන්න විශේෂ පාඩම් මාලාවන්
                    </h2>
                    <p>එක් වන්න අප You Tube චැනලය හරහා. පාඩම් මතක තියාගන්න සුවිශේෂී ක්‍රමවේදයන් හා සුවිශේෂී පාඩම් රැසක්.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- teacher-wrapper -->
    <div class="container-fluid teacher-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12 teacher-top">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/moHXIm1CXe4"></iframe>
                    </div>
                </div>

                <div class="col-md-6 col-xs-12">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/yx8gz69-kTA"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid details-wrapper">
        <div class="row">
            <div class="col-xs-12 col-md-4 col-sm-4 details-box ">
                <ul>
                    <li> <i class="fas fa-phone ico-nw"></i></li>
                    <li>
                        කතා කරන්න අපිට <br>
                        <a title="Click to Call" class="hvr-forward" href="tel:0714010667">077 30 42 124</a>
                    </li>
                </ul>
            </div>
            <div class="col-xs-12 col-md-4 col-sm-4 details-box2 ">
                <ul>
                    <li><i class="fas fa-map ico-nw"></i></li>
                    <li>
                        සියලු ගෙවීම් හා තාක්ෂණික සහය<br>
                        <a title="Click to Call" class="hvr-forward" href="tel:0714010667">077 30 42 124</a>
                    </li>
                </ul>
            </div>
            <div class="col-xs-12 col-md-4 col-sm-4 details-box1 ">
                <ul>
                    <li> <i class="fas fa-envelope  ico-nw"></i></li>
                    <li>ඔබේ ගැටලුව අපටයොමු කරන්න<br>
                        <a title="Click to mail" class="hvr-forward" href="mailto: info@deshanpathinayake.lk">info@koreanway.lk</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <section class="join-us">
        <div class="container-fluid join">
            <div class="back-join" style='background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("{{ asset("inc/images/beautiful-architecture-building-n-seoul-tower_74190-3163.jpg") }}");'>
                <div class="join-us heading">
                    <h2>ඔබ මේ පාඨමාලාවම තෝරා ගත යුත්තේ ඇයි?</h2>
                    <p>The top reasons for you to join us</p>
                </div>
                <div class="sub-content">
                    <div class="row">
                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="content-icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="content-content">
                                <h3>ඔබට පහසු අයුරින් සැලසුම් කරගත හැකි පන්ති කාල සටහන්</h3>
                                <p>ඔබට පහසු අයුරින් සැලසුම් කරගත හැකි පන්ති කාල සටහන්මෙම පාඨමාලාවට ලෝකයේ ඕනෑම තැනක සිට වෙනත්
                                    ‍රැකියාවක නිරත වෙමින් හෝ තවත් අධ්‍යාපන කටයුතු හදාරන අතරතුර වුවද කිසිදු ගැටළුවකින් තොරව සතියේ
                                    ඕනෑම දිනක ඕනෑම වේලාවක සහභාගී විය හැකියි</p>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="content-icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="content-content">
                                <h3>ඔබට පහසු අයුරින් සැලසුම් කරගත හැකි පන්ති කාල සටහන්</h3>
                                <p>ඔබට පහසු අයුරින් සැලසුම් කරගත හැකි පන්ති කාල සටහන්මෙම පාඨමාලාවට ලෝකයේ ඕනෑම තැනක සිට වෙනත්
                                    ‍රැකියාවක නිරත වෙමින් හෝ තවත් අධ්‍යාපන කටයුතු හදාරන අතරතුර වුවද කිසිදු ගැටළුවකින් තොරව සතියේ
                                    ඕනෑම දිනක ඕනෑම වේලාවක සහභාගී විය හැකියි</p>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="content-icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="content-content">
                                <h3>ඔබට පහසු අයුරින් සැලසුම් කරගත හැකි පන්ති කාල සටහන්</h3>
                                <p>ඔබට පහසු අයුරින් සැලසුම් කරගත හැකි පන්ති කාල සටහන්මෙම පාඨමාලාවට ලෝකයේ ඕනෑම තැනක සිට වෙනත්
                                    ‍රැකියාවක නිරත වෙමින් හෝ තවත් අධ්‍යාපන කටයුතු හදාරන අතරතුර වුවද කිසිදු ගැටළුවකින් තොරව සතියේ
                                    ඕනෑම දිනක ඕනෑම වේලාවක සහභාගී විය හැකියි</p>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="content-icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="content-content">
                                <h3>ඔබට පහසු අයුරින් සැලසුම් කරගත හැකි පන්ති කාල සටහන්</h3>
                                <p>ඔබට පහසු අයුරින් සැලසුම් කරගත හැකි පන්ති කාල සටහන්මෙම පාඨමාලාවට ලෝකයේ ඕනෑම තැනක සිට වෙනත්
                                    ‍රැකියාවක නිරත වෙමින් හෝ තවත් අධ්‍යාපන කටයුතු හදාරන අතරතුර වුවද කිසිදු ගැටළුවකින් තොරව සතියේ
                                    ඕනෑම දිනක ඕනෑම වේලාවක සහභාගී විය හැකියි</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="lectures">
        <div class="lecture-pannel">
            <div class="lecture-image">
                <img src="{{ asset('inc/images/IMG_20201125_015907-scaled.jpg') }}" alt="" class="lecture-img">
            </div>

            <div class="right-side-section">
                <div class="top-area">
                    <h4>Madhush Jayasekara</h4>
                    <h5>KOREAN LANGUAGE INSTRUCTOR</h5>
                    <p>තාරුණ්‍යයේ හද ගැහෙන රිද්මයට කොරියානු වසන්තය කැන්දූ ගුරු තරුව වසර ගණනාවක් පුරාවට කොරියානු රැකියා
                        ක්ෂේත්‍රය තුල සුවහසක් සිසු දරුවන්ගේ සිහින සැබෑ කර කීර්තිමත් ගුරු පෞර්ෂයක් ...</p>
                    <a href="#"><button class="view">VIEW PROFILE</button></a>
                </div>

                <div class="bottom-area">
                    <ul class="social-links">
                        <li><a class="hvr-wobble-skew" href="" target="_blank" title="Facebook"><i class="fab fa-facebook-f ico"></i></a></li>
                        <li><a class="hvr-wobble-skew" href="" target="_blank" title="Twitter"><i class="fab fa-twitter ico"></i></a></li>
                        <li><a class="hvr-wobble-skew" href="" target="_blank" title="linkedin"><i class="fab fa-linkedin-in ico"></i></a>
                        </li>
                        <li><a class="hvr-wobble-skew" href="https://www.youtube.com/@smartsciencewithabhimansir2096" target="_blank" title="Youtube"><i class="fab fa-youtube ico"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- footer-wrapper -->
    <div class="container-fluid footer-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-4 col-sm-4 footer1 ">
                    <h4>අපි ගැන</h4>

                    <p>මේ හැමෝම හොයන,කතාවෙන දින 3 කින් කොරියානු භාෂාව ලියන්න,කියවන්න,කතාකරන්න 100% නොමිලේ උගන්වන අරුම පුදුම
                        KOREAN MAGIC පාඨමාලාවයි. මේ පාඨමාලාවට ඕනෑම වයස් මට්ටමක ඕනෑම කෙනෙකුට සහභාගි විය හැකියි. ඔබත් දැන්ම එකතු
                        වෙන්න.දිනක් ඇවිත් වෙනස බලන්න.</p>
                </div>
                <div class="col-xs-12 col-md-3 col-sm-3 footer2 ">
                    <h4>CONTACT US</h4>
                    <p> <span>
                            61/4 Wekanda RD,
                            <br />
                            Jambugasmulla MW,
                            <br />
                            Nugegoda,
                            <br />
                            Sri lanka.
                        </span>
                    </p>
                    <p>
                        <a title="Click to Call" class="hvr-forward" href="tel:0772879970">077 28 79 970</a>
                    </p>
                    <p>
                        <a title="Click to mail" class="hvr-forward" href="mailto: info@guruniwasa.lk">info@guruniwasa.lk</a>
                    </p>
                </div>
                <div class="col-xs-12 col-md-2 col-sm-2 footer3 ">
                    <h4>QUICK LINKS</h4>
                    <ul>
                        <!-- <li><a class="hvr-forward" href="#">ABOUT US</a></li> -->

                      
                        <li><a class="hvr-forward" href="/">HOME</a> </li>
                        <li><a class="hvr-forward" href="{{ url('login') }}">LOGIN</a></li>                
                        <li><a class="hvr-forward" href="{{ url('register') }}">REGISTER</a></li>

                    </ul>
                </div>
                <div class="col-xs-12 col-md-3 col-sm-3 footer4 ">
                    <h4>NEWSLETTER</h4>
                    <form action="">
                        <input type="email" name="your-email" value="" placeholder="Subscribe to our Newsletter">
                        <button type="submit"> <i class="fas fa-envelope icon-ft"></i>
                        </button>
                    </form>
                    <h4>FOLLOW
                    </h4>
                    <ul>
                        <li><a class="hvr-wobble-skew" href="" target="_blank" title="Facebook"><i class="fab fa-facebook-f ico"></i></a></li>
                        <li><a class="hvr-wobble-skew" href="" target="_blank" title="Twitter"><i class="fab fa-twitter ico"></i></a></li>
                        <li><a class="hvr-wobble-skew" href="" target="_blank" title="linkedin"><i class="fab fa-linkedin-in ico"></i></a>
                        </li>
                        <li><a class="hvr-wobble-skew" href="https://www.youtube.com/@smartsciencewithabhimansir2096" target="_blank" title="Youtube"><i class="fab fa-youtube ico"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid copyright-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 ">
                    <p>
                        Copyrights <span id="getYear"></span>
                        © Koreanway | Website by <a target="_blank" title="Click to visit" href="https://yogeemedia.com/">yogeemedia.com</a>
                    </p>
                </div>
            </div>
        </div>
    </div>


    <!-- js -->
    <script src="{{ asset('inc/js/script.js') }}"></script>
    <script src="{{ asset('inc/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('inc/js/lightbox-plus-jquery.min.js') }}"></script>
    <script src="{{ asset('inc/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('inc/js/fontawesome-all.js') }}"></script>
    <script src="{{ asset('inc/js/aos.js') }}"></script>
    <script src="{{ asset('inc/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('inc/js/slick.min.js') }}"></script>
    <script src="{{ asset('inc/js/swiper.min.js') }}"></script>
    <script src="{{ asset('inc/js/slick.min.js') }}"></script>
    <script src="{{ asset('inc/js/anime.min.js') }}"></script>

    <!--Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>


    <!-- Owl Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- custom JS code after importing jquery and owl -->
    <script type="text/javascript">
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel();
        });

        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>

</body>

</html>