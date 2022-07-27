<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class companiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            'Roshan',
            'AWCC',
            'Saalam',
            'MTN',
            'Etisalat'
        ];
        
        foreach ($companies as $company) {
            $sim_company = new Company;
            $sim_company->sim_type=$company;
            $sim_company->Save();


        }
        
    }
}
