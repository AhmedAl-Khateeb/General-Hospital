<div class="modal fade" id="updateModal-{{ $doctor->id }}" tabindex="-1"
    aria-labelledby="updateModalLabel-{{ $doctor->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h1 class="modal-title fs-5" id="updateModalLabel-{{ $doctor->id }}">
                    {{ __('dashboard.Update Doctor') }}
                </h1>
            </div>

            <form action="{{ route('doctor.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- نخزن الـ doctor_id عشان نعرف أي modal نفتح مع الأخطاء --}}
                <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">

                {{-- فتح المودال بتاع الدكتور اللي عنده أخطاء بس --}}
                @if ($errors->any() && old('doctor_id') == $doctor->id)
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var modal = new bootstrap.Modal(document.getElementById("updateModal-{{ $doctor->id }}"));
                            modal.show();
                        });
                    </script>
                @endif

                <div class="modal-body">
                    {{-- عرض الأخطاء --}}
                    @if ($errors->any() && old('doctor_id') == $doctor->id)
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6 mb-2">
                            <label for="name_ar">{{ __('dashboard.Name') }} (AR)</label>
                            <input type="text" class="form-control @error('name.ar') is-invalid @enderror"
                                id="name_ar" name="name[ar]"
                                value="{{ old('name.ar', $doctor->getTranslation('name', 'ar')) }}" required>
                            @error('name.ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="name_en">{{ __('dashboard.Name') }} (EN)</label>
                            <input type="text" class="form-control @error('name.en') is-invalid @enderror"
                                id="name_en" name="name[en]"
                                value="{{ old('name.en', $doctor->getTranslation('name', 'en')) }}" required>
                            @error('name.en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Appointments -->
                        <div class="col-md-6 mb-2">
                            <label for="appointments_ar">{{ __('dashboard.Appointments') }} (AR)</label>
                            <input type="text" class="form-control"
                                id="appointments_ar" name="appointments[ar]"
                                value="{{ old('appointments.ar', implode(',', (array) $doctor->getTranslation('appointments', 'ar'))) }}">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="appointments_en">{{ __('dashboard.Appointments') }} (EN)</label>
                            <input type="text" class="form-control"
                                id="appointments_en" name="appointments[en]"
                                value="{{ old('appointments.en', implode(',', (array) $doctor->getTranslation('appointments', 'en'))) }}">
                        </div>

                        <!-- Email & Phone -->
                        <div class="col-md-6 mb-2">
                            <label for="email">{{ __('dashboard.Email') }}</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email"
                                value="{{ old('email', $doctor->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="phone">{{ __('dashboard.Phone') }}</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                id="phone" name="phone"
                                value="{{ old('phone', $doctor->phone) }}" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div class="col-md-6 mb-2">
                            <label for="examination_price">{{ __('dashboard.Examination Price') }}</label>
                            <input type="number" step="1" class="form-control @error('examination_price') is-invalid @enderror"
                                id="examination_price" name="examination_price"
                                value="{{ old('examination_price', (int) $doctor->examination_price) }}" required>
                            @error('examination_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Section -->
                        <div class="col-md-12 mb-2">
                            <label for="section_id">{{ __('dashboard.Section') }}</label>
                            <select name="section_id" id="section_id"
                                class="form-control @error('section_id') is-invalid @enderror" required>
                                <option value="">{{ __('dashboard.Choose Section') }}</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}"
                                        {{ old('section_id', $doctor->section_id) == $section->id ? 'selected' : '' }}>
                                        {{ $section->getTranslation('name', app()->getLocale()) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('section_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="col-md-6 mb-2">
                            <label for="password">{{ __('dashboard.Password') }}</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password">
                            <small class="text-muted">{{ __('dashboard.Leave blank if you don’t want to change') }}</small>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="col-md-12 mb-2">
                            <label for="image">{{ __('dashboard.Image') }}</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                id="image" name="image">
                            @if ($doctor->getFirstMediaUrl(\App\Enums\PhotoEnum::IMAGE))
                                <img src="{{ $doctor->getFirstMediaUrl(\App\Enums\PhotoEnum::IMAGE) }}"
                                    alt="doctor image" class="img-thumbnail mt-2" width="100">
                            @endif
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        {{ __('dashboard.Close') }}
                    </button>
                    <button type="submit" class="btn btn-primary">
                        {{ __('dashboard.Update') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
