<?php

namespace App\DataTables;

use App\Models\Customers;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CustomersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Illuminate\Http\JsonResponse
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', static function (Customers $customer) {
                return "<a href='/customers/detail/{$customer->slug}' class='btn btn-success btn-sm w-100'>Detail</a>";
            })
            ->toJson();
    }

    /**
     * Get query source of dataTable.
     *
     * @param Customers $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Customers $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('customers-table')
            ->columns( $this->getColumns() )
            ->language( "//cdn.datatables.net/plug-ins/1.10.21/i18n/English.json" )
            ->minifiedAjax()
            ->orderBy(0)
            ->buttons(
                Button::make('reset')
            )
            ->ajax([
                'url' => '/customers/list-datatable',
                "type" => 'POST',
                "headers" => [
                    'X-CSRF-TOKEN'=> csrf_token()
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {

        return [
            Column::make('id')->title('ID'),
            Column::make('name')->title('Name'),
            Column::make('email')->title('E-Mail'),
            Column::make('phone')->title('Phone Number'),
            Column::make('address')->title('Address'),
            Column::make('action')->title('#'),

        ];
    }


    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Customers_' . date('YmdHis');
    }
}
