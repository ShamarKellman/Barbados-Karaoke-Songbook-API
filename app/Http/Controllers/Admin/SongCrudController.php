<?php

namespace App\Http\Controllers\Admin;

use App\Imports\SongImport;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\SongRequest as StoreRequest;
use App\Http\Requests\SongRequest as UpdateRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;

/**
 * Class SongCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class SongCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Song');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/song');
        $this->crud->setEntityNameStrings('song', 'songs');
        $this->crud->addButton('top', 'import', 'view', 'crud::buttons.song-import');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
        $this->crud->addColumn([
            'name' => 'title',
            'label' => 'Title',
            'type' => 'text'
        ]);

        $this->crud->addColumn([
            'label' => "Artist", // Table column heading
            'type' => "select_multiple",
            'name' => 'artist_id', // the column that contains the ID of that connected entity;
            'entity' => 'artists', // the method that defines the relationship in your Model
            'attribute' => "name", // foreign key attribute that is shown to user
            'model' => \App\Models\Artist::class, // foreign key model
        ]);

        $this->crud->addColumn([
            'label' => "Provider", // Table column heading
            'type' => "select",
            'name' => 'provider_id', // the column that contains the ID of that connected entity;
            'entity' => 'provider', // the method that defines the relationship in your Model
            'attribute' => "name", // foreign key attribute that is shown to user
            'model' => \App\Models\Provider::class, // foreign key model
        ]);

        $this->crud->addColumn([
            'label' => "Genres", // Table column heading
            'type' => "select_multiple",
            'name' => 'genre_id', // the column that contains the ID of that connected entity;
            'entity' => 'genres', // the method that defines the relationship in your Model
            'attribute' => "name", // foreign key attribute that is shown to user
            'model' => \App\Models\Genre::class, // foreign key model
        ]);

        $this->crud->addColumn([
            'name' => 'code',
            'label' => 'Code',
            'type' => 'text'
        ]);

        $this->crud->addColumn([
            'name' => 'is_popular',
            'label' => 'Is Popular',
            'type' => 'checkbox'
        ]);


        $this->crud->addField([
            'name' => 'title',
            'label' => 'Title',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'label' => "Artist", // Table column heading
            'type' => "select2_multiple",
            'name' => 'artist_id', // the column that contains the ID of that connected entity;
            'entity' => 'artists', // the method that defines the relationship in your Model
            'attribute' => "name", // foreign key attribute that is shown to user
            'model' => \App\Models\Artist::class, // foreign key model
        ]);

        $this->crud->addField([
            'label' => "Genres", // Table column heading
            'type' => "select2_multiple",
            'name' => 'genre_id', // the column that contains the ID of that connected entity;
            'entity' => 'genres', // the method that defines the relationship in your Model
            'attribute' => "name", // foreign key attribute that is shown to user
            'model' => \App\Models\Genre::class, // foreign key model
        ]);

        $this->crud->addField([
            'label' => "Provider", // Table column heading
            'type' => "select2",
            'name' => 'provider_id', // the column that contains the ID of that connected entity;
            'entity' => 'provider', // the method that defines the relationship in your Model
            'attribute' => "name", // foreign key attribute that is shown to user
            'model' => \App\Models\Provider::class, // foreign key model
        ]);

        $this->crud->addField([
            'name' => 'code',
            'label' => 'Code',
            'type' => 'text'
        ]);

        $this->crud->addField([
            'name' => 'is_popular',
            'label' => 'Is Popular',
            'type' => 'checkbox'
        ]);
        // add asterisk for fields that are required in SongRequest
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

    public function import(Request $request)
    {
        Excel::import(new SongImport(), $request->file('file'));
    }
}
