<?php

namespace App\Livewire;

use Livewire\Component;

class Beranda extends Component
{
    public bool $screenTooSmall = false;

    protected $listeners = ['screenToSmall', 'screenOkay'];

    public function screenTooSmall()
    {
        $this->screenToSmall = true;
    }

    public function screenOkay()
    {
        $this->screenToSmall = false;
    }

    public function render()
    {
        return view('livewire.beranda');
    }
}
