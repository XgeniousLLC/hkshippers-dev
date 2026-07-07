@extends('backend.admin-master')
@section('site-title')
    {{__($title)}}
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button{
            padding: 0 !important;
        }
        div.dataTables_wrapper div.dataTables_length select {
            width: 60px;
            display: inline-block;
        }
    </style>
    <x-media.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-error-msg/>
                <x-flash-msg/>
            </div>
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('All Items')}}</h4>
                        <div class="bulk-delete-wrapper">
                            <div class="select-box-wrap">
                                <select name="bulk_option" id="bulk_option">
                                    <option value="">{{{__('Bulk Action')}}}</option>
                                    <option value="delete">{{{__('Delete')}}}</option>
                                </select>
                                <button class="btn btn-primary btn-sm" id="bulk_delete_btn">{{__('Apply')}}</button>
                            </div>
                        </div>
                        
                        <div class=" margin-top-40" >
                                <div class=""  >
                                    <div class="table-wrap table-responsive">
                                        <table class="table table-default">
                                        <thead>
                                        <th class="no-sort">
                                            <div class="mark-all-checkbox">
                                                <input type="checkbox" class="all-checkbox">
                                            </div>
                                        </th>
                                        <th>{{__('File')}}</th>
                                        <th>{{__('Url')}}</th>
                                        <th>{{__('Remark')}}</th>
                                        <th>{{__('Type')}}</th>
                                        <th>{{__('Date')}}</th>
                                        </thead>
                                        <tbody>
                                        @foreach($all as $data)
                                            @php
                                            $img = get_attachment_image_by_id($data->id,null,false);
                                            $type = in_array(pathinfo($data->path, PATHINFO_EXTENSION),['jpg','jpeg','png','gif'])?'image':'file';
                                            @endphp
                                            <tr>
                                                <td>
                                                    <div class="bulk-checkbox-wrapper">
                                                        <input type="checkbox" class="bulk-checkbox" name="bulk_delete[]" value="{{$data->id}}">
                                                    </div>
                                                </td>
                                                <td>{{$data->title}}</td>
                                                <td>{{$img['img_url']}}</td>
                                               
                                               
                                                <td>{{$data->alt}}</td>
                                                <td>{{$type}}</td>

                                                <td>
                                                    <x-delete-popover :url="route('admin.media-room.delete',$data->id)"/>
                                                    <a href="#"
                                                       data-toggle="modal"
                                                       data-target="#category_edit_modal"
                                                       class="btn btn-xs btn-primary mb-3 mr-1 category_edit_btn"
                                                       data-id="{{$data->id}}"
                                                       data-file="{{$data->title}}"
                                                       data-url="{{$img['img_url']}}"
                                                       data-alt="{{$data->alt}}"
                                                       data-type="{{$type}}"
                                                    >
                                                        <i class="ti-pencil"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                               
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-5 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('Upload File')}}</h4>
                        <div class="tab-pane fade show active" id="upload_files" role="tabpanel" >
                        <div class="dropzone-form-wrapper">
                            <form action="{{route('admin.upload.media.file')}}" method="post" id="mediaRoomForm" class="dropzone" enctype="multipart/form-data">
                                @csrf
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="category_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Update Media')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('admin.media-room.update')}}"  method="post">
                    <input type="hidden" name="id" id="media_id">
                    <div class="modal-body">
                        @csrf
                        
                        <div class="form-group">
                            <label for="edit_file">{{__('File')}}</label>
                            <input type="text" class="form-control"  id="edit_file" name="file" disabled placeholder="{{__('File')}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="edit_url">{{__('Url')}}</label>
                            <input type="text" class="form-control"  id="edit_url" name="url" disabled placeholder="{{__('Url')}}">
                        </div>
                        
                        <div class="form-group">
                        
                            <div class="attachment-preview">
                                <div class="thumbnail">
                                    <div class="centered">
                                        <i id="icon-file" class="fas fa-file file-icon"></i>
                                        <img id="image-preview"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="edit_alt">{{__('Remark')}}</label>
                            <textarea class="form-control"  id="edit_alt" name="alt"  placeholder="{{__('Remark')}}">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit_type">{{__('Type')}}</label>
                            <input type="text" class="form-control"  id="edit_type" name="type" disabled placeholder="{{__('Type')}}">
                        </div>
                        
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Save Change')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<x-media.markup/>
@endsection
@section('script')
<x-media.js/>
    <script>
        $(document).ready(function () {
            $(document).on('click','#bulk_delete_btn',function (e) {
                e.preventDefault();

                var bulkOption = $('#bulk_option').val();
                var allCheckbox =  $('.bulk-checkbox:checked');
                var allIds = [];
                allCheckbox.each(function(index,value){
                    allIds.push($(this).val());
                });
                if(allIds != '' && bulkOption == 'delete'){
                    $(this).text('{{__('Deleting...')}}');
                    $.ajax({
                        'type' : "POST",
                        'url' : "{{route('admin.media-room.bulk.action')}}",
                        'data' : {
                            _token: "{{csrf_token()}}",
                            ids: allIds
                        },
                        success:function (data) {
                            location.reload();
                        }
                    });
                }

            });

            $('.all-checkbox').on('change',function (e) {
                e.preventDefault();
                var value = $('.all-checkbox').is(':checked');
                var allChek = $(this).parent().parent().parent().parent().parent().find('.bulk-checkbox');
                //have write code here fr
                if( value == true){
                    allChek.prop('checked',true);
                }else{
                    allChek.prop('checked',false);
                }
            });

            $(document).on('click','.category_edit_btn',function(){
                var el = $(this);
                var id = el.data('id');
                var file = el.data('file');
                var url = el.data('url');
                var alt = el.data('alt');
                var type = el.data('type');
                var modal = $('#category_edit_modal');

                var image = el.data('image');
                var imageid = el.data('imageid');

                if(type==='image'){
                    $('#icon-file').hide();
                    $('#image-preview').attr('src',url).show();
                }else{
                    
                    $('#icon-file').show();
                    $('#image-preview').attr('src','').hide();
                }
                modal.find('#media_id').val(id);
                modal.find('#edit_status option[value="'+status+'"]').attr('selected',true);
                modal.find('#edit_file').val(file);
                modal.find('#edit_url').val(url);
                modal.find('#edit_alt').val(alt);
                modal.find('#edit_type').val(type);

                if(imageid != ''){
                    modal.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="'+image+'" > </div></div></div>');
                    modal.find('.media-upload-btn-wrapper input').val(imageid);
                    modal.find('.media-upload-btn-wrapper .media_upload_form_btn').text('Change Image');
                }
            });
        });
    </script>
    <!-- Start datatable js -->
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="//cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {

            $('.table-wrap > table').DataTable( {
                "order": [],
                'columnDefs' : [{
                    'targets' : 'no-sort',
                    'orderable' : false
                }]
            } );
        } );
        Dropzone.options.mediaRoomForm = {
            dictDefaultMessage: "{{__('Drag or Select Your Image')}}",
            
            maxFiles: 50,
            maxFilesize: 200, //MB
            acceptedFiles: 'image/*,application/pdf,.doc,.docx,.txt,.svg,.zip',
            init:function(){
                $('.dz-default').css('width','100%');

            },
            success: function (file, response) {
                location.reload();
            },
            error: function (file, message) {
                if ((typeof message !== "String") && message.error) {
                    message = message.error;
                }
                alert(message);
            }
        };
    </script>
@endsection
