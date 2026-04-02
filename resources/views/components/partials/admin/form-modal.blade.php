@props(['id', 'title', 'formRoute', 'subtitle' => '', 'method' => 'POST','icon' => ''])
<div class="modal fade" id="{{ $id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header mb-3">
                <div class="row">
                    <div class="col">
                        <h1 class="modal-title fs-5 mb-1" id="{{ $id }}Label"><i class="ti ti-users"></i>
                            {{ $title }}
                        </h1>
                        <p class="text-muted mb-0" style="font-size:12.5px;">
                            {!! $subtitle ? '<span class="text-danger">*</span> ' . $subtitle : '' !!}
                        </p>
                    </div>
                </div>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Input Group -->
                <form action="{{ $formRoute }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @if(in_array(strtoupper($method), ['PUT', 'PATCH', 'DELETE']))
                        @method($method)
                    @endif

                    {{ $slot }}

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="ri ri-save-3-fill"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
                <!-- End Form -->

            </div>
        </div>
    </div>
</div>
