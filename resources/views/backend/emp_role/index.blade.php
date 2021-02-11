@extends('backend.layouts.app')

@section('content')



<!-- Search Panel Start   -->
<!-- <style>
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
   {{ Form::open(['route' => 'admin.train.list', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}
    
    
      
    <input type="text" name="train_name" placeholder="প্রশিক্ষণের নাম  " class="form-control">
    <input type="text" name="train_code" placeholder=" কোড " class="form-control">
     
    <input type="date" name="from_date"  class="form-control">
    <input type="date" name="to_date"  class="form-control">
    
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
 -->
<!-- Search Panel End   -->

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                
                <div style="width: 100%">
                    <div  class="panel-heading" style="width: 40%; float: left;">
                      <i class="fa fa-home"></i> ভূমিকা তালিকা 
                    </div>

                    <div class="panel-heading" style="width: 60%;float: right;text-align: right;" >
                        <h3> <b> <a href="{{route('admin.emp_role.create')}}" class="btn btn-success">Create</a> </b></h3>             
                    </div>
                </div>

                <div class="panel-body">
                    <div class="">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <!-- <td class="text-center">#</td> -->
                                    <td class="text-center">ভূমিকা নাম</td>
                                    <!-- <td class="text-center">কোড</td> -->
                                    <!-- <td class="text-center">সময়কাল (দিন)</td> -->
                                    <td class="text-center">অবস্থা</td>
                                    <td class="text-center">Action</td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($info as $key => $item)
                                <tr>
                                    <!-- <td> </td> -->
                                    <td class="text-center">{{ $item->name}}</td>
                                     
                                    <td class="text-center"> @if( $item->status === 1)
                                                                 Active
                                                            @else
                                                                  InActive 
                                                            @endif
                                                             </td>
                                    
                                    <td class="text-center">
                                        <a href="/admin/emp_role/edit/{{$item->id }}" class="btn">Edit</a>
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