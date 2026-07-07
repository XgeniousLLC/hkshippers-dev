
                                    <table class="table table-default" id="all_post_table">
                                        <thead>
                                        <th class="no-sort">
                                            <div class="mark-all-checkbox">
                                                <input type="checkbox" class="all-checkbox">
                                            </div>
                                        </th>
                                        <th>{{__('Company')}}</th>
                                        <th>{{__('Tel')}}</th>
                                        <th>{{__('Email')}}</th>
                                        
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
                                                <td>{{$data->company}} </td>
                                                <td>{{$data->tel}} </td>
                                                <td>{{$data->email}} </td>
                                                
                                                <td>{{date_format($data->created_at,'d M Y')}}</td>
                                                <td>
                                                    <x-delete-popover :url="route('admin.application-form.delete',$data->id)"/>
                                                   
                                                    <a class="btn btn-xs btn-primary btn-xs mb-3 mr-1" href="{{route('admin.application-form.edit',$data->id)}}">
                                                        <i class="ti-pencil"></i>
                                                    </a>
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>