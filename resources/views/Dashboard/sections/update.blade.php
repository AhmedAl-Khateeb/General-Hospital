<!-- Update Section Modal -->
<div class="modal fade" id="updateModal-{{ $section->id }}" tabindex="-1"
    aria-labelledby="updateModalLabel-{{ $section->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h1 class="modal-title fs-5" id="updateModalLabel-{{ $section->id }}">{{ __('dashboard.Update Section') }}</h1>
            </div>

            <form action="{{ route('section.update', $section->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-2">
                    <label for="name_ar">{{ (__('dashboard.Name')) }} (AR)</label>
                    <input type="text" class="form-control" id="name_ar" name="name[ar]"
                        value="{{ $section->getTranslation('name', 'ar') }}" required>
                </div>
                <div class="form-group mb-2">
                    <label for="name_en">{{ (__('dashboard.Name')) }} (EN)</label>
                    <input type="text" class="form-control" id="name_en" name="name[en]"
                        value="{{ $section->getTranslation('name', 'en') }}" required>
                </div>

                <div class="form-group mb-2">
                    <label for="description_ar">{{ (__('dashboard.Description')) }} (AR)</label>
                    <input type="text" class="form-control" id="description_ar" name="description[ar]"
                        value="{{ $section->getTranslation('description', 'ar') }}" placeholder="تعديل الوصف">
                </div>
                <div class="form-group mb-2">
                    <label for="description_en">{{ (__('dashboard.Description')) }} (EN)</label>
                    <input type="text" class="form-control" id="description_en" name="description[en]"
                        value="{{ $section->getTranslation('description', 'en') }}" placeholder="Edit Description">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('dashboard.Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('dashboard.Update') }} </button>
                </div>
            </form>
        </div>
    </div>
</div>
