<x-admin>
     <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4"
        style="background-image: url('{{ asset('/assets/images/backgrounds/resident.png') }}');  background-repeat: no-repeat;  background-size: cover    ;  ">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h3 class="fw-bolder mb-8">Tambah Data Role</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none"
                                    href="{{ route('dashboard.index') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none"
                                    href="{{ route('dashboard.role.index') }}">Manajemen Role</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Tambah Data</li>
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
            <form action="{{ route('dashboard.vehicle-type.update',$vehicle_type->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-4">
                <label for="exampleInputname" class="form-label">Jenis Kendaraan</label>
                <input type="text" name="name" value="{{ $vehicle_type->name }}" class="form-control @error('name') is-invalid @enderror " id="exampleInputname" placeholder="Masukan Nama Role">
                   @error('name')
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