{{ Form::open(['route' => 'admin.book.save_author', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}


<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModal"> লেখক সংযুক্তকরণ </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                  <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
               <!--  <div class="panel-heading text-center">
                    <h3> <b> লেখক সংযুক্তকরণ </b></h3>
                    
                </div> -->

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
                    <th class="text-center" colspan="6">  লেখকের তথ্য: </th>
                </tr>
              </thead>
              <tbody>              
                <tr>
                    <th>নাম </th>
                    <td>
                      <input type="text" name="name" value="" class="form-control required">
                    </td>

                      <th> মোবাইল </th>
                    <td>
                      <input type="text" name="mobile" value="" class="form-control required">
                    </td>
                 
                 
                </tr>

                <tr>
                     <th> বিভাগ </th>
                    <td>
                        <select name="division_id" id="division" class="form-control required">
                              <option value="">-- নির্বাচন করুন  --</option>
                              <option value="1">চট্টগ্রাম</option>
                              <option value="2">রাজশাহী</option>
                              <option value="3">খুলনা</option>
                              <option value="4">বরিশাল</option>
                              <option value="5">সিলেট</option>
                              <option value="6">ঢাকা</option>
                              <option value="7">রংপুর</option>
                              <option value="8">ময়মনসিংহ</option>
                           <!--  -->
                            </select>
                    </td>

                    <th>জেলা </th>
                    <td>
                        
                            <select name="district_id" id="district" class="district_val form-control required">
                              <option value="">-- নির্বাচন করুন  --</option>
                            </select>
                    </td>

                </tr>

                 <tr>
                <th> উপজেলা </th>
                    <td>
                       <select name="upazilla_id" id="upazila" class="upazila_val form-control required">
                              <option value="">-- নির্বাচন করুন  --</option>
                            </select>
                    </td>

                     
                     
                    <th> ইউনিয়ন / পৌরসভা </th>
                    <td>
                        <div class="form-group">
                            @if($errors->has('union_id'))
                              <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('union_id') }}</div>
                            @endif
                            
                            <select name="union_id" id="union" class="union_val form-control required">
                              <option value="">-- নির্বাচন করুন  --</option>
                            </select>
                          </div>
                    </td>
                  
                </tr>
                <tr>
                     <th>গ্রামের নাম</th>
                    <td>
                       <div class="form-group">
                            @if($errors->has('village_id'))
                              <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('village_id') }}</div>
                            @endif
                            
                            <input type="text" name="village_id" id="villages" class="form-control">
                          </div>
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
            </div>
        </div>
    </div>
</div>

{{ Form::close() }}
