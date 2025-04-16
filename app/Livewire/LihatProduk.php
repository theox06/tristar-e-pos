<?php

namespace App\Livewire;

use App\Models\Produk;
use Livewire\Component;

class LihatProduk extends Component
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
        return view('livewire.lihat-produk')->with([
            'semuaProduk'   =>  Produk::all(),
        ]);
    }
}
