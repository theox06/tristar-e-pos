<?php

namespace App\Livewire;

use App\Models\DetailTransaksi;
use App\Models\Produk as ModelsProduk;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Produk extends Component
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

    use WithFileUploads;
    public $pilihanMenu = 'lihat';
    public $nama;
    public $kode;
    public $harga;
    public $stok;
    public $foto_produk;
    
    public $produkTerpilih;



    public function pilihEdit($id)
    {
        $this->produkTerpilih = ModelsProduk::findOrFail($id);
        $this->nama = $this->produkTerpilih->nama;
        $this->kode = $this->produkTerpilih->kode;
        $this->harga = $this->produkTerpilih->harga;
        $this->stok = $this->produkTerpilih->stok;
        
        $this->pilihanMenu = 'edit';
        
    }

    public function simpanEdit()
    {
        $this->validate([
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            
        ],[
            'nama.required' => 'Nama produk harus diisi',
            'harga.required' => 'Harga produk harus diisi',
            'stok.required' => 'stok harus diisi',
            

        ]);

        $simpan = $this->produkTerpilih;
        $simpan->nama = $this->nama;
        $simpan->kode = $this->kode;
        $simpan->harga = $this->harga;
        $simpan->stok = $this->stok;
        $simpan->save();

        
        

        $this->reset();
        $this->pilihanMenu = 'lihat';
    }

    public function simpan()
    {
        $this->validate([
            'nama'  =>  'required',
            'kode'  =>  ['required', 'unique:produks,kode'],
            'harga' =>  'required',
            'stok'  =>  'required',
        ],[
            'nama.required'     =>      'Nama harus Diisi',
            'kode.required'     =>      'Kode Harus Diisi',
            'kode.unique'       =>      'kode sudah digunakan',
            'harga.required'    =>      'stok harus Diisi',
        ]);

        $simpan = new ModelsProduk();
        $simpan->nama = $this->nama;
        $simpan->kode = $this->kode;
        $simpan->harga = $this->harga;
        $simpan->stok = $this->stok;
        $simpan->save();

        // dd($simpan->save());

        $this->reset('nama', 'kode', 'stok', 'harga');
        $this->pilihanMenu = 'lihat';
    }

    public function pilihHapus($id)
    {
        $this->produkTerpilih = ModelsProduk::findOrFail($id);
        $this->pilihanMenu = 'hapus';
    }

    public function hapus()
    {
        $this->produkTerpilih->delete();
        $this->reset();
    }

    public function batal()
    {
        $this->reset();
    }

    

    public function pilihMenu($menu)
    {
        $this->pilihanMenu = $menu;
    }

    public function render()
    {
        return view('livewire.produk')->with([
            'semuaProduk' => ModelsProduk::all(),
        ]);
    }

}