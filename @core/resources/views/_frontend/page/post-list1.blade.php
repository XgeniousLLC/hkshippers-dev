@extends('_frontend.frontend-master')

@section('content')

    <!-- Visual/banner of the page -->
    @include('_frontend.partials.banner.banner1', ['bg_img_ids' => $bg_img_ids, 'page_setting' => $page_setting, 'title' => $title, 'routes' => $routes])
    <!--/Visual/banner of the page -->

    <!-- Main content wrapper -->
    <div class="content-wrapper">
        <section class="content-block chairman">
            <div class="container" style="border-bottom: none;">
                
                <div class="row">
                
                @foreach($items as $item)
                    @php
                        $link = $item->content;
                        $target = '_blank';
                        $image = @get_attachment_image_by_id($item->attachment, null, false);
                        $title = $item->title;
                    @endphp

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow-sm h-100" style="transition: transform 0.3s, box-shadow 0.3s;">
                            
                            <!-- Title at the top of the card with gray background color -->
                            <div class="card-header text-center" style="background-color: #f8f9fa; color: #333;">
                                <h5 class="card-title mb-0">{{ $title }}</h5>
                            </div>

                            <!-- Card Body: Clickable Image with hover scale effect -->
                            <div class="card-body text-center">
                                @if($image)
                                    <a href="{{ $link }}" target="{{ $target }}">
                                        <img src="{{ $image['img_url'] }}" alt="{{ $title }}" class="img-fluid rounded" style="max-height: 200px; width: auto; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                                    </a>
                                @endif
                            </div>

                            <!-- Read More Link in Card Footer with matching gray background (only if no image) -->
                            @if(!$image)
                                <div class="card-footer text-center" style="background-color: #f8f9fa;">
                                    <a href="{{ $link }}" target="{{ $target }}" style="color: #333;"><strong>Read More</strong></a>
                                </div>
                            @endif

                        </div>
                    </div>

                    <style>
                        .card:hover {
                            transform: translateY(-5px);
                            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                        }
                    </style>
                @endforeach

                </div>
            </div>
        </section>
    </div>
    <!--/Main content wrapper -->

@endsection
