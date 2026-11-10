<x-app-layout>
    @section('title', 'Detail Barang')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Barang</h1>
        <div>
            <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-sm btn-warning shadow-sm">
                <i class="fas fa-edit fa-sm mr-1"></i> Edit
            </a>
            <a href="{{ route('barang.index') }}" class="btn btn-sm btn-secondary shadow-sm">
                <i class="fas fa-arrow-left fa-sm mr-1"></i> Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ $barang->nama }}</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th width="30%">Kode Barang</th>
                                    <td>{{ $barang->kode_barang }}</td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $barang->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td>{{ $barang->kategori->nama ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Lokasi</th>
                                    <td>{{ $barang->lokasi->nama ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Kondisi</th>
                                    <td>{{ $barang->kondisi->nama ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Jumlah</th>
                                    <td>{{ $barang->jumlah }} {{ $barang->satuan }}</td>
                                </tr>
                                <tr>
                                    <th>Keterangan</th>
                                    <td>{{ $barang->keterangan ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-left-primary shadow mb-4">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Stok Saat Ini</div>
                    <div class="h3 mb-0 font-weight-bold text-gray-800">
                        {{ $barang->jumlah }} <small class="h6">{{ $barang->satuan }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
