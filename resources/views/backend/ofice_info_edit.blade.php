@extends('backend.layouts.app')


@section('content')
{{ Form::open(['route' => 'frontend.batch.saveOfc', 'class' => '','id'=>'']) }}
    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                 
                <div style="width: 100%">
                    <div  class="panel-heading" style="width: 40%; float: left;">
                         <h3> <b> অফিস  সংযুক্তকরণ </b></h3>
                    </div>

                  
                </div>

                <div class="panel-body">
                                        <table class="table table-bordered">
                        <colgroup>
                            <col width="15%">
                            <col width="20%">
                            <col width="13%">
                            <col width="20%">
                            <col width="12%">
                            <col width="20%">
                        </colgroup>
                        <thead>
                            <tr class="success">
                                <th class="text-center" colspan="6"> প্রশিক্ষণ তথ্য: </th>
                            </tr>
                        </thead>
                        <tbody>                        
                            <tr>
                                <th>অফিসের নাম </th>
                                <td>
                                    <input type="text" name="name" value="{{ $district_office->ofice_name}}" class="form-control required">
                                </td>
                             
                                
                                <th> ঠিকানা</th>
                                <td>
                                    <input type="text" name="adress" value="{{ $district_office->address}}" class="form-control required">
                                </td>

                                <th>ফোন</th>
                                <td>
                                    <input type="text" name="phone" value="{{ $district_office->phone}}" class="form-control required">
                                </td>

                             
                            </tr>
                            

                            <tr>
                                <th>ইমেইল</th>
                                    <td>
                                     <input type="text" name="gmail" value="{{ $district_office->email}}" class="form-control required">
                                    </td>
                            </tr>
                      </tbody>
                    </table>

                    
             

                    <div class="text-center">
                        <button type="submit" class="btn btn-success" >সংরক্ষণ</button>
                    </div>
                    
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!--row-->
    {{ Form::close() }}
@endsection