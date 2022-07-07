@extends('adminLayouts.app')


@section('content')
<form action="{{ route('distribution.update') }}" id="update-distribution-form" method="POST">
    @csrf
    @method('PUT')

    <div class="row g-12 ">
        <div class="form-group form-row">
          <div class="col-lg-4">
            <label for="validationCustom01" class="form-label">شماره کارت هویت</label>
            <input type="text"  value="{{ $distribution->identity_id }}" id="cardId" name="cardId"  class="form-control" >
            <input type="hidden" id="distribution_id_hidden"  name="distribution_id_hidden" value="{{ $distribution->id }}">
            @error('cardId')
            <script>

            </script>
            <div class="error error-cardId text-danger">{{ $message }}</div>

              
            @enderror
            
          </div>
          <div class="col-lg-4">
            <label for="validationCustom02" class="form-label">اسم</label>
            <input type="text" value="{{ $distribution->name }}" id="name" name="name" class="form-control"  >
            @error('name')
            <div class="error error-name text-danger">{{ $message }}</div>

              
            @enderror
            
          </div>
          <div class="col-lg-4">
            <label for="validationCustomUsername" class="form-label">نام پدر</label>
            <div class="input-group has-validation">
            
              <input type="text" id="fname" value="{{ $distribution->fatherName }}" name="fname" class="form-control"  aria-describedby="inputGroupPrepend" >
              
              
            </div>
            @error('fname')
            <div class="error error-fname text-danger">{{ $message }}</div>
             
              
            @enderror
          </div>
          
        </div>
        <div class="form-group form-row">
          <div class="col-lg-4">
            <label for="validationCustom03" class="form-label">وظیفه</label>
            <input type="text" value="{{ $distribution->job }}" id="job" name="job" class="form-control"  >
            @error('job')
            <div class="error error-job text-danger">{{ $message }}</div>

              
            @enderror
            
          </div>
          <div class="col-lg-4">
              <label for="validationCustom03" class="form-label">نمبر تذکره</label>
              <input type="text" value="{{ $distribution->tazkira }}" id="tazkiraId" name="tazkiraId" class="form-control" >
              @error('tazkiraId')
              <div class="error error-tazkiraId text-danger">{{ $message }}</div>

                
              @enderror
              
            </div>
    
         
          <div class="col-lg-4">
            <label for="validationCustom04" class="form-label">رتبه</label>
            <select  class="form-control form-select  myselect" name="selectRank" id="selectRank">
              {{-- <option value="{{ $distribution->rank_id }}">{{ $distribution->ranks->name }}</option> --}}
              
              
              @foreach ($ranks as $rank)

              <option value="{{ $rank->id }}" {{ $rank->id == $distribution->rank_id ? 'selected' : '' }}>{{ $rank->name }}</option>
                  
              @endforeach
              
              
            </select>
            @error('selectRank')
            <div class="error error-selectRank text-danger">{{ $message }}</div>

              
            @enderror
            
          </div>
    
        </div>
    
        <div class="form-group form-row">
          <div class="col-lg-4">
            <label for="validationCustom04" class="form-label"> قطعه مربوطه</label>
            <select class="form-select unitSelect " name="selectUnit" id="selectUnit">
              {{-- <option value="{{ $distribution->unit_id }}">{{ $distribution->units->name }}</option> --}}

              @foreach ($units as $unit)
              {{-- @if ($distribution->units->name==$unit->name)
              <option selected value="{{ $unit->id }}">{{ $unit->name }}</option>

                  
              @endif --}}
                 <option  value="{{ $unit->id }}" {{ $unit->id==$distribution->unit_id ? 'selected':''}} >{{ $unit->name }}</option>
                  
              @endforeach
             
            </select>
            @error('selectUnit')
            <div class="error error-selectUnit text-danger">{{ $message }}</div>

              
            @enderror
            
          </div>
        <div class="col-lg-4">
          <label for="validationCustom05" class="form-label">تاریخ</label>
          <input type="date" value="{{ $distribution->date }}" id="date" name="date" class="form-control">
          @error('date')
          <div class="error error-date text-danger">{{ $message }}</div>

            
          @enderror
       
        </div>
    
        
    
        <div class="col-lg-4">
            <label for="validationCustom03" class="form-label">آدرس</label>
            <input type="text" value="{{ $distribution->address }}" id="address" name="address" class="form-control">
            @error('address')
            <div class="error error-address text-danger">{{ $message }}</div>

              
            @enderror
            
          </div>
    
        </div>
        <div class="form-group form-row">
          <div class="col-lg-4">
            <label for="validationCustom03" class="form-label">نمبر موبایل</label>
            <input type="text" value="{{ $distribution->phone }}" id="phoneNo" name="phoneNo" class="form-control" >
            @error('phoneNo')
            <div class="error error-phoneNo text-danger">{{ $message }}</div>

              
            @enderror
            
          </div>
          <div class="col-lg-7">
            <label for="validationCustom03" class="form-label">معلومات اضافی</label>
           <textarea name="description"class="form-control" id="description" cols="118" rows="4">{{ $distribution->description }}</textarea>
           @error('description')
           <div class="error error-description text-danger">{{ $message }}</div>
             
           @enderror
            
          </div>
          
        </div>
    
    </div>

    <div class="col-12">
        <button class="btn btn-primary" id="upate-distribution-btn" type="submit">ویرایش</button>
      </div>
</form>




    
@endsection



@section('script')
<script>
  $(document).ready(function () {

    // $(document).on('submit','#update-distribution-form', function (e) {
    //     e.preventDefault();

    //     var distribution_id = $('#distribution_id_hidden').val();
    //     // console.log(distribution_id);
    //     $.ajax({
    //         type: "PUT",
    //         url: "{{ route('distribution.update') }}/"+distribution_id,
    //         data:$(this).serialize(),
    //         dataType: "json",
    //         success: function (response) {

    //             if(response.status==400)
    //             {
    //                 $('.error').html('');
    //                 $('.error').addClass('text-danger');
    //                 $.each(response.errors, function (key, singleError) { 
    //                 $('.error-'+key).html(singleError);

                         
    //                 });

    //             }
    //             else
    //             {
    //                 Swal.fire(
    //                         'Good job!',
    //                         response.message,
    //                         'success'
    //                         )


    //             }
                
    //         }
    //     });

        
    // });



    $('#selectUnit').select2({
    placeholder:'انتخاب نماید',
    dir: 'rtl'

});

$('#selectRank').select2({
    placeholder:'انتخاب نماید',
    dir: 'rtl'

});



</script>

@endsection

























