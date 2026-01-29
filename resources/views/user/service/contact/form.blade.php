<x-auth>
    <div class="body-wrapper mb-5">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-4">
                    <form action="{{ route('contact.store') }}" method="post">
                        @csrf
                        <div class="mb-4">
                            <label for="exampleInputname" class="form-label">Nama</label>
                            <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror " id="exampleInputname"
                                placeholder="Masukan Pernyataan">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputname" class="form-label">Email</label>
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror " id="exampleInputname"
                                placeholder="Masukan Pernyataan">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Pertanyaan</label>
                            <textarea class="form-control p-7 @error('question') is-invalid @enderror" name="question" id=""
                                cols="20" placeholder="Ketik Pertanyaan"></textarea>
                            @error('question')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-auth>