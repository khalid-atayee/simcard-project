<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Distribution;
use App\Models\Rank;
use App\Models\Sim;
use App\Models\Unit;
use App\View\Components\PrintComponent;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
// use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use PDF;
// use Barryvdh\DomPDF\Fa;
// use P



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
        $distributions = Distribution::with('units', 'ranks')->get()->find($id);
        // dd($distributions);
        $simcards = Sim::with('company')->where('distribution_id',$id)->get();
        // dd($simcards);
        
      
        return view('info_distribution.info_main',compact('distributions','simcards'));
      

    }

    function print_old($id)
    {
        $distributions = Distribution::with('units', 'ranks')->get()->find($id);
        // dd($distributions);
        $simcards = Sim::with('company')->where('distribution_id',$id)->get();
        $printComponent = new PrintComponent($distributions, $simcards);
        $printComponentView = $printComponent->resolveView()->render();
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML($printComponentView);
        // dd("sdfss");
        // return $pdf->stream();

        // $pdf = PDF::loadView('pdf.invoice', $printComponentView);
        // return $pdf->download('invoice.pdf');
       
    }
        
       
        
       
        
        
        
        
        
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






}
