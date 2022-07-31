{{-- <div class="permission-container"> --}}


<form id="form-role" class="form-group m-form__group form-row mx-3">
    @csrf
    <div class="col-lg-3">
        <label for="exampleInputEmail1">اسم صلاحیت</label>
        <input type="text" class="form-control m-input m-input--square" name="permissionName" id="permissionName"
            aria-describedby="emailHelp">
        <input type="hidden" name="hidden_id" id="hidden_id">
        <div id="error-permission" class="text-danger"></div>
    </div>

    <div class="col-lg-3">
        <button type="button" id="submit-btn"
            onclick="createRole('{{ route('permission.create') }}','POST','form-role','error-permission','permission-main-container')"
            style="margin-top: 25px" class="form-control btn btn-outline-success btn-block">اسم صلاحیت را
            بنویسید</button>
    </div>

</form>


<div class="m-portlet__body" id="concat">
    <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
        <thead>

            <tr>

                <th scope="row">#</th>
                <th scope="row">اسم</th>
                <th scope="row">حذف</th>
                <th scope="row">ویرایش</th>


            </tr>


        </thead>
        <tbody>
          
            @foreach ($permissions as $permission)
                <tr>
                    <td id="count_num">{{ $count }}</td>
                    <td>{{ $permission->name }}</td>
                    <td><button type="button"
                            onclick="deleteRole('{{ route('permission.delete', $permission->id) }}','delete','permission-main-container')"
                            class="btn btn-danger  m-btn--md m--margin-right-10">حذف</button></td>

                    <td><input type="button"
                            onclick="roleUpdate('{{ route('permission.update', $permission->id) }}','get','permissionName','hidden_id')"
                            class="btn btn-primary  m-btn--md m--margin-right-10" value="ویرایش">
                    </td>

                </tr>
                @php
                    $count++;
                @endphp
            @endforeach


            <input type="hidden" name="hidden_value" value="{{ $count }}" id="hidden_value">
            <input type="hidden" name="page_num" value="" id="page_num">


        </tbody>
    </table>
   
    {{ $permissions->links('pagination::bootstrap-4') }}
    {{-- @php
    $count = $count;
@endphp --}}
</div>
{{-- </div> --}}
