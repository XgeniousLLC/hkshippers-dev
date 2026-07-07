        
        </main>

        <!-- footer of the pagse -->
        <footer class="footer footer-v1">
            <div class="content-block footer-main">
                <div class="container">
                    <div class="row">
                    
                        <div class="col-md-12 text-center">
                            <ul class="footer-nav inline-nav ">
                            <!-- menu -->
@include('_frontend.partials.footer_menu')
                            
                            </ul>
                        </div>
                        
                    </div>
                    <div class="row text-center">
                            <div class="footer-logo" style="padding-left:calc(50% - 100px);">
@include('_frontend.partials.logo')
                            
                            </div>
                    </div>
                    
                </div>
            </div>
            <div class="footer-bottom text-center">
                <div class="container">
                    
                    <div class="col-md-12 text-center" >
                    @php 
                    $lang = App\Helpers\LanguageHelper::user_lang_slug();

                    $disclaimer = null;
                    $item = App\Post::where(['lang' => $lang, 'status' => 'publish','type'=>'disclaimer'])->orderBy('seq_no', 'asc')->orderBy('id', 'desc')->first();
                    if($item){
                        $attachment = @get_attachment_image_by_id($item->attachment,null,false);
                        if(empty($attachment)){
                            $disclaimer = $item->video_url;
                        }else{
                            $disclaimer = $attachment['img_url'];

                        }
                    }
                    @endphp
                    @if($disclaimer)
                        <a style="color:#bbb;" href="{{$disclaimer}}" target="_blank">{{__('Disclaimer')}}</a>
                    @endif
                        </div>
                <div class="col-md-12 text-center" >
@include('_frontend.partials.copyright')
                            
                        </div>
                </div>
            </div>
        </footer>
        <!--/footer of the page -->
    </div>

@yield('scripts')


<a href="#" class="section-scroll" id="scroll-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- Vendor Scripts -->
    <script src="{{asset('assets/vendors/tether/dist/js/tether.min.js')}}"></script>
    <script src="{{asset('assets/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/vendors/stellar/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('assets/vendors/isotope/javascripts/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/vendors/isotope/javascripts/packery-mode.pkgd.js')}}"></script>
    <script src="{{asset('assets/vendors/owl-carousel/dist/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/vendors/waypoint/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/vendors/counter-up/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/vendors/fancyBox/source/jquery.fancybox.pack.js')}}"></script>
    <script src="{{asset('assets/vendors/fancyBox/source/helpers/jquery.fancybox-thumbs.js')}}"></script>
    <script src="{{asset('assets/vendors/image-stretcher-master/image-stretcher.js')}}"></script>
    <script src="{{asset('assets/vendors/wow/wow.min.js')}}"></script>
    <script src="{{asset('assets/vendors/rateyo/jquery.rateyo.min.js')}}"></script>

    <script src="{{asset('assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/vendors/bootstrap-slider-master/src/js/bootstrap-slider.js')}}"></script>
    <script src="{{asset('assets/vendors/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>

    <script src="{{asset('assets/js/mega-menu.js')}}"></script>
    <script src="{{asset('assets/vendors/retina/retina.min.js')}}"></script>
    
    
    <!-- Custom Script -->
    <script src="{{asset('assets/js/jquery.main.js')}}"></script>

    <!-- REVOLUTION JS FILES -->
    <script src="{{asset('assets/vendors/rev-slider/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('assets/vendors/rev-slider/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="{{asset('assets/vendors/rev-slider/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{asset('assets/vendors/rev-slider/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{asset('assets/vendors/rev-slider/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{asset('assets/vendors/rev-slider/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{asset('assets/vendors/rev-slider/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{asset('assets/vendors/rev-slider/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>

    <script src="{{asset('assets/vendors/rev-slider/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{asset('assets/vendors/rev-slider/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{asset('assets/vendors/rev-slider/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>

    <!-- SNOW ADD ON -->
    <script src="{{asset('assets/vendors/rev-slider/revolution-addons/snow/revolution.addon.snow.min.js')}}"></script>
    <!-- Revolution Slider Script -->
    <script src="{{asset('assets/js/revolution.js?'.strtotime(date('YmdHis')))}}"></script>
    <script src="{{asset('assets/frontend/js/image-slider.js')}}"></script>

<script>
$(document).on('change', '#langchange', function (e) {
            $.ajax({
                url: "{{route('frontend.langchange')}}",
                type: "GET",
                data: {
                    'lang': $(this).val()
                },
                success: function (data) {
                    location.reload();
                }
            })
        });
$('body').on('submit','form.invalid',function(e){
    e.preventDefault();
});
$(document).on("keydown", ":input:not(textarea):not(:submit)", function(event) {
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
});


$(document).ready(function(){
    setTimeout(() => {
        $('.img-captcha').attr('src',"{{route('frontend.img-captcha')}}");
        
    }, 1000);
})
$('body').on('keyup','#captcha',function(){
    var val = $(this).val();
    console.log(val);
    if(val.length>=4){
        $.ajax({
            url:'{{route('frontend.check-img-captcha')}}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType:'json',
            type:'post',
            data:{
                'captcha':val
            },
            success:function(data){
                if(data.success){
                    $('.img-captcha-error').hide();
                    $('.form-contact-us').removeClass('invalid');

                }else{
                    $('.img-captcha-error').show();
                    $('.form-contact-us').addClass('invalid');
                }
            }
        })
    }
});
</script>
</body>
</html>
