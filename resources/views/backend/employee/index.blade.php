@extends('backend.layouts.app')

@section('content')


<!-- Search Panel Start   -->
<style>
 .mControl {
 max-width: 150px;
 min-width: 100px;
 }

 .fieldset {
 margin: 0px;
 padding: 0px;
 }

 .panel-heading {
 padding: 5px 10px !important
 }

 .form-control {
 width: 100% !important;
 }
 .form-group {
 width: 100% !important;
 }
</style>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="padding: 0px 100px 0px 100px">
 <div class="panel panel-primary">
 <div class="panel-heading" role="tab" id="headingOne" style="background-color: green">
 <div class="panel-title">
 <span class="glyphicon glyphicon-plus"></span>
 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"
 aria-controls="collapseOne" style="text-decoration: none;">
 Search Panel
 </a>
 </div>
 </div>
 <fieldset class="fieldset">
 <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
 <div class="panel-body form-inline">
 <div class="row">
   {{ Form::open(['route' => 'admin.book.search', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}
    
    
    <input type="text" name="book_name" placeholder="বইয়ের নাম" class="form-control">
    <!-- <input type="text" name="category" placeholder="ক্যাটাগরি" class="form-control"> -->
        
    <input type="text" name="author_name" placeholder=" লেখকের নাম " class="form-control">
    <!-- <input type="text" name="imam_name" placeholder=" নাম খুঁজুন " class="form-control"> -->
      <select class="form-control" name="paginate">
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="75">75</option>
        <option value="100">100</option>
        <option value="500">500</option>
    </select>

    <button type="submit"  class="btn btn-success"> খুঁজুন </button>

    {{ Form::close() }}
   
 </div>
 </div>
 </div>
 </fieldset>
 </div>
</div>

<!-- Search Panel End   -->
    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                
                 @include('backend.employee._new_sub_nav')

                <div class="panel-body">
                    <div class="">
                        <table class="table table-bordered">
                            <thead>
                                <tr>                                    
                                    <td class="text-center">ক্রম</td>
                                    <td class="text-center">নাম</td>
                                    <td class="text-center">লিঙ্গ</td>
                                    <!-- <td class="text-center">মোবাইল</td> -->
                                    <td class="text-center"> পজিশন</td>
                                    <td class="text-center"> বিভাগ</td>
                                    <td class="text-center"> যোগদানের তারিখ </td>
                                    <td class="text-center"> অবস্থা</td>
                                    <td class="text-center">#</td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($info as $key => $item)
                                <tr>
                                    <td> {{ $key+1 }} </td>
                                    <td class="text-center">{{ $item->EMP_NAME}}</td>
                                   
                                    
                                    <td class="text-center">
                                        @if( $item->GENDER ===1)
                                              ছেলে 
                                        @else
                                              মেয়ে 
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->EMP_DESIGNATION}}</td>
                                    <td class="text-center">{{ $item->EMP_DEPARTMENT}}</td>
                                    <td class="text-center">{{ $item->JOINNING_DATE}}</td>
                                    <td class="text-center">
                                        @if( $item->STATUS ===1)
                                               Active
                                        @else
                                              InActive 
                                        @endif
                                         </td>                                    
                                    <td class="text-center">
                                        <a href="{{route('admin.book.update',$item->EMP_ID)}}" class="btn">Edit</a>
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