
    <button onclick="backtoMain('{{ route('user.backToUser') }}','get')" style="float: left" class="btn btn-secondary m-btn m-btn--icon m-btn--wide">
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
            <label for="exampleselect">انتخاب رول</label><br>
            <select class="form-control m-input m-input--square" name="role_name" id="role">
                <option class="unit_option" value=""></option>
                @foreach ($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
    
            </select>
        </div>
    
        <div class="col-lg-4">
            <input type="button"
                onclick="userRoleForm('{{ route('user.roleAssignForm', $user->id) }}','POST','assignRoleForm')"
                id="assignRole" style="margin-top: 25px" class="form-control btn btn-outline-success btn-block"
                value="ایجاد رول">
    
        </div>
        {{-- onclick="userRoleForm('{{ route('user.roleAssignForm',$user->id) }}','POST','assign-role')" --}}
    </form>
<table class="table table-striped- table-bordered table-hover  no-footer dtr-inline">

    <thead>


        <tr>

            <th scope="row">اسم یوزر</th>
            <th scope="row">رول های که دارد </th>
            <th scope="row">حذف</th>
            
        </tr>



    </thead>
    <tbody >

        @if ($user->roles)
        @foreach ($user->roles as $user_has_roles )
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user_has_roles->name }}</td>
            <td><input type="button" class="btn btn-danger m-btn m-btn--icon m-btn--wide" onclick="revokeRole('{{ route('user.revokeRole')}}','delete',{{ $user->id }},{{ $user_has_roles->id }})"   value="حذف" ></td>

        </tr>
            
        @endforeach
            
        @endif

    </tbody>
</table>


