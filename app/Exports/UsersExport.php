<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return User::all();
       return  DB::table('sims')
        ->join('distributions','distributions.id','=','sims.distribution_id')
        ->join('companies','companies.id','=','sims.company_id')
        ->join('units','units.id','=','distributions.unit_id')
        ->select(DB::raw('COUNT(*)as totalSims'), 'units.name as unit_name','companies.sim_type as company_name')
        ->where('units.id',9)
        ->groupBy('sims.company_id')
        ->groupBy('distributions.unit_id')
        ->get();
        // return view('reports.report-excel',compact('datas'));
    }
}
