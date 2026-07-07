@php 
use App\Helpers\LanguageHelper;

$default_lang = LanguageHelper::default();
@endphp

<table class="table table-default" id="all_blog_table">
                                            <thead>
                                            <th class="no-sort">
                                                <div class="mark-all-checkbox">
                                                    <input type="checkbox" class="all-checkbox">
                                                </div>
                                            </th>
                                            <th>{{__('Title')}}</th>
                                            <th>{{__('Image')}}</th>
                                            <th>{{__('Organizer')}}</th>
                                            <th>{{__('Seq No.')}}</th>
                                            <th>{{__('Event Date')}}</th>
                                            <th>{{__('Status')}}</th>
                                            <th>{{__('Action')}}</th>
                                            </thead>
                                            <tbody>
                                            @foreach($event as $data)
                                            
                                                <tr>
                                                    <td>
                                                        <div class="bulk-checkbox-wrapper">
                                                            <input type="checkbox" class="bulk-checkbox" name="bulk_delete[]" value="{{$data->id}}">
                                                        </div>
                                                    </td>
                                                    <td>@php echo $data->{"title-{$default_lang->slug}"} @endphp</td>
                                                    <td>
                                                       <div class="img-wrap">
                                                           @php
                                                               $event_img = get_attachment_image_by_id($data->image,'thumbnail',true);
                                                           @endphp
                                                           @if (!empty($event_img))
                                                               <div class="attachment-preview">
                                                                   <div class="thumbnail">
                                                                       <div class="centered">
                                                                           <img class="avatar user-thumb" src="{{$event_img['img_url']}}" alt="">
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                           @endif
                                                       </div>
                                                    </td>
                                                    <td>
                                                    @php echo $data->{"organizer-{$default_lang->slug}"} @endphp</td>
                                                    <td>{{$data->seq_no}}</td>

                                                    <td>{{$data->date}}</td>
                                                    <td>
                                                        @if($data->status == 'draft')
                                                            <span class="alert alert-warning" >{{__('Draft')}}</span>
                                                        @else
                                                            <span class="alert alert-success">{{__('Publish')}}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <x-delete-popover :url="route('admin.events.delete',$data->id)"/>
                                                        
                                                        <a class="btn btn-primary btn-xs mb-3 mr-1" href="{{route('admin.events.edit',$data->id)}}">
                                                            <i class="ti-pencil"></i>
                                                        </a>
                                                        
                                                        
                                                        <form action="{{route('admin.events.clone')}}" method="post" style="display: inline-block">
                                                            @csrf
                                                            <input type="hidden" name="item_id" value="{{$data->id}}">
                                                            <button type="submit" title="clone this to new draft" class="btn btn-xs btn-secondary btn-sm mb-3 mr-1"><i class="far fa-copy"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                        
                                    <script>
                                        document.getElementById('myTab').style.display = 'none';
                                    </script>