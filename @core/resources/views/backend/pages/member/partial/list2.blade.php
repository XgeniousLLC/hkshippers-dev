
                                    <table class="table table-default" id="all_post_table">
                                        <thead>
                                        <th class="no-sort">
                                            <div class="mark-all-checkbox">
                                                <input type="checkbox" class="all-checkbox">
                                            </div>
                                        </th>
                                        <th>{{__('Name')}}</th>
                                        <th>{{__('Company Name')}}</th>
                                        <th>{{__('Image')}}</th>
                                        <th>{{__('Status')}}</th>
                                        <th>{{__('Seq No.')}}</th>
                                        <th>{{__('Type')}}</th>
                                        <th>{{__('Date')}}</th>
                                        <th>{{__('Action')}}</th>
                                        </thead>
                                        <tbody>
                                        @foreach($post as $data)
                                            <tr>
                                                <td>
                                                    <div class="bulk-checkbox-wrapper">
                                                        <input type="checkbox" class="bulk-checkbox" name="bulk_delete[]" value="{{$data->id}}">
                                                    </div>
                                                </td>
                                                <td>{{$data->name}} </td>
                                                <td>{{$data->company}} </td>
                                                <td>
                                                    @php
                                                        $img = get_attachment_image_by_id($data->image,null,true);
                                                    @endphp
                                                    @if (!empty($img))
                                                        <div class="attachment-preview">
                                                            <div class="thumbnail">
                                                                <div class="centered">
                                                                    <img class="avatar user-thumb" src="{{$img['img_url']}}" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </td>
                                                
                                                <td>
                                                    @if($data->status == 'draft')
                                                        <span class="alert alert-warning" style="margin-top: 20px;display: inline-block;">{{__('Draft')}}</span>
                                                    @else
                                                        <span class="alert alert-success" style="margin-top: 20px;display: inline-block;">{{__('Publish')}}</span>
                                                    @endif
                                                </td>
                                                <td>{{$data->seq_no}}</td>
                                                <td>
                                        @foreach(\App\Http\Controllers\MemberController::TYPE_MEMBER as $type)
                                                
                                                @if($data->type_chairman === $type[0]) {{$type[1]}} @endif  
                                            @endforeach
                                                </td>
                                                <td>{{date_format($data->created_at,'d M Y')}}</td>
                                                <td>
                                                    <x-delete-popover :url="route('admin.member.delete',$data->id)"/>
                                                   
                                                    <a class="btn btn-xs btn-primary btn-xs mb-3 mr-1" href="{{route('admin.member.edit',$data->id)}}">
                                                        <i class="ti-pencil"></i>
                                                    </a>
                                                    
                                                    <form action="{{route('admin.member.clone')}}" method="post" style="display: inline-block">
                                                        @csrf
                                                        <input type="hidden" name="item_id" value="{{$data->id}}">
                                                        <button type="submit" title="clone this to new draft" class="btn btn-xs btn-secondary btn-sm mb-3 mr-1"><i class="far fa-copy"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>