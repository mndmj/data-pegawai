<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit - Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container p-3">
        <div class="my-4">
            <h2 class="text-center">Data Pegawai</h2>
            <h5 class="text-center">CV. Asik Selalu</h5>
        </div>
        <div class="row justify-content-center d-flex">
            <div class="col-4">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white">
                        <h5>Form Edit Data Pegawai</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label class="fw-bold" for="nip">NIP</label>
                                <input type="number" class="form-control @error('nip') is-invalid @enderror" name="nip" id="nip" value="{{ old('nip', $pegawai->nip) }}">
                                @error('nip')
                                <div class="text-danger my-2 text-end"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="fw-bold" for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama', $pegawai->nama) }}">
                                @error('nama')
                                <div class="text-danger my-2 text-end"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="fw-bold" for="jk">Jenis Kelamin</label>
                                <select class="form-select @error('jk') is-invalid @enderror" name="jk" id="jk">
                                    <option selected value="">-- Pilih salah satu --</option>
                                    <option value="Pria" {{ old('jk', $pegawai->jk) == 'Pria' ? 'selected' : 'Wanita' }}>
                                        Pria
                                    </option>
                                    <option value="Wanita" {{ old('jk', $pegawai->jk) == 'Wanita' ? 'selected' : 'Pria' }}>
                                        Wanita
                                    </option>
                                </select>
                                @error('jk')
                                <div class="text-danger my-2 text-end"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <button type="submit" class="w-100 mt-3 btn btn-success">Simpan</button>
                            <a type="reset" class="w-100 mt-2 btn btn-outline-secondary" href="{{route('pegawai.index')}}">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>