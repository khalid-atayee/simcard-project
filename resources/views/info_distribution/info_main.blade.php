


@extends('adminLayouts.app')


@section('content')
<div class="m-portlet m-portlet--tab">
    {{-- modal for distribution sim --}}
    <div class="modal fade show" id="simModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">توضیح شماره های جدید </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="sim_distribution_form">
                    @csrf
                    <div class="modal-body">

                        <button id="close-btn" type="button" class="btn btn-primary float-right">اضافه کردن</button>
                        <h5>شماره سیمکارت به فرمت ذیل (********07)</h5>
                        {{-- table start --}}
                        <table class="table">
                            <input type="hidden" name="distribution_id" value="{{ $distributions->id }}">

                        
                        <tbody id="table-body">
                        
                        </tbody>
                        

                        
                        </table>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">کنسل</button>
                        <button type="submit" class="btn btn-primary">ثبت شماره جدید</button>
                    </div>
            </form>
            </div>
        </div>

    </div>




    {{-- modal for distribution sim end --}}

    {{-- modal start here --}}
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تغیر شماره</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="error error-simcards text-danger"></div>

                  

                    
                        @foreach ($distributions->simcards as $simcard)
                        <div class="input-group">
                            <input type="hidden" value="{{ $simcard->id}}" id="distribution_id" name="simcards_id[]">
    
    
                            <input type="text" id="simcards" name="simcards_number[]" value="{{ $simcard->sim_number }}" class="form-control mw-300px" >
                            <br>
                            
    
                                
                           
                            
                            
                          </div>
                          <br>
    
                            
                        @endforeach
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">کنسل</button>
                        <button type="button"  id="edit-btn-sim" class="btn btn-primary">ویرایش شماره</button>
                    </div>
                

                   


                  
            </div>
        </div>
    </div>



    {{-- modal end here --}}
    
   
  
    <div id="include-content">
      {{-- @include('components.header-buttons-search') --}}
      <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon">
                    <i class="flaticon-calendar"></i>
                </span>
                <h3 class="m-portlet__head-text m--font-primary">
                    معلومات کارمند
                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                
                
              
                <li class="m-portlet__nav-item">
                    <a href="{{ route('distribution-pdf.criminal',$distributions->id) }}" class="m-portlet__nav-link btn btn-primary m-btn  m-btn--air">
                        قضیه جنایی
                    </a>
                </li>
                  
                <li class="m-portlet__nav-item">
                    <a href="#" class="m-portlet__nav-link btn btn-primary m-btn  m-btn--air">
                        ثبت شماره های جدید
                    </a>
                </li>

                <li>
                    <button type="button" class="m-portlet__nav-link btn btn-primary m-btn  m-btn--air" data-toggle="modal" data-target="#simModal"> توزیع شماره ها</button>
                </li>
                
                {{-- <li class="m-portlet__nav-item">
                    <button class="m-portlet__nav-link btn btn-primary m-btn  m-btn--air">
                        توزیع شماره ها
                    </button>
                </li> --}}
                
                <li class="m-portlet__nav-item">
                    <a href="#" class="m-portlet__nav-link btn btn-primary m-btn  m-btn--air">
                        مفقودی شماره ها
                    </a>
                </li>
                <li class="m-portlet__nav-item">
                    <button data-toggle="modal" data-target="#modal" class="m-portlet__nav-link btn btn-primary m-btn  m-btn--air">
                        تغیر شماره ها
                    </button>
                </li>

                <li class="m-portlet__nav-item">
                    <a href="{{ route('distribution.edit',$distributions->id) }}"  class="m-portlet__nav-link btn btn-primary m-btn  m-btn--air">
                        تغیرات معلومات
                    </a>
                
                    

                </li>
                <li class="m-portlet__nav-item">
                    <a href="{{ route('distribution-pdf',$distributions->id) }}" class="m-portlet__nav-link btn btn-primary m-btn  m-btn--air">
                        چاپ
                    </a>
                </li>
    
             
    
    
            </ul>
        </div>
    </div>


    <div id="print-this">

      <div class="m-portlet__body">
        <div class="header-content">
            <div class="afghanistan-logo">
                <img class="logo-img"  src="{{ asset('loginImage/AfghanistanGovernmentLogo.jpeg') }}" alt="">
                
            </div>
            <div class="content-text">
                
                    <h1>امارت اسلامی افغانستان</h1>
                    <h2>وزارت امور داخله</h2>
                    <h3>ریاست عمومی مخابره و تکنالوژی معلوماتی</h3>
                    <h4>مدیریت عمومی ارتباطات</h4>

                

            </div>

            <div class="moi-logo">
                <img class="logo-img" src="{{ asset('loginImage/7.jpg') }}" alt="">

            </div>
        </div>
            
          
     </div>

         <div class="container p-4">
        <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
            <thead>
                <h3 class="m-portlet__head-text">
                    معلومات کارمند
                </h3>
              <tr>
              
                <th scope="row">اسم</th>
                <th scope="row">اسم پدر</th>
                <th scope="row">وظیفه</th>
                <th scope="col">رتبه</th>
                
                <th scope="col">قطعه مربوطه</th>
                <th scope="col">شماره تماس</th>
                <th scope="col">آدرس</th>
                <th scope="col">شماره کارت هویت</th>
                <th scope="col">معلومات</th>
              </tr>
             
           
            </thead>
            <tbody>
                <tr>

                    <td>{{ $distributions->name }}</td>
                    <td>{{ $distributions->fatherName }}</td>
                    <td>{{ $distributions->job }}</td>
                    <td>{{ $distributions->ranks->name }}</td>
                    <td>{{ $distributions->units->name }}</td>
                    <td>{{ $distributions->phone }}</td>
                    <td>{{ $distributions->address }}</td>
                    <td>{{ $distributions->identity_id }}</td>
                    <td>{{ $distributions->description }}</td>
                  </tr>
              
          
             
            </tbody>
          </table>
    
    </div>

         <div class="container p-4">
        <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
            <thead>
                <h3 class="m-portlet__head-text">
                    لیست سیم کارت های توضیح شده
                </h3>
              <tr>
              
                <th scope="row">#</th>
                <th scope="row">شبکه</th>
                <th scope="row">شماره</th>
                <th scope="col">تاریخ</th>
              
              </tr>
          

                  
             
            </thead>
            <tbody>
                @foreach ($distributions->simcards as $simcard )
                 <tr>
                   <td>{{ $loop->index+1 }}</td>
                   <td>{{ $simcard->company->sim_type }}</td>
                   <td>{{ $simcard->sim_number }}</td>
                   <td>{{ $simcard->created_at }}</td>
                   
                 </tr>
                @endforeach
              
          
             
            </tbody>
          </table>
    
    </div>

       <div class="container p-4">
        <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
            <h3 class="m-portlet__head-text">
                    مدیر سیستم
                </h3>
            <thead>
                
    
              <tr>
                <th scope="row">اسم</th>
                <th scope="row">تاریخ</th>
                <th scope="row">امضا</th></tr>
                          

             
             
                  
             
            </thead>
            <tbody>
                <tr>
                    <td>{{ Auth::user()->name }}</td>
                    <td>{{ Auth::user()->created_at }}</td>
                
                
                
                </tr>

          
             
            </tbody>
          </table>
    
    </div>

    </div>
   

</div>

    
@endsection


@section('script')

<script>

   $(document).ready(function () {

    $(document).on('click', '#edit-btn-sim', function () {


        // var simcard_id = $('#distribution_id').val();
    
        var data1 = $('input[name="simcards_number[]"]').map(function(){ 
                    return this.value; 
                }).get();

         var data2 = $('input[name="simcards_id[]"]').map(function(){ 
                    return this.value; 
          }).get();
        // console.log(data);
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }); 
        $.ajax({
            type: "PUT",
            url: "{{ route('sim.edit') }}",
            data:{

                'simcards_number[]':data1,
                'simcards_id[]':data2

            },
            dataType: "json",
            success: function (response) {
                $('#modal').find('input').val('');


                if(response.status==400)
                {

                    $.each(response.errors, function (key, value) { 
                        $('.error').html(value);
                        // $('#m_modal_1').modal('hide');
                         
                    });
                   
                }
                else
                {
                    
                    location.reload();

                }
                // $('#modal').find('input').val('');


                
                
            }
        });

        
    });


    $(document).on('click', '#close-btn', function () {
        var html = '';
        html+='<tr>';
        html +='<td colspan="2"><input class="form-control" type="text" name="newPhoneNo[]" id="newPhoneNo"><div class="error  error-newPhoneNo text-danger"></td>';
        html +=' <td colspan="2"><button class="btn btn-danger" style="margin:5px" id="removeBtn"><i  style="font-size: 20px;" class="btn-close btn-close-white glyphicon glyphicon-remove"> </i></button></td>';
        html +='</tr>';
        $('#table-body').append(html);
        
    });
    
    $(document).on('click','#removeBtn', function () {
        $(this).closest('tr').remove();
        
    });
    

    $(document).on('submit','#sim_distribution_form', function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "{{ route('sim.distribution') }}",
            data: $(this).serialize(),
            dataType: "json",
            success: function (response) {
                if(response.status==400)
                {
                    $.each(response.errors, function (key, value) { 
                       $('.error-newPhoneNo').html(value);

                    });
                }

                else
                {
                    location.reload();
                }
                
            }
        });
        
    });




   
        // $(document).on('click' , '#editDitribution',  function () {
        //     var distribution_id  = $('#distribution-id-hidden').val();
        //     // console.log(distribution_id);
        //     $.ajaxSetup({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             }
        //         }); 
        //     $.ajax({
        //         type: "POST",
        //         url: "{{ route('distribution.edit') }}/"+distribution_id,
            
        //         dataType: "json",
        //         success: function (response) {  
        //         }
        //     });
        // });
   });
</script>

    
@endsection