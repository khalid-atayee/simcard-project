@extends('adminLayouts.app')

@section('content')
    <!-- Insert Modal -->
    <div class="modal fade" id="unitModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <ul style="text-decoration:none" class="rank_ul"></ul>
                <div class="modal-header">
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    <h5 class="modal-title" id="exampleModalLabel">ایجاد قطعه جدید</h5>

                </div>
                <div class="modal-body">


                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">لطفا قطعه مورد نظر تان را درج نماید</label>
                        <input type="text" name="name" id="name" class="name form-control"
                            aria-describedby="rankHelp">
                        <div id="display-error"></div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" id="close_btn" data-bs-dismiss="modal" class="btn btn-danger">کنسل</button>
                    <button type="button" class="save_rank btn btn-primary">ذخیره</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Insert modal end --}}


    <!-- update Modal start here -->
    <div class="modal fade" id="updateUnitModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <ul style="text-decoration:none" class="rank_ul"></ul>
                <div class="modal-header">
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    <h5 class="modal-title" id="exampleModalLabel">ویرایش قطعه</h5>

                </div>
                <div class="modal-body">


                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">لطفا اسم قطعه مورد نظر را وارد نماید</label>
                        <input type="text" name="Updatename" id="Updatename" class="Updatename form-control"
                            aria-describedby="rankHelp">
                        <input type="hidden" name="update_id" id="update_id" class="update_id form-control"
                            aria-describedby="rankHelp">
                        <div id="display-update-error"></div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" id="close_btn" data-bs-dismiss="modal" class="btn btn-danger">کنسل</button>
                    <button type="button" class="update_rank btn btn-primary">ویرایش</button>
                </div>
            </div>
        </div>
    </div>

    {{-- update modal end --}}


    {{-- search bar start here --}}
@can('unit-search')
    
    <div class="input-group">
        <input type="search" width="100px" id="search_content_unit" class="form-control rounded"
            placeholder="لطفا قطعه مورد نظر تان را اینجا جستجو نماید..." />
        <button type="button" id="search_btn_unit" class="rounded-0 btn btn-outline-primary">جستجو</button>
    </div>
    @endcan


    {{-- search bar end here --}}

    {{-- card  table start --}}
    <div class="card text-center">
        <div class="card-header">

            @can('unit-create')
                    
                <ul class="nav nav-pills card-header-pills float-right">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="modal" data-bs-target="#unitModal">ایجاد قطعه جدید </a>
                    </li>

                </ul>
            @endcan

            <h5 class="p-3 float-end">مدیریت قطعات</h5>
        </div>

        <div class="card-body">

            {{-- table --}}

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">آیدی</th>
                        <th scope="col">نام</th>
                        @can('unit-update')
                            
                            <th scope="col">آپدیت</th>
                        @endcan
                        
                        @can('unit-delete')
                            
                            <th scope="col">حذف</th>
                        @endcan

                        
                    </tr>
                </thead>
                <tbody>



                </tbody>
            </table>
            {{-- table end --}}


        </div>
    </div>
    {{-- card table end here --}}
@endsection



@section('script')
    <script>
        $(document).ready(function() {

            // fetch data start here
            fetchUnit();

            function fetchUnit() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('unit.fetch') }}",

                    success: function(response) {
                        $('tbody').html('');
                        $.each(response.data, function(key, item) {
                            $('tbody').append('<tr><td>' +
                                item.id +
                                '</td><td>' +
                                item.name + '@can("unit-update")</td>' +
                                '<td><button type="button" value="' + item.id +
                                        '" class="updatBtn btn btn-info">Update</button></td>@endcan'+
                             
                                

                                
                                '<td>@can("unit-delete")<button "type="button" value="' + item.id +
                                '" class="deleteBtn btn btn-danger" >Delete</button></td>@endcan' +
                                '</tr>'
                              





                            );

                        });


                    }
                });

            }

            // fetch data end here


            // inserting data to db start here
            $(document).on('click', '.save_rank', function() {
                var data = {
                    'name': $('.name').val(),
                }
                // console.log(data);
                // ajax csrf token start
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // ajax csrf token end
                $.ajax({
                    type: "POST",
                    url: "{{ route('unit.insert') }}",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#display-error').html('');
                            $('#display-error').addClass('text-danger');
                            $.each(response.errors, function(key, singleError) {
                                $('#display-error').html(singleError);

                            });



                        } else {
                            Swal.fire(
                                'Good job!',
                                response.message,
                                'success'
                            )
                            // $('#rankModal').modal('');
                            $('#unitModal').modal('hide');
                            $('#unitModal').find('input').val('');
                            fetchUnit();


                        }

                        $(document).on('click', '#close_btn', function() {
                            $('#display-error').html('');


                            $('#unitModal').modal('hide');
                            $('#unitModal').find('input').val('');

                            fetchUnit();

                        });


                    }
                });


            });
            // insert unit to db end here


            // update unit start here

            $(document).on('click', '.updatBtn', function() {
                var update_unit_id = $(this).val();

                // console.log(update_unit_id);
                $.ajax({
                    type: "GET",
                    url: "{{ route('unit.update') }}/" + update_unit_id,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 404) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href="">Why do I have this issue?</a>'
                            });

                        } else {
                            $('.update_id').val(response.data.id);
                            $('.Updatename').val(response.data.name);
                            $('#updateUnitModal').modal('show');
                        }

                    }
                });


            });

            // updating unit start here

            $(document).on('click', '.update_rank', function() {
                var update_id = $('.update_id').val();
                var data = {
                    'name': $('.Updatename').val(),
                };
                // ajax csrf token start
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // ajax csrf token end

                $.ajax({
                    type: "PUT",
                    url: "{{ route('unit.updating') }}/" + update_id,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#display-update-error').html('');
                            $('#display-update-error').addClass('text-danger');
                            $.each(response.errors, function(key, item) {
                                $('#display-update-error').html(item);


                            });



                        } else if (response.status == 404) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href="">Why do I have this issue?</a>'
                            })

                        } else {
                            $('#display-update-error').html('');
                            $('#updateUnitModal').modal('hide');
                            $('#updateUnitModal').find('input').val('');
                            Swal.fire(
                                'Good job!',
                                response.message,
                                'success'
                            )
                            fetchUnit();

                        }


                    }
                });

            });


            // updating unit end here



            // update unit end here



            // delete unit start here

            $(document).on('click', '.deleteBtn', function() {
                var delete_btn_id = $(this).val();
                // console.log(delete_btn_id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                Swal.fire({
                    title: 'Are you sure    ',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result) {

                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('unit.delete') }}/" + delete_btn_id,
                            dataType: "json",
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                fetchUnit();


                            }
                        });


                    }
                });



            });



            // delete unit end here


            // search unit start here

            $(document).on('click', '#search_btn_unit', function() {
                // console.log('ok');
                var search_unit = {
                    'search': $('#search_content_unit').val(),
                };
                // console.log(search_unit);
                //   ajax csrf token start
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // ajax csrf token end
                $.ajax({
                    type: "Post",
                    url: "{{ route('unit.search') }}",
                    data: search_unit,
                    dataType: "json",
                    success: function(response) {
                        $('tbody').html('');
                        if (response.status == 200) {
                            $.each(response.search, function(key, item) {
                                $('tbody').append('<tr><td>' +
                                    item.id +
                                    '</td><td>' +
                                    item.name +
                                    '</td>@can("unit-update")<td><button type="button" value="' + item
                                    .id +
                                    '" class="updatBtn btn btn-info">Update</button>@endcan' +
                                    '</td>@can("unit-delete")<td><button "type="button" value="' + item
                                    .id +
                                    '" class="deleteBtn btn btn-danger" >Delete</button></td>@endcan</tr>'
                                    );

                            });


                        } else {
                            $.each(response.errors, function(key, value) {
                                swal.fire(value);

                            });
                        }



                    }



                });

            });


            // search unit end here

        });
    </script>
@endsection
