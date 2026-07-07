@extends('_frontend.frontend-master')

@section('content')

    <!-- visual/banner of the page -->
    
    <!--/visual/banner of the page -->
    <!-- main content wrapper -->
    <div class="content-wrapper ">
        <section class="content-block chairman" >
            <div class="container" style="border-bottom:none;">
                
                <div class="row ">

                    <div class="col-md-12">
                    @if(@$image)
                    <img style=" width:auto;height:auto;" src="{{$image}}" >

                    @endif
                    </div>
                    <div class="col-md-12">
                    
                    @if(@$info)
                    @php 
                    echo str_replace("\n",'<br>',$info->content);
                    @endphp

                    @endif
                    </div>

                    <div class="col-md-6 ">

                    @include($form)
                    </div>
                    
                </div>
            </div>
        </section>
    </div>
        
    <!--/main content wrapper -->
    <script>
        $('.main-header.header-white.transparent').addClass('black');
    </script>
@endsection
