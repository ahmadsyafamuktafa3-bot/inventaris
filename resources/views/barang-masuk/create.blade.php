<x-app-layout>
    @section('title', 'Tambah Barang Masuk')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Barang Masuk</h1>
        <a href="{{ route('barang-masuk.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
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
            <h6 class="m-0 font-weight-bold text-primary">Form Barang Masuk</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('barang-masuk.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="barang_id">Barang</label>
                    <select name="barang_id" id="barang_id"
                        class="form-control @error('barang_id') is-invalid @enderror" required>
                        <option value="">-- Pilih --</option>
                        @foreach ($barangs as $barang)
                            <option value="{{ $barang->id }}" @selected(old('barang_id') == $barang->id)>
                                {{ $barang->kode_barang }} - {{ $barang->nama }} (stok: {{ $barang->jumlah }})
                            </option>
                        @endforeach
                    </select>
                    @error('barang_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', 1) }}" min="1"
                            class="form-control @error('jumlah') is-invalid @enderror" required>
                        @error('jumlah')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal"
                            value="{{ old('tanggal', date('Y-m-d')) }}"
                            class="form-control @error('tanggal') is-invalid @enderror" required>
                        @error('tanggal')
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
                <a href="{{ route('barang-masuk.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

</x-app-layout>
