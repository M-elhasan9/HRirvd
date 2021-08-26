<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EmployeeRequest;
use App\Models\Country;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Faker\Provider\Image;

/**
 * Class EmployeeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EmployeeCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Employee::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/employee');
        CRUD::setEntityNameStrings('employee', 'employees');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        //CRUD::setFromDb(); // columns

        CRUD::addColumn(['name' => 'name', 'type' => 'text']);

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
        CRUD::setValidation(EmployeeRequest::class);

        //CRUD::setFromDb(); // fields

        CRUD::addField(['name' => 'name', 'type' => 'text']);
        CRUD::addField(['name' => 'birth_day', 'type' => 'date']);
        CRUD::addField(['name'=> 'gender', 'type'=> 'select_from_array', 'options'=> ['male' => 'male', 'female' => 'female'],]);

        CRUD::addField(['name' => 'countries', 'label' => "Country", 'type' => 'select',
            'entity' => 'countries', Country::class => "App\Models\Country",
            'attribute' => 'country', (function ($query) {
                return $query->orderBy('name', 'ASC')->get();
            }),]);

        CRUD::addField(['name' => 'cities', 'label' => "City", 'type' => 'select',
            'entity' => 'cities', Country::class => "App\Models\Country",
            'attribute' => 'city', (function ($query) {
                return $query->orderBy('name', 'ASC')->get();
            }),]);

        CRUD::addField(['name' => 'phone', 'type' => 'text']);
        CRUD::addField(['name' => 'department', 'type' => 'text']);
        CRUD::addField(['name' => 'position', 'type' => 'text']);
        CRUD::addField(['name' => 'supervisior', 'type' => 'text']);
        CRUD::addField(['name' => 'hr', 'type' => 'text']);
        CRUD::addField(['name'=> 'contract_type', 'type'=> 'select_from_array', 'options'=> ['Full Time' => 'Full Time', 'Part Time' => 'Part Time'],]);
        CRUD::addField(['name' => 'salary', 'type' => 'number']);
        CRUD::addField(['name' => 'is_active', 'type' => 'checkbox']);
        CRUD::addField(['name' => 'start_date', 'type' => 'date']);
        CRUD::addField(['name' => 'end_date', 'type' => 'date']);
        CRUD::addField(['name' => 'project_name', 'type' => 'text']);
        CRUD::addField(['name' => 'not', 'type' => 'text']);


        CRUD::addField(['label' => "Image", 'name' => "image", 'type' => 'image', 'crop' => true, 'aspect_ratio' => 1,]);
        CRUD::addField(['name' => "CV", 'type' => 'upload','upload'=> true,]);
        CRUD::addField(['name' => "self_doc", 'type' => 'upload','upload'=> true,]);












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
