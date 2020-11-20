<?php

namespace App\Http\Controllers;

use App\DataTables\CustomersDataTable;
use App\Example\Business\Abstraction\ICustomersService;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function list(CustomersDataTable $dataTable)
    {
        return $dataTable->render('app.customer.list');
    }

    public function listForDatatable(
        Request $request,
        CustomersDataTable $dataTable,
        ICustomersService $service
    )
    {
        if ($request->ajax()) {
            return $dataTable->dataTable( $service->listForDatatable() );
        }
    }
}
