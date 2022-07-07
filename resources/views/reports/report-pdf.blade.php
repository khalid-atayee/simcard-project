
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
                    <td  class="center-img">
                        <img class="logo-img" src="{{ public_path('loginImage/7.jpg') }}" alt="">

                    </td>
                </tr>
            </tbody>
        </table>
      
            
               
                
                <br><br><br>
                <div class="container p-4">
                    <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline">
                        
                        <thead>
                            <tr>
                            <th class="unit-name" scope="row"></th>
        
                            </tr>
                
                          <tr>
                            <th scope="row">#</th>
                            <th scope="row">شبکه مخابراتی</th>
                            <th scope="row">تعداد سیم کارت توضیح شده</th>
                            
                        </tr>
                                      
            
                         
                         
                              
                         
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $data->company_name }}</td>
                                    <td>{{ $data->totalSims }}</td>

                                </tr>
                                    
                             @endforeach
                         
            
                      
                         
                        </tbody>
                      </table>
                
                </div>
       

       
     
</body>
</html>
