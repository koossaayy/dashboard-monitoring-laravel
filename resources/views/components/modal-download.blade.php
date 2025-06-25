<!-- Modal Download CSV -->
<div class="modal fade" id="modalDownload" tabindex="-1" aria-labelledby="modalDownloadLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ $action }}" method="GET">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalDownloadLabel">{{ __('Pilih Rentang Waktu') }}</h5>
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">{{ __('&times;') }}</span></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="start_date" class="form-label">{{ __('Tanggal Mulai') }}</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="end_date" class="form-label">{{ __('Tanggal Selesai') }}</label>
            <input type="date" name="end_date" id="end_date" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary"><i class="fas fa-download px-0 me-2"></i>{{ __('Unduh') }}</button>
        </div>
      </div>
    </form>
  </div>
</div>
