
@php
    $home_page_variant = $home_page ?? filter_static_option_value('home_page_variant',$global_static_field_data);
    $logo1_id = get_static_option('site_logo');
    $logo2_id = get_static_option('site_white_logo');
    $logo1 = get_attachment_image_by_id($logo1_id,null,false);
    $logo2 = get_attachment_image_by_id($logo2_id,null,false);
    if(empty($logo2)){
        $logo2 = $logo1;
    }
@endphp
        <!DOCTYPE html>
<html lang="{{$user_select_lang_slug}}"  dir="{{get_user_lang_direction()}}">

<head>

@if(!empty(filter_static_option_value('site_google_analytics',$global_static_field_data)))
    {!! get_static_option('site_google_analytics') !!}
@endif
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {!! render_favicon_by_id(filter_static_option_value('site_favicon',$global_static_field_data)) !!}
    {!! load_google_fonts() !!}
    <link rel="canonical" href="{{url()->current()}}">
    <!-- Font Icons -->
    <link media="all" rel="stylesheet" href="{{asset('assets/css/fonts/icomoon/icomoon.css')}}">
<!--     <link media="all" rel="stylesheet" href="css/fonts/roxine-font-icon/roxine-font.css"> -->
    <link media="all" rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/font-awesome.css')}}">
    <link media="all" rel="stylesheet" href="{{asset('assets/vendors/owl-carousel/dist/assets/owl.carousel.min.css')}}">
    <link media="all" rel="stylesheet" href="{{asset('assets/vendors/owl-carousel/dist/assets/owl.theme.default.min.css')}}">
    <link media="all" rel="stylesheet" href="{{asset('assets/vendors/animate/animate.css')}}">
    <link media="all" rel="stylesheet" href="{{asset('assets/vendors/rateyo/jquery.rateyo.css')}}">
    <link media="all" rel="stylesheet" href="{{asset('assets/vendors/bootstrap-datepicker/css/bootstrap-datepicker.css')}}">
    <link media="all" rel="stylesheet" href="{{asset('assets/vendors/fancyBox/source/jquery.fancybox.css')}}">
    <link media="all" rel="stylesheet" href="{{asset('assets/vendors/fancyBox/source/helpers/jquery.fancybox-thumbs.css')}}">
    <link media="all" rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link media="all" rel="stylesheet" href="{{asset('assets/vendors/rev-slider/revolution/css/settings.css')}}">
    <link media="all" rel="stylesheet" href="{{asset('assets/vendors/rev-slider/revolution/css/layers.css')}}">
    <link media="all" rel="stylesheet" href="{{asset('assets/vendors/rev-slider/revolution/css/navigation.css')}}">
    <link media="all" rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link media="all" rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/common/css/themify-icons.css')}}">
    
    <!-- jQuery Library -->

    <script src="{{asset('assets/vendors/jquery/jquery-2.1.4.min.js')}}"></script>
    <script>var siteurl="{{url('/')}}"</script>
    
    @include('frontend.partials.og-meta')
    <style>
    #langchange {
        background-color: transparent;
        border: none;
        color:#a7a7a7;

    }
    .content-wrapper{
        padding-top:2em;
    }
    .main-header .navbar .navbar-nav #langchange {
        
        color: #f1f1f1;
        cursor: pointer;
        text-transform: uppercase;
        font-size: .75rem;
        font-weight: 500;
        
        display: inline-block;
    }
    .main-header .navbar .navbar-nav #langchange option{
        
        color: #55565b;
    }
    .footer-nav li{
        width:150px;
        vertical-align: top;
        text-align: left;

    }
    .nav-wrap ul.side-nav  li > a{
        color: #a7a7a7;
        display: block;
        padding: 1.25rem;
        -webkit-transform: translateX(50px);
        -o-transform: translateX(50px);
        transform: translateX(50px);
        -webkit-transition: all .4s linear;
        -o-transition: all .4s linear;
        transition: all .4s linear;
        opacity: 0;
        letter-spacing: .05em;
        position: relative;
        z-index: 1;
    }
    .nav-wrap ul.side-nav .dropdown-menu li{
        border-top: 1px solid rgba(0, 0, 0, .1);
        -webkit-transition: all .5s;
        -o-transition: all .5s;
        transition: all .5s;
        margin-left: 1.3rem;

    }
    .nav-wrap ul.side-nav .dropdown-menu li > a{
        padding: .25rem;
        

    }
    .dropdown-menu {
        font-size: unset;
    }
    .content-block.style-2 .container{
        border-bottom:1px solid #d8d8d8;
        padding-bottom:6rem;
    }
    .ico-box{
        min-height: 300px;
        display : flex;
        align-items: center;
        flex-wrap: nowrap;
        align-content: center;
        justify-content: center;
        flex-direction: column;
    }
    .content-block.style-2{
        padding:2.5rem 0;
    }
    .footer-nav a{
        color:#adadad ;
    }
    .footer-nav ul li a {
        color: #fefefe;
    }
    .block-top-heading{
        text-transform: none;
    }
    .block-main-heading{
        text-transform: uppercase;
        font-size: 2.5rem;
    }
    
    .btn.btn-secondary {
        background: #214284;
        color: #fff;
        border-color: #214284;
    }

    .btn.btn-secondary:hover{
        background: #2641ca ;
        color: #fff;
        border: 0.1429rem solid #2641ca ;
    }
    .bg-color-pirmary{
        background: #214284;
        color: #fff;

    }
    .pagination-wrapper{
        text-align:center;
        display: flex;
        justify-content: center;
    }
    .edd-alert-error {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1;
    }

    .edd-alert {
        border-radius: 2px;
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid transparent;
        vertical-align: middle;
    }
    .edd-alert p {
        padding: 0;
    }

    p.edd_error {
        margin: 0!important;
    }
    .edd_success {
        color: #01815b;
        background-color: #def2ec;
        border-color: #4febbc;
        border-radius: 2px;
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid transparent;
        vertical-align: middle;
    }
    .edd_success p {
        padding: 0;
    }

    p.edd_success {
        margin: 0!important;
    }
    .navbar-nav {
        justify-content: flex-end;
        padding-right: 45px;
    }
    .main-header.sticky-nav .navbar .navbar-nav li select#langchange{
        color:#55565b;
    }
    .main-header.header-white .navbar .navbar-nav li {
        
    }
    h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
        font-family: inherit;
    }
    .a-slider-title{
        position:absolute;
        top:25%;
        z-index:3000;
        color:#fefefe;
        padding-left:3em;
    }
    .slider-text {
        margin-bottom: 2.5rem;
    }
    .slider-sub-title {
        height:1em;
    }
    .slider-main-title {
    }
    .a-home .slider-main-title {
        margin-top:0;
    }
    .logo{
        width:200px;
        height:60px;
        background-image:url('{{$logo1['img_url']}}');
        background-repeat: no-repeat;
        background-size:contain;
        background-position-x: center;
    }
    .sticky-nav .logo{
        background-image:url('{{$logo2['img_url']}}');
    }
    .navbar-toggler.navbar-toggler-left{
        display:none;
    }
    .after-arrow{
        cursor:pointer;
    }
    .after-arrow::after{
        content:'';
        border-color: #333;
        border-style: solid;
        border-width: 0 4px 4px 0;
        display: inline-block;
        padding: 2.5px;
        margin-left: 8px;
        transform: rotate(-135deg);
        transition: transform .3s;
        vertical-align: middle;
    }
    
    .after-arrow.reverse::after{
        transform: rotate(45deg);
    }
    .after-arrow.reverse + ul{
        display:none;
        opacity: 0;
        transition: all .3s;

    }
        
    .image-slider img {
        width: 100%;
    }

    .image-slider .height {
        height: 10px;
    }

    /* Image-container design */
    .image-slider .image-container {
        
        position: relative;
        margin: auto;
    }

    .image-slider .next {
        right: 0;
    }
    .image-slider .previous {
        left: 0;
    }

    /* Next and previous icon design */
    .image-slider .previous,
    .image-slider .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        padding: 10px;
        margin-top: -25px;
    }

    /* caption decorate */
    .image-slider .captionText {
        color: #000000;
        font-size: 14px;
        position: absolute;
        padding: 12px 12px;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    /* Slider image number */
    .image-slider .slideNumber {
        background-color: #5574C5;
        color: white;
        border-radius: 25px;
        right: 0;
        opacity: .5;
        margin: 5px;
        width: 30px;
        height: 30px;
        text-align: center;
        font-weight: bold;
        font-size: 24px;
        position: absolute;
    }

    .image-slider .fa {
        font-size: 32px;
    }

    .image-slider .fa:hover {
        transform: rotate(360deg);
        transition: 1s;
        color: white;
    }

    .image-slider .footerdot {

        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.5s ease;
        display:none;
    }

    .image-slider .active,
    .image-slider .footerdot:hover {
        background-color: black;
    }

    .content-title{
        text-transform: none;
    }
    @media screen and (min-width: 1230px){
        .a-home .slider-main-title {
            font-size: 10rem;
        }
        
    }
    @media (max-width: 990px){
        .logo{
            width:100%;
        }
        
        .logo{
            background-image:url('{{$logo2['img_url']}}');
        }
    }
    @media (min-width: 990px){
        .nav-trigger.navbar-pos-search.overlay-trigger{
            display:none;
        }
        .slider-main-title {
            font-size: 5rem;
            line-height: 80px;
        }
        .main-header .navbar .navbar-nav li,
        .main-header.header-white .navbar .navbar-nav li .dropdown-menu li a  {
            font-size:.55rem
        }

        .main-header .navbar .navbar-nav li a {
            padding: 2.25rem 0.5rem;
        }
    }
    @media only screen and (min-width: 991px){
        .main-header.header-white.black {
            background: rgba(0,0,0,.7);
        }
    }
    @media (min-width: 1050px){
        
        .main-header .navbar .navbar-nav li,
        .main-header.header-white .navbar .navbar-nav li .dropdown-menu li a 
        {
            font-size:.6rem
        }

    }
    @media (min-width: 1050px){
        
        .main-header .navbar .navbar-nav li,
        .main-header.header-white .navbar .navbar-nav li .dropdown-menu li a 
        {
            font-size:.65rem
        }

    }
    @media (min-width: 1130px){

        .main-header .navbar .navbar-nav li,
        .main-header.header-white .navbar .navbar-nav li .dropdown-menu li a  {
            font-size:.7rem
        }

        .main-header .navbar .navbar-nav li a {
            padding: 2.25rem 0.7rem;
        }
    }
    @media (min-width: 1190px){

        .main-header .navbar .navbar-nav li,
        .main-header.header-white .navbar .navbar-nav li .dropdown-menu li a  {
            font-size:.8rem
        }

        .main-header .navbar .navbar-nav li a {
            padding: 2.25rem 0.7rem;
        }
    }
    
    @media (min-width: 1290px){

        .main-header .navbar .navbar-nav li {
            font-size:.85rem
        }

        .main-header .navbar .navbar-nav li a {
            padding: 2.25rem 0.7rem;
        }
    }
    @media (min-width: 1340px){

        .main-header .navbar .navbar-nav li {
            font-size:.9rem
        }

        .main-header .navbar .navbar-nav li a {
            padding: 2.25rem 0.7rem;
        }
    }
    @media (min-width: 768px){
        .chairman .flex-content{
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: flex-start;
        }
        .chairman .flex-content:nth-child(2n){
            flex-direction: row-reverse;
        }
        
    }
    
    @media (max-width: 768px){
        .post-page-title > *{
            width:100% !important;
        }
        .post-page-title > *:first-child{

            padding-bottom:15px;
        }
        .event-page-title{
            display:block !important;
        }
        .event-page-title > *{
            width:100% !important;
            text-align:center;
        }
        .event-page-title > *:first-child{

            padding-bottom:15px;
        }
    }
    </style>

</head>

<body >

    <div class="preloader" id="pageLoad">
        <div class="holder">
        @php 
        $img_id = 475;
        $img = get_attachment_image_by_id($img_id,null,false);

        @endphp
        @if(!empty($img))
            <div class=""><img src ="{{$img['img_url']}}"/></div>

        @else
            <div class="coffee_cup"></div>
        @endif
        </div>
    </div>

    <!--Side panel-->
    <nav class="nav-wrap bg-white">
        <!-- opener inside of collapsible menu -->
        <div class="nav-trigger nav-trigger-close">
            <a href="#">Close Panel <i class="icon-long-arrow-right"></i> </a>
            <div class="divider-border"><span class="sr-only"></span></div>
        </div>

        <ul class="side-nav">
@include('_frontend.partials.menu')
        
        </ul>
        
        <div class="divider-border"><span class="sr-only"></span></div>
        
    </nav>
    
    <!-- main wrapper -->
    <div id="wrapper" class="no-overflow-x">
        <div class="page-wrapper">
            <!-- header of the page -->
            <header class="fixed-top main-header header-white transparent with-side-panel-ico" id="waituk-main-header">
                <div id="nav-section">
                    <div class="bottom-header container-fluid mega-menus" id="mega-menus">
                        <nav class="navbar navbar-toggleable-md no-border-radius no-margin mega-menu-multiple" id="navbar-inner-container">
                            <form action="mega-menu-5.html" id="top-search" class="no-margin top-search">
                                <div class="form-group no-margin">
                                    <input class="form-control no-border" id="search_term" name="search_term" placeholder="Type & Press Enter" type="text">
                                </div>
                            </form>
                            <button type="button" class="navbar-toggler navbar-toggler-left" data-toggle="collapse" data-target="#mega-menu">
                                <span class="navbar-toggler-icon"></span>
                            </button>
@include('_frontend.partials.logo')
                            
                            <div class="collapse navbar-collapse flex-row-reverse" id="mega-menu">
                                <ul class="nav navbar-nav" style="width:100%;padding-left:45px;">
@include('_frontend.partials.menu')

                                    
                                </ul>
                            </div>
                            <div class="nav-trigger navbar-pos-search overlay-trigger">
                                <a href="#" class="navbar-link"><i class="icon-sort-1"></i></a>
                            </div>
                        </nav>
                    </div>
                </div>
            </header>
            <!--/header of the page -->
            <main>
