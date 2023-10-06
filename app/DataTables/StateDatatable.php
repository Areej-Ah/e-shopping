<?php

namespace App\DataTables;

use App\Models\State;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StateDatatable extends DataTable
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
            ->addColumn('checkbox', 'admin.states.btn.checkbox')
            ->addColumn('edit', 'admin.states.btn.edit')
            ->addColumn('delete', 'admin.states.btn.delete')
            ->rawColumns([
                'edit',
                'delete',
                'checkbox',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Model\State $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return State::query()->with('country')->with('city')->select('states.*');
    }




    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('statedatatable-table')
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
                            this.api().columns([2,3,4,5]).every(function () {
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


            Column::make('country_id')
            ->title(trans('admin.country_id'))
            ->data('country.name_'.session('lang'))
            ->name('country.name_'.session('lang')),

            Column::make('city_id')
            ->title(trans('admin.city_id'))
            ->data('city.name_'.session('lang'))
            ->name('city.name_'.session('lang')),



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
        return 'State_' . date('YmdHis');
    }
}
