<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('dashboard.Add Section') }}</h1>
            </div>

            <form action="{{ route('section.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="name_ar">{{ __('dashboard.Name') }} (AR)</label>
                        <input type="text" class="form-control" id="name_ar" name="name[ar]" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="name_en">{{ __('dashboard.Name') }}  (EN)</label>
                        <input type="text" class="form-control" id="name_en" name="name[en]" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('dashboard.Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('dashboard.Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
