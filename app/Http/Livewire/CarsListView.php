<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\ListView;

class CarsListView extends ListView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = User::class;

    /**
     * Sets the properties to every list item component
     *
     * @param $model Current model for each card
     */
    public function data($model)
    {
        return [
            'avatar' => '',
            'title' => '',
            'subtitle' => '',
        ];
    }
}
