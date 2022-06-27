

<html lang="en">
    <head>
        <meta charset="utf-8" />
		<title>Sim Card Management System | Dashboard</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
		<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
		<base href="/public">

		<!--end::Web font -->

		<!--begin::Global Theme Styles -->
		{{-- <link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" /> --}}

		{{-- RTL version: --}}
		<link href="assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />
		{{-- <link href="assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" /> --}}

		{{-- RTL version: --}}
		<link href="assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles -->

		<!--begin::Page Vendors Styles -->
		{{-- <link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" /> --}}

		{{-- RTL version: --}}
		<link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />

		  {{-- bootstrap --}}
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        

		<!--end::Page Vendors Styles -->
		<link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />
		{{-- sweetalert --}}
		{{-- <link rel="stylesheet" href="{{ asset('plugin/sweetAlert2/sweetalert2.min.css') }}"> --}}
		{{-- <link rel="stylesheet" href="{{ asset('plugin/bahij-nassim/Bahij Nassim-Bold.ttf') }}">
		<link rel="stylesheet" href="{{ asset('plugin/select2/css/select2.css') }}"> --}}
		{{-- select2 --}}
		{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/> --}}
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

    </head>
    <body class="font-sans antialiased w-full" >
        <table class="table  table-striped- resposive-table" width="100%">
            <tbody>
                <tr>
                    <td  class="center-img">
                        <img class="w3-hover-opacity" class="center left" style="border-radius: 5px" src="">
                    </td>
                    <td width="50%" class="center">
                        <p style="text-align: center;">امارت اسلامی افغانستان</p>
                        <p style="text-align: center;">وزارت امور داخله</p>
                        <p style="text-align: center;">ریاست عمومی مخابره و تکنالوژی معلوماتی</p>
                    </td>
                    <td></td>
                    <td  class="center-img">
                        {{-- <img src="/sim_card/assets/images/MOI.jpeg" class="center left" align="center" alt=""> --}}
                    </td>
                </tr>
            </tbody>
        </table>
        <table>
            <tr>
                <td></td>
            </tr>
        </table>
        {{-- <table class="table  table-bordered">
            <tr class="bg-light">
                <td  height="20" colspan="4"><p align="center">{{ __('main.empInfo')}}</p></td>
            </tr>
                <tbody style="width: auto;overflow-x: auto;white-space: nowrap;"> 
                <tr>
                    <td height="20" class="bg-light" width="20%">{{ __('main.name')}}</td>
                    <td height="20">{{ $record[0]->name}}</td>
                    <td height="20" class="bg-light" width="20%">{{ __('main.fname')}}</td>
                    <td height="20">{{ $record[0]->father_name}}</td>
                </tr>
                <tr>
                    <td height="20" class="bg-light" width="20%">{{ __('main.job')}}</td>
                    <td height="20">{{ $record[0]->job}}</td>
                    <td height="20" class="bg-light" width="20%">{{ __('main.rank')}}</td>
                    <td height="20">{{ getDataFromStaticTable('rank','rank',$record[0]->rank)}}</td>
                </tr>
                <tr>
                    <td height="20" class="bg-light" width="20%">{{ __('main.empUnit')}}</td>
                    <td height="20">{{ getDataFromStaticTable('unit','unit_name',$record[0]->units)}}</td>
                    <td height="20" class="bg-light" width="20%">{{ __('main.phoneNumber')}}</td>
                    <td height="20">{{ $record[0]->phone_number}}</td>
                </tr>
                <tr>
                    <td height="20" class="bg-light" width="20%">{{ __('main.id_card')}}</td>
                    <td height="20">{{ $record[0]->id_card}}</td>
                    <td height="20" class="bg-light" width="20%">{{ __('main.address')}}</td>
                    <td height="20">{{ $record[0]->address}}</td>
                </tr>

                <tr>
                    <td height="20" class="bg-light" width="20%">{{ __('main.moreDetails')}}</td>
                    <td height="20" colspan="3">{{ $record[0]->details_information}}</td>
                </tr>
            </tbody>
        </table>
        <table>
            <tr>
                <td></td>
            </tr>
        </table>
        <table class="table  table-bordered">
            <tr class="bg-light">
                <td height="20" colspan="4"><p align="center">{{ __('main.simList')}}</p></td>
            </tr>
                <tbody style="width: auto;overflow-x: auto;white-space: nowrap;"> 
                <tr>
                    <td height="20"   width="4%"><b>#</b></td>
                    <td height="20"><b>{{ __('main.network')}}</b></td>
                    <td height="20"><b>{{ __('main.number')}}</b></td>
                    <td height="20"><b>{{ __('main.simdate')}}</b></td>
                </tr>

                    <?php  
                    $subRecord =  GetSim('sim_info','parent_urn',$record[0]->urn);
                    $i=1;
                    foreach($subRecord as $sub)
                    {?>
                        
                        <tr>
                        <td height="20"  width="4%">{{$i}}</td>
                        <td height="20">
                            <?php 
                                $rest = substr($sub->number, 0, -7);  // returns "abcde"
                                //echo $rest;
                                if($rest == "078")
                                {
                                    echo "اتصالات";
                                }
                                elseif($rest == "079" or $rest == "072")
                                {
                                    echo "روشن";
                                }
                                elseif($rest == "077" or $rest == "076")
                                {
                                    echo "ام تی ان";
                                }
                                elseif($rest == "070" or $rest == "071")
                                {
                                    echo "افغان بیسیم";
                                }
                            ?> 
                        </td>
                        <td height="20">{{$sub->number}}</td>
                        <td height="20">
                            <?php 
                            $v = new Verta($sub->created_at);
                            echo $v;
                            ?>
                        </td>
                    </tr>
                <?php $i++;}?>
            </tbody>
        </table>

        <table>
            <tr>
                <td></td>
            </tr>
        </table> --}}
        <table class="table  table-bordered">
           
            <tr class="bg-light">
                <td height="20" colspan="4"><p>{{ __('main.systemAdmin')}}</p></td>
            </tr>
                <tbody style="width: auto;overflow-x: auto;white-space: nowrap;"> 
                    <tr>
                        <td height="20"   width="30%">{{ __('main.name')}}: {{Auth::user()->name}}</td>
                        <td height="20"> {{ __('main.dateTime')}}:   </td>
                        <td height="20">{{ __('main.signatur')}}</td>

                        <td height="20">+79379079056 <b>Phone:</b> </td>
                    </tr>
              </tbody>
        </table>

    </body>
</html>
