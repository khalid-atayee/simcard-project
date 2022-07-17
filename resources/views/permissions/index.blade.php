@extends('adminLayouts.app')

@section('content')
    <div class="m-portlet">
        
            <form  id="form-role" class="form-group m-form__group form-row mx-3">
                @csrf
                <div class="col-lg-3">
                    <label for="exampleInputEmail1">اسم صلاحیت</label>
                    <input type="text" class="form-control m-input m-input--square" name="permissionName"  id="permissionName" aria-describedby="emailHelp">
                    <input type="hidden" name="hidden_id" id="hidden_id">
                    <div id="error-permission" class="text-danger"></div>
                </div>

                <div class="col-lg-3">
                    <input type="submit" id="submit-btn"  style="margin-top: 25px" class="form-control btn btn-outline-success btn-block" value="اسم صلاحیت را بنویسید"> 
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
            
                    {{-- @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $permission->name }}</td>
                            <td><a href="" type="button" class="btn btn-primary  m-btn--md m--margin-right-10">حذف</a></td>
                           
                            <td><input type="button" class="btn btn-primary  m-btn--md m--margin-right-10" value="ویرایش">
                            </td>
            
                        </tr>
                    @endforeach
             --}}
            
            
            
            
                 </tbody>
                </table>
            

        </div>

    </div>
@endsection


@section('script')

<script>

    $(document).ready(function () {
        retrieve();
        function retrieve()
        {
            $.ajax({
                type: "get",
                url: "{{ route('permission.retrieve') }}",
                success: function (response) {
                    $('tbody').html('');
                    var count=1;
                    if(response.status==200)
                    {
           // alert('ok');

                        $.each(response.permissions, function (key, item) {
                            $('tbody').append 
                            (
                                '<tr><td>'
                                + count++ + 
                                '</td><td>'
                                +item.name+
                                '</td><td><button type="button" value="'+item.id+'" id="deleteBtn" class="btn btn-primary  m-btn--md m--margin-right-10">حذف</button></td>'+
                                '<td><button  type="button" value="'+item.id+'"  id="updateBtn" class="btn btn-primary  m-btn--md m--margin-right-10">ویرایش</button> </td></tr>'
                                    // console.log(item.name)
    
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
                url: "{{ route('permission.create') }}",
                data: $(this).serialize(),
                dataType: "json",
                success: function (response) {
                    $('#error-permission').html('');
                    if(response.status==400)
                    {
                        $.each(response.error, function (key, value) { 
                            $('#error-permission').html(value);

                             
                        });

                    }
                    else
                    {
                        $('#permissionName').val('');
                        Swal.fire
                        (
                            'Good job!',
                            response.message,
                            'success'
                        )
                        $('#hidden_id').val('');
                        retrieve();
                    }
                
                    
                }
            });
            
        });

        $(document).on('click', '#deleteBtn', function () {
            var delete_id = $(this).val();
            // console.log(delete_id);

            $.ajax({
                type: "delete",
                url: "{{ route('permission.delete') }}/"+ delete_id,
                success: function (response) {
                    if(response.status==200){
                        swal.fire
                        (
                            'Good job',
                            response.message,
                            'success'
                        )
                        retrieve();
                    }
                    
                }
            });

            
        });


        $(document).on('click','#updateBtn', function () {
            var update_btn = $(this).val();
            // alert(update_btn);
            $.ajax({
                type: "get",
                url: "{{ route('permission.update') }}/"+update_btn,
                success: function (response) {
                    if(response.status==200)
                    {

                        $('#hidden_id').val(response.permission.id);
                        $('#permissionName').val(response.permission.name);

                    }
                    
                }
            });
            
        });
    });
</script>



@endsection