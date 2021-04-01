<?php

namespace App\Http\Livewire\Patients;

use App\Models\Patient;
use Livewire\Component;

class Show extends Component
{
    public $open = 'hidden';
    public $patientShow;    

    protected $listeners = ['showModal'];

    public function render()
    {
        return view('livewire.patients.show');
    }

    public function showModal($id){
        
        $this->open = '';
        
        $this->patientShow = Patient::find($id);
        
    }   

    public function closeModal(){
        $this->open = 'hidden';
    }
}
