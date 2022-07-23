<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function testWork(url, params, method, div) {
        var unit_id = document.getElementById('selectUnit').value;
        // alert(id);
        $.ajax({
            url: url,
            data: params,
            type: method,
            // {
            //     'unit_id': unit_id
            // },

            success: function(response) {
                $('#' + div).html(response);

            }
        });

    }


    function deleteUser(url, method) {
        // var data  = $('#userDelete').val();

        // var userId = {
        //     'user_id':data
        // }

        // console.log(userId);
        $.ajax({
            type: method,
            url: url,

            success: function(response) {
                $('.main-container').html(response.html_content);
                Swal.fire(
                    'success added',
                    response.message,
                    'success'
                );


            },

            error: function(response) {
                if (response.status == 401) {
                    Swal.fire(

                        'success added',
                        response.responseJSON.errors,
                        'success'

                    );

                }



            }
        });
    }


    function assignRoleToUser(url, method) {
        $.ajax({
            type: method,
            url: url,
            success: function(response) {

                $('.main-container').html(response);

            }
        });
    }

    function userRoleForm(url, method, div) {

        var params = $('#' + div).serialize();

        $.ajax({
            type: method,
            url: url,
            data: params,

            success: function(response) {
                $('.main-table').html(response)

            }
        });


    }

    function revokeRole(url, method, user_id, role_id) {

        // console.log(user_id,role_id);
        var values = {
            'user_id': user_id,
            'role_id': role_id
        }
        console.log(values);
        $.ajax({
            type: method,
            url: url,
            data: values,

            success: function(response) {
                $('.main-table').html(response.html_content);
                Swal.fire(

                    'success added',
                    response.message,
                    'success'

                );

            },
            error: function(response) {
                if (response.status == 409)
                    Swal.fire(

                        'not found',
                        response.responseJSON.error,
                        'success'

                    );
            },

            // cache:false,
            // processData:false,
            // contentType:false,
        });



    }
    
    function assignPermissionToUser(url,method){
        $.ajax({
            type: method,
            url: url,
            success: function (response) {
                $('.main-container').html(response);
                
            }
        });
    
    }

    function givePermissionTo(url,method){
        // alert('ok');
        var data = $('#assignRoleForm').serialize();
        $.ajax({
            type: method,
            url: url,
            data:data,
 
            success: function (response) {
                $('.permission-table').html(response);
                
            }
        });
    }

    function revokePermissionUser(url,method,user_id,permission_id)
    {
        // console.log(user_id,permission_id);
        var data = {
            'user_id':user_id,
            'permission_id':permission_id,
        }

        $.ajax({
            type: method,
            url: url,
            data: data,
         
            success: function (response) {
                $('.permission-table').html(response);
            }
        });
    }

    function backtoMain(url,method)
    {
        $.ajax({
            type: method,
            url:url,
          
            success: function (response) {
                $('.main-container').html(response);
                
            }
        });

    }
    
</script>
