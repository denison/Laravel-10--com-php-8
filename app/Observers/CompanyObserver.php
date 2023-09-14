<?php

namespace App\Observers;

use App\Models\Company;
use DB;
use Carbon\Carbon;

class CompanyObserver
{
    /**
     * Handle the Company "created" event.
     */
    public function created(Company $company): void
    {
        DB::beginTransaction();
        
        try{
            $company_partners = [
                [
                    "company_id"            => $company->id,
                    "partner_id"            => env("COMPANY_MAIN"),
                    "cashback_percentage"   => 0
                ]
            ];
            DB::table('company_partners')->insert($company_partners);

            $company_employee = [
                [
                    "user_id"       => auth()->user()->id,
                    "company_id"    => $company->id,
                    "created_at"    => Carbon::now(),
                    "updated_at"    => Carbon::now()
                ]
            ];

            DB::table('company_employee')->insert($company_employee);
            DB::commit();
        }catch(\Exception $e){
            dd($e);
            DB::rollBack();
        }

    }

    /**
     * Handle the Company "updated" event.
     */
    public function updated(Company $company): void
    {
        //
    }

    /**
     * Handle the Company "deleted" event.
     */
    public function deleted(Company $company): void
    {
        //
    }

    /**
     * Handle the Company "restored" event.
     */
    public function restored(Company $company): void
    {
        //
    }

    /**
     * Handle the Company "force deleted" event.
     */
    public function forceDeleted(Company $company): void
    {
        //
    }
}
