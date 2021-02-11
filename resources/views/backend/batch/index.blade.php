@extends('backend.layouts.app')

@section('content')


    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                
                <div style="width: 100%">
                    <div  class="panel-heading" style="width: 40%; float: left;">
                      <i class="fa fa-home"></i> ব্যাচ তালিকা 
                    </div>

                    <div class="panel-heading" style="width: 60%;float: right;text-align: right;" >
                        <h3> <b> <a href="{{route('admin.batch.set_up')}}" class="btn btn-success">Create</a> </b></h3>             
                    </div>
                </div>

                <div class="panel-body">
                    <div class="">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <!-- <td class="text-center">#</td> -->
                                    <td class="text-center">ব্যাচের নাম</td>
                                    <td class="text-center">কোড</td>
                                    <td class="text-center">সময়কাল থেকে</td>
                                    <td class="text-center">থেকে পর্যন্ত</td>
                                    <td class="text-center">অবস্থা</td>
                                    <td class="text-center">Action</td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($info as $key => $item)
                                <tr>
                                    <!-- <td> </td> -->
                                    <td class="text-center">{{ $item->name}}</td>
                                    <td class="text-center">{{ $item->code}}</td>
                                    <td class="text-center">{{ $item->date_from}}</td>
                                    <td class="text-center">{{ $item->date_to}}</td>
                                    <td class="text-center"> @if( $item->status === 1)
                                                                 Active
                                                            @else
                                                                  InActive 
                                                            @endif
                                                             </td>
                                    
                                    <td class="text-center">
                                        <a href="/batch/update/{{$item->id }}" class="btn">Edit</a>
                                    </td>
                                    
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                         {!! $info->render() !!}
                    </div>
                    
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!--row-->
@endsection