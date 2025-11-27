<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Section\SectionRequest;
use App\Models\Appointment;
use App\Models\Section;
use App\Services\SectionService;
use App\Traits\HttpResponse;

class SectionController extends Controller
{
    use HttpResponse;

    public function __construct(private readonly SectionService $sectionService) {}

    public function index()
    {
        $sections = $this->sectionService->index();
        return view('Dashboard.sections.index', compact('sections'));
    }

    public function create()
    {
        return view('Dashboard.sections.create');
    }

    public function store(SectionRequest $request)
    {
        $this->sectionService->store($request->validated());
        return redirect()->route('section.index')->with('success',  __('dashboard.Section created successfully'));
    }

    public function show($id)
    {
        $section = $this->sectionService->show($id);
        $doctors = $section->doctors;
        $appointments = Appointment::all();
        $sections = Section::all();
        return view('Dashboard.sections.show', compact('section', 'doctors', 'appointments', 'sections'));
    }


    public function edit(string $id)
    {
        $section = Section::findOrFail($id);
        return view('Dashboard.sections.update', compact('section'));
    }

    public function update(SectionRequest $request, string $id)
    {
        $this->sectionService->update($request->validated(), $id);
        return redirect()->route('section.index')->with('success',  __('dashboard.Section updated successfully'));
    }

    public function destroy(string $id)
    {
        $this->sectionService->destroy($id);
        return redirect()->route('section.index')
            ->with('success', __('dashboard.Section deleted successfully'));
    }
}
