<x-admin>
 
    <div class="card">
        <div class="card-body p-4">
            <form action="{{ route('dashboard.banner.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="exampleInputname" class="form-label">Nama Banner</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror "
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
                    <input class="form-control" type="datetime-local" 
                        id="example-datetime-local-input" name="start_at"/>
                    @error('start_at')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="exampleInputname" class="form-label">Tanggal Berakhir</label>
                    <input class="form-control" type="datetime-local" 
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