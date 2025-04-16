<?php

namespace App\Livewire;

use Livewire\Component;

class ScreenCheck extends Component
{
    public $screenSmall = false;

    protected $listeners = ['updateScreenSize'];

    public function updateScreenSize($width)
    {
        if ($width < 720) {
            $this->screenSmall = true;
            return redirect()->route('screen.warning');
        }
    }
    
    public function render()
    {
        return view('livewire.screen-check');
    }
}
