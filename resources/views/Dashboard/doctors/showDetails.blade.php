<!-- Show Doctor Modal -->
<div class="modal fade" id="showModal-{{ $doctor->id }}" tabindex="-1"
    aria-labelledby="showModalLabel-{{ $doctor->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0 shadow-lg rounded-3">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="showModalLabel-{{ $doctor->id }}">
                    {{ __('dashboard.Doctor Details') }}
                </h5>
            </div>

            <div class="modal-body">
                <div class="row align-items-center">
                    <!-- صورة -->
                    <div class="col-md-4 text-center">
                        <div class="card border-0">
                            <div class="card-body">
                                @if ($doctor->getFirstMediaUrl(\App\Enums\PhotoEnum::IMAGE))
                                    <img src="{{ $doctor->getFirstMediaUrl(\App\Enums\PhotoEnum::IMAGE) }}"
                                        alt="doctor image" class="img-fluid rounded-circle shadow-sm mb-3"
                                        width="160" height="160">
                                @else
                                    <img src="{{ asset('default-doctor.png') }}" alt="no image"
                                        class="img-fluid rounded-circle shadow-sm mb-3" width="160" height="160">
                                @endif
                                <h5 class="fw-bold text-primary">
                                    {{ $doctor->getTranslation('name', app()->getLocale()) }}
                                </h5>
                                <span class="badge bg-{{ $doctor->status ? 'success' : 'danger' }}">
                                    {{ $doctor->status ? __('dashboard.Active') : __('dashboard.Inactive') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- بيانات -->
                    <div class="col-md-8">
                        <div class="card border-0">
                            <div class="card-body">
                                <p><strong>{{ __('dashboard.Email') }}:</strong> {{ $doctor->email }}</p>
                                <p><strong>{{ __('dashboard.Phone') }}:</strong> {{ $doctor->phone }}</p>
                                <p><strong>{{ __('dashboard.Examination Price') }}:</strong> {{ (int) $doctor->examination_price }}
                                    {{ __('dashboard.EGP') }}</p>
                                <p><strong>{{ __('dashboard.Appointments') }}:</strong>
                                    {{ is_array($doctor->getTranslation('appointments', 'ar'))
                                        ? implode(', ', $doctor->getTranslation('appointments', 'ar'))
                                        : $doctor->getTranslation('appointments', 'ar') }}
                                </p>
                                <p><strong>{{ __('dashboard.Section') }}:</strong>
                                    {{ $doctor->section?->getTranslation('name', app()->getLocale()) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    {{ __('dashboard.Close') }}
                </button>
            </div>
        </div>
    </div>
</div>
