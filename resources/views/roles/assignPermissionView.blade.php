<table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">

    {{-- <div class="form-group form-row "> --}}
        <div class="form-group m-form__group form-row">
            <form action="" id="assign-permission">
                @csrf

                <div class="col-lg-4">
                    <label for="examplepermission"> اسم رول</label>
                    <input type="text" name="role_name" class="form-control m-input m-input--square" value="{{ $role->name }}">
                    <input type="hidden" id="role_hidden_id" value="{{ $role->id }}">
                </div>
                <div class="col-lg-4">
                    <label for="exampleselect">انتخاب صلاحیت</label><br>
                    <select  class="form-control m-input m-input--square" id="permission_select" >
                        <option class="unit_option" value=""></option>
                        @foreach ($permissions as $permission )
                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                            
                        @endforeach
        
                    </select>
                </div>

                <div class="col-lg-4">
                    <input type="submit" id="submit-btn" style="margin-top: 25px" class="form-control btn btn-outline-success btn-block" value="ایجاد صلاحیت">
                 
                </div>
            </form>
        
        </div>

    <thead>
        

        <tr>

            <th scope="row">#</th>
            <th scope="row">اسم صلاحیت </th>
            <th scope="row">حذف</th>
          
        </tr>



    </thead>
    <tbody id="tbody-role-permission">
        {{-- @if ($role->permissions)
        @foreach ($role->permissions as $role_permissions)
        <tr>
            <td>{{ $loop->index+1 }}</td>
             <td>{{ $role_permissions->name }}</td>
             <td><input type="submit" id="submit-btn"class=" btn btn-outline-danger" value="حذف صلاحیت"></td>


        </tr>
            
        @endforeach
            
        @endif --}}
        
        
     </tbody>
    </table>
  


    {{-- @section('script')
    <script>
        $('#selectUnit').select2({
            placeholder:'انتخاب نماید',
            dir: 'rtl'

        });
    </script>
        
    @endsection --}}

    
