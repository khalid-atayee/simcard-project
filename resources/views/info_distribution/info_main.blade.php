


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
 
      @include('components.header-buttons-search')

    <div id="print-this">
      <x-print-component :dist="$distributions" :sim="$simcards"></x-print-component>
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
          
//             var divContents = document.getElementById("include-content").innerHTML;
//             var a = window.open('', '');
//             a.document.write('<html>');
//             a.document.write('<head>');
//             a.document.write('<style>');
//             a.document.write('<style>');
//             a.document.write('<link href="assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />');
//             a.document.write('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">');
//             a.document.write('')
//             a.document.write('</style>');
//             a.document.write('</head>');
//             a.document.write('<body > ');
//             a.document.write(divContents);
//             a.document.write('</body></html>');
//             a.document.close();
//             a.print();
        

//         });
//     });
// </script>
    
@endsection