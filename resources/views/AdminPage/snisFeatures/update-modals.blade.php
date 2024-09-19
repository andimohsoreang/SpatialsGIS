<!-- Modal Update untuk setiap desa -->
<div class="modal fade text-left" id="updateModal{{ $sni->id }}" tabindex="-1" role="dialog"
    aria-labelledby="updateModalLabel{{ $sni->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="updateModalLabel{{ $sni->id }}">Edit Data SNI</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('snis.update', $sni->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <label for="snis_{{ $sni->id }}">SNI</label>
                    <div class="form-group">
                        <input id="sni{{ $sni->id }}" type="text" placeholder="Masukan SNI"
                            class="form-control" name="snis" value="{{ old('snis', $sni->snis) }}">
                        @error('snis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="kategori_{{ $sni->id }}">Kategori </label>
                    <div class="form-group">
                        <input id="kategori_{{ $sni->id }}" type="text" placeholder="Masukan Kategori"
                            class="form-control" name="kategori" value="{{ old('kategori', $sni->kategori) }}">
                        @error('kategori')
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
