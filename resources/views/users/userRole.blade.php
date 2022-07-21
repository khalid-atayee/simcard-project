<table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">

    <div class="form-group m-form__group form-row">
        <form method="post" name="assignRole" enctype="multipart/form-data" id="assignRole">
            @csrf

            <div class="col-lg-4">
                <label for="examplepermission"> اسم یوزر</label>
                <input type="text" name="role_name" class="form-control m-input m-input--square" value="{{ $user->name }}">
                {{-- <input type="hidden" id="role_hidden_id" value="{{ $user->id }}"> --}}
            </div>
            <div class="col-lg-4">
                <label for="exampleselect">انتخاب رول</label><br>
                <select  class="form-control m-input m-input--square" id="permission_select" >
                    <option class="unit_option" value=""></option>
                    @foreach ($roles as $role )
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                        
                    @endforeach
    
                </select>
            </div>

            <div class="col-lg-4">
                <input type="button"  onclick="userRoleForm('{{ route('user.roleAssignForm') }}','assignRole','POST')"  style="margin-top: 25px" class="form-control btn btn-outline-success btn-block" value="ایجاد رول">
             
            </div>
        </form>
    
    </div>

<thead>
    

    <tr>

        <th scope="row">#</th>
        <th scope="row">اسم رول </th>
        <th scope="row">حذف</th>
      
    </tr>



</thead>
<tbody id="tbody-role-user">

 </tbody>
</table>





