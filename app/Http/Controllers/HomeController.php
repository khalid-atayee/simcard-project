<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Distribution;
use App\Models\Rank;
use App\Models\Sim;
use App\Models\Unit;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\View\ViewName;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;



// use Barryvdh\DomPDF\Facade\Pdf;
// use Barryvdh\DomPDF\PDF;
// use Barryvdh\DomPDF\PDF as DomPDFPDF;
// use Barryvdh\DomPDF\PDF as DomPDFPDF;

class HomeController extends Controller
{
    function rank()
    {
        return view('adminLayouts.layoutss.rank');
    }

    function fetchData()
    {
        // $data =Rank::paginate(4);
        $data = Rank::all();
        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }
    function rankAdd(Request $request)
    {

        // print_r($_POST);

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',

            ],
            [
                'name.required' => 'لطفا نام رتبه را وارد نماید',

            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        } else {
            $rank = new Rank;
            $rank->name = $request->input('name');

            $rank->save();
            // dd($rank);
            return response()->json([
                'status' => 200,
                'message' => 'رتبه موفقانه ثبت شد'
            ]);
        }

        // $rank =new Rank;
        // $rank->name = $request->data;


    }
    // update function start here

    function updateData($id)
    {
        $update_data = Rank::find($id);
        if ($update_data) {
            return response()->json([
                'status' => 200,
                'data' => $update_data,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'record not found'
            ]);
        }
    }

    function updatingData(Request $request, $id)
    {
        $validator = validator::make(
            $request->all(),
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'نام رتبه ضروری میباشد'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        } else {
            $data = Rank::find($id);
            if ($data) {
                $data->name = $request->input('name');
                $data->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'رتبه موفقانه ویرایش شد'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'رتبه مورد نظر ویرایش نشد'
                ]);
            }
        }
    }


    // update function end here

    // delete function start here
    function deleteData($id)
    {
        $data = Rank::find($id);
        $data->delete();
        return response()->json([
            'status' => 200,
            'message' => 'رتبه موفقانه حذف گردید'
        ]);
    }
    // delete function end here

    // search function seart here

    function searchData(Request $request)
    {
        $search = $request->search;
        // dd($data);
        // $search_record = Rank::where('name','LIKE','%'.$name.'%');
        $data = Rank::where('name', 'Like', '%' . $search . '%')->get();


        if ($data) {
            return response()->json([
                'status' => 200,
                'data' => $data,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'errors' => 'رتبه موجود نیست',
            ]);
        }
    }
    // search function end here
    // -----------------------------------------------------Rank Functions end here------------------------------------------------------------------------------



    // -----------------------------------------------------Unit Functions start here------------------------------------------------------------------------------

    function unit()
    {
        return view('adminLayouts.layoutss.unit');
    }
    function insert(Request $request)

    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required'
            ],
            [
                'name.required' => 'اسم قطعه ضروری میباشد'
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ]);
        } else {
            $unit = new Unit;
            $unit->name = $request->input('name');
            $unit->save();
            return response()->json([
                'status' => 200,
                'message' => 'قطعه موفقانه اضافه گردید'
            ]);
        }
    }

    function fetchUnit()
    {
        $data = Unit::all();
        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }

    function delete($id)
    {
        $data = Unit::find($id);
        $data->delete();
        return response()->json([
            'status' => 200,
            'message' => 'قطعه موفقانه حذف شد'
        ]);
    }


    function update($id)
    {
        $data = Unit::find($id);
        if ($data) {
            return response()->json([
                'status' => 200,
                'data' => $data
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'قطعه یافت نشد'

            ]);
        }
    }

    function updating(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'اسم قطعه ضروری میباشد'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        } else {
            $data = Unit::find($id);
            if ($data) {
                $data->name = $request->input('name');
                $data->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'قطعه موفقانه ویرایش شد'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'قطعه یافت نشد'
                ]);
            }
        }
    }

    function searchUnit(Request $request)
    {
        $data = $request->search;
        $search = Unit::where('name', 'Like', '%' . $data . '%')->get();
        if ($search) {
            return response()->json([
                'status' => 200,
                'search' => $search,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'errors' => 'قطعه موجود نیست',
            ]);
        }
    }
    // -----------------------------------------------------Unit Functions end here------------------------------------------------------------------------------


    // -----------------------------------------------------Distribution Functions start here------------------------------------------------------------------------------


    function distribution()
    {
        return view('adminlayouts.layoutss.distribution');
    }

    function getRank()
    {
        $data = Rank::all();
        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }

    function getUnit()
    {
        $data = Unit::all();
        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }

    function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cardId' => 'required',
            'name' => 'required',
            'fname' => 'required',
            'job' => 'required',
            'tazkiraId' => 'required',
            'selectRank' => 'required',
            'selectUnit' => 'required',
            'date' => 'required',
            'address' => 'required',
            'phoneNo' => 'required|regex:/^(07)[0-9]{8}$/',
            'description' => 'required',
            // 'newPhoneNo.*'=>'required|regex:/^(07)[0-9]{8}$/',

            // 'newPhoneNo'=>isset($request->newPhoneNo) ? 'required|array' : '',
            'newPhoneNo.*' => isset($request->newPhoneNo) ? 'required|regex:/^(07)[0-9]{8}$/' : '',
        ], [
            'cardId.required' => 'کارت آیدی ضروری میباشد',
            'name.required' => 'اسم ضروری میباشد',
            'fname.required' => 'اسم پدر ضروری میباشد',
            'job.required' => 'وظیفه ضروری میباشد',
            'tazkiraId.required' => 'نمبر تذکره ضروری میباشد',
            'selectRank.required' => 'رتبه ضروری میباشد',
            'selectUnit.required' => 'قطعه ضروری میباشد',
            'date.required' => 'تاریخ ضروری میباشد',
            'address.required' => 'آدرس ضروری میباشد',
            'phoneNo.required' => 'نمبر تماس ضروری میباشد',
            'phoneNo.regex' => 'نمبر تماس را به فارمت درست بنویسید',
            'description.required' => 'معلومات اضافی ضروری میباشد',
            'newPhoneNo.*.required'  => 'نمبر تماس ضروری میباشد',
            'newPhoneNo.*.regex' => 'نمبر تماس را به فارمت درست بنویسید',

        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ]);
        }

        DB::beginTransaction();
        try {
            // storing to distribution table start here
            $data = new Distribution;
            $data->identity_id = $request->cardId;
            $data->name = $request->name;
            $data->fatherName = $request->fname;
            $data->job = $request->job;
            $data->tazkira = $request->tazkiraId;
            $data->rank_id = $request->selectRank;
            $data->unit_id = $request->selectUnit;
            $data->date = $request->date;
            $data->address = $request->address;
            $data->phone = $request->phoneNo;
            $data->description = $request->description;
            $data->save();
            // storing to distribution table end here
            // dd($data);
            if (isset($request->newPhoneNo)) {
                $distribution_id = Distribution::orderBy('id', 'DESC')->first();
                foreach ($request->newPhoneNo as $key => $insert) {
                    $sim = new Sim;

                    $sim_company = $request->newPhoneNo[$key];
                    $sim->sim_number = $sim_company;
                    $sim->distribution_id = $distribution_id->id;
                    $sim_company_validation = substr($sim_company, 0, 3);
                    $company_id = null;
                    switch ($sim_company_validation) {
                        case '079':
                            $company_id = 1;
                            break;

                        case '072':
                            $company_id = 1;
                            break;

                        case '070':
                            $company_id = 2;
                            break;
                        case '071':
                            $company_id = 2;
                            break;

                        case '074':
                            $company_id = 3;
                            break;

                        case '077':
                            $company_id = 4;
                            break;
                        case '076':
                            $company_id = 4;
                            break;

                        case '078':
                            $company_id = 5;
                            break;

                        case '073':
                            $company_id = 5;
                            break;


                        default:
                            $company_id = 0;
                            break;
                    }
                    $sim->company_id = $company_id;
                    $sim->save();
                }
            }

            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'موفقانه ثبت گردید'
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'status' => 502,
                'errors' => 'موفقانه ثبت نشد'
            ]);
        }
    }


    // -----------------------------------------------------Search Staff Functions start here------------------------------------------------------------------------------

    function searchStaff()
    {
        $units = Unit::all();
        $ranks = Rank::all();
        return view('adminLayouts.layoutss.searchStaff', compact('units', 'ranks'));
    }

    function SearchSubmitForm(Request $request)
    {
    //    dd('ok');
    
        $output = '';
        $name = $request->name;
        $identity_id = $request->identity_id;
        $unitselect = $request->unitselect;
        $rankselect = $request->rankselect;
        $simcard_no = $request->simcard_no;
        if($simcard_no)
        {
            // $simCards = Sim::where('sim_number','0771234567')->pluck('id')->toArray();
            $datas = Sim::with('distribution.units','distribution.ranks')
            ->where('sim_number',$simcard_no)  
            ->get();

            $count = 1;
                foreach ($datas as $data) {
                    
                    $output  .= '<tr>
                    <td>' . $count . '</td>
                    <td>' . $data->distribution->name . '</td>
                    <td>' . $data->distribution->fatherName . '</td>
                    <td>' . $data->distribution->ranks->name . '</td>
                    <td>' . $data->distribution->job . '</td>
                    <td><a href="/info-employee'.$data->distribution->id.'" class="btn btn-info">معلومات</a></td>
                    </tr>';
                    $count++;
                }
                return response()->json([
                    'status' => 200,
                    'data' => $output
                ]);


        }
        else
        {
            // $distributions = Distribution::where('name',$name)->pluck('id')->toArray();
            $datas = Distribution::with('simcards','units','ranks')
            ->where('name',$name)
            ->orWhere('identity_id',$identity_id)
            ->orWhere('unit_id',$unitselect)
            ->orWhere('rank_id',$rankselect)
            
            
            ->get();
            
            $count = 1;
                foreach ($datas as $data) {
                    
                    $output  .= '<tr>
                    <td>' . $count . '</td>
                    <td>' . $data->name . '</td>
                    <td>' . $data->fatherName . '</td>
                    <td>' . $data->ranks->name . '</td>
                    <td>' . $data->job . '</td>
                    <td><a href="/info-employee/'.$data->id.'" class="btn btn-info">معلومات</a></td>
                    </tr>';
                    $count++;
                }
                return response()->json([
                    'status' => 200,
                    'data' => $output
                ]);
           

        }

    }
    function infoDistribution($id)
    {
        // dd($id);
        // $distributions = Distribution::find($id)->with('units','ranks')->first();
        $distributions = Distribution::with('units', 'ranks','simcards.company')->get()->find($id);
        // dd($distributions);
        // $simcards = Sim::with('company')->where('distribution_id',$id)->get();
        // dd($simcards);

        
      
        return view('info_distribution.info_main',compact('distributions'));
      

    }

    function pdfDistribution($id)
    {
        
      
            $distributions = Distribution::with('units', 'ranks')->get()->find($id);
            // dd($distributions);
            // view('view.name', $data);
            
            $simcards = Sim::with('company')->where('distribution_id',$id)->get();
            $view = \View('info_distribution.pdf',['distributions' => $distributions,'simcards' => $simcards,]);
            $html_content = $view->render();
            $pdf = new TCPDF();

            // $lg = Array();
            $lg['a_meta_charset'] = 'UTF-8';
            $local = session()->get('local');
            $lg['a_meta_dir'] = 'rtl';
            $lg['a_meta_language'] = 'ps';
            $lg['w_page'] = 'page';
            $pdf::SetAuthor('Nicola Asuni');
            $pdf::SetTitle('TCPDF Example 018');
            $pdf::SetSubject('TCPDF Tutorial');
            $pdf::SetKeywords('TCPDF, PDF, example, test, guide');
            // set default header data
            $pdf::SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 018', PDF_HEADER_STRING);
            // set header and footer fonts
            $pdf::setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf::setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            // set default monospaced font
            $pdf::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
            // set margins
            $pdf::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, 20);
            $pdf::SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf::SetFooterMargin(PDF_MARGIN_FOOTER);
            // set auto page breaks
            $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            // set image scale factor
            $pdf::setImageScale(PDF_IMAGE_SCALE_RATIO);
            // set some language-dependent strings (optional)
            $pdf::setLanguageArray($lg);
            // PDF::SetFont('dejavusans', '', 10);
            $pdf::SetFont(' freeserif', '', 10);

           
            // PDF::SetFont(' HOMA ', '', 14, '', true);
            // PDF::SetFont('aefurat', '', 10);
            $pdf::SetTitle("لیست سیم کارت های توضیع شده");
            $pdf::AddPage();
            //PDF::writeHTML($html_content, true, false, true, false, '');
            $pdf::WriteHTML($html_content, true, 0, true, 0);
            // PDF::setImageScale(PDF_IMAGE_SCALE_RATIO);

            // userlist is the name of the PDF downloading
            $pdf::Output('khalid.pdf', 'D');
            $pdf::download('Khalid.pdf');

    }


    function editDistribution($id)
    {
        $distribution= Distribution::find($id);
     
        $units = Unit::all();
        $ranks = Rank::all();

        return view('info_distribution.edit_distribution', compact('distribution','units','ranks'));
        
      
    }


    function updateDistribution(Request $request)
    {
        
            $validator =Validator::make($request->all(),[
                'cardId'=>'required',
                'name'=>'required',
                'fname'=>'required',
                'job'=>'required',
                'tazkiraId'=>'required',
                'selectRank'=>'required',
                'selectUnit'=>'required',
                'date'=>'required',
                'address'=>'required',
                'phoneNo'=>'required',
                'description'=>'required'
    
                ],
                [
                
                        'cardId.required' => 'کارت آیدی ضروری میباشد',
                        'name.required' => 'اسم ضروری میباشد',
                        'fname.required' => 'اسم پدر ضروری میباشد',
                        'job.required' => 'وظیفه ضروری میباشد',
                        'tazkiraId.required' => 'نمبر تذکره ضروری میباشد',
                        'selectRank.required' => 'رتبه ضروری میباشد',
                        'selectUnit.required' => 'قطعه ضروری میباشد',
                        'date.required' => 'تاریخ ضروری میباشد',
                        'address.required' => 'آدرس ضروری میباشد',
                        'phoneNo.required' => 'نمبر تماس ضروری میباشد',
                        'description.required' => 'معلومات اضافی ضروری میباشد',
                ]);

                if($validator->fails())
                {
                    return back()->withErrors($validator);
                }
          
            else

            {
                $distribution_id = $request->distribution_id_hidden;
                $distribution = Distribution::find($request->distribution_id_hidden);
                $distribution->identity_id=$request->cardId;
                $distribution->name = $request->name;
                $distribution->fatherName = $request->fname;
                $distribution->job = $request->job;
                $distribution->tazkira = $request->tazkiraId;
                $distribution->rank_id = $request->selectRank;
                $distribution->unit_id = $request->selectUnit;
                $distribution->date = $request->date;
                $distribution->address = $request->address;
                $distribution->phone = $request->phoneNo;
                $distribution->description = $request->description;
                $distribution->save();
                
    
                $distributions = Distribution::with('units', 'ranks', 'simcards.company')->get()->find($distribution_id);
              
            }
           
    
            
          
            return view('info_distribution.info_main',compact('distributions'));
      
            
        
    }

    function simcardEdit(Request $request)
    {
        

        $validator = Validator::make($request->all(),[
            'simcards_number.*'=>'required|regex:/^(07)[0-9]{8}$/'

        ],
        [
            'simcards_number.*.required'=>'نمبر تماس ضروری میباشد',
            'simcards_number.*.regex'=>'نمبر تماس را به فارمت درست بنویسید'

        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->errors()
            ]);
        }
        
        foreach ($request->simcards_number as $key => $value) {
            $sim_id = $request->simcards_id[$key];
            $sim_number = $request->simcards_number[$key];
            $sim = Sim::find($sim_id);
            $sim->sim_number=$sim_number;

            $sim_company = substr($sim_number,0,3);
            $company_id=null;
            switch($sim_company){
                case '079':
                    $company_id = 1;
                    break;

                case '072':
                    $company_id = 1;
                    break;

                case '070':
                    $company_id = 2;
                    break;
                case '071':
                    $company_id = 2;
                    break;

                case '074':
                    $company_id = 3;
                    break;

                case '077':
                    $company_id = 4;
                    break;
                case '076':
                    $company_id = 4;
                    break;

                case '078':
                    $company_id = 5;
                    break;

                case '073':
                    $company_id = 5;
                    break;


                default:
                    $company_id = null;
                    break;
                
            }
            $sim->company_id = $company_id;
            $sim->update();
            


        }

        return response()->json([
            'status'=>200,
            'message'=>'نمبر های توضیح شده موفقانه ویرایش شد'
        ]);

       
       
    }

    function simcardDistribution(Request $request)
    {
        $distribution_id = $request->distribution_id;
        $validator = Validator::make($request->all(),
        [ 
            'newPhoneNo.*'=>'required|regex:/^(07)[0-9]{8}$/'

        ],
        [
            'newPhoneNo.*.required'=>'نمبر تماس ضروری میباشد',
            'newPhoneNo.*.regex'=>'نمبر تماس را به فارمت درست بنویسید'

        ]);
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->errors()
            ]);
            
        }

        foreach ($request->newPhoneNo as $key => $value) {
            $sim = new Sim;
            $sim_number = $request->newPhoneNo[$key];
            $sim->sim_number=$sim_number;
            $sim->distribution_id=$distribution_id;

            $sim_company_validate = substr($sim_number,0,3);
            $company_id=null;
            switch($sim_company_validate)
            {
                case '079':
                    $company_id = 1;
                    break;

                case '072':
                    $company_id = 1;
                    break;

                case '070':
                    $company_id = 2;
                    break;
                case '071':
                    $company_id = 2;
                    break;

                case '074':
                    $company_id = 3;
                    break;

                case '077':
                    $company_id = 4;
                    break;
                case '076':
                    $company_id = 4;
                    break;

                case '078':
                    $company_id = 5;
                    break;

                case '073':
                    $company_id = 5;
                    break;


                default:
                    $company_id = null;
                    break;
                
            }
            $sim->company_id = $company_id;
            $sim->save();
            

            
        }
        return response()->json([
            'status'=>200,
            'message'=>'سیمکارت موفقانه ثبت گردید'
        ]);


    }

    function criminalPdf($id){
        $distributions = Distribution::with('units', 'ranks')->get()->find($id);
        // dd($distributions);
        // view('view.name', $data);
        
        $simcards = Sim::with('company')->where('distribution_id',$id)->get();
        $view = \View('info_distribution.pdf',['distributions' => $distributions,'simcards' => $simcards])->render();
        // $html_content = $view->render();
        $pdf = new TCPDF();

        // $lg = Array();
        $lg['a_meta_charset'] = 'UTF-8';
        $local = session()->get('local');
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'ps';
        $lg['w_page'] = 'page';
        $pdf::SetAuthor('Nicola Asuni');
        $pdf::SetTitle('TCPDF Example 018');
        $pdf::SetSubject('TCPDF Tutorial');
        $pdf::SetKeywords('TCPDF, PDF, example, test, guide');
        // set default header data
        $pdf::SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 018', PDF_HEADER_STRING);
        // set header and footer fonts
        $pdf::setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf::setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        // set default monospaced font
        $pdf::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        // set margins
        $pdf::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, 20);
        $pdf::SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf::SetFooterMargin(PDF_MARGIN_FOOTER);
        // set auto page breaks
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        // set image scale factor
        $pdf::setImageScale(PDF_IMAGE_SCALE_RATIO);
        // set some language-dependent strings (optional)
        $pdf::setLanguageArray($lg);
        // PDF::SetFont('dejavusans', '', 10);
        $pdf::SetFont(' freeserif', '', 10);

       
        // PDF::SetFont(' HOMA ', '', 14, '', true);
        // PDF::SetFont('aefurat', '', 10);
        $pdf::SetTitle("لیست سیم کارت های توضیع شده");
        $pdf::AddPage();
        //PDF::writeHTML($html_content, true, false, true, false, '');
        $pdf::WriteHTML($view, true, 0, true, 0);
        // PDF::setImageScale(PDF_IMAGE_SCALE_RATIO);

        // userlist is the name of the PDF downloading
        $pdf::Output('khalid.pdf', 'D');
        $pdf::download('Khalid.pdf');
    }



    function reportUnit()
    {
        $units = Unit::all();
        return view('reports.report-unit', compact('units'));
    }


    function searchSim(Request $request)
    {
        // $unitsWithSimType = Unit::with(['simcards' => function($query){
        //     $query->groupBy('company_id');
        // }])->get();
        $unit_id = $request->unitselect;
        $datas = DB::table('sims')
        ->join('distributions','distributions.id', '=', 'sims.distribution_id')
        ->join('companies','companies.id','=','sims.company_id')
        ->join('units','units.id','=','distributions.unit_id')
        ->select(
            DB::raw('COUNT(*) as totalSims'),
            'units.name as unit_name',
            'companies.sim_type as company_name','units.id as unit_id'
        )
        ->where('units.id',$unit_id)
        ->groupBy('sims.company_id')
        ->groupBy('distributions.unit_id')
        ->get();
        
        
        
        return view('reports.report-view', compact('datas'));
        
        
        // ->select('units.name as unit_name','companies.sim_type as company_name',DB::raw('count(*) as total_simcard'))
        // dd($output);
        // return response()->json([
            // $output='';
            // $count = 1;
            // foreach ($datas as $data) {
                
            //    $output  .= '
            //    <tr>
            //    <td>' .$count++ . '</td>
            //    <td>' . $data->company_name . '</td>
            //    <td>' . $data->totalSims . '</td>
            //    <input type="text" value="'.  '"
               
            //    </tr>';
                
    
            
           
            // }
        //     'status' => 200,
        //     'data' => $output,
        //     'data1'=>$data1,
        //     // 'unit_id'=>$unit_id
          
        // ]);

        
    }  
    
    function reportPdf($id)
    {

        // dd($id);
        // $unit_id = $request->unit_id;
    

        // dd($unit_id);

        $datas = DB::table('sims')
        ->join('distributions','distributions.id','=','sims.distribution_id')
        ->join('companies','companies.id','=','sims.company_id')
        ->join('units','units.id','=','distributions.unit_id')
        ->select(DB::raw('COUNT(*)as totalSims'), 'units.name as unit_name','companies.sim_type as company_name')
        ->where('units.id',$id)
        ->groupBy('sims.company_id')
        ->groupBy('distributions.unit_id')
        ->get();

        $view = \View('reports.report-pdf',['datas'=>$datas]);
        $html_content = $view->render();
        $pdf = new TCPDF();

        // $lg = Array();
        $lg['a_meta_charset'] = 'UTF-8';
        $local = session()->get('local');
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'ps';
        $lg['w_page'] = 'page';
        $pdf::SetAuthor('Nicola Asuni');
        $pdf::SetTitle('TCPDF Example 018');
        $pdf::SetSubject('TCPDF Tutorial');
        $pdf::SetKeywords('TCPDF, PDF, example, test, guide');
        // set default header data
        $pdf::SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 018', PDF_HEADER_STRING);
        // set header and footer fonts
        $pdf::setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf::setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        // set default monospaced font
        $pdf::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        // set margins
        $pdf::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, 20);
        $pdf::SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf::SetFooterMargin(PDF_MARGIN_FOOTER);
        // set auto page breaks
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        // set image scale factor
        $pdf::setImageScale(PDF_IMAGE_SCALE_RATIO);
        // set some language-dependent strings (optional)
        $pdf::setLanguageArray($lg);
        // PDF::SetFont('dejavusans', '', 10);
        $pdf::SetFont(' freeserif', '', 10);

       
        $pdf::SetTitle("لیست سیم کارت های توضیع شده");
        $pdf::AddPage();
        $pdf::WriteHTML($html_content, true, 0, true, 0);
        $pdf::Output('simcards.pdf','D');
        $pdf::download('simcards.pdf');
        
        
        
    }
    
    function  export()
    {
        return Excel::download(new UsersExport, 'user.xlsx');
    }
    
    
    
    
    
    
    
    
    
    
    
    // PDF::setImageScale(PDF_IMAGE_SCALE_RATIO);
    //PDF::writeHTML($html_content, true, false, true, false, '');
    // PDF::SetFont(' HOMA ', '', 14, '', true);
    // PDF::SetFont('aefurat', '', 10);

    // userlist is the name of the PDF downloading
    
    
    // $pdf::setImageScale(PDF_IMAGE_SCALE_RATIO);
    // set some language-dependent strings (optional)
    // $pdf::setLanguageArray($lg);
    // // PDF::SetFont('dejavusans', '', 10);
    // $pdf::SetFont(' freeserif', '', 10);
    // $pdf::SetTitle("لیست سیم کارت های توضیع شده");
    // $pdf::AddPage();
    // $pdf::WriteHtml($view, true, 0,true,0);
    // $pdf::Output('khalid.pdf','D');
    // $pdf::download('khalid.pdf');
    // dd($request->unitselect);
    // dd($datas);
    
    // $sims = Sim::select('*')
    // ->join('distributions','distributions.id','=','sims.distribution_id')
    // ->join('companies','sims.company_id','=','companies.id')
    // ->groupBy('companies.id',null)
    // ->get();
    // dd($sims);
        // $unit_id = $request->unitselect;
        
        // $unit = Unit::with(['simcards' => function($query){
            //     $query->with('company')->select('sims.id','company_id',DB::raw('count(*)'))->groupBy('company_id','sims.id');
            // }])->find(9);
            // $unit = Unit::with(['simcards' => function (MorphTo $morphTo) {
                //         $morphTo->morphWithCount([
        //             Company::class,
        //         ]);
        //     }
        //     ])->find(9);
        // $totalSimByCompany = $unit->simcards->count('company_id');
        // $distribution = Distribution::with('units');

        // $distribution = Distribution::where('unit_id',$unit_id)->pluck('id');
        
        // $sim = Sim::select('*')
        //     ->whereIn('distribution_id',$distribution)
        //     ->groupBy('company_id')
        //     ->limit(1)->get();
        
        // foreach($sim as $s)
        // {
            // $totalOpen = DB::table('sims as s')
            //    ->leftjoin('companies as c', 's.company_id', '=', 'c.id')
            //    ->where('id',$s->company_id)
            //    ->count();
            //        echo $s->company_id.'<br>';
            // }exit;
            
            //         $totalOpen = DB::table('sims as s')
            //            ->join('companies as c', 's.company_id', '=', 'c.id')
            //            ->whereIn('s.distribution_id',$distribution)
            //            ->count();
            //    // echo $distribution;
            // echo "<pre>";print_r($sim);exit;
            
            //}
            //    $distribution = Distribution::get();
            //     $stype = Company::get();
            
            //     foreach($distribution as $ds){
            //         foreach($stype as $m){
                //             $sims = DB::table('sims')->join('companies','companies.id','sims.company_id')
                //              ->where('distribution_id',$ds->id)
                //             ->where('company_id',$m->id)
                //             ->select(DB::raw('COUNT(sims.company_id) as totalSims'))
                //             ->groupBy('sims.distribution_id')->get();
                //         }
                //         echo $sims->totalSims;
                
                
                //if($c==5)
                
                // }
                // $simcards = Sim::with('company')->whereIn('distribution_id',$distribution)->get();
                
        // dd($simcards);
        // ->groupBy('sims.distribution_id');
        // echo "<pre>"; print_r($simcards); exit;
        // var_dump($simcards);
        // dd($simcards->toArray());
        // dd($simcards);
        // $count = 1;
        // foreach ($simcards as $key => $simcard) {
            //     $output .= '<tr>
        //     <td>' . $count . '</td>
        //     <td>' . $simcard->company->sim_type . '</td>
        //     <td>' . $data->fatherName . '</td>
        //     <td>' . $data->ranks->name . '</td>
        //     <td>' . $data->job . '</td>';
        //     $count++;
        
        
        // }
        // return response()->json([
            //     'status=>200',
            //     'simcards'=>$simcards
            // ]);
            
            // dd($distribution);
            // $simcard = Sim::with('distribution')->where('distribution_id',)
            // dd()
            // $datas = Distribution::with('simcards','units','ranks')
            // ->where('name',$name)
            // ->orWhere('identity_id',$identity_id)
            // ->orWhere('unit_id',$unitselect)
            // ->orWhere('rank_id',$rankselect)
            // ->orWhere('',$simcard_no)
            
            // ->get();
        // $datas = Distribution::all();
        // dd($datas->simecards->where('sim_number', $simcard_no));
        
        // $data = DB::table('sims')->join('distributions', 'distributions.id','=', 'sims.distribution_id')
        //     ->join('ranks', 'ranks.id', '=', 'distributions.rank_id')->join('units', 'units.id', '=', 'distributions.unit_id')
        //     ->where('distributions.name', $name)
        //     ->orWhere('distributions.identity_id', $identity_id)
        //     ->orWhere('sims.sim_number', $simcard_no)
        //     ->orWhere('units.id', $unitselect)
        //     ->orWhere('ranks.id', $rankselect)
        //     ->select('distributions.*', 'distributions.name as dname', 'ranks.name as rankName')->get();
        
        //     $search_content = Distribution::select('*')
        //    -> where('name','Like','%'.$name.'%')
        //     ->orWhere('identity_id','Like','%'.$$identity_id.'%')
        //     // // ->orWhere('unit_id', 'Like', '%'.$unitselect.'%')
        //     // // ->orWhere('rank_id', 'Like', '%'.$rankselect.'%')
        //     ->get();
        
        // $search_content = Distribution::query()
        //                 ->where('name', 'LIKE', '%'.$name.'%')
        //                 ->orWhere('identity_id', 'LIKE', '%'.$identity_id.'%')
        //                 // ->orWhere('email', 'LIKE', '%'.$search.'%')
        //                 ->get();
        
        // dd($search_content);
        
        
        // $search_content =Distribution::when($name != '')
        //                           -> where('name', $name)
        //            -> when($identity_id !='')
        //                 ->where('identity_id',$identity_id)
        //             ->when($unitselect!='')
        //                 -> where('unit_id',$unitselect)
        //             ->when($rankselect!='')
        //                 -> where('rank_id',$rankselect)
        //                 ->get();

        // if($search_content)
        // {
        //     return response()->json([
            //         'status'=>200,
            //         'search-content'=>$search_content
            //     ]);
            // }
            // else
            // {
                //     return response()->json([
                    //         'status'=>404,
                    //         'errors'=>'Data not found'
                    //     ]);
                    // }
                    
                    // return $simcards
                    // SELECT count(*) as total_simcards, units.name unit_name, companies.sim_type company_name FROM `sims` 
                    // sims INNER JOIN distributions distributions on distributions.id=sims.distribution_id
                    //  INNER JOIN companies on companies.id=sims.company_id 
                    // inner JOIN units on units.id=distributions.unit_id GROUP BY sims.company_id,distributions.unit_id;
                    
                    
                    
                    
                    
                }
                