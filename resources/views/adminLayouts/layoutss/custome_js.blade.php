<script type="text/javascript">
 $.ajaxSetup({
        headers : {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

function testWork(url,params,method,div)
{
    var unit_id = document.getElementById('selectUnit').value;
    // alert(id);
    $.ajax({
                url: url,
                data: params,
                type: method,
                // {
                //     'unit_id': unit_id
                // },
               
                success: function (response) 
                {
                    $('#'+div).html(response);
                    
                }
            });

}


function deleteUser(url,method)
{
    // var data  = $('#userDelete').val();

    // var userId = {
    //     'user_id':data
    // }

    // console.log(userId);
    $.ajax({
        type: method,
        url: url,
     
        success: function (response) {
            $('.main-container').html(response.html_content);
            Swal.fire(
                        'success added',
                        response.message,
                        'success'
                      );
        
            
        },

        error: function(response)
        {
            if(response.status==401)
            {
                Swal.fire(

                        'success added',
                        response.responseJSON.errors,
                        'success'

                      );

            }
            


        }
    });
}


function assignRoleToUser(url,method)
{
    $.ajax({
        type: method,
        url: url,
        success: function (response) {

            $('.main-container').html(response);
            
        }
    });
}

function userRoleForm(url,params,method)
{
    // $('#assign-role').submit(function (e){
    //     e.preventDefault();
    // });
    // console.log('ok');

    $.ajax({
        type: method,
        url: url,
        data: params,
        // dataType: "dataType",
        success: function (response) {
            
        }
    });

}

// $('#assign-role').


</script>