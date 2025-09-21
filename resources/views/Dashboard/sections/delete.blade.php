<!-- Delete Section Modal -->
<div class="modal fade" id="deleteModal-{{ $section->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $section->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h1 class="modal-title fs-5" id="deleteModalLabel-{{ $section->id }}">{{ __('dashboard.Delete Section') }}</h1>
            </div>

            <div class="modal-body">
                {{ __('dashboard.Are you sure you want to delete the section') }} <strong>{{ $section->name }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('dashboard.Close') }}</button>
                <form action="{{ route('section.delete', $section->id) }}" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{ __('dashboard.Delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
