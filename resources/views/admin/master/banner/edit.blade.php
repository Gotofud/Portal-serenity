<x-admin>
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4"
        style="background-image: url('{{ asset('/assets/images/backgrounds/resident.png') }}');  background-repeat: no-repeat;  background-size: cover    ;  ">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h3 class="fw-bolder mb-8">Tambah Edit Banner</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none"
                                    href="{{ route('dashboard.index') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none"
                                    href="{{ route('service.banner.index') }}">Manajemen Banner</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Tambah Edit</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-2">
                        <img src="{{ asset('assets/images/breadcrumb/people.png') }}" alt="modernize-img"
                            class="img-fluid mb-n4" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-4">
            <form action="{{ route('service.banner.update', $banner->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="exampleInputname" class="form-label">Nama Banner</label>
                    <input type="text" name="title" value="{{ $banner->title }}" class="form-control @error('title') is-invalid @enderror "
                        id="exampleInputname" placeholder="Contoh : A1">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="formFile" class="form-label">Input Banner</label>
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="formFile"
                        name="image" />
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="exampleInputname" class="form-label">Tanggal Mulai</label>
                    <input class="form-control" type="datetime-local" value="{{ $banner->start_at }}"
                        id="example-datetime-local-input" name="start_at"/>
                    @error('start_at')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="exampleInputname" class="form-label">Tanggal Berakhir</label>
                    <input class="form-control" type="datetime-local" value="{{ $banner->start_at }}" 
                        id="example-datetime-local-input" name="expired_at"/>
                    @error('expired_at')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="form-label">Status</label>
                    <select class="form-select @error('status') is-invalid @enderror " name="status"
                        aria-label="Default select example">
                        <option value=" " selected>Pilih Status</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Nonaktif">Nonaktif</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</x-admin>