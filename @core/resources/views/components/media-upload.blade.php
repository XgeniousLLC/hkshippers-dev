@php $id = isset($id) ? $id : null; @endphp
<div class="form-group">
    <label for="{{$name}}">{{__($title)}}</label>
    @php $signature_image_upload_btn_label = __('Upload File'); @endphp
    <div class="media-upload-btn-wrapper">
        <div class="img-wrap">
            @php
                if (is_null($id)){
                    $id = get_static_option($name);
                }
                $signature_img = get_attachment_image_by_id($id,null,false);
            @endphp
            @if (!empty($signature_img))
                @php
                
                    $image_url = $signature_img['img_url'];
                    $_type = pathinfo($image_url,PATHINFO_EXTENSION);
                @endphp
                <div class="rmv-span"><i class="fas fa-trash"></i></div>
                <div class="attachment-preview">
                    <div class="thumbnail">
                        <div class="centered">
                        @if (in_array($_type,['pdf','doc','docx','txt','zip','csv','xlsx','xlsm','xlsb','xltx','pptx','pptm','ppt']))
                            <i class="fas fa-file file-icon"></i> 
                        @else
                            <img class="avatar user-thumb" src="{{$image_url}}" >
                        @endif
                        </div>
                    </div>
                </div>
                @php $signature_image_upload_btn_label = __('Change File'); @endphp
            @endif
        </div>
        <br>
        <input type="hidden" name="{{$name}}" value="{{$id}}">
        <button type="button" class="btn btn-info media_upload_form_btn" @if(isset($type)) data-filetype="{{$type}}" @endif data-btntitle="{{__('Select File')}}" data-modaltitle="{{__('Upload File')}}" data-imgid="{{$id ?? ''}}" data-toggle="modal" data-target="#media_upload_modal">
            {{__($signature_image_upload_btn_label)}}
        </button>
    </div>
   <!-- <small>@if(isset($dimentions)) {{__('recommended image size is')}} {{$dimentions ?? ''}} @endif</small>-->
</div>