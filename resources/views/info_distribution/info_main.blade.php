


@extends('adminLayouts.app')


@section('content')
<div class="m-portlet m-portlet--tab">
   
    {{-- <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon m--hide">
                    <i class="la la-gear"></i>
                </span>
                <h3 class="m-portlet__head-text">
                    معلومات کارمند
                </h3>
                <div class="button-container">
                    <a class="button" href="">قضیه جنایی</a>
                    <a class="button" href="">ثبت شماره های جدید</a>
                    <a class="button" href="">توزیع شماره ها</a>
                    <a class="button" href="">مفقودی شماره ها</a>
                    <a class="button" href="">تغیر شماره ها</a>
                    <a class="button" href="">تغیرات معلومات</a>
                    <a class="button" href="">چاپ</a>

                </div>
                <div class="m-demo__preview  m-demo__preview--btn">
                    <div class="button-container">
                    <button type="button" class="btn btn-primary">Primary</button>
                    <button type="button" class="btn btn-success">Success</button>
                    <button type="button" class="btn btn-info">Info</button>
                    <button type="button" class="btn btn-warning">Warning</button>
                    <button type="button" class="btn btn-danger">Danger</button>
                  
                </div>
                
            </div>
        </div>
    </div> --}}
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
                    <a href="#" class="m-portlet__nav-link btn btn-primary m-btn  m-btn--air">
                        قضیه جنایی
                    </a>
                </li>
                  
                <li class="m-portlet__nav-item">
                    <a href="#" class="m-portlet__nav-link btn btn-primary m-btn  m-btn--air">
                        ثبت شماره های جدید
                    </a>
                </li>
                
                <li class="m-portlet__nav-item">
                    <a href="#" class="m-portlet__nav-link btn btn-primary m-btn  m-btn--air">
                        توزیع شماره ها
                    </a>
                </li>
                
                <li class="m-portlet__nav-item">
                    <a href="#" class="m-portlet__nav-link btn btn-primary m-btn  m-btn--air">
                        مفقودی شماره ها
                    </a>
                </li>
                <li class="m-portlet__nav-item">
                    <a href="#" class="m-portlet__nav-link btn btn-primary m-btn  m-btn--air">
                        تغیر شماره ها
                    </a>
                </li>
                <li class="m-portlet__nav-item">
                    <a href="#" class="m-portlet__nav-link btn btn-primary m-btn  m-btn--air">
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
    // $(document).ready(function () {
    //     $('#print-btn').click(function(){
            // $('#print-this').hide();
            // $('#include-content').hide();
            // $('#extended-dev').hide();
            // window.print();
            // $('#include-content').show();
          
            // var divContents = document.getElementById("include-content").innerHTML;
            // var a = window.open('', '');
            // a.document.write('<html>');
            // a.document.write('<head>');
            // a.document.write('<style>');
            // a.document.write('<style>');
            // a.document.write('<link href="assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />');
            // a.document.write('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">');
            // a.document.write('')
            // a.document.write('</style>');
            // a.document.write('</head>');
            // a.document.write('<body > ');
            // a.document.write(divContents);
            // a.document.write('</body></html>');
            // a.document.close();
            // a.print();
        

    //     });
    // });
</script>
    
@endsection