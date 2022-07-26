@extends('adminLayouts.app')
@section('content')
    <!-- Insert Modal -->
    <div class="modal fade" id="rankModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <ul style="text-decoration:none" class="rank_ul"></ul>
                <div class="modal-header">
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    <h5 class="modal-title" id="exampleModalLabel">ایجاد رتبه جدید</h5>

                </div>
                <div class="modal-body">


                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">لطفا رتبه مورد نظر تان را درج نماید</label>
                        <input type="text" name="name" id="name" class="name form-control"
                            aria-describedby="rankHelp">
                        <div id="display-error"></div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" id="close_btn_rank" data-bs-dismiss="modal" class="btn btn-danger">کنسل</button>
                    <button type="button" class="save_rank btn btn-primary">ذخیره</button>
                </div>
            </div>
        </div>
    </div>


    {{-- Insert modal end --}}
    <!-- update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <ul style="text-decoration:none" class="rank_ul"></ul>
                <div class="modal-header">
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    <h5 class="modal-title" id="exampleModalLabel">ویرایش رتبه</h5>

                </div>
                <div class="modal-body">


                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">لطفا رتبه مورد نظر تان را ویرایش نماید</label>
                        <input type="text" name="updatename" id="updatename" class="updatename form-control"
                            aria-describedby="rankHelp">

                        <input type="hidden" name="updateId" id="updateId" class="updateId form-control"
                            aria-describedby="rankHelp">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">کنسل</button>
                    <button type="button" class="update_rank btn btn-primary">ویرایش</button>
                </div>
            </div>
        </div>
    </div>


    {{-- update modal end --}}

    {{-- card an table start --}}

    {{-- search bar start here --}}
    {{-- <div class="container"> --}}
    <div class="input-group">
        <input type="search" width="100px" id="search_content_rank" class="form-control rounded"
            placeholder="لطفا رتبه مورد نظر تان را اینجا جستجو نماید..." />
        <button type="button" id="search_btn_rank" class="rounded-0 btn btn-outline-primary">جستجو</button>
    </div>


    {{-- </div> --}}



    {{-- search bar end here --}}
    <div class="card text-center">
        <div class="card-header">

            <ul class="nav nav-pills card-header-pills float-right">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="modal" data-bs-target="#rankModal">ایجاد رتبه </a>
                </li>

            </ul>
            <h5 class="p-3 float-end">مدیریت رتبه</h5>
        </div>

        <div class="card-body">

            {{-- table --}}

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">آیدی</th>
                        <th scope="col">نام</th>
                        @role('admin|dataEntryManager')
                            <th scope="col">آپدیت</th>
                            <th scope="col">حذف</th>
                        @endrole
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
            fetchData();

            function fetchData() {
                $.ajax({
                    type: "GET",
                    url: "fetch_data",

                    success: function(response) {
                        $('tbody').html('');
                        $.each(response.data, function(key, item) {
                            $('tbody').append('<tr><td>' +
                                item.id +
                                '</td><td>' +
                                item.name + '</td>' +
                                @role('admin|dataEntryManager')


                                    '<td><button type="button" value="' + item.id +
                                        '" class="updatBtn btn btn-info">Update</button>' +
                                        '</td><td><button "type="button" value="' + item
                                        .id +
                                        '" class="deleteBtn btn btn-danger" >Delete</button></td>'
                                @endrole + '</tr>'


                            );

                        });


                    }
                });
            }
            // fetch data end here
            // insert rank to db start
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
                    url: "rank_insert",
                    data: data,
                    dataType: 'json',
                    success: function(response) {

                        if (response.status == 400) {

                            // $('.rank_ul').html('');
                            // $('.rank_ul').addClass('alert alert-danger');
                            $('#display-error').html('');
                            $('#display-error').addClass('text-danger')
                            $.each(response.errors, function(key, item) {
                                $('#display-error').html(item);
                                // $('#display-error').append(item);

                            });


                        } else {

                            Swal.fire(
                                'Good job!',
                                response.message,
                                'success'
                            )

                            $('#rankModal').modal('hide');

                            $('#rankModal').find('input').val('');
                            $('#display-error').html('');

                            fetchData();


                        }




                    }

                });
                // $(document).on('click','#close_btn_rank', function () {
                //             $('#display-error').html('');
                //             $('#rankModal').modal('hide');
                //             $('#rankModal').find('input').val('');
                //             fetchData();

                //         });

            });
            // data-bs-dismiss="modal"
            // insert rank to db end

            // update rank start here
            $(document).on('click', '.updatBtn', function() {
                var update_btn_id = $(this).val();
                // console.log(update_btn_id);
                $.ajax({
                    type: "GET",
                    url: "{{ route('data.update') }}/" + update_btn_id,
                    success: function(response) {
                        if (response.status == 200) {

                            $('#updateId').val(response.data.id);
                            $('#updatename').val(response.data.name);
                            $('#updateModal').modal('show');
                            // console.log(response.updateData.name);

                        } else {
                            $('.rank_ul').html('');
                            $('.rank_ul').addClass('alert alert-danger');
                            $('.rank_ul').text(response.message);
                            fetchData();



                        }
                    }
                });


            });

            // ---------------

            $(document).on('click', '.update_rank', function() {
                var dataId = $('#updateId').val();
                var data = {
                    'name': $('#updatename').val(),
                }

                $.ajax({
                    type: "PUT",
                    url: "{{ route('data.updating') }}/" + dataId,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('.rank_ul').html('');
                            $('.rank_ul').addClass('alert alert-danger');
                            $.each(response.errors, function(key, item) {
                                $('.rank_ul').append('<li>' + item + '</li>');



                            });
                        } else if (response.status == 404) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response.message,
                                footer: '<a href="">Why do I have this issue?</a>'
                            })
                        } else {
                            $('#updateModal').modal('hide');
                            Swal.fire(
                                'Good job!',
                                response.message,
                                'success'
                            )


                        }
                        fetchData();

                    }

                });

            });


            // update rank end here


            // delete the rank start

            $(document).on('click', '.deleteBtn', function() {
                var deleteBtn_id = $(this).val();
                // console.log($deleteBtn_id);

                Swal.fire({
                    title: 'آیا مطمعن هستید',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('data.delete') }}/" + deleteBtn_id,

                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                // $('.alert_rank').html('');
                                // $('.alert_rank').addClass('alert alert-success');
                                // $('.alert_rank').text(response.message);
                                fetchData();



                            }
                        });

                    }
                });

            });


            // delete the rank end


            // search rank start here

            $(document).on('click', '#search_btn_rank', function() {
                // console.log('OK');
                var data_search = {
                    'search': $('#search_content_rank').val(),

                };
                // console.log(data);
                // ajax csrf token start
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // ajax csrf token end
                $.ajax({
                    type: "post",
                    url: "{{ route('data.search') }}",
                    data: data_search,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 404) {
                            $.each(response.errors, function(key, value) {
                                Swal.fire(value)

                            });

                        } else {
                            $('tbody').html('');
                            $.each(response.data, function(key, item) {
                                $('tbody').append('<tr><td>' +
                                    item.id +
                                    '</td><td>' +
                                    item.name +
                                    '</td><td><button type="button" value="' + item
                                    .id +
                                    '" class="updatBtn btn btn-info">Update</button>' +
                                    '</td><td><button "type="button" value="' + item
                                    .id +
                                    '" class="deleteBtn btn btn-danger" >Delete</button></td></tr>'
                                    );

                            });


                        }

                    }
                });

            });




            // search rank end here

        });
    </script>
@endsection
