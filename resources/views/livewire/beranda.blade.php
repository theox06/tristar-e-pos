<div>
 @if ($screenTooSmall)
   
 @else
 <div class="container">
    @if (session('error'))
        <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-danger text-white">
                  <h5 class="modal-title" id="errorModalLabel">Akses Ditolak</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                {{ session('error') }}
              </div>
              <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              </div>
            </div>
          </div>
        </div>

        
    @endif
    <div class="row my-5">
      @if (auth()->user()?->peran === 'admin')
      <div class="col-12">
        <h1 class="text-center">Selamat Datang,</h1>
        <p class="text-center">{{ Auth::user()->nama }}</p>
        <div class="card border-primary">
          <div class="card-header text-center">Kini anda login sebagai {{ Auth::user()->peran }}</div>
          <div class="card-body text-center">
            Mohon untuk menggunakan menu admin ini dengan bijaksana
          </div>
        </div>
      </div>
      @elseif (auth()->user()?->peran === 'kasir')
      <div class="col-12">
        <h1 class="text-center">Selamat Datang,</h1>
        <p class="text-center">{{ Auth::user()->nama }}</p>
        <div class="card border-primary">
          <div class="card-header text-center">Kini anda login sebagai {{ Auth::user()->peran }}</div>
          <div class="card-body text-center">
            Selamat menggunakan dan bekerja, jika ada kebingungan tanyakan pada admin
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>
 @endif
</div>