@extends('adminLayouts.app')

@section('content')

<div class="m-portlet">
    
    <div class="m-portlet__body">
        <form id="search-form">
            @csrf
                <div class="form-group m-form__group form-row">

                    <div class="col-lg-4">
                        <label for="exampleSelect1"> نوع راپور</label>
                        <select class="form-control m-input m-input--square" id="exampleSelect1">
                            <option value="">مجموع سیمکارت های توضیح شده</option>
                            

                        
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="exampleSelect1"> انتخاب قطعه</label>
                        <select class="form-control m-input m-input--square selectUnit" name="unitselect" id="selectUnit">
                            <option class="unit_option" value=""></option>
                            @foreach($units as $unit)
                            <option value="{{ $unit->id }}"> {{$unit->name }} </option>


                                
                            @endforeach
                        
                        </select>
                    </div>

                    <div class="col-lg-4">
                        <input type="submit" id="submit-btn" style="margin-top: 25px" class="form-control btn btn-outline-success btn-block" value="جستجو">
                        {{-- <button type="button" class="btn btn-outline-success btn-block">Block level button</button> --}}
                    </div>
                
                </div>
             </form>
               
                
        
          
               
               
    </div>
</div>
        



<div class="m-portlet"  id="main-data">
   
   
</div>
@endsection





@section('script')

<script>
    $(document).ready(function () {
        $(document).on('submit', '#search-form', function (e) {
            e.preventDefault();
            var id = $('#selectUnit').val();
            // console.log(id);
            $.ajax({
                type: "Post",
                url: "{{ route('searchSim.submit') }}",
                data: $(this).serialize(),
               
                success: function (response) 
                {
                    $('#main-data').html(response);
                   

                    
                }
            });
            
            
        });

        // $(document).on('click','#print-btn', function () {
        //     var unit_id = $('#unit_id').val();
        //     // console.log(unit_id);
        //     $.ajax({
        //         type: "GET",
        //         url: "{{ route('report.pdf') }}/"+unit_id,
        //         dataType: "json",
        //         success: function (response) {
                    
        //         }
        //     });
        // });
        
        
        
        $('.selectUnit').select2({
            placeholder:'انتخاب نماید',
            dir: 'rtl'
            
        });


        
    });
    // if(response.status==200)
    // {
    //     $('.unit-name').html('');
    //     $('#jigar').html(response.data);
    //     // $('tbody').append(response.data);
    //     // $('.unit-name').append(response.data1);
    //     // $('#unit_id').val(response.unit_id);
    
    
    // }
    
</script>

@endsection