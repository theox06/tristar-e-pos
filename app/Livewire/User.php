<?php

namespace App\Livewire;

use App\Models\User as ModelsUser;
use Livewire\Component;

class User extends Component
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

    public $pilihanMenu = 'lihat';
    public $nama;
    public $email;
    public $peran;
    public $password;
    public $penggunaTerpilih;

    public function pilihEdit($id)
    {
        $this->penggunaTerpilih = ModelsUser::findOrFail($id);
        $this->nama = $this->penggunaTerpilih->nama;
        $this->email = $this->penggunaTerpilih->email;
        $this->peran = $this->penggunaTerpilih->peran;
        $this->pilihanMenu = 'edit';
    }

    public function simpanEdit()
    {
        $this->validate([
            'nama' => 'required',
            'email' => ['required', 'email', 'unique:users,email,' . $this->penggunaTerpilih->id],
            'peran' => 'required',
        ],[
            'nama.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'peran.required' => 'Peran tidak boleh kosong',
        ]);
        $simpan = $this->penggunaTerpilih;
        $simpan->nama = $this->nama;
        $simpan->email = $this->email;
        if ($this->password) {
            $simpan->password = bcrypt($this->password);
        }
        $simpan->peran = $this->peran;
        $simpan->save();

        $this->reset('nama', 'email', 'peran', 'password');
        $this->pilihanMenu = 'lihat';
        session()->flash('messages', 'Data berhasil disimpan');
    }

    public function pilihHapus($id)
    {
        $this->penggunaTerpilih = ModelsUser::findOrFail($id);
        $this->pilihanMenu = 'hapus';
    }

    public function hapus()
    {
        $this->penggunaTerpilih->delete();
        $this->reset();
        
    }

    public function batal()
    {
        $this->reset();
    }

    public function simpan(){
        $this->validate([
            'nama' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'peran' =>  'required',
            'password'  => 'required',
        ],[
            'nama.required'         => 'Nama harus diisi',
            'email.required'        =>  'Email harus diisi',
            'email.email'           =>  'format mesti email',
            'email.unique'          => 'Email sudah digunakan',
            'peran.required'        =>  'Peran harus diisi',
            'password.required'     =>  'Password harus diisi',
        ]);
        $simpan = new ModelsUser();
        $simpan->nama = $this->nama;
        $simpan->email = $this->email;
        $simpan->password = bcrypt($this->password);
        $simpan->peran = $this->peran;
        $simpan->save();

        $this->reset('nama', 'email', 'peran', 'password');
        $this->pilihanMenu = 'lihat';
        session()->flash('messages', 'Data berhasil disimpan');
    }

    public function pilihMenu($menu)
    {
        $this->pilihanMenu = $menu;
    }
    public function render()
    {
        return view('livewire.user')->with([
            'semuaPengguna' => ModelsUser::all()
        ]);
    }
}
