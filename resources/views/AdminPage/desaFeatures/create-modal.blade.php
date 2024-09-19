<div class="modal fade text-left" id="defaultSize" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel18">Tambah Desa
                </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('desas.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="nama_desa">Nama Desa</label>
                    <div class="form-group">
                        <input id="nama_desa" type="text" placeholder="Masukan Nama Desa" class="form-control"
                            name="nama_desa">
                        @error('nama_desa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="kode_desa">Kode Desa </label>
                    <div class="form-group">
                        <input id="kode_desa" type="text" placeholder="Masukan Kode Desa" class="form-control"
                            name="kode_desa">
                        @error('kode_desa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="kecepatanGelombangGeser">Kecepatan Gelombang Geser </label>
                    <div class="form-group">
                        <input id="gelombang_geser" type="number" step="0.01"
                            placeholder="Masukan Kecepatan Gelombang Geser" class="form-control"
                            name="gelombang_geser">
                        @error('gelombang_geser')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
