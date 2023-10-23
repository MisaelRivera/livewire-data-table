<?php

namespace App\Livewire;

use Livewire\Component;

class ShowContent extends Component
{
    public $btnBgColor;
    public $btnTextColor = 'white';
    public $btnText;
    public $btnId;
    public $open = false;
    public $bgColor;

    public function render()
    {
        return view('livewire.show-content');
    }
}
