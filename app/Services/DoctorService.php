<?php

namespace App\Services;

use App\Enums\PhotoEnum;
use App\Helpers\MediaHelper;
use App\Http\Requests\Doctor\DoctorRequest;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorService
{
    public function index()
    {
        $search = request('search');
        $query = Doctor::query()->with('section', 'appointments');
        if ($search) {
            $query->where(function ($q) use ($search) {

                $q->where('name->ar', 'like', "%$search%")
                    ->orWhere('name->en', 'like', "%$search%")

                    ->orWhereHas('section', function ($sec) use ($search) {
                        $sec->where('name->ar', 'like', "%$search%")
                            ->orWhere('name->en', 'like', "%$search%");
                    });
            });
        }
        return $query->latest()->paginate(10);
    }

    public function destroy(Request $request, $id = null)
    {
        if ($request->page_id == 1) {
            $doctor = Doctor::find($id);
            if ($doctor) {
                $doctor->clearMediaCollection(PhotoEnum::IMAGE);
                $doctor->delete();
            }
        } else {

            if (!empty($request->ids)) {
                $ids = is_array($request->ids) ? $request->ids : explode(',', $request->ids);
                $doctors = Doctor::whereIn('id', $ids)->get();

                foreach ($doctors as $doctor) {
                    $doctor->clearMediaCollection(PhotoEnum::IMAGE);
                    $doctor->delete();
                }
            }
        }
    }



    // DoctorService

    public function store(DoctorRequest $request)
    {
        DB::transaction(function () use ($request) {
            $data = $request->validated();
            if (isset($data['password']) && $data['password']) {
                $data['password'] = bcrypt($data['password']);
            }
            $doctor = Doctor::query()->create($data);
            if (isset($data['appointment_ids'])) {
                $doctor->appointments()->attach($data['appointment_ids']);
            }
            if ($request->hasFile('image')) {
                MediaHelper::uploadMedia($doctor, $request->file('image'), PhotoEnum::IMAGE);
            }
        });
    }



    public function update(array $data, $id)
    {
        DB::transaction(function () use ($data, $id) {
            $doctor = Doctor::query()->findOrFail($id);
            if (isset($data['password']) && $data['password']) {
                $data['password'] = bcrypt($data['password']);
            } else {
                unset($data['password']);
            }
            $doctor->update($data);
            if (isset($data['image']) && $data['image']) {
                MediaHelper::uploadMedia($doctor, $data['image'], PhotoEnum::IMAGE);
            }
            $doctor->appointments()->sync($data['appointment_ids'] ?? []);
        });
    }
}
