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
              
         
        </thead>
        <tbody>
          
      
         
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
          {{ $count=1 }}
         @foreach ($simcards as $simcard )
          
            <td>{{ $count++ }}</td>
            <td>{{ $simcard->company->sim_type }}</td>
            <td>{{ $simcard->sim_number }}</td>
            <td>{{ $simcard->created_at }}</td>
            
          </tr>
         @endforeach

              
         
        </thead>
        <tbody>
          
      
         
        </tbody>
      </table>

</div>

   <div class="container p-4">
    <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
        <thead>
            <h3 class="m-portlet__head-text">
                مدیر سیستم
            </h3>
          <tr>
          
            <th scope="row">اسم</th>
            <th scope="row">تاریخ</th>
            <th scope="row">امضا</th>
                      
          </tr>
         
          <tr>
            
            
          </tr>
              
         
        </thead>
        <tbody>
          
      
         
        </tbody>
      </table>

</div>