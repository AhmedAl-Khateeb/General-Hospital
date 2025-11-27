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
                                    <img src="{{ asset('Dashboard/img/download.jfif') }}" alt="no image"
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

                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <!-- Email -->
                                        <tr>
                                            <th>{{ __('dashboard.Email') }}</th>
                                            <td>{{ $doctor->email }}</td>
                                        </tr>

                                        <!-- Phone -->
                                        <tr>
                                            <th>{{ __('dashboard.Phone') }}</th>
                                            <td>{{ $doctor->phone }}</td>
                                        </tr>

                                        <!-- Appointments -->
                                        <tr>
                                            <th>{{ __('dashboard.Appointments') }}</th>
                                            <td>
                                                @if ($doctor->appointments && $doctor->appointments->count())
                                                    <table class="table table-sm table-hover mb-0">
                                                        <tbody>
                                                            @foreach ($doctor->appointments as $index => $appointment)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $appointment->getTranslation('name', app()->getLocale()) }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                @else
                                                    <span
                                                        class="text-muted">{{ __('dashboard.No Appointments') }}</span>
                                                @endif
                                            </td>
                                        </tr>

                                        <!-- Section -->
                                        <tr>
                                            <th>{{ __('dashboard.Section') }}</th>
                                            <td>{{ $doctor->section?->getTranslation('name', app()->getLocale()) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('dashboard.Status') }}</th>
                                    <td>
                                        <form action="{{ route('doctor.changeStatus', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-select form-select-sm text-center"
                                                style="color: {{ $item->status ? 'green' : 'red' }}"
                                                onchange="this.style.color = (this.value == 1 ? 'green' : 'red'); this.form.submit();">
                                                <option disabled>{{ __('dashboard.Change Status') }}</option>
                                                <option value="1" {{ $item->status ? 'selected' : '' }}>مفعل</option>
                                                <option value="0" {{ !$item->status ? 'selected' : '' }}>غير مفعل
                                                </option>
                                            </select>
                                        </form>
                                    </td>

                                        </tr>
                                    </tbody>
                                </table>

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
