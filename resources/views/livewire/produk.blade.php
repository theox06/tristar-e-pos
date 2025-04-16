<div>
    @if ($screenTooSmall)
        
    @else
    <div class="container">
        <div class="row my-2">
            <div class="col-12">
                <button wire:click="pilihMenu('lihat')"
                    class="btn {{ $pilihanMenu == 'lihat' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Semua Produk
                </button>
                <button wire:click="pilihMenu('tambah')"
                    class="btn {{ $pilihanMenu == 'tambah' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Tambah Produk
                </button>
                <button class="btn btn-info" wire:loading >
                    Loading...
                    <div class="spinner-border" role="status">
                    </div>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($pilihanMenu == 'lihat')
                    <div class="card border-primary">
                        <div class="card-header">
                            Semua produk
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama Tiket</th>
                                    <th>Harga</th>
                                    <th>Jumlah ketersediaan</th>
                                    <th>aksi</th>
                                    <th>status</th>
                                </thead>
                                <tbody>
                                    @foreach ($semuaProduk as $produk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $produk->kode }}</td>
                                            <td>{{ $produk->nama }}</td>
                                            <td>Rp {{ number_format($produk->harga) }}</td>
                                            <td>{{ number_format($produk->stok) }}</td>
                                            <td>
                                                @if ($produk->stok = 0)
                                                    <button class="btn btn-danger">Kosong</button>
                                                @elseif ($produk->stok > 0)
                                                    <button class="btn btn-success">Tersedia</button>
                                                @endif
                                            </td>
                                            <td>
                                                <button wire:click="pilihEdit({{ $produk->id }})"
                                                    class="btn {{ $pilihanMenu == 'edit' ? 'btn-warning' : 'btn-outline-warning' }}">
                                                    Edit produk
                                                </button>

                                                <button wire:click="pilihHapus({{ $produk->id }})"
                                                    class="btn {{ $pilihanMenu == 'edit' ? 'btn-danger' : 'btn-outline-danger' }}">
                                                    Hapus produk
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @elseif ($pilihanMenu == 'tambah')
                    <div class="card border-primary">
                        <div class="card-header">
                            Tambah Produk
                        </div>
                        <div class="card-body">
                            <form wire:submit="simpan">
                                <label>Nama</label>
                                <input type="text" wire:model="nama" class="form-control">
                                @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label>Kode</label>
                                <input type="text" value=""
                                    class="form-control" wire:model="kode">
                                @error('kode')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label>Harga</label>
                                <input type="number" wire:model="harga" class="form-control">
                                @error('harga')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label>Stok</label>
                                <input type="number" wire:model="stok" class="form-control">
                                @error('stok')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <button type="submit" class="btn btn-primary mt-3">Simpan</button>

                            </form>
                        </div>
                    </div>
                @elseif ($pilihanMenu == 'edit')
                    <div class="card border-primary">
                        <div class="card-header">
                            Edit Produk
                        </div>
                        <div class="card-body">
                            <form wire:submit="simpanEdit">
                                <label>Nama</label>
                                <input type="text" wire:model="nama" class="form-control">
                                @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label>Kode</label>
                                <input type="readonly" wire:model="kode" class="form-control" readonly>
                                <br>
                                @error('kode')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <label>Harga</label>
                                <input type="number" wire:model="harga" class="form-control">
                                @error('harga')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <label>Stok</label>
                                <input type="number" wire:model="stok" class="form-control">
                                @error('stok')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                            </form>
                        </div>
                    </div>
                @elseif ($pilihanMenu == 'hapus')
                    <div class="card border-danger">
                        <div class="card-header bg-danger text-white">
                            Hapus Produk
                        </div>
                        <div class="card-body">
                            Apakah anda yakin ingin menghapus data ini?
                            <span class="text-danger">Peringatan data akan terhapus secara permanen!</span>
                            <p>Kode : {{ $produkTerpilih->kode }}</p>
                            <p>Nama : {{ $produkTerpilih->nama }}</p>
                            <button class="btn btn-danger" wire:click='hapus'>Hapus</button>
                            <button class="btn btn-secondary" wire:click='batal'>Batal</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @endif
</div>
