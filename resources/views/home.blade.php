<x-admin>
  <div class="row g-6 mb-6">
    <!-- Congratulations card -->
    <div class="col-xxl-2 col-md-4 col-sm-6">
      <div class="card h-100">
        <div class="card-body text-nowrap">
          <h5 class="card-title mb-1">Congratulations <span class="fw-bold">Norris!</span> 🎉</h5>
          <p class="card-subtitle mb-3">Best seller of the month</p>
          <h4 class="text-primary mb-0">$42.8k</h4>
          <p class="mb-3">78% of target 🚀</p>
          <a href="javascript:;" class="btn btn-sm btn-primary">View Sales</a>
        </div>
        <img src="../../assets/img/illustrations/trophy.png" class="position-absolute bottom-0 end-0 me-4" height="140"
          alt="view sales" />
      </div>
    </div>
    <!--/ Congratulations card -->

    <!-- Total Profit -->
    <div class="col-xxl-2 col-md-2 col-sm-6">
      <div class="card h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
            <div class="avatar">
              <div class="avatar-initial bg-label-primary rounded-3">
                <i class="icon-base ri ri-shopping-cart-2-line icon-24px"></i>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <p class="mb-0 text-success">+22%</p>
              <i class="icon-base ri ri-arrow-up-s-line text-success icon-sm"></i>
            </div>
          </div>
          <div class="card-info mt-5">
            <h5 class="mb-1">155k</h5>
            <p>Total Orders</p>
            <div class="badge bg-label-secondary rounded-pill">Last 4 Month</div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Total Profit -->

    <!-- Total Expenses -->
    <div class="col-xxl-2 col-md-2 col-sm-6">
      <div class="card h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
            <div class="avatar">
              <div class="avatar-initial bg-label-success rounded-3">
                <i class="icon-base ri ri-handbag-line icon-24px"></i>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <p class="mb-0 text-success">+38%</p>
              <i class="icon-base ri ri-arrow-up-s-line text-success icon-sm"></i>
            </div>
          </div>
          <div class="card-info mt-5">
            <h5 class="mb-1">$13.4k</h5>
            <p>Total Sales</p>
            <div class="badge bg-label-secondary rounded-pill">Last Six Month</div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Total Expenses -->

    <!-- Total Profit chart -->
    <div class="col-xxl-2 col-md-2 col-sm-6">
      <div class="card h-100">
        <div class="card-header">
          <div class="d-flex align-items-center mb-1 flex-wrap">
            <h5 class="mb-0 me-1">$88.5k</h5>
            <p class="mb-0 text-danger">-18%</p>
          </div>
          <span class="d-block card-subtitle">Total Profit</span>
        </div>
        <div class="card-body">
          <div id="totalProfitChart"></div>
        </div>
      </div>
    </div>
    <!--/ Total Profit chart -->

    <!-- Total Growth chart -->
    <div class="col-xxl-2 col-md-2 col-sm-6">
      <div class="card h-100">
        <div class="card-header">
          <div class="d-flex align-items-center mb-1 flex-wrap">
            <h5 class="mb-0 me-1">$27.9k</h5>
            <p class="mb-0 text-success">+16%</p>
          </div>
          <span class="d-block card-subtitle">Total Growth</span>
        </div>
        <div class="card-body">
          <div id="totalGrowthChart"></div>
        </div>
      </div>
    </div>
    <!--/ Total Sales chart -->
  </div>
</x-admin>