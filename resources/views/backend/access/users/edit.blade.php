@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($user, ['route' => ['admin.access.user.update', $user], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.access.users.edit') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.access.includes.partials.user-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="box-body">
                <div class="form-group">
                    <label for="division" class="col-lg-2 control-label">Division</label>
                    <div class="col-lg-10">
                        <select name="division" id="division" class="form-control box-size required" >
                            <option value=""></option>
                            @foreach($divisions as $item)
                                <option value="{{ $item->id }}" {{ $user->division == $item->id?'selected':'' }}>
                                    {{
                                      $item->bn_name
                                    }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="district" class="col-lg-2 control-label">District</label>
                    <div class="col-lg-10">
                        <select name="district" id="district" class="form-control box-size required district_val">
                            @foreach($districts as $item)
                                <option value="{{ $item->id }}" {{ $user->district == $item->id?'selected':'' }}>
                                    {{
                                      $item->bn_name
                                    }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="upazila" class="col-lg-2 control-label">Upazila/Thana</label>
                    <div class="col-lg-10">
                        <select name="upazila" id="upazila" class="form-control box-size required upazila_val">
                            @foreach($upazilas as $item)
                                <option value="{{ $item->id }}" {{ $user->upazila == $item->id?'selected':'' }}>
                                    {{
                                      $item->bn_name
                                    }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="union" class="col-lg-2 control-label ">Union</label>
                    <div class="col-lg-10">
                        <select name="union" id="union" class="form-control box-size required union_val" >
                            @foreach($unions as $item)
                                <option value="{{ $item->id }}" {{ $user->union == $item->id?'selected':'' }}>
                                    {{
                                      $item->bn_name
                                    }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- First Name / Name --}}
                <div class="form-group">
                    <label for="first_name" class="col-lg-2 control-label required">Name</label>
                    <div class="col-lg-10">
                        {{ Form::text('first_name', null, ['class' => 'form-control box-size', 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                {{-- Email --}}
                <div class="form-group">
                    {{ Form::label('email', trans('validation.attributes.backend.access.users.email'), ['class' => 'col-lg-2 control-label required']) }}

                    <div class="col-lg-10">
                        {{ Form::text('email', null, ['class' => 'form-control box-size', 'placeholder' => trans('validation.attributes.backend.access.users.email'), 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                {{-- User Name --}}
                <div class="form-group">
                    <label for="Name" class="col-lg-2 control-label required">Username / Mobile Number</label>
                    <div class="col-lg-10">
                        {{ Form::text('username', null, ['class' => 'form-control box-size', 'required' => 'required', 'disabled' => 'disabled']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                   {{-- First Name / Name --}}
                <div class="form-group">
                    <label for="password" class="col-lg-2 control-label required">Password</label>
                    <div class="col-lg-10">
                        {{ Form::password('password', null, ['class' => 'form-control box-size', 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                {{-- Status --}}
                @if ($user->id != 1)
                    <div class="form-group">
                        {{ Form::label('status', trans('validation.attributes.backend.access.users.active'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-1">
                                <div class="control-group">
                                    <label class="control control--checkbox">
                                         {{ Form::checkbox('status', '1', $user->status == 1) }}
                                    <div class="control__indicator"></div>
                                    </label>
                                </div>
                        </div><!--col-lg-1-->
                    </div><!--form control-->

                    {{-- Confirmed --}}
                    <div class="form-group">
                        {{ Form::label('confirmed', trans('validation.attributes.backend.access.users.confirmed'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-1">
                            <div class="control-group">
                                <label class="control control--checkbox">
                                    {{ Form::checkbox('confirmed', '1', $user->confirmed == 1) }}
                                    <div class="control__indicator"></div>
                                </label>
                            </div>
                        </div><!--col-lg-1-->
                    </div><!--form control-->

                    {{-- Associated Roles --}}
                    <div class="form-group">
                        {{ Form::label('status', trans('validation.attributes.backend.access.users.associated_roles'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-8">
                            @if (count($roles) > 0)
                                @foreach($roles as $role)
                                    <div>
                                    <label for="role-{{$role->id}}" class="control control--radio">
                                    <input type="radio" value="{{$role->id}}" name="assignees_roles[]" {{ is_array(old('assignees_roles')) ? (in_array($role->id, old('assignees_roles')) ? 'checked' : '') : (in_array($role->id, $userRoles) ? 'checked' : '') }} id="role-{{$role->id}}" class="get-role-for-permissions" />  &nbsp;&nbsp;{!! $role->name !!}
                                    <div class="control__indicator"></div>
                                    <a href="#" data-role="role_{{$role->id}}" class="show-permissions small">
                                        (
                                            <span class="show-text">{{ trans('labels.general.show') }}</span>
                                            <span class="hide-text hidden">{{ trans('labels.general.hide') }}</span>
                                            {{ trans('labels.backend.access.users.permissions') }}
                                        )
                                    </a>
                                    </label>
                                    </div>
                                    <div class="permission-list hidden" data-role="role_{{$role->id}}">
                                        @if ($role->all)
                                            {{ trans('labels.backend.access.users.all_permissions') }}
                                        @else
                                            @if (count($role->permissions) > 0)
                                                <blockquote class="small">
                                                    @foreach ($role->permissions as $perm)
                                                        {{$perm->display_name}}<br/>
                                                    @endforeach
                                                </blockquote>
                                            @else
                                                {{ trans('labels.backend.access.users.no_permissions') }}<br/><br/>
                                            @endif
                                        @endif
                                    </div><!--permission list-->
                                @endforeach
                            @else
                                {{ trans('labels.backend.access.users.no_roles') }}
                            @endif
                        </div><!--col-lg-3-->
                    </div><!--form control-->

                    {{-- Associated Permissions --}}
                    <div class="form-group" style="display: none">
                        {{ Form::label('associated-permissions', trans('validation.attributes.backend.access.roles.associated_permissions'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            <div id="available-permissions" style="width: 700px; height: 200px; overflow-x: hidden; overflow-y: scroll;">
                                <div class="row">
                                    <div class="col-xs-12 get-available-permissions">
                                        @if ($permissions)

                                            @foreach ($permissions as $id => $display_name)
                                            <div class="control-group">
                                                <label class="control control--checkbox" for="perm_{{ $id }}">
                                                    <input type="checkbox" name="permissions[{{ $id }}]" value="{{ $id }}" id="perm_{{ $id }}" {{ isset($userPermissions) && in_array($id, $userPermissions) ? 'checked' : '' }} /> <label for="perm_{{ $id }}">{{ $display_name }}</label>
                                                    <div class="control__indicator"></div>
                                                </label>
                                            </div>
                                            @endforeach
                                        @else
                                            <p>There are no available permissions.</p>
                                        @endif
                                    </div><!--col-lg-6-->
                                </div><!--row-->
                            </div><!--available permissions-->
                        </div><!--col-lg-3-->
                    </div><!--form control-->

                @endif
                <div class="edit-form-btn">
                    {{ link_to_route('admin.access.user.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-primary btn-md']) }}
                    <div class="clearfix"></div>
                </div>
            </div><!-- /.box-body -->
        </div><!--box-->

        @if ($user->id == 1)
            {{ Form::hidden('status', 1) }}
            {{ Form::hidden('confirmed', 1) }}
            {{ Form::hidden('assignees_roles[]', 1) }}
        @endif

    {{ Form::close() }}
@endsection

@section('after-scripts')
    <script type="text/javascript">
        Backend.Utils.documentReady(function(){
            csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            Backend.Users.selectors.getPremissionURL = "{{ route('admin.get.permission') }}";
            Backend.Users.init("edit");
        });
        window.onload = function () {
            Backend.Users.windowloadhandler();
        };

    </script>
@endsection
