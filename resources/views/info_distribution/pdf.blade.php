

<html>
    <head>
     
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
 .header-content
{
   
    border: 1px solid rebeccapurple;
  
    

}
.afghanistan-logo
{
    
    height: 100px;
    width: 100px;
    border: 1px solid green;
    width: fit-content;

    
}
.content-text
{
    width: 20%;
    border: 1px solid red;
    width: fit-content;

}
.content-text h1 h2 h3 h4 
{
    font-size: 10px;
}

.logo-moi
{
    width: 100px;
    height: 100px;
    border: 1px solid red;
    width: fit-content;
   
}
.logo-img
{
    width: 400%;
    height: 400%;
    
    
    
}
.center
{
    text-align: center;
   


}


  



</style>
    </head>
    <body class="font-sans antialiased w-full" >
          {{-- <div class="header-content">
            <div class="afghanistan-logo">
                
            </div>
            <div class="content-text">
                <img class="logo-img"  src="{{ public_path('loginImage/AfghanistanGovernmentLogo.jpeg') }}" alt="">

                
                    <h1>امارت اسلامی افغانستان</h1>
                    <h2>وزارت امور داخله</h2>
                    <h3>ریاست عمومی مخابره و تکنالوژی معلوماتی</h3>
                    <h4>مدیریت عمومی ارتباطات</h4>

                

            </div>

            <div class="moi-logo">
                <img class="logo-img" src="{{ public_path('loginImage/7.jpg') }}" alt="">

            </div>
        </div> --}}

        <table class="table  table-striped- resposive-table" width="100%">
            <tbody>
                <tr>
                    <td  class="center-img">

                        <img class="logo-img"  src="{{ public_path('loginImage/AfghanistanGovernmentLogo.jpeg') }}" alt="">
                    </td>
                    <td width="50%" class="center">
                        <h1>امارت اسلامی افغانستان</h1>
                        <h2>وزارت امور داخله</h2>
                        <h3>ریاست عمومی مخابره و تکنالوژی معلوماتی</h3>
                        <h4>مدیریت عمومی ارتباطات</h4>
                    </td>
                    <td></td>
                    <td  class="center-img">
                        <img class="logo-img" src="{{ public_path('loginImage/7.jpg') }}" alt="">


                    </td>
                </tr>
            </tbody>
        </table>

      
            
               
                
                <br><br><br>
        <table class="table custom-table" border="1px">
            <thead>
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
    
        <table class="table" border="1px" style="padding: 5px">
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
                {{ $count=1 }}
                @foreach ($simcards as $simcard )
                 <tr>
                   <td>{{ $count++ }}</td>
                   <td>{{ $simcard->company->sim_type }}</td>
                   <td>{{ $simcard->sim_number }}</td>
                   <td>{{ $simcard->created_at }}</td>
                   
                 </tr>
                @endforeach
            </tbody>
            
        </table>

        </div>
       
     
</body>

</html>
