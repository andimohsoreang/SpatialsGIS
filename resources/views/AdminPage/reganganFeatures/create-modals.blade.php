<div class="modal fade text-left" id="defaultSize" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel18">Tambah Data Regangan Geser Tanah
                </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('regangans.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="ukuranregangan">Ukuran Regangan</label>
                    <div class="form-group">
                        <input id="ukuranregangans" type="text" placeholder="Masukan Ukuran Regangan" class="form-control"
                            name="ukuranregangan">
                        @error('ukuranregangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="fenomena">Fenomena </label>
                    <div class="form-group">
                        <input id="fenomenas" type="text" placeholder="Masukan Fenomena" class="form-control"
                            name="fenomena">
                        @error('fenomena')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="propertidinamis">Properti Dinamis </label>
                    <div class="form-group">
                        <input id="propertidinamis" type="text" placeholder="Masukan Properti Dinamis"
                            class="form-control" name="propertidinamis">
                        @error('propertidinamis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
