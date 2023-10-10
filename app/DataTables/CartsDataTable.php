<?php

namespace App\DataTables;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CartsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('checkbox', 'admin.carts.btn.checkbox')
            ->addColumn('edit', 'admin.carts.btn.edit')
            ->addColumn('delete', 'admin.carts.btn.delete')
            ->rawColumns([
                'edit',
                'delete',
                'checkbox',
            ]);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query()
    {
        $query = Cart::with('user')->select('carts.*');
        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('cartsdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->parameters([
                        'responsive' => true,
                        'autoWidth' => false,
                        'dom'         => 'Blfrtip',
                        'lengthMenu'  => [[10,25,50,100],[10,25,50,trans('admin.all_record')]],
                        'buttons'     =>[

                            ['extend' => 'print','className'=>'btn btn-primary btn-sm','text'=>'<i class="fa fa-print"></i>'],
                            ['extend' => 'csv','className'=>'btn btn-info btn-sm','text'=>'<i class="fa fa-file"></i> '.trans('admin.ex_csv')],
                            ['extend' => 'excel','className'=>'btn btn-success btn-sm','text'=>'<i class="fa fa-file"></i> '.trans('admin.ex_excel')],
                            ['extend' => 'reload','className'=>'btn btn-default btn-sm','text'=>'<i class="fa fa-retweet"></i>'],
                            ['text'   => '<i class="fa fa-trash"></i> ','className'=>'btn btn-danger btn-sm delBtn'],

                        ],
                        'initComplete'=> " function () {
                            this.api().columns([2,3,4]).every(function () {
                                var column = this;
                                var input = document.createElement(\"input\");
                                $(input).appendTo($(column.footer()).empty())
                                .on('keyup', function () {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                    column.search(val ? val : '', true, false).draw();
                                });
                            });
                        }",

                        'language' => datatable_lang(),

                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('checkbox')
            ->title('<input type="checkbox" class="check_all" onclick="check_all()" />')
            ->data('checkbox')
            ->name('checkbox')
            ->exportable(false)
            ->orderable(false)
            ->searchable(false)
            ->printable(false),

            Column::make('id')
            ->title('#')
            ->data('id')
            ->name('id'),

            Column::make('status')
            ->title(trans('admin.status'))
            ->data('status')
            ->name('status'),

            Column::make('user_id')
            ->title(trans('admin.user_id'))
            ->data('user_id')
            ->name('user_id'),

            Column::make('user.name')
            ->title(trans('admin.user_name'))
            ->data('user.name')
            ->name('user.name'),

            Column::make('created_at')
            ->title(trans('admin.created_at'))
            ->data('created_at')
            ->name('created_at'),

            Column::make('updated_at')
            ->title(trans('admin.updated_at'))
            ->data('updated_at')
            ->name('updated_at'),

            Column::computed('edit')
            ->title(trans('admin.edit'))
            ->data('edit')
            ->exportable(false)
            ->orderable(false)
            ->searchable(false)
            ->printable(false)
            ->addClass('text-center'),

            Column::computed('delete')
            ->title(trans('admin.delete'))
            ->data('delete')
            ->exportable(false)
            ->orderable(false)
            ->searchable(false)
            ->printable(false)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Carts_' . date('YmdHis');
    }
}
