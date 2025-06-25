@extends('layouts.user_type.auth')

@section('content')

  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{ __('Total Pengguna') }}</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $jumlahUser }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="fas fa-users text-lg position-relative top-50 translate-middle-y opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">{{ __('Total Admin') }}</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $jumlahAdmin }}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
                <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">{{ __('Status Sensor 1') }}</p>
                    <span class="badge bg-danger text-white mb-0 mt-1">
                        <i class="fas fa-plug-circle-xmark me-2"></i>{{ __('Offline') }}
                    </span>
                </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="fas fa-microchip text-center position-relative top-50 translate-middle-y text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
                <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">{{ __('Status Sensor 2') }}</p>
                    <span class="badge bg-success text-white mb-0 mt-1">
                        <i class="fa-solid fa-earth-americas me-2"></i>{{ __('Online') }}
                    </span>
                </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="fas fa-satellite-dish text-lg position-relative top-50 translate-middle-y opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-8">
      <div class="card h-100 z-index-2">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
          <h6 class="text-bolder">{{ __('Grafik Kadar Air') }}</h6>
            <div class="dropdown">
                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="dropdownFilter" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-filter text-dark text-sm me-2"></i> {{ __('Filter') }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownFilter">
                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); filterKadar('All')">{{ __('Semua Data') }}</a></li>
                    <li><hr class="dropdown-divider opacity-2"></li>
                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); filterKadar('15')">{{ __('15 Menit') }}</a></li>
                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); filterKadar('30')">{{ __('30 Menit') }}</a></li>
                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); filterKadar('60')">{{ __('1 Jam') }}</a></li>
                </ul>
            </div>
        </div>
        <div class="card-body p-3">
          <div class="chart">
            <canvas id="chart-kadar" class="chart-canvas" height="300"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 mb-0">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-header pb-0 text-danger d-flex justify-content-between align-items-center">
                <h6 class="mb-0 text-bolder">{{ __('Kondisi') }}</h6>
            </div>
            <div class="card-body">
                <canvas id="chartpie-kadar" class="chart-canvas" height="300"></canvas>
            </div>
        </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-8">
      <div class="card z-index-2 h-100">
        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
          <h6 class="text-bolder">{{ __('Grafik Kecepatan Air') }}</h6>
            <div class="dropdown">
                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="dropdownFilter" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-filter text-dark text-sm me-2"></i> {{ __('Filter') }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownFilter">
                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); filterKecepatan('All')">{{ __('Semua Data') }}</a></li>
                    <li><hr class="dropdown-divider opacity-2"></li>
                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); filterKecepatan('15')">{{ __('15 Menit') }}</a></li>
                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); filterKecepatan('30')">{{ __('30 Menit') }}</a></li>
                    <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); filterKecepatan('60')">{{ __('1 Jam') }}</a></li>
                </ul>
            </div>
        </div>
        <div class="card-body p-3">
          <div class="chart">
            <canvas id="chart-kecepatan" class="chart-canvas" height="300"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 mb-0">
        <div class="card h-100 shadow-sm border-0">
            <div class="card-header pb-0 text-danger d-flex justify-content-between align-items-center">
                <h6 class="mb-0 text-bolder">{{ __('Kondisi') }}</h6>
            </div>
            <div class="card-body">
                <canvas id="chartpie-kecepatan" class="chart-canvas" height="300"></canvas>
            </div>
        </div>
    </div>
  </div>


@endsection

@push('scripts')
    <script src="{{ asset('assets/js/dashboard.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
@endpush
