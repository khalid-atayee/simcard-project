@extends('adminLayouts.app')
{{-- content start here --}}
@section('content')

<div class="container">
  {{-- <div class="m-portlet m-portlet--tab">
    <div class="m-portlet__head">
      <div class="m-portlet__head-caption">
        <div class="m-portlet__head-title">
          <span class="m-portlet__head-icon m--hide">
            <i class="la la-gear"></i>
          </span>
          <h3 class="m-portlet__head-text">
            توزیع سیمکارت ها
          </h3>
        </div>
      </div>
    </div>

    <!--begin::Form-->
    <form class="m-form m-form--fit m-form--label-align-right">
      <div class="m-portlet__body">
        <div class="form-group m-form__group m--margin-top-10">
          <div class="alert m-alert m-alert--default" role="alert">
            The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
          </div>
        </div>
        <div class="form-group m-form__group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control m-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          <span class="m-form__help">We'll never share your email with anyone else.</span>

          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control m-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          <span class="m-form__help">We'll never share your email with anyone else.</span>

          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control m-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          <span class="m-form__help">We'll never share your email with anyone else.</span>
        </div>
        <div class="form-group m-form__group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control m-input" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group m-form__group">
          <label>Static:</label>
          <p class="form-control-static">email@example.com</p>
        </div>
        <div class="form-group m-form__group">
          <label for="exampleSelect1">Example select</label>
          <select class="form-control m-input" id="exampleSelect1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <div class="form-group m-form__group">
          <label for="exampleSelect2">Example multiple select</label>
          <select multiple="" class="form-control m-input" id="exampleSelect2">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <div class="form-group m-form__group">
          <label for="exampleTextarea">Example textarea</label>
          <textarea class="form-control m-input" id="exampleTextarea" rows="3" spellcheck="false"></textarea>
        </div>
      </div>
      <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
          <button type="reset" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
      </div>
    </form>

    <!--end::Form-->
  </div> --}}

  {{--  ------ --}}
    <div class="card">
        <div class="card-header">
         <h1> توزیع سیمکارت ها
         </h1></div>
        <div class="card-body">
            <div class="card">
                <div class="card-header">
                 <h4> معلومات عمومی
                 </h4></div>
                <div class="card-body">


                    
                 <form  id="main-form">
                  @csrf
                  <div class="container">
                    <div class="row g-12 ">
                      <div class="form-group form-row">
                        <div class="col-lg-4">
                          <label for="validationCustom01" class="form-label">شماره کارت هویت</label>
                          <input type="text" id="cardId" name="cardId"  class="form-control" >
                          <div class="error error-cardId"></div>
                          
                        </div>
                        <div class="col-lg-4">
                          <label for="validationCustom02" class="form-label">اسم</label>
                          <input type="text" id="name" name="name" class="form-control"  >
                          <div class="error error-name"></div>
                          
                        </div>
                        <div class="col-lg-4">
                          <label for="validationCustomUsername" class="form-label">نام پدر</label>
                          <div class="input-group has-validation">
                          
                            <input type="text" id="fname" name="fname" class="form-control"  aria-describedby="inputGroupPrepend" >
                            
                            
                          </div>
                          <div class="error error-fname"></div>
                        </div>
                        
                      </div>
                      <div class="form-group form-row">
                        <div class="col-lg-4">
                          <label for="validationCustom03" class="form-label">وظیفه</label>
                          <input type="text" id="job" name="job" class="form-control"  >
                          <div class="error error-job"></div>
                          
                        </div>
                        <div class="col-lg-4">
                            <label for="validationCustom03" class="form-label">نمبر تذکره</label>
                            <input type="text" id="tazkiraId" name="tazkiraId" class="form-control" >
                            <div class="error error-tazkiraId"></div>
                            
                          </div>

                       
                        <div class="col-lg-4">
                          <label for="validationCustom04" class="form-label">رتبه</label>
                          <select  class="form-control form-select  myselect" name="selectRank" id="selectRank">
                            <option> </option>
                            
                          </select>
                          <div class="error error-selectRank"></div>
                          
                        </div>

                      </div>

                      <div class="form-group form-row">
                        <div class="col-lg-4">
                          <label for="validationCustom04" class="form-label"> قطعه مربوطه</label>
                          <select class="form-select unitSelect " name="selectUnit" id="selectUnit">
                            <option></option>
                           
                          </select>
                          <div class="error error-selectUnit"></div>
                          
                        </div>
                      <div class="col-lg-4">
                        <label for="validationCustom05" class="form-label">تاریخ</label>
                        <input type="date" id="date" name="date" class="form-control">
                        <div class="error error-date"></div>
                     
                      </div>

                      

                      <div class="col-lg-4">
                          <label for="validationCustom03" class="form-label">آدرس</label>
                          <input type="text" id="address" name="address" class="form-control">
                          <div class="error error-address"></div>
                          
                        </div>

                      </div>
                      <div class="form-group form-row">
                        <div class="col-lg-4">
                          <label for="validationCustom03" class="form-label">نمبر موبایل</label>
                          <input type="text" id="phoneNo" name="phoneNo" class="form-control" >
                          <div class="error error-phoneNo"></div>
                          
                        </div>
                        <div class="col-lg-7">
                          <label for="validationCustom03" class="form-label">معلومات اضافی</label>
                         <textarea name="description"class="form-control" id="description" cols="118" rows="4"></textarea>
                         <div class="error error-description"></div>
                          
                        </div>
                        
                      </div>
                        
                        
                        
                          
                          {{-- <div class="form-group m-form__group row m-form__group_custom">
                                <div class="col-lg-10">
                                    <label class="form-control-label" style="font-weight: bold; font-size: 16px">{{ __('main.phoneNumberType')}}</label>
                                </div>
                                <div class="col-lg-2">
                                    <input type="button" id="addmore" name="addmore" value="{{__('main.addMore')}}" style="margin-right: 40px;" class="btn btn-primary" onclick="add_more('target_div','{{route('moreSim')}}')" >
                                </div>
                            </div>

                            <div class="form-group m-form__group  m-form__group_custom">
                                <div class="col-lg-10">
                                    <input type="text" name="n_phoneNumber[]" id="n_phoneNumber" maxlength="10" class="form-control m-input">
                                </div>
                                <div class="n_phoneNumber error-div" style="display:none;"></div>
                            </div>
                            <div id="target_div"></div> --}}
                          {{-- sim distribution --}}
                          <div class="container">
                            <div class="card">
                                <div class="card-header">
                                 <h4>  سیمکارت ها برای توزیع
                                </h4></div>
    
                                <div class="card-body">
                                  
                                 
                                  <button id="close-btn" type="button" class="btn btn-primary float-right">اضافه کردن</button>
                                  <h5>شماره سیمکارت به فرمت ذیل (********07)</h5>
                                  {{-- table start --}}
                                  <table class="table">
                                   
                                    <tbody>
                                    
                                    </tbody>
                                    

                                   
                                  </table>


                                  {{-- table end --}}
                                  
                                </div>
                              </div>

                          </div>
                          



                      
                        <div class="col-12">
                          <button class="btn btn-primary" id="save-btn" type="submit">ذخیره</button>
                        </div>
                    </div>


                 </div>
                 </form>
                        
                    
                
                    
                        
          
            
                </div>
              </div>
    
        </div>
      </div>
</div>
    
@endsection
{{-- content end here --}}






{{-- scripts start here --}}
@section('script')

<script>

    
    $(document).ready(function () {
        // get all ranks start here
        $.ajax({
            type: "get",
            url: "{{ route('distribution.getRank') }}",
            dataType: "json",
            success: function (response) {
                $.each(response.data, function (key, value) { 
                    $('#selectRank').append('<option  value='+value.id+'>'+value.name+'</option>');
                            
                });
                
            }
        });
        // get all ranks end here

        // get all units start here
        $.ajax({
            type: "get",
            url: "{{ route('distribution.getUnit') }}",
           dataType: "json",
            success: function (response) {
                $.each(response.data, function (key, value) { 
                     $('#selectUnit').append('<option value='+value.id+'>'+value.name+'</option>');
                });
                
            }
        });
        // get all units end here






        // close and add button scripts start here
          // $('tbody').html('');
         
        $(document).on('click','#close-btn', function () {
            var html = '';
            var count=0;
            html +='<tr>';
            html +='<td colspan="2"><input class="form-control" type="text" name="newPhoneNo[]" id="newPhoneNo"><div class="error  error-newPhoneNo"></td>';
            html +=' <td colspan="2"><button class="btn btn-danger" style="margin:5px" id="removeBtn"><i  style="font-size: 20px;" class="btn-close btn-close-white glyphicon glyphicon-remove"> </i></button></td>';
            html += '</tr>';
            $('tbody').append(html);
            // $('tbody').append('');
                              
            
            // $('.error-newPhoneNo').html('')
            
            
        });

        $(document).on('click', '#removeBtn', function () {
            $(this).closest('tr').remove();
            // $('.error-newPhoneNo').html('');
            
        });
        // close and add button scripts end here


        // save distribution data to db start here
        $(document).on('submit','#main-form', function (e) {
          e.preventDefault();


            $.ajax({
                type: "post",
                url: "{{ route('distribution.save') }}",
                data:$(this).serialize(),
                dataType: "json",
                success: function (response) {
                  if(response.status==400)
                  {
                    


                    $('.error').html('');
                    $('.error').addClass('text-danger');
                    $.each(response.errors, function (key, singleError) { 
                    $('.error-'+key).html(singleError)
                        if(key == 'newPhoneNo.0'){
                           $('.error-newPhoneNo').html(singleError);

                        }
                    });

                  }
                  else if(response.status==502)
                  {
                                 
                    Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'Something went wrong!',
                      footer: '<a href="">Why do I have this issue?</a>'
                    })


                  }
                  else
                  {
                    Swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: 'Your work has been saved',
                      showConfirmButton: false,
                      timer: 1500
                    })
                    $( '#main-form' ).each(function(){
                        // this.reset();
                        window.location.reload();
                        // $(this).closest('re').remove();
                    });
                   

                  }
                    
                }
            });
            
        });


        // save distribution data to db end here

        // select2
        $('.myselect').select2({
          placeholder:'رتبه انتخاب نماید',
          // width: '100%',
          dir: "rtl",
          // theme: 'bootstrap4',
          // height: '100px',
          // allowClear:true
        });
        $('.unitSelect').select2({
          placeholder:'قطعه را انتخاب نماید',
          // width: '100%',
          dir: "rtl",
          // theme: 'bootstrap4',
          // height: '100px',
          // allowClear:true
        });

        
      //   $('.myselect').select2({
      //       width: '100%',
      //       placeholder: "Select an Option",
      //       allowClear: true
      // });
        


      
    });
</script>
    
@endsection
{{-- scripts end here --}}



