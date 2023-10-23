<?php

namespace App\Livewire;

use Livewire\Component;

class Toy extends Component
{
    public $camelText = "Hello world";
    public $event;

    public function clickHandler ($eventName) {
        $this->dispatch($eventName);
    }
    public function render()
    {
        return view('livewire.toy');
    }
}
