<x-admin>
  <div class="container-fluid py-4">
    <div class="row align-items-center mb-5 mt-2">
      <div class="col-md-8">
        <div class="d-flex align-items-center">
          <div>
            <h2 class="fw-bold mb-1 tracking-tight" style="color: #2D3436;">
              {{ $greeting }}, <span class="text-primary">{{ Auth::user()->name }}</span>!
            </h2>
            <p class="text-muted mb-0 opacity-75">
              <i class="ri-rocket-line me-1"></i> Pantau perkembangan layanan Serenity di sini.
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-4 text-md-end mt-3 mt-md-0">
        <div class="d-inline-block p-3 rounded-4 bg-white shadow-sm border border-light-subtle">
          <div class="d-flex align-items-center justify-content-md-end">
            <div class="me-3 text-end">
              <h4 id="clock" class="fw-bold mb-0 text-dark"
                style="letter-spacing: 1px; font-variant-numeric: tabular-nums;">
              </h4>
              <span class="text-uppercase text-muted fw-semibold" style="font-size: 0.7rem; letter-spacing: 2px;">
                {{ $date }}
              </span>
            </div>
            <div class="bg-primary-subtle p-2 rounded-3">
              <i class="ri-calendar-event-line text-primary fs-4"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <style>
      /* Menambahkan sedikit efek smooth pada transisi jam */
      #clock {
        transition: all 0.3s ease;
      }

      .tracking-tight {
        letter-spacing: -0.5px;
      }
    </style>

    <div class="row g-4">

      <div class="col-lg-9">
        <div class="row g-3 mb-4">
          <div class="col-md-3">
            <div class="card border-0 shadow-sm text-white bg-primary" style="border-radius: 15px; height: 160px;">
              <div class="card-body p-3 d-flex flex-column">
                <div class="d-flex justify-content-between">
                  <small class="fw-bold text-white">Pengguna</small>
                  <i class="ri-more-fill text-white"></i>
                </div>
                <h2 class="fw-bold text-white mt-auto mb-0">{{ number_format($user, 0, ',', '.') }}</h2>
                <small class="text-muted text-white" style="font-size: 12.5px;">Pengguna Terdaftar
                </small>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card border-0 shadow-sm" style="border-radius: 15px; height: 160px;">
              <div class="card-body p-3 d-flex flex-column">
                <div class="d-flex justify-content-between text-muted">
                  <small class="fw-bold">Laporan
                  </small>
                  <i class="ri-more-fill"></i>
                </div>
                <h2 class="fw-bold mt-auto mb-0">{{ number_format($report, 0, ',', '.') }}
                </h2>
                <small class="text-muted text-light" style="font-size: 12.5px;">Laporan Masuk
                </small>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card border-0 shadow-sm" style="border-radius: 15px; height: 160px;">
              <div class="card-body p-3 d-flex flex-column">
                <div class="d-flex justify-content-between text-muted">
                  <small class="fw-bold">IWD Terbayar</small>
                  <i class="ri-more-fill"></i>
                </div>
                <h2 class="fw-bold mt-auto mb-0">Rp {{ number_format($billsPaid ?? 0, 0, ',', '.') }}</h2>
                <small class="text-muted text-light" style="font-size: 12.5px;">Dari {{ $bills }} transaksi
                </small>
              </div>
            </div>
          </div>

        </div>

        <div class="row g-3">
          <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 15px;">
              <div class="card-body">
                <div class="d-flex">
                  <i class="ri ri-alarm-warning-fill fs-4 text-danger"></i>
                  <h5 class="fw-bold mx-2 mb-0">Laporan Baru</h5>

                  @if ($neWreport != null)
                    <div class="badge badge-center text-bg-danger rounded-pill ms-auto">
                      <span style="font-size:10px">
                        {{ $neWreport }}
                      </span>
                    </div>
                  @endif
                </div>

                <small class="text-muted d-block mt-0 mb-6" style="font-size: 10px;">
                  Menampilkan laporan terbaru yang masuk ke sistem
                </small>

                <ul class="timeline mb-0 mt-6">
                  @forelse ($newestReport as $dataReport)
                    <li class="timeline-item timeline-item-transparent mt-2">
                      <span class="timeline-point timeline-point-primary"></span>

                      <div class="timeline-event">
                        <p class="mb-2 fw-semibold">
                          {{ $dataReport->reportCategories->name }}
                        </p>

                        <div class="d-flex justify-content-between align-items-center">

                          <!-- Kiri -->
                          <div class="d-flex align-items-center gap-2">
                                 @if ($dataReport->users->avatar)
                                <div class="avatar avatar-sm avatar-online">
                                  <img src="{{$dataReport->users->avatar}}" alt="avatar" class="rounded-circle" />
                                </div>
                              @else
                                <div class="avatar avatar-sm avatar-online bg-light d-flex align-items-center justify-content-center"
                                  style="border-radius:50%;">

                                  <span class="fs-5 fw-bold text-white">
                                    {{ substr($dataReport->users->name ?? '-', 0, 2) }}
                                  </span>

                                </div>
                              @endif
                           

                            <div class="lh-sm">
                              <p class="mb-0 small fw-medium">
                                {{ $dataReport->users->user_profile->full_name }}
                              </p>

                              <small class="text-muted text-light d-block">
                                Blok {{ $dataReport->users->user_house->houses->blocks->name }}
                                No {{ $dataReport->users->user_house->houses->number }}
                              </small>

                              <small class="text-muted text-light d-block">
                                RT {{ $dataReport->users->user_house->houses->neighborhoodUnits->no }}
                                / RW {{ $dataReport->users->user_house->houses->communityUnits->no }}
                              </small>
                            </div>
                          </div>

                          <!-- Kanan -->
                          <small class="text-body-secondary text-nowrap">
                            {{ $dataReport->created_at->diffForHumans() }}
                          </small>

                        </div>
                      </div>
                    </li>

                  @empty
                    <li class="py-5">
                      <div class="text-center py-5 w-100">

                        <i class="ri ri-inbox-line fs-1 text-muted mb-2"></i>

                        <p class="mb-1 fw-semibold text-muted">
                          Belum ada laporan
                        </p>

                        <small class="text-muted d-block mb-3">
                          Tidak ada laporan baru saat ini
                        </small>

                        <a href="{{ route('service.report.index') }}" class="btn btn-sm btn-outline-primary">
                          Lihat Semua Laporan
                        </a>

                      </div>
                    </li>
                  @endforelse
                  @if ($newestReport->count() > 0)
                    <div class="d-flex mt-3">
                      <a href="{{ route('service.report.index') }}" class="ms-auto text-primary" style="font-size:13.5px">
                        Lihat Selengkapnya
                      </a>
                    </div>
                  @endif
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 15px;">
              <div class="card-body text-center">
                <div class="d-flex justify-content-between mb-4">
                  <h6 class="fw-bold">Ringkasan Pembayaran IWD</h6>
                </div>
                  <div id="donutChart" style="max-height:10px"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="card border-0 shadow-sm h-100 text-white" style="background-color: #C2C7FF; border-radius: 15px;">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h6 class="fw-bold mb-0">Statistik</h6>
              <i class="ri-more-fill"></i>
            </div>

            <div class="text-center mb-4 py-3">
              <div class="rounded-circle border border-4 d-inline-flex align-items-center justify-content-center"
                style="width: 150px; height: 150px; border-color: rgba(255,255,255,0.3) !important;">
                <div class="text-dark">
                  <h3 class="fw-bold mb-0">{{ $house->count() }}</h3>
                  <small>Total Rumah</small>
                </div>
              </div>
            </div>

            <div class="row g-3 text-dark text-center">
              <div class="col-4">
                <small class="d-block text-muted">Rw</small>
                <span class="fw-bold">{{ App\Models\Master\CommunityUnit::count() }}</span>
              </div>
              <div class="col-4">
                <small class="d-block text-muted">Rt</small>
                <span class="fw-bold">{{ App\Models\Master\NeighborhoodUnit::count() }}</span>
              </div>
              <div class="col-4">
                <small class="d-block text-muted">Blok</small>
                <span class="fw-bold">{{ App\Models\Master\Block::count(  ) }}</span>
              </div>
            </div>
            
          </div>
          <img src="../assets/img/welcome-bg2.png" alt="Admin" style="height:200px; width:250px">
        </div>
      </div>

    </div>
  </div>

  <script>
    function updateClock() {
      let now = new Date();
      document.getElementById('clock').innerHTML = now.toLocaleTimeString('id-ID');
    }
    setInterval(updateClock, 1000);
    updateClock();
  </script>

  @push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const donutChartEl = document.querySelector('#donutChart');
      
      if (typeof donutChartEl !== 'undefined' && donutChartEl !== null) {
        const donutChartConfig = {
          chart: {
            height: 310,
            type: 'donut'
          },
          labels: ['Sudah Bayar', 'Belum Bayar'],
          series: [{{ $billsPaidCount }}, {{ $billsUnpaidCount }}],
          colors: ['#28a745', '#dc3545'],
          stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
          },
          dataLabels: {
            enabled: true,
            formatter: function (val) {
              return parseInt(val) + '%';
            }
          },
          legend: {
            show: true,
            position: 'bottom',
            horizontalAlign: 'center',
            verticalAlign: 'bottom',
            floating: false,
            fontSize: 14,
            offsetY: 10
          },
          plotOptions: {
            pie: {
              donut: {
                size: '65%',
                labels: {
                  show: true,
                  name: {
                    show: true,
                    fontSize: '14px',
                    fontFamily: 'Inter'
                  },
                  value: {
                    show: true,
                    fontSize: '18px',
                    color: '#3c4858',
                    fontFamily: 'Inter',
                    formatter: function (val) {
                      return parseInt(val) + '%';
                    }
                  },
                  total: {
                    show: true,
                    fontSize: '14px',
                    color: '#3c4858',
                    label: 'Total',
                    formatter: function (w) {
                      return '{{ $bills }} tagihan';
                    }
                  }
                }
              }
            }
          }
        };
        
        const donutChart = new ApexCharts(donutChartEl, donutChartConfig);
        donutChart.render();
      }
    });
  </script>
  @endpush
</x-admin>