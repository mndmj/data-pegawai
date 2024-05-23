<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add - Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="container p-3">
        <div class="my-4">
            <h2 class="text-center">Data Pegawai</h2>
            <h5 class="text-center">CV. Asik Selalu</h5>
        </div>
        <form action="{{ route('pegawai.store') }}" method="post">
            <div class="row justify-content-center d-flex">
                <div class="col-4">
                    <div class="card shadow">
                        <div class="card-header bg-dark text-white">
                            <h5>Form Tambah Data Pegawai</h5>
                        </div>
                        <div class="card-body">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="fw-bold" for="nip">NIP</label>
                                <input type="number" class="form-control @error('nip') is-invalid @enderror"
                                    name="nip" id="nip" value="{{ old('nip') }}">
                                @error('nip')
                                    <div class="text-end text-danger my-2"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="fw-bold" for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" id="nama" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="text-end text-danger my-2"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="fw-bold" for="jk">Jenis Kelamin</label>
                                <select class="form-select @error('jk') is-invalid @enderror" name="jk"
                                    id="jk">
                                    <option selected value="">-- Pilih salah satu --</option>
                                    <option value="Pria" {{ $pegawai == 'Pria' ? 'selected' : 'Wanita' }}>Pria
                                    </option>
                                    <option value="Wanita" {{ $pegawai == 'Wanita' ? 'selected' : 'Pria' }}>Wanita
                                    </option>
                                </select>
                                @error('jk')
                                    <div class="text-end text-danger my-2"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <button type="submit" class="w-100 mt-3 btn btn-success">Simpan</button>
                            <a type="reset" class="w-100 mt-2 btn btn-outline-secondary" href="{{route('pegawai.index')}}">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
