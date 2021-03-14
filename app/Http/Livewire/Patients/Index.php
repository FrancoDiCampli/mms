<?php

namespace App\Http\Livewire\Patients;

use App\Models\Patient;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.patients.index', [
            'patients' => Patient::select(['id', 'surname', 'name', 'dni', 'num_affiliate', 'phone'])->orderBy('surname', 'ASC')->orWhere('surname', 'LIKE', $this->search . '%')
                ->orWhere('dni', 'LIKE', $this->search . '%')
                ->orWhere('name', 'LIKE', $this->search . '%')->paginate(5)
        ]);
    }
}
