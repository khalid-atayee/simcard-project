<div class="role-container">


    <form id="form-role" class="form-group m-form__group form-row mx-3">
        @csrf
        <div class="col-lg-3">
            <label for="exampleInputEmail1">اسم رول</label>
            <input type="text" class="form-control m-input m-input--square" name="rolename" id="rolename"
                aria-describedby="emailHelp">
            <div id="error-role" class="text-danger"></div>

            {{-- <input type="hidden" name="hidden_name" id="hidden-text"> --}}
            <input type="hidden" name="hidden_id" id="hidden-id">
        </div>

        <div class="col-lg-3">
            <input type="button" id="submit-btn" onclick="createRole('{{ route('role.create') }}','post','form-role')"
                style="margin-top: 25px" class="form-control btn btn-outline-success btn-block"
                value="رول خویش را تایین نماید">
        </div>

    </form>



    {{-- <div class="" id="concat"> --}}
        <table id="main-table"
            class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
            <thead>

                <tr>

                    <th scope="row">#</th>
                    <th scope="row">اسم</th>
                    <th scope="row">حذف</th>
                    <th scope="row">ویرایش</th>
                    <th scope="row">معلومات</th>


                </tr>


            </thead>
            <tbody>

                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <input type="button" onclick="deleteRole('{{ route('role.delete', $role->id) }}','delete')"
                                class="btn btn-danger  m-btn--md m--margin-right-10" value="حذف">

                        </td>
                        <td>
                            <input type="button" onclick="roleUpdate('{{ route('role.update', $role->id) }}','get')"
                                class="btn btn-primary  m-btn--md m--margin-right-10" value="ویرایش">

                        </td>
                        <td>
                            <input type="button" onclick="roleInfo('{{ route('role.info', $role->id) }}','get')"
                                id="infoBtn" class="btn btn-info  m-btn--md m--margin-right-10" value="معلومات">
                        </td>

                    </tr>
                @endforeach





            </tbody>
        </table>


    {{-- </div> --}}


</div>
