<?php

namespace App\Livewire;

use Livewire\Component;

class GrantDetail extends Component
{
    public $modelTypes = [];

    public $selectedModelTypes = null;
    // public $selectedModelId = null;

    public $modelIds = [];  // To store the related models (e.g., farmers, enterprises)

    public function mount($selectedModelTypes = null,$modelIds=null)
    {
        $this->modelTypes = [
            'App\Models\Enterprises\Enterprise' => 'Enterprise',
            'App\Models\Farmers\Farmer' => 'Farmer',
            'App\Models\Cooperatives\Cooperative' => 'Cooperative',
            'App\Models\Groups\Group' => 'Group',
        ];

        // Set selectedModelTypes from parameter if passed
        $this->selectedModelTypes = $selectedModelTypes;
        // $this->selectedModelId = null;
    }

    public function updatedSelectedModelTypes($modelType)
    {
        // Dynamically load the data based on selected model type
        if ($modelType) {
            $this->modelIds = app($modelType)::all();  // Retrieve all records for the selected model type
        } else {
            $this->modelIds = [];  // Clear the data if no model type is selected
        }
    }

    public function render()
    {
        return view('livewire.grant-detail');
    }
}
