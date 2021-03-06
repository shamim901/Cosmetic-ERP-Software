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
        <select name="category" class="form-control required">
                                    <option value="">-- ক্যাটাগরি নির্বাচন করুন  --</option>                           
                                        @foreach($category as $item)
                                        <option value="{{ $item->id }}" {{ old('division_id')==$item->id?'selected':'' }}>
                                            {{ 
                                                $item->name
                                            }}
                                        </option>
                                        @endforeach
                                </select>
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
                <div class="panel-heading">
                    <i class="fa fa-home"></i>  বইসমূহ তালিকা 
                </div>

                <div class="panel-body">
                    <div class="">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td class="text-center">নাম</td>
                                    <td class="text-center">ক্যাটাগরি</td>
                                    <td class="text-center">লেখকের নাম</td>
                                    <td class="text-center"> মোট পৃষ্ঠা সংখ্যা</td>
                                    <td class="text-center"> মূল্য</td>
                                    <td class="text-center"> প্রকাশের তারিখ </td>
                                    <td class="text-center"> সংস্কার তারিখ</td>
                                    <td class="text-center">#</td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($book_info as $key => $item)
                                <tr>
                                    <!-- <td> </td> -->
                                    <td class="text-center">{{ $item->name}}</td>
                                    <td class="text-center">{{ $item->cat_name}}</td>
                                    <td class="text-center">{{ $item->author}}</td>
                                    <td class="text-center">{{ $item->page}}</td>
                                    <td class="text-center">{{ $item->price}}</td>
                                    <td class="text-center">{{ $item->relase_date}}</td>
                                    <td class="text-center">{{ $item->edition_date}}</td>
                                    
                                    <td class="text-center">
                                        <a href="{{route('admin.book.update',$item->id)}}" class="btn">Edit</a>
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