<!-- Modal Update untuk setiap desa -->
<div class="modal fade text-left" id="updateModal{{ $klasifikasitanah->id }}" tabindex="-1" role="dialog"
    aria-labelledby="updateModalLabel{{ $klasifikasitanah->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="updateModalLabel{{ $klasifikasitanah->id }}">Edit Klasifikasi Tanah</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('klasifikasitanahs.update', $klasifikasitanah->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <label for="jenistanah_{{ $klasifikasitanah->id }}">Jenis Tanah</label>
                    <div class="form-group">
                        <input id="jenistanah_{{ $klasifikasitanah->id }}" type="text" placeholder="Masukan Jenis Tanah"
                            class="form-control" name="jenistanah" value="{{ old('jenistanah', $klasifikasitanah->jenistanah) }}">
                        @error('jenistanah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="kategori_{{ $klasifikasitanah->id }}">Kategori</label>
                    <div class="form-group">
                        <input id="kategori_{{ $klasifikasitanah->id }}" type="text" placeholder="Masukan Kategori"
                            class="form-control" name="kategori" value="{{ old('kategori', $klasifikasitanah->kategori) }}">
                        @error('klasifikasitanah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="klasifikasikanal_{{ $klasifikasitanah->id }}">Klasifikasi Kanal </label>
                    <div class="form-group">
                        <input id="klasifikasikanal_{{ $klasifikasitanah->id }}" type="text" placeholder="Masukan Klasifikasi Tanah"
                            class="form-control" name="klasifikasikanal" value="{{ old('klasifikasikanal', $klasifikasitanah->klasifikasikanal) }}">
                        @error('klasifikasikanal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="karakteristik_{{ $klasifikasitanah->id }}">Karakteristik</label>
                    <div class="form-group">
                        <input id="karakteristik_{{ $klasifikasitanah->id }}" type="text"
                            placeholder="Masukan Karakteristik" class="form-control" name="karakteristik"
                            value="{{ old('karakteristik', $klasifikasitanah->karakteristik) }}">
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
                    <button type="submit" class="btn btn-primary ms-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
