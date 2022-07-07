<div class="m-portlet__head">
  <div class="m-portlet__head-caption">
      <div class="m-portlet__head-title">
          <h3 >
              راپور ها
          </h3>
      </div>
  </div>
  <div class="m-portlet__head-tools">
      
     
      <div class="btn-group">
          <button type="button" class="btn btn-primary  m-btn m-btn--icon m-btn--wide m-btn--md">
              انتقال به اکسل
          </button>
          <a href="{{ route('report.pdf',$datas[0]->unit_id) }}" id="print-btn"  class="btn btn-success  mx-2 m-btn m-btn--md" >
              چاپ
          </a >
          {{-- <input type="text"  id="unit_id"> --}}
         
      </div>
  </div>
</div>
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
  <div class="container p-4" id="jigar">
    <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
                
      <thead>
          <tr>
          <th class="unit-name" scope="row">
              {{ $datas[0]->unit_name}}
  
              {{-- <input type="hidden" id="unit_id" value="{{ $datas[0]->unit_id }}"> --}}
           </th>
  
          </tr>
  
        <tr>
          <th scope="row">#</th>
          <th scope="row">شبکه مخابراتی</th>
          <th scope="row">تعداد سیم کارت توضیح شده</th>
          
      </tr>
  
      
      @foreach ($datas as $data)
      
      <tr>
          <td>{{ $loop->index+1 }}</td>
          <td>{{ $data->company_name }}</td>
          <td>{{ $data->totalSims }}</td>
  
      </tr>
          
      @endforeach
   
  
  </div>


  
</div>



                  

     
     
          
     
    </thead>
    <tbody>
     

  
     
    </tbody>
  </table>