<?php

namespace App\Http\Livewire;

use App\Models\Referencia;
use Livewire\Component;
use Livewire\WithPagination;

class ReferenciaComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $referencias = Referencia::orderBy('id', 'desc')->paginate(10);
        return view('livewire.referencia-component', compact('referencias'));
    }
}
