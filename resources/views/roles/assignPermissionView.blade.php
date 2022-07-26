<button onclick="backtoMain('{{ route('user.backToRole') }}','get','role-main-container')" style="float: left"
    class="btn btn-secondary m-btn m-btn--icon m-btn--wide">
    <span>
        <i class="fa fa-history"></i>
        <span style="color: black">بازگشت</span>
    </span>
</button>



{{-- <div > --}}
    <form id="assign-permission" class="form-group m-form__group form-row">
        @csrf

        <div class="col-lg-4">
            <label for="examplepermission"> اسم رول</label>
            <input type="text" id="role_input" name="role_name" class="form-control m-input m-input--square" value="{{ $role->name }}">
            <input type="hidden" id="role_hidden_id" name="role_id" value="{{ $role->id }}">
        </div>
        <div class="col-lg-4">
            <label for="exampleselect">انتخاب صلاحیت</label><br>
            <select class="form-control m-input m-input--square" name="permission_name" id="permission_select">
                <option class="unit_option" value=""></option>
                @foreach ($permissions as $permission)
                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                @endforeach

            </select>
        </div>

        <div class="col-lg-4">
            <input type="button" onclick="createRole('{{ route('role.createPermission') }}','post','assign-permission')" id="assignPermission-btn" style="margin-top: 25px"
                class="form-control btn btn-outline-success btn-block" value="ایجاد صلاحیت">

        </div>
    </form>

{{-- </div> --}}
<table class="table table-striped- table-bordered table-hover  no-footer dtr-inline">

    <thead>


        <tr>

            <th scope="row">#</th>
            <th scope="row">اسم صلاحیت </th>
            <th scope="row">حذف</th>

        </tr>



    </thead>
    <tbody id="tbody-role-permission">
        @if ($role->permissions)
            @foreach ($role->permissions as $role_permissions)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>
                        {{ $role_permissions->name }}

                    </td>
                    <td> <button onclick="deletePermission('{{ route('role.removePermission') }}','delete',{{ $role->id }},{{ $role_permissions->id }})" id="deletePermission-btn" 
                            class=" btn btn-outline-danger">حذف صلاحیت</button> </td>



                </tr>
            @endforeach

        @endif



    </tbody>
</table>
