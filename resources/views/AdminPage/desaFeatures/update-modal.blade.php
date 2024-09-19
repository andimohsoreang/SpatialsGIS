<!-- Modal Update untuk setiap desa -->
                                <div class="modal fade text-left" id="updateModal{{ $desa->id }}" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel{{ $desa->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="updateModalLabel{{ $desa->id }}">Edit Data Desa</h4>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <form action="{{ route('desas.update', $desa->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <label for="nama_desa_{{ $desa->id }}">Nama Desa</label>
                                                    <div class="form-group">
                                                        <input id="nama_desa_{{ $desa->id }}" type="text" placeholder="Masukan Nama Desa" class="form-control"
                                                            name="nama_desa" value="{{ old('nama_desa', $desa->nama_desa) }}">
                                                        @error('nama_desa')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <label for="kode_desa_{{ $desa->id }}">Kode Desa </label>
                                                    <div class="form-group">
                                                        <input id="kode_desa_{{ $desa->id }}" type="text" placeholder="Masukan Kode Desa" class="form-control"
                                                            name="kode_desa" value="{{ old('kode_desa', $desa->kode_desa) }}">
                                                        @error('kode_desa')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <label for="gelombang_geser_{{ $desa->id }}">Kecepatan Gelombang Geser </label>
                                                    <div class="form-group">
                                                        <input id="gelombang_geser_{{ $desa->id }}" type="number" step="0.01" placeholder="Masukan Kecepatan Gelombang Geser"
                                                            class="form-control" name="gelombang_geser" value="{{ old('gelombang_geser', $desa->gelombang_geser) }}">
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
                                                    <button type="submit" class="btn btn-primary ms-1">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Simpan</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
