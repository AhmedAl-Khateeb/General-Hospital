<?php

namespace App\Services;

use App\Models\Section;

class SectionService
{
    public function index()
    {
        $search = request('search');
        $query = Section::query();
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name->ar', 'like', '%' . $search . '%')
                    ->orWhere('name->en', 'like', '%' . $search . '%');
            });
        }
        return $query->latest()->paginate(10);
    }

    public function store(array $data)
    {
        Section::query()->create($data);
    }

    public function update(array $data, $id)
    {
        Section::query()->findOrFail($id)->update($data);
    }

    public function destroy($id)
    {
        Section::query()->findOrFail($id)->delete();
    }
}
