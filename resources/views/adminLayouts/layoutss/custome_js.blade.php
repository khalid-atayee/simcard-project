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

    $('#form-role').submit(function(event){
        event.preventDefault();
    });

    function createRole(url,method,formDev,errorDev,assignDev)
    {
      
        var data = $('#'+formDev).serialize();


        $.ajax({
            type: method,
            url: url,
            data:data,
            dataType:'json',
            // cache:false,
            // processData:false,
            // contentType:false,
            success: function (response) {
                if(response.status==200)
                {

                    
                    $('.'+assignDev).html(response.html_view);
                    Swal.fire
                            (
                                'Good job!',
                                response.message,
                                'success'
                            )
                }
            
  
            },
            error: function(response)
            {
                $('#error-role').html('');
                    if(response.status==400)
                    {
                        $.each(response.responseJSON.error, function (key, value) { 
                        $('#'+errorDev).html(value);

                        });
                        // $('#error-role').html(response.responseJSON.error);

                    }

            }
        });

    }
    function deleteRole(url,method,devContent)
    {
        $.ajax({
            type: method,
            url: url,
            success: function (response) {
                $('.'+devContent).html(response);
                
            }
        });
    }

    function roleUpdate(url,method,nameDev,hidden_idDev)
    {
        $.ajax({
            type: method,
            url: url,
            success: function (response) {
                $('#'+nameDev).val(response.values.name);
                $('#'+hidden_idDev).val(response.values.id);
            }
        });

    }

    function roleInfo(url,method)
    {
        $.ajax({
            type:method,
            url: url,

            success: function (response) {
                $('.role-main-container').html(response);
                
            }
        });
    }

    function deletePermission(url, method,role_id,role_permission_id)
    {

        var data = {
            'role_id':role_id,
            'permission_id':role_permission_id,
        }
        console.log(data);
        
        $.ajax({
            type:method ,
            url: url,
            data: data,
            dataType: 'json',
            success: function (response) {
                $('.role-main-container').html(response.html_view);



                
            }
        });
    }


    function createRole_override_mistakenly(url,method,form_id)
    {

        var data = $('#'+form_id).serialize();
        // console.log(data);
        $.ajax({
            type:method,
            url: url,
            data: data,
            dataType: "json",
            success: function (response) {
                $('.role-main-container').html(response.html_view);
                Swal.fire
                        (
                            'Good job!',
                            response.message,
                            'success'
                        )
                
            },
            error: function (response)
            {
                Swal.fire
                        (
                            'Good job!',
                            response.responseJSON.error,
                            'success'
                        )
                $('#permission_select').val('');


            }

        });
    }

    function backtoMain(url,method,dev)
    {
        // alert('ok');

        $.ajax({
            type: method,
            url:url,
          
            success: function (response) {
                $('.'+dev).html(response);
                
            }
        });

    }

// ------------------------------------------------------------------------------------>
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

    function makeUser(url,method,formDev)
    {
        // var data =  $('.'+formDev).serialize();
        var data = new FormData($('.'+formDev)[0]);
        // console.log(data);
        $.ajax({
            type: method,
            url: url,
            data: data,
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $(document).find('div.error').text('');


            },
            success: function (response) {
                $('.main-container').html(response.html_content);
                
            },
            error: function(response){
                $.each(response.responseJSON.errors, function (key, value) { 
                    $('#error-'+key).html(value);
                     
                });
            }
        });

    }


    // ajax pagination 
    $(document).ready(function () {
        $(document).on('click','.pagination a', function (e) {
            e.preventDefault();
            // alert('you clicked pagination');
            var page = $(this).attr('href').split('page=')[1];
            $('#page_num').val(page);
            console.log(page);
            getPagination(page);

            
            
        });
    });



    function getPagination(page)
    {
        var data = {
            'hidden_value':$('#hidden_value').val(),
            'page_num':$('#page_num').val(),
         }
        $.ajax({
            type: "get",
            url: "{{ route('records.pagination') }}"+"?page="+ page,
            data:data,

            success: function (response) {

                $('.permission-main-container').html(response);
                // $('tr #count_num').html(page);


                
            }
        });
    }

   

    
    
</script>
