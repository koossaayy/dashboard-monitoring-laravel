@extends('layouts.user_type.auth')

@section('content')

  <main class="main-content mt-0 borde-radius-0">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
              <h6>{{ __('Tabel Data Kecepatan Air') }}</h6>
              <a class="btn btn-sm btn-primary py-2 px-3" data-bs-toggle="modal" data-bs-target="#modalDownload" href=""><i class="fas fa-download me-2 text-sm"></i>{{ __('Unduh .csv') }}</a>
            </div>
            <div class="card-body px-0">
              <div class="table-responsive">
                <table class="table align-items-center mb-0 data-tables mt-2">
                  <thead>
                    <tr>
                      <th class="text-center w-5 text-uppercase text-secondary text-xxs font-weight-bolder">{{ __('No') }}</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ __('Waktu Pendeteksian') }}</th>
                      <th class="text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{ __('Nilai') }}</th>
                      <th class="text-center align-middle text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{ __('Keterangan') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $kadarair)
                        <tr>
                            <td class="text-center px-2 text-secondary text-xxs">
                                <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                            </td>
                            <td class="text-center align-middle">
                                <p class="text-xs font-weight-bold mb-0">{{ $kadarair->formatted_waktu}}</p>
                            </td>
                            <td class="text-center align-middle">
                                <p class="text-xs font-weight-bold mb-0">{{ $kadarair->nilai}}</p>
                            </td>
                            @php
                                $color = match($kadarair->keterangan) {
                                    'Sangat Keruh'  => 'text-danger',
                                    'Keruh'         => 'text-warning',
                                    'Jernih'        => 'text-success',
                                    'Sangat Jernih' => 'text-blue',
                                    default         => 'text-secondary'
                                };
                            @endphp
                            <td class="text-center align-middle">
                                <p class="text-xs font-weight-bold mb-0 {{ $color }}">{{ $kadarair->keterangan}}</p>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  @endsection

@include('components.modal-download', ['action' => route('kadar.download')])
@push('scripts')
  <script src="{{ asset('assets/js/kadar.js')}}"></script>
@endpush
