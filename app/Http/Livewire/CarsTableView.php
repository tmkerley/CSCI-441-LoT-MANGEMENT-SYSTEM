<?php

namespace App\Http\Livewire;

use LaravelViews\Views\TableView;

use App\Models\Car;

use App\Actions\MoveCarAction;

class CarsTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Car::class;
    public $searchBy = ['vinNo', 'make'];

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return ['VIN Number', 'Make', 'Model', 'Year', 'Space Number', 'Being Moved?'];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        if ($model->isBeingMoved == 1) {
            return [
            $model->vinNo,
            $model->make,
            $model->model,
            $model->year,
            $model->space_id,
            "Yes"
        ];
        }
        else
        {
            return [
            $model->vinNo,
            $model->make,
            $model->model,
            $model->year,
            $model->space_id,
            "No"
        ];
        }
        
    }

    protected function actionsByRow()
    {
        return [
            new MoveCarAction,
        ];
    }

    
}
