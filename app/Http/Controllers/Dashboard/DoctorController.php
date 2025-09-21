<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Doctor\DoctorRequest;
use App\Models\Doctor;
use App\Models\Section;
use App\Services\DoctorService;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function __construct(private readonly DoctorService $doctorService) {}

    public function index()
    {
        $doctors = $this->doctorService->index();
        $sections = Section::all();
        return view('Dashboard.doctors.index', compact('doctors', 'sections'));
    }


    public function create()
    {
        $sections = Section::all();
        return view('Dashboard.doctors.create', compact('sections'));
    }


    public function store(DoctorRequest $request)
    {
        $this->doctorService->store($request);
        return redirect()->route('doctor.index')->with('success', 'Create Successfully');
    }


    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('Dashboard.doctors.showDetails', compact('doctor'));
    }


    public function edit($id)
    {
        $sections = Section::all();
        $doctor = Doctor::findOrFail($id);
        return view('Dashboard.doctors.update', compact('doctor', 'sections'));
    }


    public function update(DoctorRequest $request,  $id)
    {
        $this->doctorService->update($request->validated(), $id);
        return redirect()->route('doctor.index')->with('success', 'Update Successfully');
    }


    public function destroy(string $id)
    {
        $this->doctorService->destroy($id);
        return redirect()->route('doctor.index')->with('success', 'Delete Successfully');
    }


    public function changeStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:0,1'
        ]);
        Doctor::where('id', $id)->update(['status' => $request->status]);
        return back()->with('edit', 'تم تحديث الحالة بنجاح');
    }
}
