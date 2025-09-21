<!-- Delete Section Modal -->
<div class="modal fade" id="deleteModal-{{ $doctor->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $doctor->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h1 class="modal-title fs-5" id="deleteModalLabel-{{ $doctor->id }}">{{ __('dashboard.Delete Doctor') }}</h1>
            </div>

            <div class="modal-body">
                {{ __('dashboard.Are you sure you want to delete the doctor') }} <strong>{{ $doctor->name }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('dashboard.Close') }}</button>
                <form action="{{ route('doctor.delete', $doctor->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{ __('dashboard.Delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
