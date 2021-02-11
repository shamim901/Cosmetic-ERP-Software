{{ Form::open(['route' => 'admin.book.save_author', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}


<div class="modal fade" id="duePaidModal" tabindex="-1" role="dialog" aria-labelledby="duePaidModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="duePaidModal">Paid </h5>
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
                    <th class="text-center" colspan="6">  Customer Info: </th>
                </tr>
              </thead>
              <tbody>              
                <tr>
                    <th>Id</th>
                    <td>
                       
                    </td>

                    <th>Name </th>
                    <td>
                       
                    </td>

                    <th>Mobile </th>
                    <td>
                        
                    </td>  
                </tr>

                <tr>
                  <th>Due</th>
                  <td><input type="text" name="name" value="" class="form-control required"></td>

                  <th colspan="1">Discount</th>
                  <td><input type="text" name="name" value="" class="form-control required"></td>
                </tr>                   
            </tbody>
          </table>

                  
             

          <div class="text-center">
            <button type="submit" class="btn btn-success" >Save</button>
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
