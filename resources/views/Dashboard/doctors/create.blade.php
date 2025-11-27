<style>
    .form-check-label {
        margin-right: 20px;
    }
</style>

<div class="modal fade" id="createDoctorModal" tabindex="-1" aria-labelledby="createModalLabel-" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h1 class="modal-title fs-5" id="createModalLabel-">
                    {{ __('dashboard.Create Doctor') }}
                </h1>
            </div>

            <form action="{{ route('doctor.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">
                    @if ($errors->any())
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                var createModal = new bootstrap.Modal(document.getElementById('createDoctorModal'));
                                createModal.show();
                            });
                        </script>
                    @endif

                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6 mb-2">
                            <label for="name_ar">{{ __('dashboard.Name') }} (AR)</label>
                            <input type="text" autofocus class="form-control  @error('name.ar') is-invalid @enderror"
                                id="name_ar" name="name[ar]" required>
                            @error('name.ar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="name_en">{{ __('dashboard.Name') }} (EN)</label>
                            <input type="text" autofocus class="form-control @error('name.en') is-invalid @enderror"
                                id="name_en" name="name[en]" required>
                            @error('name.en')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="col-md-12 mb-2">
                            <label>{{ __('dashboard.Appointments') }}</label>

                            <div class="border rounded p-2">

                                <button class="btn btn-outline-primary w-100" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#appointmentCollapse">
                                    {{ __('dashboard.Choose Appointment') }}
                                </button>

                                <div class="collapse mt-2" id="appointmentCollapse">
                                    @foreach ($appointments as $appointment)
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" type="checkbox" name="appointment_ids[]"
                                                id="appointment_{{ $appointment->id }}" value="{{ $appointment->id }}">
                                            <label class="form-check-label ms-2"
                                                for="appointment_{{ $appointment->id }}">
                                                {{ $appointment->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                            </div>

                            @error('appointment_ids')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>



                        <!-- Email & Phone -->
                        <div class="col-md-6 mb-2">
                            <label for="email">{{ __('dashboard.Email') }}</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="phone">{{ __('dashboard.Phone') }}</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                id="phone" name="phone" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Price & Password -->
                        {{-- <div class="col-md-6 mb-2">
                            <label for="price">{{ __('dashboard.Examination Price') }}</label>
                            <input type="number" class="form-control @error('examination_price') is-invalid @enderror"
                                id="price" name="examination_price" required>
                            @error('examination_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> --}}

                        {{-- Section --}}
                        <div class="col-md-12 mb-2">
                            <label for="section_id">{{ __('dashboard.Section') }}</label>
                            <select name="section_id" id="section_id"
                                class="form-control @error('section_id') is-invalid @enderror" required>
                                <option value="">{{ __('dashboard.Choose Section') }}</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">
                                        {{ $section->getTranslation('name', app()->getLocale()) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('section_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-2">
                            <label for="password">{{ __('dashboard.Password') }}</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password">
                            <small
                                class="text-muted">{{ __('dashboard.Leave blank if you don’t want to change') }}</small>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div class="col-md-12 mb-2">
                            <label for="image">{{ __('dashboard.Image') }}</label>
                            <input type="file" accept="image/*"
                                class="form-control accept-image @error('image') is-invalid @enderror" id="image"
                                name="image">
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
                        {{ __('dashboard.Create') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('Dashboard/js/select2.js') }}"></script>
<script src="{{ asset('Dashboard/js/advanced-form-elements.js') }}"></script>
<script src="{{ asset('Dashboard/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
<script src="{{ asset('Dashboard/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ asset('Dashboard/plugins/notify/js/notifit-custom.js') }}"></script>
