<?php

namespace App\DataTables;

use App\Models\adminCar;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Models\Car;

class adminCarsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('isBeingMoved', function ($data) {
                if ($data->isBeingMoved == 1) {
                    return "Yes";
                }
                if ($data->isBeingMoved == 0) {
                    return "No";
                }
            })
            ->addColumn('action', 'admin.datatables.actions')
            ->setRowClass(function ($data) {
            return $data->isBeingMoved == 0 ? 'bg-success' : 'bg-warning';
            })
            ->setRowId('id');
    }

     /**
     * Get the query source of dataTable.
     */
    public function query(Car $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('cars-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(5)
                    ->selectStyleSingle()
                    ->buttons([]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('vinNo'),
            Column::make('space_id'),
            Column::make('make'),
            Column::make('model'),
            Column::make('year'),
            Column::make('isBeingMoved'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }
}