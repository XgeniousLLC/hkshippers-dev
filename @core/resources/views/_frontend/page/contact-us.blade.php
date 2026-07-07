@extends('_frontend.frontend-master')

@section('content')

    <!-- visual/banner of the page -->
@include('_frontend.partials.banner.banner1',['bg_img_ids'=>$bg_img_ids,'page_setting'=>$page_setting,'title'=>$title,'routes'=>$routes])
    <!--/visual/banner of the page -->
    <!-- main content wrapper -->
    <div class="content-wrapper ">
        <section class="content-block chairman" >
            <div class="container" style="border-bottom:none;">
                
                <div class="row ">

                    <div class="col-md-6 ">

                    @include($form)
                    </div>
                    
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <i class="ti-map-alt"></i>
                            {{__('Room 702, 9 Chong Yip Street, Kwun Tong, Kowloon')}}
                        </div>
                        <div class="col-md-12">
                            <i class="ti-mobile"></i>
                            {{__('(852) 2211 2323')}}
                        </div>
                        <div class="col-md-12">
                            <i class="ti-printer"></i>
                            {{__('(852) 2891 9787')}}
                        </div>
                        <div class="col-md-12">
                            <i class="ti-email"></i>
                            {{__('shippers@hkshippers.org.hk')}}
                        </div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2475.8743140237525!2d114.21861216095749!3d22.313481996393165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34040148b891a69d%3A0xb0282897d9c9f152!2z6KeA5aGY5Ym15qWt6KGXOeiZn-WJtealreihlznomZ83MDI!5e0!3m2!1szh-TW!2shk!4v1708407259422!5m2!1szh-TW!2shk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>
    </div>
        
    <!--/main content wrapper -->

@endsection
