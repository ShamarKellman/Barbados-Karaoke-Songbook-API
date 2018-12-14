<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;


use App\Http\Requests\Admin\ProviderRequest as StoreRequest;
use App\Http\Requests\Admin\ProviderRequest as UpdateRequest;

/**
 * Class ProviderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ProviderCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Provider');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/provider');
        $this->crud->setEntityNameStrings('provider', 'providers');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text'
        ]);

        $this->crud->addColumn([
            'name' => 'short_code',
            'label' => 'Short Code',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'short_code',
            'label' => 'Short Code',
            'type' => 'text'
        ]);

        // add asterisk for fields that are required in ProviderRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
