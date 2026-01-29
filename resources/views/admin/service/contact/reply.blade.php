<x-admin>
  <form action="{{ route('service.contact.sendReply', $contact->id) }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Email Tujuan</label>
        <input type="email" class="form-control" value="{{ $contact->email }}" readonly>
    </div>

    <div class="mb-3">
        <label>Pertanyaan</label>
        <textarea class="form-control" rows="4" readonly>{{ $contact->question }}</textarea>
    </div>

    <div class="mb-3">
        <label>Balasan</label>
        <textarea name="reply" class="form-control" rows="5" required></textarea>
    </div>
    
    <button class="btn btn-primary">Kirim Balasan</button>
</form>  
</x-admin>

