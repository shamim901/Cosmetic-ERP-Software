@extends('backend.layouts.app')

@section('content')


    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                 
                 @include('backend.category._list_sub_nav')

                <div class="panel-body">
                    <div class="">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <!-- <td class="text-center">#</td> -->
                                    <td class="text-center">নাম</td>
                                   <!--  <td class="text-center">কোড</td> -->
                                    <td class="text-center">ধরণ</td>
                                    <td class="text-center">বর্ণনা</td>
                                    <td class="text-center">##</td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($info as $key => $item)
                                <tr>
                                    <!-- <td> </td> -->
                                    <td class="text-center">{{ $item->name}}</td>
                                   
                                    <td class="text-center">{{ $item->type}}</td>
                                    <td class="text-center">{{ $item->description}}</td>
                                    
                                    
                                    <td class="text-center">
                                        <a href="update/{{$item->id }}" class="btn btn-success">Edit</a>
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