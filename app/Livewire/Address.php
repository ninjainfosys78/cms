<?php

namespace App\Livewire;

use App\Models\Address\District;
use App\Models\Address\LocalBody;
use App\Models\Address\Province;
use Livewire\Component;


class Address extends Component
{
    public $provinces;
    public $districts = [];
    public $localBodies = [];

    public $selectedProvince = null;
    public $selectedDistrict = null;

    public function mount()
    {
        // Load all provinces when the component mounts
        $this->provinces = Province::all();
    }
    public function changeSelectedProvince(){

    }

    public function updatedSelectedProvince()
    {
        // Load districts based on selected province
        $this->districts = District::where('province_id', $this->selectedProvince)->get();
        $this->selectedDistrict = null;  // Reset selected district
        $this->localBodies = [];         // Reset local bodies when a new province is selected
    }

    public function updatedSelectedDistrict()
    {
        // Load local bodies based on selected district
        $this->localBodies = LocalBody::where('district_id', $this->selectedDistrict)->get();
    }

    public function render()
    {
        return view('livewire.address');
    }
}
