<x-admin>
     <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4"
        style="background-image: url('{{ asset('/assets/images/backgrounds/resident.png') }}');  background-repeat: no-repeat;  background-size: cover    ;  ">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h3 class="fw-bolder mb-8">Tambah Data Blok</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none"
                                    href="{{ route('dashboard.index') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none"
                                    href="{{ route('dashboard.role.index') }}">Manajemen Blok</a>
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
            <form action="{{ route('dashboard.stall-place.update',$stall_place->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-4">
                <label for="exampleInputname" class="form-label">Nama Kios</label>
                <input type="text" name="name" value="{{ $stall_place->name }}" class="form-control @error('no') is-invalid @enderror " id="exampleInputname" placeholder="Contoh : A1">
                   @error('name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> 
                <div class="mb-4">
                <label for="exampleInputname" class="form-label">No Rt</label>
                 <select class="form-select @error('neighborhood_id') is-invalid @enderror " name="neighborhood_id" aria-label="Default select example">
                          <option value=" " selected>Pilih RT</option>
                          @foreach ($nu as $dataRt)
                          <option value="{{ $dataRt->id }}">RW {{ $dataRt->no }}</option>
                          @endforeach
                        </select>
                   @error('neighborhood_id')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> 
                <div class="mb-4">
                <label for="exampleInputname" class="form-label">No Rw</label>
                 <select class="form-select @error('community_id') is-invalid @enderror " name="community_id" aria-label="Default select example">
                          <option value=" " selected>Pilih RW</option>
                          @foreach ($co as $dataRw)
                          <option value="{{ $dataRw->id }}">RW {{ $dataRw->no }}</option>
                          @endforeach
                        </select>
                   @error('community_id')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> 
                <div class="mb-4">
                <label for="exampleInputname" class="form-label">Jumlah Unit</label>
                <input type="text" nputmode="numeric" value="{{ $stall_place->stall_unit }}" pattern="[0-9]*"  id="inputAngka" oninput="this.value=this.value.replace(/[^0-9]/g,'')" name="stall_unit" class="form-control @error('stall_unit') is-invalid @enderror " id="exampleInputname" placeholder="Masukan Jumlah Unit">
                   @error('stall_unit')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
           <div class="mb-4">
                <label for="exampleInputname" class="form-label">Harga Sewa Perbulan</label>
                <div class="input-group">
                 <span class="input-group-text px-6" id="basic-addon1">
                Rp        
                </span>
                 <input type="text" inputmode="numeric" value="{{ $stall_place->rent_amount }}" id="harga" name="rent_amount" class="form-control @error('rent_amount') is-invalid @enderror" placeholder="Masukan Harga Sewa" autocomplete="off"/>
                   @error('rent_amount')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
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
   <script>
  const input = document.getElementById("harga");

  input.addEventListener("input", function () {
    // Ambil angka saja
    let value = this.value.replace(/\D/g, "");

    // Format ribuan Indonesia
    this.value = new Intl.NumberFormat("id-ID").format(value);
  });
</script>
</x-admin>