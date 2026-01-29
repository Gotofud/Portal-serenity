<x-admin>
    <!-- Header -->
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4"
        style="background-image: url('{{ asset('/assets/images/backgrounds/resident.png') }}');  background-repeat: no-repeat;  background-size: cover    ;  ">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h3 class="fw-bolder mb-8">Manajemen Warga</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none"
                                    href="{{ route('dashboard.index') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Manajemen Warga</li>
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
    <div class="row ">
        <div class="col-md-4">
            <div class="card bg-primary text-white ">
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <div class="d-flex align-items-center mb-1">
                            <span
                                class="fs-5 fw-bold text-white me-2"></span>
                        </div>
                        <span>Total Warga</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white ">
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <div class="d-flex align-items-center mb-1">
                            <span
                                class="fs-5 fw-bold text-white me-2"></span>
                        </div>
                        <span>Warga Aktif</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <div class="d-flex flex-column">
                        <div class="d-flex align-items-center mb-1">
                            <span
                                class="fs-5 fw-bold text-white me-2"></span>
                        </div>
                        <span>Warga Nonaktif</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="datatables">
        <div class="card">
            <div class="card-body">
                <div class="d-sm-flex justify-content-between align-items-start mb-3 gap-2">
                    <div class="input-group mb-3 w-100">
                        <span class="input-group-text bg-white"><i class="ti ti-search"></i></span>
                        <input type="text" id="customSearch" class="form-control" placeholder="Cari Data..."
                            style="height:3rem;">
                    </div>
                    <div class="action d-flex gap-2">
                        <div class="d-inline-block position-relative">
                            <i
                                class="ti ti-adjustments-horizontal position-absolute top-50 start-0 translate-middle-y ms-3 text-dark"></i>

                            <select id="status" class="form-select ps-5"
                                style="width:150px; height:3rem;  font-weight:500;">
                                <option value="">Status</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Nonaktif">Nonaktif</option>
                            </select>
                        </div>
                        <a href="" type="button" class="btn btn-primary "
                            style="width:150px; height:3rem; padding-top:0.75rem"><i
                                class=" ti ti-file-spreadsheet"></i>
                            Export</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="zero_config" class="table dataTable table-striped table-bordered display text-nowrap">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">No </h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Nama Operator</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Email</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Tanggal Daftar</h6>
                                </th>
                                <th>
                                    <h6 class="fs-4 fw-semibold mb-0">Status</h6>
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($guest as $data)
                                <tr>
                                    <td>
                                        <h6 class="fs-4 fw-semibold mb-0">{{ $no++ }}</h6>
                                    </td>
                                    <td>
                                        <h6 class="fs-4 fw-semibold mb-0">{{ $data->user_id }}</h6>
                                    </td>
                                    <td>
                                        <h6 class="fs-4 fw-semibold mb-0">{{ $data->guest_amount }}</h6>
                                    </td>
                                    <td>
                                        <h6 class="fs-4 fw-semibold mb-0">{{ $data->guest_types }}</h6>
                                    </td>
                                    <td>
                                        <h6 class="fs-4 fw-semibold mb-0">{{ $data->visit_at }}</h6>
                                    </td>
                                    <td>
                                        <div class="dropdown dropstart text-center">
                                            <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ti ti-dots-vertical fs-6"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center gap-3"
                                                        href="{{ route('resident.operator.edit', $data->id) }}">
                                                        <i class="fs-4 ti ti-edit"></i>Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center gap-3"
                                                        href="{{ route('resident.operator.edit', $data->id) }}">
                                                        <i class="fs-4 ti ti-edit"></i>Blokir User
                                                    </a>
                                                </li>
                                                <li>
                                                    <form
                                                        action="{{ route('resident.operator.destroy', $data->id) }}"
                                                        method="POST" class="btn-delete delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="dropdown-item d-flex align-items-center gap-3">
                                                            <i class="fs-4 ti ti-trash"></i>Delete
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin>