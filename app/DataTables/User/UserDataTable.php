<?php

namespace App\DataTables\User;

use App\Modules\User\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function ($data) {
           
          
            $actionBtn = ' <a href="users/'. $data->id .'/show/" class="btn btn-sm btn-info show-user" title="Show User"><i class="fa fa-edit"></i> Show</a>';
            $actionBtn .= ' <a href="users/'. $data->id .'/edit/" class="btn btn-sm btn-primary edit-user" title="Edit User"><i class="fa fa-edit"></i> Edit</a>';
            $actionBtn .= ' <a href="users/'. $data->id .'/delete/" class="btn btn-sm btn-danger action-delete" title="Delete User"><i class="fa fa-edit"></i> Delete</a>';       

            return $actionBtn;
        })
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $account = User::getUserList();
        $account->select([
            'users.*'
        ]);
        return $this->applyScopes($account);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('user-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->parameters([
                        'searchDelay' => 250,
                        'pageLength'  => 10,
                        'lengthMenu'  => [[10, 20, 25, 50, 100, 500, -1], [10, 20, 25, 50, 100, 500, 'All']],
                    ])
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns()
    {
        return [
            'id'                    => ['data' => 'id', 'name' => 'id', 'orderable' => true, 'searchable' => true],
            'name'                  => ['data' => 'name', 'name' => 'name', 'orderable' => true, 'searchable' => true],
            'email'                 => ['data' => 'email', 'name' => 'email', 'orderable' => false, 'searchable' => true],
            'action'                => ['orderable' => false,'searchable' => false]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}
