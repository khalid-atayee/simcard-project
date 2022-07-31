@extends('adminLayouts.app')

@section('content')
    <div class="m-portlet">
        
        <div class="role-main-container m-portlet__body">
            @include('roles.rolesTable');
            
        </div>
        
           
    </div>
@endsection


@section('script')

<script>
    
    $(document).ready(function () {
       

          
                // success: function (response) {
                    // $('#error-role').html('');
                    // if(response.status==400)
                    // {
                    //     $.each(response.error, function (key, value) { 
                    //     $('#error-role').html(value);

                    //     });

                    // }
                    // else
                    // {
                        // $('#rolename').val('');

                        // Swal.fire
                        // (
                        //     'Good job!',
                        //     response.message,
                        //     'success'
                        // )
                        // $('#hidden-id').val('');
                       

      

            //         }
                    
            //     }
            // });


            
    //     });

    //     $(document).on('click','#deleteBtn', function () {
    //         var delete_id = $(this).val();
    //         $.ajax({
    //             type: "delete",
              
    //             success: function (response) {
    //                 Swal.fire(
    //                         'Deleted!',
    //                         response.message,
    //                         'success'
    //                 );
                   
                    
    //             }
    //         });
            
    //     });

    //     $(document).on('click','#updateBtn', function () {
    //         var update_id = $(this).val();
    //         // console.log(update_id);
    //         $.ajax({
    //             type: "get",
    //             success: function (response) {

    //                 $('#rolename').val(response.roles.name);
    //                 $('#submit-btn').val('رول خویش را اپدیت نماید');
    //                 $('#hidden-text').val(response.roles.name);
    //                 $('#hidden-id').val(response.roles.id);

                    
    //             }
    //         });
            
    //     });


    //     $(document).on('click','#infoBtn', function () {
    //         var info_id = $(this).val();

    //         // alert(info_id);
    //         $.ajax({
    //             type: "get",
    //             // $('#concat').html('');
    //             success: function (response) {
    //                 $('#main-table').hide();
    //                 $('#form-role').hide();

    //                 $('#concat').append(response);
    //                 getRolePermissions();
                    
    //             }
    //         });
            
    //     });
        
    //     function getRolePermissions()
    //     {
    //         var role_id = $('#role_hidden_id').val();
    //         $.ajax({
    //             type: "get",
    //             success: function (response) {

    //                 $('#tbody-role-permission').html('');
                    
    //                 $('#tbody-role-permission').append(response);

    //             }
    //         });
    //     }

    //     $(document).on('click' ,'#assignPermission-btn', function () {
            
    //         var data = {
    //             'role_id': $('#role_hidden_id').val(),
    //             'permission_name':$('#permission_select').val()
    //         }

    //         $.ajax({
    //             type: "post",
    //             data: data,
    //             dataType: "json",
    //             success: function (response) {
                   
    //                 $('#permission_select').val('');

    //                 Swal.fire(
    //                     'success added',
    //                     response.message,
    //                     'success'
    //                   );
    //                   getRolePermissions();
                    
    //             }
    //         });
            
    //     });

    //     $(document).on('click','#deletePermission-btn', function () {

          
    //         // console.log(permission_id,role_id);
    //         var role_id = $(this).val();
    //         var permission_id = $(this).attr('name');

    //         var data = {
    //             permission_id :permission_id,
    //             role_id : role_id,
    //         }
    //         $.ajax({
    //             type: "delete",
    //             data: data,
    //             dataType: "json",
    //             success: function (response) {
    //                 if(response.status==200)
    //                 {
    //                   getRolePermissions();
    //                   Swal.fire(
    //                     'success added',
    //                     response.message,
    //                     'success'
    //                   );


    //                 }
                                
    //             }
    //         });
            
    //     });

        


        
    });
</script>


@endsection
