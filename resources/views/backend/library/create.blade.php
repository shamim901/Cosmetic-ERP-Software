@extends('backend.layouts.app')

@section('content')
{{ Form::open(['route' => 'frontend.library.create', 'class' => '','id'=>'productForm']) }}
    <div class="row">

        <div class="col-md-8 col-md-offset-2" >

            <div class="panel panel-default">
                
               @include('backend.library._new_sub_nav')


                <div class="panel-body">
                    <table class="table table-bordered">
                        <colgroup>
                            <col width="30%">
                            <col width="700%">
                        </colgroup>

                        <tbody>
                        <tr>
                            <th>বিভাগ</th>
                            <th>
                                <div class="form-group">
                                    @if($errors->has('division_id'))
                                        <div class="alert alert-warning"><i
                                                    class="fa fa-warning"></i>{{ $errors->first('division_id') }}</div>
                                    @endif

                                    <select name="division_id" id="division" class="form-control required">
                                        <option value="">-- নির্বাচন করুন --</option>
                                        @foreach($division as $item)
                                            <option value="{{ $item->id }}" {{ old('division_id')==$item->id?'selected':'' }}>
                                                {{
                                                  $item->bn_name
                                                }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                            </th>
                        </tr>

                        <tr>
                            <th>জেলা</th>
                            <th>
                                <div class="form-group">
                                    @if($errors->has('district_id'))
                                        <div class="alert alert-warning"><i
                                                    class="fa fa-warning"></i>{{ $errors->first('district_id') }}</div>
                                    @endif

                                    <select name="district_id" id="district" class="district_val form-control required">
                                        <option value="">-- নির্বাচন করুন --</option>
                                    </select>
                                </div>

                            </th>
                        </tr>

                        <tr>
                            <th>উপজেলা</th>
                            <th>
                                <div class="form-group">
                                    @if($errors->has('upazilla_id'))
                                        <div class="alert alert-warning"><i
                                                    class="fa fa-warning"></i>{{ $errors->first('upazilla_id') }}</div>
                                    @endif

                                    <select name="upazilla_id" id="upazila" class="upazila_val form-control required">
                                        <option value="">-- নির্বাচন করুন --</option>
                                    </select>
                                </div>

                            </th>
                        </tr>

                        <tr>
                            <th>ইউনিয়ন / পৌরসভা</th>
                            <th>
                                <div class="form-group">
                                    @if($errors->has('union_id'))
                                        <div class="alert alert-warning"><i
                                                    class="fa fa-warning"></i>{{ $errors->first('union_id') }}</div>
                                    @endif

                                    <select name="union_id" id="union" class="union_val form-control required">
                                        <option value="">-- নির্বাচন করুন --</option>
                                    </select>
                                </div>

                            </th>
                        </tr>

                        <tr>
                            <th>গ্রামের নাম</th>
                            <th>
                                <div class="form-group">
                                    @if($errors->has('village_id'))
                                        <div class="alert alert-warning"><i
                                                    class="fa fa-warning"></i>{{ $errors->first('village_id') }}</div>
                                    @endif

                                    <input type="text" name="village_id" id="villages" class="form-control required">
                                </div>

                            </th>
                        </tr>

                        <tr>
                            <th>মসজিদের নাম</th>
                            <th>
                                <div class="form-group">
                                    @if($errors->has('mosque_name'))
                                        <div class="alert alert-warning"><i
                                                    class="fa fa-warning"></i>{{ $errors->first('mosque_name') }}</div>
                                    @endif

                                    <input type="text" name="mosque_name" id="mosque_name"
                                           class="form-control required clear">
                                </div>

                            </th>
                        </tr>
                        <tr>
                            <th>পাঠাগার প্রতিষ্ঠার সন</th>
                            <th>
                                <div class="form-group">
                                    @if($errors->has('establish_year'))
                                        <div class="alert alert-warning"><i
                                                    class="fa fa-warning"></i>{{ $errors->first('establish_year') }}
                                        </div>
                                    @endif

                                    <input type="text" name="establish_year" id="establish_year"
                                           class="form-control required clear">
                                </div>

                            </th>
                        </tr>

                        <tr>
                            <th>ইফা প্রদত্ত পুস্তকের সংখ্যা ও প্রয়োজনীয় তথ্য</th>
                            <th>
                                <div class="form-group">
                                    @if($errors->has('total_books_by_ifa'))
                                        <div class="alert alert-warning"><i
                                                    class="fa fa-warning"></i>{{ $errors->first('total_books_by_ifa') }}
                                        </div>
                                    @endif

                                    <input type="text" value="0" name="total_books_by_ifa" id="total_books_by_ifa"
                                           class="form-control required clear books">
                                </div>

                            </th>
                        </tr>

                        <tr>
                            <th>বাইরের প্রকাশনার প্রদত্ত পুস্তকের সংখ্যা ও প্রয়োজনীয় তথ্য</th>
                            <th>
                                <div class="form-group">
                                    @if($errors->has('total_books_by_other'))
                                        <div class="alert alert-warning"><i
                                                    class="fa fa-warning"></i>{{ $errors->first('total_books_by_other') }}
                                        </div>
                                    @endif

                                    <input type="text" name="total_books_by_other" value="0" id="total_books_by_other"
                                           class="form-control required clear books">
                                </div>

                            </th>
                        </tr>

                        <tr>
                            <th>প্রাপ্ত পুস্তকের সংখ্যা</th>
                            <th>
                                <div class="form-group">
                                    @if($errors->has('total_books'))
                                        <div class="alert alert-warning"><i
                                                    class="fa fa-warning"></i>{{ $errors->first('total_books') }}</div>
                                    @endif

                                    <input type="text" name="total_books" value="0" id="total_books" readonly
                                           class="form-control required clear">
                                </div>

                            </th>
                        </tr>

                        <tr>
                            <th>পুস্তক সংরক্ষনের জন্য প্রদত্ত আলমারীর সংখ্যা</th>
                            <th>
                                <div class="form-group">
                                    @if($errors->has('total_almari'))
                                        <div class="alert alert-warning"><i
                                                    class="fa fa-warning"></i>{{ $errors->first('total_almari') }}</div>
                                    @endif

                                    <input type="text" name="total_almari" id="total_almari"
                                           class="form-control required clear">
                                </div>

                            </th>
                        </tr>

                        <tr>
                            <th>পুস্তক সংরক্ষনের জন্য প্রদত্ত আলমারী প্রদানের তারিখ</th>
                            <th>
                                <div class="form-group">
                                    @if($errors->has('almari_receive_date'))
                                        <div class="alert alert-warning"><i
                                                    class="fa fa-warning"></i>{{ $errors->first('almari_receive_date') }}
                                        </div>
                                    @endif

                                    <input type="date" name="almari_receive_date" id="almari_receive_date"
                                           class="form-control required clear">
                                </div>

                            </th>
                        </tr>

                        <tr>
                            <th>সর্বশেষ পরিদর্শন এর তারিখ</th>
                            <th>
                                <div class="form-group">
                                    @if($errors->has('last_visit_date'))
                                        <div class="alert alert-warning"><i
                                                    class="fa fa-warning"></i>{{ $errors->first('last_visit_date') }}
                                        </div>
                                    @endif

                                    <input type="date" name="last_visit_date" id="last_visit_date"
                                           class="form-control required clear">
                                </div>

                            </th>
                        </tr>
                        <tr>
                            <th>পরিদর্শনকারীর নাম</th>
                            <th>
                                <div class="form-group">
                                    @if($errors->has('visitor_name'))
                                        <div class="alert alert-warning"><i
                                                    class="fa fa-warning"></i>{{ $errors->first('visitor_name') }}</div>
                                    @endif

                                    <input type="text" name="visitor_name" id="visitor_name"
                                           class="form-control required clear">
                                </div>

                            </th>
                        </tr>

                        <tr>
                            <th>পরিদর্শনকারীর পদবি</th>
                            <th>
                                <div class="form-group">
                                    @if($errors->has('visitor_designation'))
                                        <div class="alert alert-warning"><i
                                                    class="fa fa-warning"></i>{{ $errors->first('visitor_designation') }}
                                        </div>
                                    @endif

                                    <input type="text" name="visitor_designation" id="visitor_designation"
                                           class="form-control required clear">
                                </div>

                            </th>
                        </tr>

                        <tr>
                            <th>পরিদর্শনকারীর ঠিকানা</th>
                            <th>
                                <div class="form-group">
                                    @if($errors->has('visitor_address'))
                                        <div class="alert alert-warning"><i
                                                    class="fa fa-warning"></i>{{ $errors->first('visitor_address') }}
                                        </div>
                                    @endif

                                    <input type="text" name="visitor_address" id="visitor_address"
                                           class="form-control required clear">
                                </div>

                            </th>
                        </tr>

                        <tr>
                            <th>পরিদর্শনকারীর মন্তব্য</th>
                            <th>
                                <div class="form-group">
                                    @if($errors->has('visitor_comment'))
                                        <div class="alert alert-warning"><i
                                                    class="fa fa-warning"></i>{{ $errors->first('visitor_comment') }}
                                        </div>
                                    @endif

                                    <textarea name="visitor_comment" id="visitor_comment"
                                              class="form-control required clear"></textarea>
                                </div>

                            </th>
                        </tr>

                        <tr>
                            <th>সাইনবোর্ড আছে /নাই</th>
                            <th>
                                <div class="form-group">
                                    @if($errors->has('have_signboard'))
                                        <div class="alert alert-warning"><i
                                                    class="fa fa-warning"></i>{{ $errors->first('have_signboard') }}
                                        </div>
                                    @endif

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="have_signboard"
                                               id="haveRadio" value="1" checked>
                                        <label class="form-check-label" for="haveRadio">
                                            আছে
                                        </label>

                                        <input class="form-check-input" type="radio" name="have_signboard" id="noRadion"
                                               value="0">
                                        <label class="form-check-label" for="noRadion">
                                            নাই
                                        </label>
                                    </div>
                                </div>

                            </th>
                        </tr>


                        <tr>
                            <th> মডেল মসজিদ কিনা?</th>
                            <th>
                                <div class="form-group">
                                    @if($errors->has('is_model_mosque'))
                                        <div class="alert alert-warning"><i
                                                    class="fa fa-warning"></i>{{ $errors->first('is_model_mosque') }}
                                        </div>
                                    @endif

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="is_model_mosque"
                                               id="haveRadio" value="1" checked>
                                        <label class="form-check-label" for="haveRadio">
                                            হ্যাঁ
                                        </label>

                                        <input class="form-check-input" type="radio" name="is_model_mosque"
                                               id="noRadion" value="0">
                                        <label class="form-check-label" for="noRadion">
                                            না
                                        </label>
                                    </div>
                                </div>

                            </th>
                        </tr>

                        </tbody>
                    </table>
                    <div class="text-center">
                        <button type="submit" id="saveBtn" class="btn btn-success">সংরক্ষণ</button>
                    </div>

                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!--row-->
    {{ Form::close() }}
@endsection

{{--@section('after-scripts')--}}
{{--    <script type="text/javascript">--}}
{{--        $(".books").keyup(function () {--}}
{{--            var ifa = parseInt($('#total_books_by_ifa').val()) + 0;--}}
{{--            var other = parseInt($('#total_books_by_other').val()) + 0;--}}
{{--            $('#total_books').val(ifa + other);--}}
{{--        });--}}

{{--        $('#saveBtn').click(function (e) {--}}
{{--            e.preventDefault();--}}

{{--            var isValid = true;--}}
{{--            $(".required").each(function () {--}}
{{--                if ($(this).val() === "") {--}}
{{--                    isValid = false;--}}
{{--                }--}}
{{--            });--}}

{{--            if (isValid == false) {--}}
{{--                alert('All Field is required');--}}
{{--                return false;--}}
{{--            }--}}

{{--            $('#saveBtn').hide();--}}

{{--            $.ajax({--}}
{{--                data: $('#productForm').serialize(),--}}
{{--                url: "{{ route('frontend.library.create') }}",--}}
{{--                type: "POST",--}}
{{--                dataType: 'json',--}}
{{--                success: function (data) {--}}

{{--                    $('#saveBtn').show();--}}
{{--                    $('.clear').val('');--}}
{{--                    alert('Insert Successfully');--}}
{{--                },--}}
{{--                error: function (data) {--}}
{{--                    console.log('Error:', data);--}}
{{--                    $('#saveBtn').html('Save Changes');--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}