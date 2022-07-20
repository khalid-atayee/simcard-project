@extends('adminLayouts.app')



@section('content')

<style>
    /* .centerdiv{
        text-align: center;
        float: right;
    } */
</style>

<div class="m-portlet ">
    <div class="m-portlet__body ">
            <div class="main-container ">
                @include('users.data')
            </div>

        {{-- <div class="main-container"></div> --}}



        


    </div>


</div>
    
@endsection



@section('script')

<script>
    $(document).ready(function () {
        // getUsers();
        // function getUsers()
        // {
        //     $.ajax({
        //         type: "get",
        //         url: "{{ route('user.retrieve') }}",
        //         // $('tbody').html('');
        //         success: function (response) {

        //             if(response.status==200){
        //                 var count=1;
        //                 $.each(response.users, function (key, user) { 
        //                 $('tbody').append(

        //                     '<tr><td>'
        //                     + count++ + 
        //                     '</td><td>'
        //                     +user.name+
        //                     '</td><td>'
        //                     +user.email+
        //                     '</td><td><button type="button" value="'+user.id+'" id="userRole" class="btn btn-success  m-btn m-btn--icon m-btn--wide">رول</button></td>'+
        //                     '<td><button  type="button" value="'+user.id+'"  id="userPermission" class="btn btn-primary  m-btn m-btn--icon m-btn--wide">صلاحیت</button> </td>'+
        //                     '<td><button  type="button" value="'+user.id+'"  id="infoBtn" class="btn btn-danger m-btn m-btn--icon m-btn--wide">حذف</button> </td></tr>'

        //                     );
        
        //                 });
        //             }
        //         }
        //     });
        // }

        $(document).on('click','#btn-user', function () {


            $.ajax({
                type: "get",
                url: "{{ route('users.inputFields') }}",
                
                success: function (response) {
                    // $('.main-container').html('');
                    // $('.m-container').empty();
                    $('.main-container').html(response);
                    // $('.main-container').html(response);

                    
                }
            });
            
        });


        $(document).on('submit','#userForm', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "{{ route('user.submitForm') }}",
                data: new FormData(this),
                dataType:'JSON',
                contentType:false,
                cache: false,
                processData: false,

                beforeSend:function () {
                    $(document).find('div.error').text('');

                    
                },
                success: function (response) {

                    if(response.status==true)
                    {
                        // console.log(response.html);
                        // console.log('ok');
                        // $('.content-container').empty();
                        // $('.m-container').empty();
                        // $('.content-type').empty();
                        // $('#divMain').addClass('centerdiv');
                        // $('.main-container').empty();
                        $('.main-container').html(response.html);

                    }

                    

                    Swal.fire(
                        'success added',
                        response.message,
                        'success'
                      );
                    // window.location.reload();
                        

                },
                error:function(response){
                    // $('.error').html('');
                    $.each(response.responseJSON.errors, function (key, value) { 
                        $('#error-'+key).text(value);
                    });
                   

                }
            });
            
        });
            
    });

   
</script>
    
@endsection