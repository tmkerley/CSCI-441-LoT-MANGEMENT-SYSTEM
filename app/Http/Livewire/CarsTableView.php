<?php

namespace App\Http\Livewire;

use LaravelViews\Views\TableView;

use app\Models\Car;

class CarsTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Car::class;

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return ['VIN Number', 'Make', 'Model', 'Year', 'Space Number'];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [
            $model->vinNo,
            $model->make,
            $model->model,
            $model->year,
            $model->space_id
        ];
    }
}
