{{-- <div class="form-group m-form__group form-row"> --}}
    <button onclick="backtoMain('{{ route('user.backToUser') }}','get','permission-table')" style="float: left" class="btn btn-secondary m-btn m-btn--icon m-btn--wide">
        <span>
            <i class="fa fa-history"></i>
            <span style="color: black">بازگشت</span>
        </span>
    </button>
    <form class="form-group m-form__group form-row" id="assignRoleForm">

        @csrf
    
        <div class="col-lg-4">
            <label for="examplepermission"> اسم یوزر</label>
            <input type="text" disabled name="user_name" class="form-control m-input m-input--square" value="{{ $user->name }}">
            {{-- <input type="hidden" id="role_hidden_id" value="{{ $user->id }}"> --}}
        </div>
        <div class="col-lg-4">
            <label for="exampleselect">انتخاب صلاحیت</label><br>
            <select class="form-control m-input m-input--square" name="permission_name" id="role">
                <option class="unit_option" value=""></option>
                @foreach ($permissions as $permission)
                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                @endforeach
    
            </select>
        </div>
    
        <div class="col-lg-4">
            <input type="button" onclick="givePermissionTo('{{ route('user.givePermissionTo',$user->id) }}','post')" id="assignRole" style="margin-top: 25px" class="form-control btn btn-outline-success btn-block"
                value="ایجاد صلاحیت">
    
        </div>
        {{-- onclick="userRoleForm('{{ route('user.roleAssignForm',$user->id) }}','POST','assign-role')" --}}
    </form>
<table class="table table-striped- table-bordered table-hover  no-footer dtr-inline">

    <thead>


        <tr>

            <th scope="row">#</th>
            <th scope="row">اسم یوزر</th>
            <th scope="row">صلاحیت های که دارد </th>
            <th scope="row">حذف</th>
            
        </tr>



    </thead>
    <tbody >

        @if ($user->permissions)
        @foreach ($user->permissions as $user_has_permission )
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user_has_permission->name }}</td>
            <td><input type="button" onclick="revokePermissionUser('{{ route('user.revokePermission')}}','delete','{{ $user->id }}','{{ $user_has_permission->id }}')" class="btn btn-danger m-btn m-btn--icon m-btn--wide"    value="حذف" ></td>

        </tr>
            
        @endforeach
            
        @endif

    </tbody>
</table>
