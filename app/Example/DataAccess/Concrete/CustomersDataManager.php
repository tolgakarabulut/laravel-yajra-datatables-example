<?php


namespace App\Example\DataAccess\Concrete;


use App\DataTables\CustomersDataTable;
use App\Example\DataAccess\Abstraction\ICustomersDataService;
use App\Models\Customers;

class CustomersDataManager implements ICustomersDataService
{
    protected $model;
    protected $dataTable;
    public function __construct(CustomersDataTable $dataTable)
    {
        $this->model = new Customers();
        $this->dataTable = $dataTable;
    }

    public function listForDatatable()
    {
        return $this->dataTable->query( $this->model );
    }
}
