<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service\ServiceRequest;
use App\Services\ServiceService;

class ServiceController extends Controller
{
    public function index()
    {
        $services = ServiceService::index();
        return view('Dashboard.Services.SingleService.index', compact('services'));
    }

    public function create()
    {
        return view('Dashboard.Services.SingleService.add');
    }

    public function store(ServiceRequest $request)
    {
        $service = ServiceService::store($request->validated());
        if (! $service) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
        return redirect()->route('Service.index')->with('success', 'Create Successfully');
    }


    public function update(ServiceRequest $request)
    {
        $data = $request->validated();
        $data['id'] = $request->id;
        $service = ServiceService::update($data);
        if (! $service) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
        return redirect()->route('Service.index')->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        ServiceService::destroy($id);
        return redirect()->route('Service.index')->with('success', 'Deleted Successfully');
    }
}
