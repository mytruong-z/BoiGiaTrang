<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CryptoFollowRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CryptoFollowCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CryptoFollowCrudController extends CrudController
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
        CRUD::setModel(\App\Models\CryptoFollow::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/crypto-follow');
        CRUD::setEntityNameStrings('crypto follow', 'crypto follows');
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
        $this->crud->addColumn([
            'name'  => 'created_at', // The db column name
            'label' => "Time", // Table column heading
            'type'  => "datetime",
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
        CRUD::setValidation(CryptoFollowRequest::class);

        CRUD::setFromDb(); // fields
        CRUD::removeField('note');
        CRUD::removeField('percentage');
        CRUD::removeField('highest');

        CRUD::addField([
            'label'     => "Highest",
            'type'      => "number",
            'name'      => "highest",
            'default'      => 0,
            'attributes' => ["step" => "any"], // allow decimals
            'prefix' => "$",
        ]);
        CRUD::addField([
            'label'     => "Lowest",
            'type'      => "number",
            'name'      => "lowest",
            'default'      => 0,
            'attributes' => ["step" => "any"], // allow decimals
            'prefix' => "$",
        ]);
        CRUD::addField([
            'label'     => "Percentage",
            'type'      => "number",
            'name'      => "percentage",
            'default'      => 0,
            'attributes' => ["step" => "any"], // allow decimals
            'prefix' => "%",
        ]);
        CRUD::addField([
            'label'     => "Official web & general information",
            'type'      => "summernote",
            'name'      => "note"
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
