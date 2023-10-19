<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\Attributes\On; 

class DataTable extends Component
{

    public $perPage = 5;
    #[On('die-screen')]
    public function dieScreen () {
        dd('Test');
    }

    public function render()
    {
        $orders = Order::with(['muestras.identificacionMuestra', 'cliente', 'siralab'])
        ->orderBy('fecha_recepcion', 'desc')
        ->orderBy('hora_recepcion', 'desc')
        ->orderBy('cesavedac', 'asc')
        ->orderBy('folio', 'desc')
        ->paginate($this->perPage);
        return view('livewire.data-table', compact('orders'));
    }
}
