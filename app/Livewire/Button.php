<?php

namespace App\Livewire;

use Livewire\Component;

class Button extends Component
{
    public $text;
    public $id;
    public $bgColor;
    public $textColor = 'text-white';
    public $type = 'submit';
    public $propSize = 'md';
    public $event;
    
    public function clickHandler ($eventName)
    {
        $this->dispatch($eventName);
    }

    public function render()
    {
        $sizes = [
            'sm' => 'px-3 py-1 text-sm',
            'md' => 'px-4 py-2 text-base',
            'lg' => 'px-5 py-3 text-lg',
            'xl' => 'px-6 py-3 text-xl',
        ];
        $size = $sizes[$this->propSize];
        return view('livewire.button', compact('size'));
    }
}
