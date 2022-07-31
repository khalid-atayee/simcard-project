@extends('adminLayouts.app')

@section('content')
    <div class="m-portlet permission-main-container" >
        @include('permissions.permissionContent');
        
          

    </div>
@endsection


@section('script')

<script>

    $(document).ready(function () {
        // retrieve();
        // function retrieve()
        // {
        //     $.ajax({
        //         type: "get",
        //         url: "{{ route('permission.retrieve') }}",
        //         success: function (response) {
        //             $('tbody').html('');
        //             var count=1;
        //             if(response.status==200)
        //             {
        //    // alert('ok');

        //                 $.each(response.permissions, function (key, item) {
        //                     $('tbody').append 
        //                     (
        //                         '<tr><td>'
        //                         + count++ + 
        //                         '</td><td>'
        //                         +item.name+
        //                         '</td><td><button type="button" value="'+item.id+'" id="deleteBtn" class="btn btn-danger  m-btn--md m--margin-right-10">حذف</button></td>'+
        //                         '<td><button  type="button" value="'+item.id+'"  id="updateBtn" class="btn btn-primary  m-btn--md m--margin-right-10">ویرایش</button> </td></tr>'
        //                             // console.log(item.name)
    
        //                         ); 

                                
        //                     });
        //                 }
                    
        //         }
        //     });
        // }
        

        // $(document).on('submit','#form-role', function (e) {
        //     e.preventDefault();

        //     $.ajax({
        //         type: "post",
        //         url: "{{ route('permission.create') }}",
        //         data: $(this).serialize(),
        //         dataType: "json",
        //         success: function (response) {
        //             $('#error-permission').html('');
        //             if(response.status==400)
        //             {
        //                 $.each(response.error, function (key, value) { 
        //                     $('#error-permission').html(value);

                             
        //                 });

        //             }
        //             else
        //             {
        //                 $('#permissionName').val('');
        //                 Swal.fire
        //                 (
        //                     'Good job!',
        //                     response.message,
        //                     'success'
        //                 )
        //                 $('#hidden_id').val('');
        //                 // retrieve();
        //             }
                
                    
        //         }
        //     });
            
        // });

        // $(document).on('click', '#deleteBtn', function () {
        //     var delete_id = $(this).val();
        //     // console.log(delete_id);

        //     $.ajax({
        //         type: "delete",
        //         url: "{{ route('permission.delete') }}/"+ delete_id,
        //         success: function (response) {
        //             if(response.status==200){
        //                 swal.fire
        //                 (
        //                     'Good job',
        //                     response.message,
        //                     'success'
        //                 )
        //                 // retrieve();
        //             }
                    
        //         }
        //     });

            
        // });


        // $(document).on('click','#updateBtn', function () {
        //     var update_btn = $(this).val();
        //     // alert(update_btn);
        //     $.ajax({
        //         type: "get",
        //         url: "{{ route('permission.update') }}/"+update_btn,
        //         success: function (response) {
        //             if(response.status==200)
        //             {

        //                 $('#hidden_id').val(response.permission.id);
        //                 $('#permissionName').val(response.permission.name);

        //             }
                    
        //         }
        //     });
            
        // });
    });
</script>



@endsection