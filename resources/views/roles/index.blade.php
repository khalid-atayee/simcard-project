@extends('adminLayouts.app')

@section('content')
    <div class="m-portlet">
        
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
                    <input type="submit" id="submit-btn"  style="margin-top: 25px" class="form-control btn btn-outline-success btn-block" value="رول خویش را تایین نماید"> 
                </div>
                
            </form>

            

        <div class="m-portlet__body" id="concat">
            <table id="main-table" class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
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
            
                    {{-- @foreach ($roles as $role)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a href="{{ route('role.delete',$role->id) }}" type="button" class="btn btn-primary  m-btn--md m--margin-right-10">حذف</a>
                            
                            </td>
                            <td>
                                <a href="{{ route('role.update',$role->id) }}" type="button" class="btn btn-primary  m-btn--md m--margin-right-10">ویرایش</a>
                            
                            </td>
            
                        </tr>
                    @endforeach --}}
            
            
            
            
            
                 </tbody>
                </table>
            

        </div>

    </div>
@endsection


@section('script')

<script>
    
    $(document).ready(function () {
        getData();
        function getData()
            {
                
                $.ajax({
                    type: "get",
                    url: "{{ route('role.getData') }}",
                
                    success: function (response) {
                        var count=1;
                        if(response.status==200)
                        {
                            $('tbody').html('');
                            $.each(response.roles, function (key, value) { 
                                $('tbody').append
                                (
                                    '<tr><td>'
                                    + count++ + 
                                    '</td><td>'
                                    +value.name+
                                    '</td><td><button type="button" value="'+value.id+'" id="deleteBtn" class="btn btn-danger  m-btn--md m--margin-right-10">حذف</button></td>'+
                                    '<td><button  type="button" value="'+value.id+'"  id="updateBtn" class="btn btn-primary  m-btn--md m--margin-right-10">ویرایش</button> </td>'+
                                    '<td><button  type="button" value="'+value.id+'"  id="infoBtn" class="btn btn-info  m-btn--md m--margin-right-10">معلومات</button> </td></tr>'

                                );

                             
                           });

                        }
                        
                        
                    }
                });
            }

        $(document).on('submit','#form-role', function (e) {
            e.preventDefault();

           

            $.ajax({
                type: "post",
                url: "{{ route('role.create') }}",
                data:$(this).serialize(),
                dataType: "json",
                success: function (response) {
                    $('#error-role').html('');
                    if(response.status==400)
                    {
                        $.each(response.error, function (key, value) { 
                        $('#error-role').html(value);

                        });

                    }
                    else
                    {
                        $('#rolename').val('');

                        Swal.fire
                        (
                            'Good job!',
                            response.message,
                            'success'
                        )
                        $('#hidden-id').val('');
                         getData();

      

                    }
                    
                }
            });


            
        });

        $(document).on('click','#deleteBtn', function () {
            var delete_id = $(this).val();
            $.ajax({
                type: "delete",
                url: "{{ route('role.delete') }}/"+delete_id,
              
                success: function (response) {
                    Swal.fire(
                            'Deleted!',
                            response.message,
                            'success'
                    );
                    getData();
                    
                }
            });
            
        });

        $(document).on('click','#updateBtn', function () {
            var update_id = $(this).val();
            // console.log(update_id);
            $.ajax({
                type: "get",
                url: "{{ route('role.update') }}/"+update_id,
                success: function (response) {

                    $('#rolename').val(response.roles.name);
                    $('#submit-btn').val('رول خویش را اپدیت نماید');
                    $('#hidden-text').val(response.roles.name);
                    $('#hidden-id').val(response.roles.id);

                    
                }
            });
            
        });


        $(document).on('click','#infoBtn', function () {
            var info_id = $(this).val();

            // alert(info_id);
            $.ajax({
                type: "get",
                url: "{{ route('role.assignPermission') }}/"+info_id,
                // $('#concat').html('');
                success: function (response) {
                    $('#main-table').hide();
                    $('#form-role').hide();

                    $('#concat').append(response);
                    getRolePermissions();
                    
                }
            });
            
        });
        
        function getRolePermissions()
        {
            var role_id = $('#role_hidden_id').val();
            $.ajax({
                type: "get",
                url: "{{ route('role.getRolePermissions') }}/"+role_id,
                success: function (response) {

                    $('#tbody-role-permission').html('');
                    
                    $('#tbody-role-permission').append(response);

                }
            });
        }

        $(document).on('click' ,'#assignPermission-btn', function () {
            
            var data = {
                'role_id': $('#role_hidden_id').val(),
                'permission_name':$('#permission_select').val()
            }

            $.ajax({
                type: "post",
                url: "{{ route('role.givePermission') }}",
                data: data,
                dataType: "json",
                success: function (response) {
                   
                    $('#permission_select').val('');

                    Swal.fire(
                        'success added',
                        response.message,
                        'success'
                      );
                      getRolePermissions();
                    
                }
            });
            
        });

        $(document).on('click','#deletePermission-btn', function () {

          
            // console.log(permission_id,role_id);
            var role_id = $(this).val();
            var permission_id = $(this).attr('name');

            var data = {
                permission_id :permission_id,
                role_id : role_id,
            }
            $.ajax({
                type: "delete",
                url: "{{ route('role.revokePermission') }}",
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response.status==200)
                    {
                      getRolePermissions();
                      Swal.fire(
                        'success added',
                        response.message,
                        'success'
                      );


                    }
                                
                }
            });
            
        });

        


        
    });
</script>


@endsection
