@extends('adminLayouts.app')

@section('content')
<div class="m-portlet m-portlet--tab">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon m--hide">
                    <i class="la la-gear"></i>
                </span>
                <h3 class="m-portlet__head-text">
                    جستجوی کارمندان
                </h3>
            </div>
        </div>
    </div>

    

    <!--begin::Form-->
    <form class="m-form m-form--fit m-form--label-align-right" id="formsubmit">
       
        <div class="m-portlet__body">
            <div class="form-group m-form__group form-row">
                <div class="col-lg-4">
                <label for="exampleInputEmail1">اسم کارمند</label>
                <input type="text" class="form-control m-input m-input--square" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" >
                </div>

                <div class="col-lg-4">
                    <label for="exampleInputEmail1">شماره کارت هویت</label>
                    <input type="text" class="form-control m-input m-input--square" name="identity_id" id="exampleInputEmail1" aria-describedby="emailHelp" >
                 </div>
                 <div class="col-lg-4">
                    <label for="exampleSelect1"> قطعه</label>
                    <select class="form-control m-input m-input--square selectUnit" name="unitselect" id="exampleSelect1">
                        <option class="unit_option" value=""></option>
                        @foreach($units as $unit)
                        <option value="{{ $unit->id }}"> {{$unit->name }} </option>

                            
                        @endforeach
                       
                    </select>
                </div>
            </div>

            <div class="form-group m-form__group form-row">
                <div class="col-lg-4">
                    <label for="exampleSelect1">رتبه</label>
                    <select class="form-control m-input m-input--square selectRank" name="rankselect" id="exampleSelect2">
                        <option value=""></option>
                       @foreach($ranks as $rank)
                       <option value="{{ $rank->id }}">{{ $rank->name }}</option>
                           
                       @endforeach
                    </select>
                </div>
                <div class="col-lg-4">
                <label for="exampleInputEmail1">شماره سیمکارت</label>
                <input type="text" class="form-control m-input m-input--square" name="simcard_no" id="exampleInputEmail1" aria-describedby="emailHelp" >
                </div>

                <div class="col-lg-4">
                    <input type="submit" id="submit-btn" style="margin-top: 25px" class="form-control btn btn-outline-success btn-block" value="جستجو">
                    {{-- <button type="button" class="btn btn-outline-success btn-block">Block level button</button> --}}
                 </div>
                 
            </div>
            
          
        </div>
        @csrf
    </form>
    <!--end::Form-->
</div>

<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon m--hide">
                    <i class="la la-gear"></i>
                </span>
                <h3 class="m-portlet__head-text">
                    کارمند مورد نظر
                </h3>
            </div>
        </div>
    </div>

    {{-- @if ($simCards->isNotEmpty())
        
    @endif
    @if ($simC->isNotEmpty())
        
    @endif --}}
    {{-- table start --}}
    <div class="container p-4">
        <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
            <thead>
              <tr>
              
                <th scope="col">شماره</th>
                <th scope="col">اسم</th>
                <th scope="col">اسم پدر</th>
                <th scope="col">رتبه</th>
                
                <th scope="col">وظیفه</th>
                <th scope="col">عمل</th>
              </tr>
            </thead>
            <tbody>
              
          
             
            </tbody>
          </table>
    
    </div>
   <div id="khan"></div>
    {{-- table end --}}

   
</div>



    
@endsection


@section('script')
<script>
$('.selectUnit').select2({
    placeholder:'انتخاب نماید',
    dir: 'rtl'

});

$('.selectRank').select2({
    placeholder:'انتخاب نماید',
    dir: 'rtl'

});

$(document).on('submit','#formsubmit', function (e) {
    e.preventDefault();
    $(this).closest('re').remove();
 
    
       
    $.ajax({
        type: "get",
        url: "{{ route('searchStaff.submit') }}",
        data: $(this).serialize(),
        dataType: "json",
        
        success: function (response) {
            $('tbody').html('');
            $('tbody').append(response.data);
            $("#formsubmit").trigger("reset");
            $('.selectUnit').select2({
                placeholder:'انتخاب نماید',
                dir: 'rtl'  

             });

            $('.selectRank').select2({
                placeholder:'انتخاب نماید',
                dir: 'rtl'

            });

       
        }
    });
    // $( '#formsubmit' ).each(function(){
    //                    this.reset();
    //                     // window.location.reload();
    //                     $(this).closest('re').remove();
    //                });

    
});




</script>
    

<script>

 


</script>
@endsection