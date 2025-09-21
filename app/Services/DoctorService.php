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
        $query = Doctor::query();
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name->ar', 'like', '%' . $search . '%')
                    ->orWhere('name->en', 'like', '%' . $search . '%');
            });
        }
        return $query->latest()->paginate(10);
    }

    public function destroy($id)
    {
        Doctor::query()->findOrFail($id)->delete();
    }

    // DoctorService
    public function store(DoctorRequest $request)
    {
        $data = $request->validated();

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $doctor = Doctor::create($data);

        if ($request->hasFile('image')) {
            MediaHelper::uploadMedia($doctor, $request->file('image'), PhotoEnum::IMAGE);
        }

        return $doctor;
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
        });
    }
}
