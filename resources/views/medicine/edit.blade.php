@extends("layout.template")

@section('content')
    @if (isset($medicine))
        <form action="{{ route('medicine.update', $medicine->id) }}" method="POST" class="card p-5">
            @csrf
            @method("PATCH")

            @if ($errors->any())
                <ul class="alert alert-danger p-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Nama Barang :</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{ $medicine->name }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="type" class="col-sm-2 col-form-label">Jenis Barang :</label>
                <div class="col-sm-10">
                    <select class="form-select" id="type" name="type">
                        <option selected disabled hidden>Pilih</option>
                        <option value="Makanan" {{ $medicine->type == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                        <option value="Minuman" {{ $medicine->type == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                        <option value="Lainnya" {{ $medicine->type == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="price" class="col-sm-2 col-form-label">Harga Barang :</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="price" name="price" value="{{ $medicine->price }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
        </form>
    @else
        <p class="alert alert-danger">Medicine data not found.</p>
    @endif
@endsection
