<div class="modal fade text-left" id="defaultSize" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel18">Tambah Klasifikasi Tanah
                </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('klasifikasitanahs.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="jenistanah">Jenis Tanah</label>
                    <div class="form-group">
                        <input id="jenistanahs" type="text" placeholder="Masukan Jenis Tanah" class="form-control"
                            name="jenistanah">
                        @error('jenistanah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="kategori">Kategori </label>
                    <div class="form-group">
                        <input id="kategori" type="text" placeholder="Masukan Kategori" class="form-control"
                            name="kategori">
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="klasifikasikanal">Klasifikasi Kanal </label>
                    <div class="form-group">
                        <input id="klasifikasikanal" type="text" placeholder="Masukan Klasifikasi Kanal"
                            class="form-control" name="klasifikasikanal">
                        @error('klasifikasikanal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="karakteristik">Karakteristik</label>
                    <div class="form-group">
                        <input id="karakteristik" type="text" placeholder="Masukan Karakteristik"
                            class="form-control" name="karakteristik">
                        @error('karakteristik')
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
