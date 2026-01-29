<x-admin>
     <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4"
        style="background-image: url('{{ asset('/assets/images/backgrounds/resident.png') }}');  background-repeat: no-repeat;  background-size: cover    ;  ">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h3 class="fw-bolder mb-8">Tambah Data Operator</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none"
                                    href="{{ route('dashboard.index') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none"
                                    href="{{ route('resident.operator.index') }}">Manajemen Operator</a>
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
            <form action="{{ route('resident.operator.store') }}" method="post">
                @csrf
                <div class="mb-4">
                <label for="exampleInputname" class="form-label">Nama Operator</label>
                <input type="text"  name="name" class="form-control @error('name') is-invalid @enderror " id="exampleInputname" placeholder="Masukan Nama Operator">
                   @error('name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> 
                <div class="mb-4">
                <label for="exampleInputname" class="form-label">Email Operator</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror " id="exampleInputname" placeholder="Masukan Nama Ketua RW">
                   @error('email')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> 
            <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                <div class="mb-4">
                 <label class="form-label">Status</label>
                        <select class="form-select @error('status') is-invalid @enderror " name="status" aria-label="Default select example">
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