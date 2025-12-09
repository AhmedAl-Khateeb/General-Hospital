<?php


namespace App\Services;

use App\Models\Service;

class ServiceService
{
    static function index()
    {
        $search = request('search');
        $query = Service::query();
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name->ar', 'like', "%$search%")
                    ->orWhere('name->en', 'like', "%$search%");
            });
        }
        return $query->latest()->paginate(10);
    }


    static function store(array $data)
    {
        try {
            $service = new Service();
            $service->name        = $data['name'];
            $service->description = $data['description'];
            $service->price       = $data['price'];
            $service->status      = $data['status'];
            $service->save();
            return $service;
        } catch (\Throwable $th) {
            return null;
        }
    }

    static function update(array $data)
    {
        try {
            $service = Service::findOrFail($data['id']);
            $service->name = $data['name'];
            $service->description = $data['description'];
            $service->price  = $data['price'];
            $service->status = $data['status'];
            $service->save();

            return $service;
        } catch (\Throwable $th) {
            return null;
        }
    }

    static function destroy($id)
    {
        return Service::query()->findOrFail($id)->delete();
    }
}
