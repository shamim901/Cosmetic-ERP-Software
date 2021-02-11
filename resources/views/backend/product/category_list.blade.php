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
    
    
    <input type="text" name="book_name" placeholder="Category Name" class="form-control">
    <!-- <input type="text" name="category" placeholder="ক্যাটাগরি" class="form-control"> -->
      <!--   <select name="category" class="form-control required">
                                    <option value="">-- ক্যাটাগরি নির্বাচন করুন  --</option>   
                                </select> -->
    <!-- <input type="text" name="author_name" placeholder=" লেখকের নাম " class="form-control"> -->
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
                
                <div style="width: 100%" style="display: inline-block;">
     
                    <div  class="panel-heading" style="width: 40%; float: left;">
                        <i class="fa fa-home"></i> Category List
                    </div>

                    <div class="panel-heading" style="width: 60%;float: right;text-align: right;" >
                    <h3> <b> <a href="{{route('admin.product.category_create')}}" class="btn btn-success">new</a> </b></h3>             
                    </div>
                </div>

                <div class="panel-body">
                    <div class="">
                        <table class="table table-bordered">
                            <thead>
                                <tr>                                    
                                    <td class="text-center">SL</td>
                                    
                                    <td class="text-center">Name</td>
                                    
                                    <td class="text-center">Status</td>
                                    
                                    <td class="text-center">#</td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($info as $key => $item)
                                <tr>
                                    <td class="text-center"> {{ $key+1 }} </td>
                                  
                                    <td class="text-center">{{ $item->category_name}}</td>
                                    
                                    <td class="text-center">
                                        @if($item->status ===1)
                                        Active
                                        @else($item->status ===2)
                                        InActive
                                        @endif
                                    </td>
                                                                        
                                    <td class="text-center">
                                        <a href="{{route('admin.book.update',$item->id)}}" class="btn">Edit</a>
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