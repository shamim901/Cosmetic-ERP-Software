@extends('backend.layouts.app')

@section('content')

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-home"></i> প্রশিক্ষণ তালিকা 
                </div>

                <div class="panel-body">
                    <div class="">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <!-- <td class="text-center">#</td> -->
                                    <td class="text-center">প্রশিক্ষণের নাম</td>
                                    <td class="text-center">কোড</td>
                                    <td class="text-center">সময়কাল (দিন)</td>
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
                                    <td class="text-center">{{ $item->number}}</td>
                                    <td class="text-center"> @if( $item->status === 1)
                                                                 Active
                                                            @else
                                                                  InActive 
                                                            @endif
                                                             </td>
                                    
                                    <td class="text-center">
                                        <a href="/train/edit/{{$item->id }}" class="btn">Edit</a>
                                    </td>
                                    
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!--row-->
@endsection