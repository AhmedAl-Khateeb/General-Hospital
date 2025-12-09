<!-- Modal -->
<div class="modal fade" id="edit{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard.Edit Service') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Service.update', 'test') }}" method="post">
                @method('PUT')
                @csrf
                @csrf
                <div class="modal-body">
                    <label for="name_ar">{{ __('dashboard.Name') }}</label>
                    <input type="text" name="name[ar]" id="name[ar]"
                        value="{{ old('name.ar', $service->getTranslation('name', 'ar')) }}" class="form-control"><br>
                    <label for="name_en">{{ __('dashboard.Name') }}</label>
                    <input type="text" name="name[en]" id="name[en]"
                        value="{{ old('name.en', $service->getTranslation('name', 'en')) }}" class="form-control"><br>

                    <input type="hidden" name="id" value="{{ $service->id }}" class="form-control"><br>

                    <label for="price">{{ __('dashboard.Price') }}</label>
                    <input type="number" name="price" id="price" value="{{ old('price', $service->price) }}"
                        class="form-control"><br>

                    <label for="description_ar">{{ __('dashboard.Description') }}(AR)</label>
                    <textarea class="form-control" name="description[ar]" id="description[ar]" rows="5">{{ $service->getTranslation('description', 'ar') }}</textarea>
                    <label for="description_en">{{ __('dashboard.Description') }}(EN)</label>
                    <textarea class="form-control" name="description[en]" id="description[en]" rows="5">{{ $service->getTranslation('description', 'en') }}</textarea>

                    <div class="form-group">
                        <label for="status">{{ __('dashboard.Status') }}</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1" {{ $service->status == 1 ? 'selected' : '' }}>
                                {{ __('dashboard.Enabled') }}</option>
                            <option value="0" {{ $service->status == 0 ? 'selected' : '' }}>
                                {{ __('dashboard.Not Enabled') }}</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('dashboard.Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('dashboard.Submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
