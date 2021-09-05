<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CryptoHoldRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CryptoHoldCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CryptoHoldCrudController extends CrudController
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
        CRUD::setModel(\App\Models\CryptoHold::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/crypto-hold');
        CRUD::setEntityNameStrings('crypto hold', 'crypto holds');
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
        CRUD::setValidation(CryptoHoldRequest::class);

        CRUD::setFromDb(); // fields
        CRUD::removeField('market');
        CRUD::removeField('amount');
        CRUD::removeField('purchase_time');
        CRUD::removeField('average_price');
        CRUD::removeField('pre_money');
        CRUD::removeField('sale_price');
        CRUD::removeField('sale_time');
        CRUD::removeField('fixed_money');
        CRUD::removeField('profit');
        CRUD::removeField('address');
        CRUD::removeField('note');

        CRUD::addField([
            'label'     => "Market capitalization",
            'type'      => "text",
            'name'      => "market"
        ]);

        CRUD::addField([
            'label'     => "Amount",
            'type'      => "number",
            'name'      => "amount",
            'default'      => 0,
            'attributes' => ["step" => "any"], // allow decimals
        ]);

        CRUD::addField([
            'label'     => "Purchase Time",
            'type'      => "datetime_picker",
            'name'      => "purchase_time",
        ]);


        CRUD::addField([
            'label'     => "Average Price",
            'type'      => "number",
            'name'      => "average_price",
            'default'      => 0,
            'attributes' => ["step" => "any"], // allow decimals
            'prefix' => "$",
        ]);

        CRUD::addField([
            'label'     => "Pre money",
            'type'      => "number",
            'default'      => 0,
            'name'      => "pre_money",
            'attributes' => ["step" => "any"], // allow decimals
            'prefix' => "$",
        ]);

        CRUD::addField([
            'label'     => "Sale price",
            'type'      => "number",
            'name'      => "sale_price",
            'default'      => 0,
            'attributes' => ["step" => "any"], // allow decimals
            'prefix' => "$",
        ]);

        CRUD::addField([
            'label'     => "Sale time",
            'type'      => "datetime_picker",
            'name'      => "sale_time",
        ]);

        CRUD::addField([
            'label'     => "Fixed money",
            'type'      => "number",
            'default'      => 0,
            'name'      => "fixed_money",
            'attributes' => ["step" => "any"],
            'prefix' => "$",
        ]);

        CRUD::addField([
            'label'     => "Profit",
            'type'      => "number",
            'name'      => "profit",
            'attributes' => ["step" => "any"],
            'prefix' => "$",
        ]);

        CRUD::addField([
            'label'     => "Address",
            'type'      => "text",
            'name'      => "address"
        ]);


        CRUD::addField([
            'label'     => "Note",
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
