<!-- Modal Update untuk setiap desa -->
<div class="modal fade text-left" id="updateModal{{ $rg->id }}" tabindex="-1" role="dialog"
    aria-labelledby="updateModalLabel{{ $rg->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="updateModalLabel{{ $rg->id }}">Edit Klasifikasi Tanah</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('regangans.update', $rg->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <label for="ukuranregangan_{{ $rg->id }}">Ukuran Regangan</label>
                    <div class="form-group">
                        <input id="jenistanah_{{ $rg->id }}" type="text" placeholder="Masukan Ukuran Regangan"
                            class="form-control" name="ukuranregangan" value="{{ old('ukuranregangan', $rg->ukuranregangan) }}">
                        @error('ukuranregangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="fenomena_{{ $rg->id }}">Fenomena</label>
                    <div class="form-group">
                        <input id="fenomena_{{ $rg->id }}" type="text" placeholder="Masukan Fenomena"
                            class="form-control" name="fenomena" value="{{ old('fenomena', $rg->fenomena) }}">
                        @error('fenomena')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="propertidinamis_{{ $rg->id }}">Properti Dinamis </label>
                    <div class="form-group">
                        <input id="propertidinamis_{{ $rg->id }}" type="text" placeholder="Masukan Properti Dinamis"
                            class="form-control" name="propertidinamis" value="{{ old('propertidinamis', $rg->propertidinamis) }}">
                        @error('propertidinamis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ms-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
