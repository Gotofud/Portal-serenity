<!doctype html>
<html lang="en" class="layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-skin="default"
  data-bs-theme="light" data-assets-path="assets/" data-template="vertical-menu-template">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <meta name="robots" content="noindex, nofollow" />
  <title>Demo: Wizard Numbered - Forms | Materialize - Bootstrap Dashboard PRO</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/iconify-icons.css') }}" />

  <!-- Core CSS -->
  <!-- build:css assets/vendor/css/theme.css -->

  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />

  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/pickr/pickr-themes.css') }}" />

  <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

  <!-- Vendors CSS -->

  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

  <!-- endbuild -->

  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/form-validation.css') }}" />

  <!-- Page CSS -->
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">


      <!-- / Navbar -->

      <!-- Content wrapper -->
      <div class="content-wrapper d-flex align-items-center justify-content-center min-vh-100">
        <!-- Content -->
        <div class="container-xxl">
          <!-- Default -->
          <div class="row justify-content-center">
            <!-- Default Wizard -->
            <div class="col-lg-8 col-md-10 col-12 mb-6">

              <div class="bs-stepper wizard-numbered mt-2">
                <div class="bs-stepper-header">
                  <div class="step" data-target="#account-details">
                    <button type="button" class="step-trigger">
                      <span class="bs-stepper-circle"><i class="icon-base ri ri-check-line"></i></span>
                      <span class="bs-stepper-label">
                        <span class="bs-stepper-number">01</span>
                        <span class="d-flex flex-column gap-1 ms-2">
                          <span class="bs-stepper-title">Informasi Pribadi</span>
                          <span class="bs-stepper-subtitle">Tambah Informasi Pribadi</span>
                        </span>
                      </span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#personal-info">
                    <button type="button" class="step-trigger">
                      <span class="bs-stepper-circle"><i class="icon-base ri ri-check-line"></i></span>
                      <span class="bs-stepper-label">
                        <span class="bs-stepper-number">02</span>
                        <span class="d-flex flex-column gap-1 ms-2">
                          <span class="bs-stepper-title">Informasi Rumah</span>
                          <span class="bs-stepper-subtitle">Tambah Informasi Rumah</span>
                        </span>
                      </span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#social-links">
                    <button type="button" class="step-trigger">
                      <span class="bs-stepper-circle"><i class="icon-base ri ri-check-line"></i></span>
                      <span class="bs-stepper-label">
                        <span class="bs-stepper-number">03</span>
                        <span class="d-flex flex-column gap-1 ms-2">
                          <span class="bs-stepper-title">Informasi Kendaraan</span>
                          <span class="bs-stepper-subtitle">Tambah Informasi Kendaraan</span>
                        </span>
                      </span>
                    </button>
                  </div>
                </div>
                <div class="bs-stepper-content">
                  <form action="{{ route('user-profile.store') }}" method="POST">
                    @csrf
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>
                    @endif
                    <!-- Infomasi Pribadi -->
                    <div id="account-details" class="content">
                      <div class="content-header mb-4">
                        <h6 class="mb-0">Informasi Pribadi</h6>
                        <small>Isi data pribadi anda.</small>
                      </div>
                      <div class="row g-5">
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <input type="text" id="username" name="full_name" class="form-control" placeholder="johndoe"
                              name="full_name" />
                            <label for="username">Nama Lengkap</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <div class="form-floating form-floating-outline">
                              <select class="form-select" name="gender">
                                <option label="Pilih Jenis Kelamin">Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                              </select>
                              <label for="gender">Jenis Kelamin</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <input type="text" id="pob" name="pob" class="form-control" placeholder="Bandung" />
                            <label for="pod">Tempat Lahir</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <input type="date" id="bod" name="bod" class="form-control"
                              max="{{ \Carbon\Carbon::now()->subYears(17)->format('Y-m-d') }}" />
                            <label for="bod">Tanggal Lahir</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <div class="form-floating form-floating-outline">
                              <select class="form-select" name="citizenship">
                                <option label="Pilih Kewarganegaraan">Pilih Kewarganegaraan</option>
                                <option value="WNI">WNI</option>
                                <option value="WNA">WNA</option>
                              </select>
                              <label for="citizenship">Kewarganegaraan</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <input type="text" id="nik" name="nik" class="form-control" placeholder="Masukan NIK" />
                            <label for="pod">NIK</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <input type="text" id="nkk" name="nkk" class="form-control" placeholder="Masukan NkK" />
                            <label for="pod">NKK</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <div class="form-floating form-floating-outline">
                              <select class="form-select" name="religion">
                                <option label="Pilih Agama">Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Konguchu">Konguchu</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Kepercayaan Lain">Kepercayaan Lain</option>
                              </select>
                              <label for="citizenship">Agama</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <input type="text" id="telephone_num" name="telephone_num" class="form-control"
                              placeholder="Masukan NkK" />
                            <label for="pod">No Telepon</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <div class="form-floating form-floating-outline">
                              <select class="form-select" name="family_status">
                                <option label="Pilih Status Keluarga">Pilih Status Keluarga</option>
                                <option value="Kepala Keluarga">Kepala Keluarga</option>
                                <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                <option value="Anak">Anak</option>
                                <option value="Lainnya">Lainnya</option>
                              </select>
                              <label for="family_Status">Status Keluarga</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                          <button type="button" class="btn btn-outline-secondary btn-prev" disabled>
                            <i class="icon-base ri ri-arrow-left-line icon-sm me-sm-1 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                          </button>
                          <button type="button" class="btn btn-primary btn-next">
                            <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                            <i class="icon-base ri ri-arrow-right-line icon-sm"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- Informasi Rumah -->
                    <div id="personal-info" class="content">
                      <div class="content-header mb-4">
                        <h6 class="mb-0">Informasi Rumah</h6>
                        <small>Enter Your Personal Info.</small>
                      </div>
                      <div class="row g-5">

                        <div class="col-md-6">
                          <label for="exampleInputname" class="form-label">No Rw <span
                              class="text-danger">*</span></label>
                          <select class="form-select rw-select" aria-label="Default select example">
                            <option value=" " selected>Pilih RW</option>
                            @foreach (App\Models\Master\CommunityUnit::all() as $rw)
                              <option value="{{ $rw->id }}">
                                RW {{ $rw->no }}
                              </option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label">Pilih RT <span class="text-danger">*</span>`</label>
                          <select class="form-select rt-select" disabled>
                            <option value="" selected disabled>Pilih RT</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label">Pilih Blok <span class="text-danger">*</span>`</label>
                          <select class="form-select block-select" disabled>
                            <option value="" selected disabled>Pilih Blok</option>
                          </select>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label">Pilih Rumah <span class="text-danger">*</span>`</label>
                          <select name="house_id" class="form-select house-select" disabled>
                            <option value="" selected disabled>Pilih Rumah</option>
                          </select>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <select name="is_primary" class="form-select" id="is_primary">
                              <option value=" ">Status Rumah</option>
                              <option value="Rumah Utama">Rumah Utama</option>
                              <option value="Rumah Lainnya">Rumah Lainnya</option>
                            </select>
                            <label for="is_primary">Status Rumah</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <input type="text" id="total_resident" name="total_resident" class="form-control"
                              placeholder="Masukan Jumlah Penghuni" />
                            <label for="pod">Jumlah Penghuni</label>
                          </div>
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                          <button type="button" class="btn btn-outline-secondary btn-prev">
                            <i class="icon-base ri ri-arrow-left-line icon-sm me-sm-1 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                          </button>
                          <button type="button" class="btn btn-primary btn-next">
                            <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                            <i class="icon-base ri ri-arrow-right-line icon-sm"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- Informasi Kendaraan -->
                    <div id="social-links" class="content">
                      <div class="content-header mb-4">
                        <h6 class="mb-0">Informasi Kendaraan</h6>
                        <small>Tambah Informasi Kendaraan Anda.</small>
                      </div>
                      <div class="row g-5 form-repeater">
                        <div data-repeater-list="group_a">
                          <div data-repeater-item>
                            <div class="row">
                              <div class="mb-4 col-lg-6">
                                <div class="form-floating form-floating-outline">
                                  <select id="form-repeater-1-4" class="form-select" name="vehicle_types">
                                    <option value=" ">Pilih jenis Kendaraan</option>
                                    @foreach (App\Models\Master\VehicleTypes::all() as $vehicle)
                                      <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                                    @endforeach
                                  </select>
                                  <label for="form-repeater-1-4">Jenis Kendaraan</label>
                                </div>
                              </div>
                              <div class="mb-4 col-lg-6 ">
                                <div class="form-floating form-floating-outline">
                                  <input type="text" id="form-repeater-1-1" class="form-control"
                                    placeholder="Contoh : D 1111 D" name="plate_number" />
                                  <label for="form-repeater-1-1">Plat Nomor</label>
                                </div>
                              </div>
                              <div class="col-lg-6 d-flex align-items-center mb-0">
                                <button class="btn btn-sm btn-outline-danger mb-xl-4" data-repeater-delete>
                                  <i class="icon-base ri ri-close-line icon-md me-1"></i>
                                  <span class="align-middle">Hapus</span>
                                </button>
                              </div>
                            </div>
                            <hr />
                          </div>
                        </div>
                        <div class="mb-0">
                          <button class="btn btn-sm btn-primary" data-repeater-create>
                            <i class="icon-base ri ri-add-line me-1"></i>
                            <span class="align-middle">Tambah Form</span>
                          </button>
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                          <button type="button" class="btn btn-outline-secondary btn-prev">
                            <i class="icon-base ri ri-arrow-left-line icon-sm me-sm-1 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                          </button>
                          <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- /Default Wizard -->


          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->

    <!-- build:js assets/vendor/js/theme.js  -->

    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/@algolia/autocomplete-js.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/pickr/pickr.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>

    <!-- Main JS -->

    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->

    <script src="{{ asset('assets/js/form-wizard-numbered.js') }}"></script>
    <script src="{{ asset('assets/js/form-wizard-validation.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
    <script src="{{ asset('assets/js/forms-extras.js') }}"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        var stepperEl = document.querySelector('.bs-stepper');
        if (stepperEl) {
          var stepper = new Stepper(stepperEl, {
            linear: false // Set true jika ingin user harus isi urut
          });

          // Handle klik tombol Next
          $('.btn-next').on('click', function () {
            stepper.next();
          });

          // Handle klik tombol Previous
          $('.btn-prev').on('click', function () {
            stepper.previous();
          });
        }
      });

      function fetchRT(container, rwId, selectedRtId = null) {
        let rtSelect = container.querySelector('.rt-select');
        let blockSelect = container.querySelector('.block-select');
        let houseSelect = container.querySelector('.house-select');

        if (!rwId) return;

        rtSelect.innerHTML = '<option>Loading...</option>';
        rtSelect.disabled = true;

        fetch(`/get-rt/${rwId}`)
          .then(res => res.json())
          .then(data => {
            rtSelect.innerHTML = '<option selected disabled>Pilih RT</option>';

            data.forEach(item => {
              let opt = document.createElement('option');
              opt.value = item.id;
              opt.textContent = 'RT ' + item.no;

              if (selectedRtId && item.id == selectedRtId) {
                opt.selected = true;
              }

              rtSelect.appendChild(opt);
            });

            rtSelect.disabled = false;

            // reset bawahnya
            blockSelect.innerHTML = '<option>Pilih Blok</option>';
            houseSelect.innerHTML = '<option>Pilih Rumah</option>';
          });
      }

      function fetchBlock(container, rwId, rtId, selectedBlockId = null) {
        let blockSelect = container.querySelector('.block-select');
        let houseSelect = container.querySelector('.house-select');

        blockSelect.innerHTML = '<option>Loading...</option>';
        blockSelect.disabled = true;

        fetch(`/get-block/${rwId}/${rtId}`)
          .then(res => res.json())
          .then(data => {
            blockSelect.innerHTML = '<option selected disabled>Pilih Blok</option>';

            data.forEach(item => {
              let opt = document.createElement('option');
              opt.value = item.id;
              opt.textContent = item.name;

              if (selectedBlockId && item.id == selectedBlockId) {
                opt.selected = true;
              }

              blockSelect.appendChild(opt);
            });

            blockSelect.disabled = false;

            // reset rumah
            houseSelect.innerHTML = '<option>Pilih Rumah</option>';
          });
      }

      function fetchHouse(container, rwId, rtId, blockId) {
        let houseSelect = container.querySelector('.house-select');

        houseSelect.innerHTML = '<option>Loading...</option>';
        houseSelect.disabled = true;

        fetch(`/get-house/${rwId}/${rtId}/${blockId}`)
          .then(res => res.json())
          .then(data => {
            houseSelect.innerHTML = '<option selected disabled>Pilih Rumah</option>';

            data.forEach(item => {
              let opt = document.createElement('option');
              opt.value = item.id;

              // 🔥 tampil blok + nomor
              opt.textContent = item.label;

              houseSelect.appendChild(opt);
            });

            houseSelect.disabled = false;
          });
      }

      // 🔥 EVENT CHAINING

      document.addEventListener('change', function (e) {

        // RW → RT
        if (e.target.classList.contains('rw-select')) {
          let container = e.target.closest('.row');
          fetchRT(container, e.target.value);
        }

        // RT → BLOCK
        if (e.target.classList.contains('rt-select')) {
          let container = e.target.closest('.row');
          let rwId = container.querySelector('.rw-select').value;

          fetchBlock(container, rwId, e.target.value);
        }

        // BLOCK → HOUSE
        if (e.target.classList.contains('block-select')) {
          let container = e.target.closest('.row');
          let rwId = container.querySelector('.rw-select').value;
          let rtId = container.querySelector('.rt-select').value;

          fetchHouse(container, rwId, rtId, e.target.value);
        }
      });

      $(function () {
        var repeater = $('.form-repeater');

        if (repeater.length) {
          repeater.repeater({
            show: function () {
              $(this).slideDown(); // Efek saat menambah baris

              // Opsional: Re-inisialisasi tooltips atau select2 jika ada di dalam baris
              if ($.fn.select2) {
                $(this).find('.select2').select2();
              }
            },
            hide: function (deleteElement) {
              if (confirm('Apakah yakin ingin menghapus baris ini?')) {
                $(this).slideUp(deleteElement); // Efek saat menghapus baris
              }
            },
            isFirstItemUndeletable: true // Item pertama tidak bisa dihapus
          });
        }
      });
    </script>
</body>

</html>