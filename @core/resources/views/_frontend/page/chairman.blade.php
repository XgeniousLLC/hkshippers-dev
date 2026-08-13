@extends('_frontend.frontend-master')

@section('content')

    <!-- visual/banner of the page -->
@include('_frontend.partials.banner.banner1',['bg_img_ids'=>$bg_img_ids,'page_setting'=>$page_setting,'title'=>$title,'routes'=>$routes])
    <!--/visual/banner of the page -->
    <!-- main content wrapper -->
    <div class="content-wrapper ">
        <section class="content-block chairman" >
            <div class="container" style="border-bottom:none;">

                <div class="row">
                    <div class="col-md-12" style="display:flex; justify-content:center;">
                        <div class="chairman-list" style="width:100%; max-width:900px;">

                        @foreach($items as $item)
                            @php
                                $bg_img = get_attachment_image_by_id($item->image, null, false);
                                $img = null;
                                if (!empty($bg_img)) {
                                    $img = image_resize($bg_img['img_url'], 200, 266);
                                }
                            @endphp
                            <div class="chairman-item">
                                <div class="chairman-item-photo">
                                    @if($img)
                                        <img src="{{$img}}" style="width:200px; display:block;">
                                    @endif
                                </div>
                                <div class="chairman-item-info">
                                    @if($item->name)
                                        <h4 class="chairman-item-name">{{$item->name}}</h4>
                                    @endif
                                    @if($item->title)
                                        <p style="margin:0;">{{$item->title}}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <style>
        .chairman-item {
            display: flex;
            align-items: flex-end;
            gap: 2rem;
            margin-bottom: 3rem;
        }
        .chairman-item-photo {
            flex: 0 0 200px;
        }
        .chairman-item-info {
            flex: 1;
            padding-top: 0.5rem;
            min-width: 0;
        }
        .chairman-item-name {
            margin-bottom: 0.5rem;
            white-space: nowrap;
        }
        @media (max-width: 767px) {
            .chairman-item {
                flex-direction: column;
                align-items: center;
                text-align: center;
                gap: 0.75rem;
            }
            .chairman-item-photo {
                flex: 0 0 auto;
            }
            .chairman-item-name {
                white-space: normal;
            }
        }
    </style>

    <!--/main content wrapper -->

@endsection
