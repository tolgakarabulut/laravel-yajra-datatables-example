<?php

    namespace App\Example\Business\Concrete;

    use App\Example\Business\Abstraction\ICustomersService;
    use App\Example\DataAccess\Abstraction\ICustomersDataService;

    class CustomersManager implements ICustomersService
    {

        protected $dataService;
        public function __construct(ICustomersDataService $dataService)
        {
            $this->dataService = $dataService;
        }


        public function listForDatatable()
        {
            return $this->dataService->listForDatatable();
        }
    }
