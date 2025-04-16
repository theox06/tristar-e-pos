<div>
    @if ($screenTooSmall)
        
    @else
    <div class="container">
        <div class="row my-2">
            <div class="col-md-12">
                <button wire:click="pilihMenu('lihat')" class="btn {{ $pilihanMenu=='lihat' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Semua Pengguna
                </button>
                <button wire:click="pilihMenu('tambah')" class="btn {{ $pilihanMenu=='tambah' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Tambah Pengguna
                </button>
                <button wire:loading class="btn btn-info">
                    Loading...
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($pilihanMenu=='lihat')
                <div class="card border-primary">
                    <div class="card-header">
                        Semua Pengguna
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Peran</th>
                                <th>Data</th>
                            </thead>
                            <tbody>
                                @foreach ($semuaPengguna as $pengguna)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pengguna->nama }}</td>
                                    <td>{{ $pengguna->email }}</td>
                                    <td>{{ $pengguna->peran }}</td>
                                    <td>
                                        <button wire:click="pilihEdit({{ $pengguna->id }})" class="btn {{ $pilihanMenu=='edit' ? 'btn-primary' : 'btn-outline-primary' }}">
                                            Edit Pengguna
                                        </button>
                                        <button wire:click="pilihHapus({{ $pengguna->id }})" class="btn {{ $pilihanMenu=='hapus' ? 'btn-primary' : 'btn-outline-primary' }}">
                                            Hapus Pengguna
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @elseif ($pilihanMenu=='tambah')
                <div class="card border-primary">
                    <div class="card-header">
                        Tambah Pengguna
                    </div>
                    <div class="card-body">
                        <form wire:submit='simpan'>
                            <label>Nama</label>
                            <input type="text" wire:model="nama" id="" class="form-control">
                            @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <label>Email</label>
                            <input type="email" wire:model="email" id="" class="form-control">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <label>Password</label>
                            <input type="password" wire:model="password" id="" class="form-control">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <br>

                            <label>Peran</label>
                            <select wire:model="peran" id="" class="form-control">
                                <option value>--Pilih Peran--</option>
                                <option value="kasir">Kasir</option>
                                <option value="admin">Admin</option>
                            </select>
                            @error('peran')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <br>

                            <button type="submit" class="btn btn-primary mt-3">SIMPAN</button>
                        </form>
                    </div>
                </div>
                @elseif ($pilihanMenu=='edit')
                <div class="card border-primary">
                    <div class="card-header">
                        Edit Pengguna
                    </div>
                    <div class="card-body">
                        <form wire:submit="simpanEdit">
                            <label>Nama</label>
                            <input type="text" wire:model="nama" class="form-control">
                            @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <label>Email</label>
                            <input type="email" wire:model="email" class="form-control">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <label>Password</label>
                            <input type="password" wire:model="password" class="form-control">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <label>Peran</label>
                            <select wire:model="peran" class="form-control">
                                <option>--Pilih Peran--</option>
                                <option value="kasir">Kasir</option>
                                <option value="admin">Admin</option>
                            </select>
                            @error('peran')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <button type="submit" class="btn btn-primary mt-3">SIMPAN</button>
                        </form>
                    </div>
                </div>
                @elseif ($pilihanMenu=='hapus')
                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">
                        Hapus Pengguna
                    </div>
                    <div class="card-body">
                        Apakah kamu yakin akan menghapus pengguna ini ?
                        <p>Nama : {{ $penggunaTerpilih->nama }}</p>
                        <button class="btn btn-danger" wire:click='hapus'>HAPUS</button>
                        <button class="btn btn-secondary" wire:click='batal'>BATAL</button>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endif
</div>
