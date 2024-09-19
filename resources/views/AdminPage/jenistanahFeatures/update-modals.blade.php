<!-- Modal Update untuk setiap desa -->
<div class="modal fade text-left" id="updateModal{{ $jenistanah->id }}" tabindex="-1" role="dialog"
    aria-labelledby="updateModalLabel{{ $jenistanah->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="updateModalLabel{{ $jenistanah->id }}">Edit Data Desa</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('jenistanahs.update', $jenistanah->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <label for="jenistanah_{{ $jenistanah->id }}">Jenis Tanah</label>
                    <div class="form-group">
                        <input id="jenistanah_{{ $jenistanah->id }}" type="text" placeholder="Masukan Jenis Tanah"
                            class="form-control" name="jenistanah" value="{{ old('jenistanah', $jenistanah->jenistanah) }}">
                        @error('jenistanah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="klasifikasi_{{ $jenistanah->id }}">Klasifikasi </label>
                    <div class="form-group">
                        <input id="klasifikasi_{{ $jenistanah->id }}" type="text" placeholder="Masukan Klasifikasi"
                            class="form-control" name="klasifikasi" value="{{ old('klasifikasi', $jenistanah->klasifikasi) }}">
                        @error('klasifikasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="klasifikasikanal_{{ $jenistanah->id }}">Klasifikasi Kanal</label>
                    <div class="form-group">
                        <input id="klasifikasikanal_{{ $jenistanah->id }}" type="text"
                            placeholder="Masukan Klasifikasi Kanal" class="form-control" name="klasifikasikanal"
                            value="{{ old('klasifikasikanal', $jenistanah->klasifikasikanal) }}">
                        @error('klasifikasikanal')
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
