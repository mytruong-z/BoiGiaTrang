<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AxiesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AxiesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AxiesCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Axies::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/axies');
        CRUD::setEntityNameStrings('axies', 'axies');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // columns
        CRUD::removeColumn('user_id');
        $this->crud->addColumn([
            'name' => 'user_id', // The db column name
            'label' => "User", // Table column heading
            'entity'    => 'user',
            'attribute' => "name",
            'model'     => "App\Models\Users",
        ]);
        //CRUD::column('user_id')->type('select')->name('User')->entity('parent')->attribute('user')->model('App\Models\User');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(AxiesRequest::class);

        CRUD::setFromDb(); // fields
        CRUD::removeField('user_id');

        CRUD::removeField('description');
        CRUD::addField([
            'label'     => "Description",
            'type'      => "summernote",
            'name'      => 'description'
        ]);

        CRUD::addField([
            'label'     => "User",
            'type'      => "select",
            'name'      => 'user_id',
            'entity'    => 'user',
            'attribute' => "name",
            'model'     => "App\Models\Users",
            'options'   => (function ($query) {
                return $query->orderBy('name', 'ASC')->get();
            }),
        ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
