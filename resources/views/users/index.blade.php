@extends('adminLayouts.app')



@section('content')


<div class="m-portlet">
    <div class="m-portlet__body">
        <div class="main-container">

        
            <div class="m-container">

                <button id="btn-user" class="btn btn-success m-btn m-btn--icon m-btn--wide">
                    <span>
                        <i class="fa flaticon-profile-1"></i>
                        <span>ایجاد یوزر</span>
                    </span>
                </button>

            
                <br>
                <table id="main-table" class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
                    <thead>
                
                        <tr>
                
                            <th scope="row">#</th>
                            <th scope="row">اسم</th>
                            <th scope="row">ایمیل</th>
                            <th scope="row">رول</th>
                            <th scope="row">صلاحیت</th>
                            <th scope="row">حذف</th>
                
                
                        </tr>
                
                
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
        </div>


    </div>


</div>
    
@endsection



@section('script')

<script>
    $(document).ready(function () {
        getUsers();
        function getUsers()
        {
            $.ajax({
                type: "get",
                url: "{{ route('user.retrieve') }}",
                // $('tbody').html('');
                success: function (response) {

                    if(response.status==200){
                        var count=1;
                        $.each(response.users, function (key, user) { 
                        $('tbody').append(

                            '<tr><td>'
                            + count++ + 
                            '</td><td>'
                            +user.name+
                            '</td><td>'
                            +user.email+
                            '</td><td><button type="button" value="'+user.id+'" id="userRole" class="btn btn-success  m-btn m-btn--icon m-btn--wide">رول</button></td>'+
                            '<td><button  type="button" value="'+user.id+'"  id="userPermission" class="btn btn-primary  m-btn m-btn--icon m-btn--wide">صلاحیت</button> </td>'+
                            '<td><button  type="button" value="'+user.id+'"  id="infoBtn" class="btn btn-danger m-btn m-btn--icon m-btn--wide">حذف</button> </td></tr>'

                            );
        
                        });
                    }
                }
            });
        }

        $(document).on('click','#btn-user', function () {

            $.ajax({
                type: "get",
                url: "{{ route('users.inputFields') }}",
                
                success: function (response) {
                    $('.main-container').html('');
                    $('.m-container').hide();
                    $('.main-container').append(response);

                    
                }
            });
            
        });
            
    });

   
</script>
    
@endsection