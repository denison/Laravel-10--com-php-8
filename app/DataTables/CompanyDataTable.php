<?php

namespace App\DataTables;

use App\Helpers\Functions;
use App\Models\Company;
use App\Services\DataTablesDefaults;
use Yajra\DataTables\Datatables;
use Yajra\DataTables\Services\DataTable;

class CompanyDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @return \Yajra\DataTables\Datatables
     */
    public function dataTable()
    {
        if (request()->get('current-holding'))
        {
            $companies = request()->get('current-holding')->companies();
        }
        else //if (\Auth::user()->hasRole(['company', 'employee'])) 
        {
            $companies = collect();
            
            foreach (\Auth::user()->companiesOwner()->pluck('companies.id')->toArray() as $company_id) $companies->push($company_id);
            foreach (\Auth::user()->companiesEmployee()->pluck('companies.id')->toArray() as $company_id) $companies->push($company_id);

            $companies = $companies->toArray();

            $companies = Company::whereIn('id', $companies);
        }

        $companies = $companies->select(
                "companies.*",

                \DB::raw("CONCAT(companies.address, ',Nº',
                            CONCAT(companies.number, '-',
                                CONCAT(companies.neighborhood, '-',
                                    CONCAT(companies.city, '/',
                                        CONCAT(companies.state, '(',
                                            CONCAT(companies.zipcode, ')')
                                        )
                                    )
                                )
                            )
                        ) as full_address"),

                \DB::raw("(CASE
                        WHEN companies.is_active=true  THEN 'Sim'
                        WHEN companies.is_active=false THEN 'Não'
                        ELSE NULL
                    END) as readable_is_active"),

                \DB::raw('(select sum(payments.value) from payments where payments.gateway_transaction_id is not null and payments.company_id = companies.id and payments.is_accepted) as total_payments_to_holding'),

                // Current Plan
                \DB::raw("(
                    select
                        concat('#', plans.id, ' - ', plans.name)
                    from
                        company_plan
                        inner join plans
                            on company_plan.plan_id = plans.id
                    where
                        company_plan.company_id = companies.id
                        and company_plan.active
                        and company_plan.expiration_date is not null
                    order by
                        company_plan.id desc
                    limit 1
                ) as current_plan"),
            );
        return DataTables::of($companies)
            ->filterColumn('full_address', function ($query, $keyword) {
                $query->whereRaw("CONCAT(companies.address, ',Nº',
                                    CONCAT(companies.number, '-',
                                        CONCAT(companies.neighborhood, '-',
                                            CONCAT(companies.city, '/',
                                                CONCAT(companies.state, '(',
                                                    CONCAT(companies.zipcode, ')')
                                                )
                                            )
                                        )
                                    )
                                ) like ?", ["%{$keyword}%"]);
            })
            ->filterColumn('current_plan', function ($query, $keyword) {

            })

            ->filterColumn('readable_is_active', function ($query, $keyword) {
                $query->whereRaw("(CASE
                                    WHEN companies.is_active=true  THEN 'Sim'
                                    WHEN companies.is_active=false THEN 'Não'
                                    ELSE NULL
                                END) like ?", ["%{$keyword}%"]);
            })
            
            ->editColumn('name', function ($company) 
            {
                //$url = route('companies.dashboard', $company->id);
                $url = route('company.companies.home', $company->id);
                $name = str_limit($company->name, 180);

                if ($company->is_active) {
                    return "<a href='{$url}'>{$name}</a>";
                } else {
                    return $name;
                }

            })
            
            ->editColumn('total_payments_to_holding', function ($company) 
            {
                return ($company->total_payments_to_holding) ? Functions::formatCurrency($company->total_payments_to_holding) : Functions::formatCurrency(0);
            })
            ->filterColumn('total_payments_to_holding', function ($query, $keyword) {
                $query->whereRaw("(select sum(payments.value) from payments where payments.gateway_transaction_id is not null and payments.company_id = companies.id and payments.is_accepted) like ?", ["%{$keyword}%"]);
            })
            
            ->addColumn('owner', function ($company) 
            {
                $owner = $company->owner;
                return ($owner) ? ($owner->name.' '.$owner->surname) : '';
            })
            ->filterColumn('owner', function ($query, $keyword) {
                $query->whereRaw("(
                                    SELECT name
                                    FROM users
                                    WHERE users.id=companies.user_id
                                ) like ?", ["%{$keyword}%"]);
            })
            ->addColumn("action", "companies.datatables_actions")
            ->rawColumns(["name", "action"]);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        if (\Auth::user()->hasRole('company')) $width = "75px";
        else $width = "25px";

        return $this->builder()
            ->minifiedAjax()
            ->columns($this->getColumns())
            ->addAction(["width" => "75px", "printable" => false, "title" => \Lang::get("datatables.action")])
            ->parameters(DataTablesDefaults::getParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        if (\Auth::user()->hasRole(['employee'])) 
        {
            return 
            [
                "id"                 => ["name" => "id",                 "render" => "(data != null) ? ((data.length > 180) ? data.substr(0,180) + '...'  : data) : '-'", "title" => \Lang::get("attributes.id")],
                "name"               => ["name" => "name",               "render" => "(data != null) ? ((data.length > 180) ? data.substr(0,180) + '...'  : data) : '-'", "title" => \Lang::get("attributes.name")],
                "email"              => ["name" => "email",              "render" => "(data != null) ? ((data.length > 180) ? data.substr(0,180) + '...'  : data) : '-'", "title" => \Lang::get("attributes.email")],
                "owner"              => ["name" => "owner",              "render" => "(data != null) ? ((data.length > 180) ? data.substr(0,180) + '...'  : data) : '-'", "title" => \Lang::get("attributes.owner")],
                "phone"              => ["name" => "phone",              "render" => "(data != null) ? ((data.length > 180) ? data.substr(0,180) + '...'  : data) : '-'", "title" => \Lang::get("attributes.phone")],
                //"description"        => ["name" => "description",        "render" => "(data != null) ? ((data.length > 180) ? data.substr(0,180) + '...'  : data) : '-'", "title" => \Lang::get("attributes.description")],
                "full_address"       => ["name" => "full_address",       "render" => "(data != null) ? ((data.length > 180) ? data.substr(0,180) + '...'  : data) : '-'", "title" => \Lang::get("attributes.full_address")],
                "readable_is_active" => ["name" => "readable_is_active", "render" => "(data != null) ? ((data.length > 180) ? data.substr(0,180) + '...'  : data) : '-'", "title" => \Lang::get("attributes.is_active")],
            ];
        }
        else
        {
            return 
            [
                "id"                 => ["name" => "id",                 "render" => "(data != null) ? ((data.length > 180) ? data.substr(0,180) + '...'  : data) : '-'", "title" => \Lang::get("attributes.id")],
                "name"               => ["name" => "name",               "render" => "(data != null) ? ((data.length > 180) ? data.substr(0,180) + '...'  : data) : '-'", "title" => \Lang::get("attributes.name")],
                /*
                "total_payments_to_holding" => 
                [
                    "name" => "total_payments_to_holding",
                    "render" => "(data != null) ? ((data.length > 180) ? data.substr(0,180) + '...'  : data) : '-'", 
                    "title" => "Pagamentos Realizados para a ".
                    (
                        (request()->get('current-holding')) ? 
                            request()->get('current-holding')->name 
                            : (\Auth::user()->holding->name ?? 'Spoten')
                    )
                ],
                */
                "email"              => ["name" => "email",              "render" => "(data != null) ? ((data.length > 180) ? data.substr(0,180) + '...'  : data) : '-'", "title" => \Lang::get("attributes.email")],
                "owner"              => ["name" => "owner",              "render" => "(data != null) ? ((data.length > 180) ? data.substr(0,180) + '...'  : data) : '-'", "title" => \Lang::get("attributes.owner")],
                "current_plan"       => ["name" => 'current_plan',       "render" => "(data != null) ? ((data.length > 180) ? data.substr(0,180) + '...'  : data) : '-'", "title" => \Lang::get("attributes.current_plan")],
                "document"           => ["name" => "document",           "render" => "(data != null) ? ((data.length > 180) ? data.substr(0,180) + '...'  : data) : '-'", "title" => \Lang::get("attributes.document")],
                "phone"              => ["name" => "phone",              "render" => "(data != null) ? ((data.length > 180) ? data.substr(0,180) + '...'  : data) : '-'", "title" => \Lang::get("attributes.phone")],
                //"description"        => ["name" => "description",        "render" => "(data != null) ? ((data.length > 180) ? data.substr(0,180) + '...'  : data) : '-'", "title" => \Lang::get("attributes.description")],
                "full_address"       => ["name" => "full_address",       "render" => "(data != null) ? ((data.length > 180) ? data.substr(0,180) + '...'  : data) : '-'", "title" => \Lang::get("attributes.full_address")],
                "readable_is_active" => ["name" => "readable_is_active", "render" => "(data != null) ? ((data.length > 180) ? data.substr(0,180) + '...'  : data) : '-'", "title" => \Lang::get("attributes.is_active")],
            ];
        }
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    // protected function filename()
    // {
    //     return "companies_".time();
    // }
}
