<x-admin>
    <h4 class="mb-1">List Role</h4>
    <div class="row mt-5 mb-5">
        <div class="col-12">
            <div class="card">
                <div class="card-widget-separator-wrapper">
                    <div class="card-body card-widget-separator ms-3">
                        <div class="row gy-4 gy-sm-1">
                            <div class="col-sm-8 col-lg-4">
                                <div
                                    class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-4 pb-sm-0">
                                    <div>
                                        <h4 class="mb-0">{{ App\Models\Master\Role::count() }}</h4>
                                        <p class="mb-0">Total Rw</p>
                                    </div>
                                    <div class="avatar me-sm-6">
                                        <span class="avatar-initial rounded-3 bg-label-primary">
                                            <i class="icon-base ri ri-database-2-line text-heading icon-26px"></i>
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none d-sm-block d-lg-none me-6" />
                            </div>
                            <div class="col-sm-8 col-lg-4">
                                <div
                                    class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-4 pb-sm-0">
                                    <div>
                                        <h4 class="mb-0">
                                            {{ App\Models\Master\Role::where('status', 'Aktif')->count() }}
                                        </h4>
                                        <p class="mb-0">Rw Aktif</p>
                                    </div>
                                    <div class="avatar me-lg-6">
                                        <span class="avatar-initial rounded-3 bg-label-success">
                                            <i class="icon-base ri ri-checkbox-circle-line text-heading icon-26px"></i>
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none d-sm-block d-lg-none" />
                            </div>
                            <div class="col-sm-8 col-lg-4">
                                <div
                                    class="d-flex justify-content-between align-items-start  pb-4 pb-sm-0 card-widget-3">
                                    <div>
                                        <h4 class="mb-0">
                                            {{ App\Models\Master\Role::where('status', 'Nonaktif')->count() }}
                                        </h4>
                                        <p class="mb-0">Rw Nonaktif</p>
                                    </div>
                                    <div class="avatar me-sm-6">
                                        <span class="avatar-initial rounded-3 bg-label-danger">
                                            <i
                                                class="icon-base ri ri-indeterminate-circle-line text-heading icon-26px"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Role cards -->
    <div class="row g-6">
        @foreach ($roleDash as $item)
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <p class="mb-0">Total {{ $item->users->count() }} users</p>

                            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                @foreach ($item->users as $userItem)
                                    <li data-bs-toggle="tooltip" title="{{ $userItem->name }}" class="avatar pull-up">
                                        <img class="rounded-circle" src="../../assets/img/avatars/5.png" alt="Avatar" />
                                    </li>
                                @endforeach
                                @if ($item->users_count > 3)
                                    <li class="avatar">
                                        @php
                                            $countRole = $item->users_count - 3;
                                        @endphp
                                        <span class="avatar-initial rounded-circle pull-up bg-lightest text-body"
                                            data-bs-toggle="tooltip" title="{{ $countRole }} more">
                                            +{{ $countRole }}
                                        </span>
                                    </li>
                                @elseif ($item->users_count == 0)
                                    <li class="avatar">
                                        <span class="avatar-initial rounded-circle pull-up bg-lightest text-body"
                                            data-bs-toggle="tooltip" title="Belum Ada User">X</span>
                                    </li>
                                @endif

                            </ul>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="role-heading">
                                <h5 class="mb-1">{{ $item->name }}</h5>
                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal"
                                    class="role-edit-modal">
                                    <p class="mb-0">Edit Role</p>
                                </a>
                            </div>
                            <a href="javascript:void(0);" class="text-secondary"><i
                                    class="icon-base ri ri-file-copy-line icon-22px"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="card mt-5">
            <h5 class="card-header">Table Basic</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Role</th>
                            <th>Status</th>
                            <th>Dibuat</th>
                            <th>Diperbarui</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($role as $data)
                            <tr>
                                <td>
                                    {{ $no++ }}
                                </td>
                                <td>{{ $data->name }}</td>
                                <td><span
                                        class="badge bg-{{ $data->status == 'Aktif' ? 'label-primary' : 'danger' }} me-1">{{ $data->status }}</span>
                                </td>
                                <td>{{ $data->created_at ? $data->created_at->format('d M Y , H:i') : '-' }}
                                </td>
                                <td>{{ $data->updated_at ? $data->updated_at->format('d M Y , H:i') : '-' }}
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="icon-base ri ri-more-2-line icon-18px"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="icon-base ri ri-pencil-line icon-18px me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="icon-base ri ri-delete-bin-6-line icon-18px me-1"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Role cards -->


</x-admin>