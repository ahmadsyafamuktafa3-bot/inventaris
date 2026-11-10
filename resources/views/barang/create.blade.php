<x-app-layout>
    @section('title', 'Tambah Barang')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Barang</h1>
        <a href="{{ route('barang.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50 mr-1"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Barang</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('barang.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="kode_barang">Kode Barang</label>
                    <input type="text" name="kode_barang" id="kode_barang" value="{{ old('kode_barang') }}"
                        class="form-control @error('kode_barang') is-invalid @enderror" required>
                    @error('kode_barang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Nama Barang</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                        class="form-control @error('nama') is-invalid @enderror" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kategori_id">Kategori</label>
                    <select name="kategori_id" id="kategori_id"
                        class="form-control @error('kategori_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" @selected(old('kategori_id') == $kategori->id)>
                                {{ $kategori->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="lokasi_id">Lokasi</label>
                    <select name="lokasi_id" id="lokasi_id"
                        class="form-control @error('lokasi_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Lokasi --</option>
                        @foreach ($lokasis as $lokasi)
                            <option value="{{ $lokasi->id }}" @selected(old('lokasi_id') == $lokasi->id)>
                                {{ $lokasi->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('lokasi_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kondisi_id">Kondisi</label>
                    <select name="kondisi_id" id="kondisi_id"
                        class="form-control @error('kondisi_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Kondisi --</option>
                        @foreach ($kondisis as $kondisi)
                            <option value="{{ $kondisi->id }}" @selected(old('kondisi_id') == $kondisi->id)>
                                {{ $kondisi->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('kondisi_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', 0) }}" min="0"
                            class="form-control @error('jumlah') is-invalid @enderror" required>
                        @error('jumlah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="satuan">Satuan (Contoh: Pcs, Unit, Box)</label>
                        <input type="text" name="satuan" id="satuan" value="{{ old('satuan') }}"
                            class="form-control @error('satuan') is-invalid @enderror" required>
                        @error('satuan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" rows="3"
                        class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save mr-1"></i> Simpan
                </button>
                <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

</x-app-layout>
