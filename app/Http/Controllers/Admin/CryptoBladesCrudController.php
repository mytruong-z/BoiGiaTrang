<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CryptoBladesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CryptoBladesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CryptoBladesCrudController extends CrudController
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
        CRUD::setModel(\App\Models\CryptoBlades::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/crypto-blades');
        CRUD::setEntityNameStrings('crypto blades', 'crypto blades');
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
        CRUD::setValidation(CryptoBladesRequest::class);

        CRUD::setFromDb();
        CRUD::removeField('user_id');
        CRUD::removeField('profit');

        CRUD::addField([
            'label'     => "User",
            'type'      => "select",
            'name'      => "user_id",
            'entity'    => "user",
            'attribute' => "name",
            'model'     => "App\Models\Users",
            'options'   => (function ($query) {
                return $query->orderBy('name', 'ASC')->get();
            }),
        ]);

        CRUD::addField([
            'label'     => "Profit",
            'type'      => "number",
            'name'      => "profit",
            'attributes' => ["step" => "any"], // allow decimals
            'prefix' => "$",
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
