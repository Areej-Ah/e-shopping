<?php

namespace App\DataTables;

use App\Models\Shipping;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ShippingDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('checkbox', 'admin.Shippings.btn.checkbox')
            ->addColumn('edit', 'admin.Shippings.btn.edit')
            ->addColumn('delete', 'admin.Shippings.btn.delete')
            ->rawColumns([
                'edit',
                'delete',
                'checkbox',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Model\Shipping $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Shipping::query()->with('user')->select('shippings.*');
    }




    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('shippingdatatable-table')
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
                            ['text'   => '<i class="fa fa-plus"></i> '.trans('admin.create'),'className'=>'btn btn-info btn-sm','action'=>"function(){

                                window.location.href='".\URL::current()."/create';
                            }"],
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
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
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

            Column::make('name_ar')
            ->title(trans('admin.name_ar'))
            ->data('name_ar')
            ->name('name_ar'),

            Column::make('name_en')
            ->title(trans('admin.name_en'))
            ->data('name_en')
            ->name('name_en'),


            Column::make('user_id')
            ->title(trans('admin.owner'))
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
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Shipping_' . date('YmdHis');
    }
}
