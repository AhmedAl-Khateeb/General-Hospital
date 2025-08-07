<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Section\SectionRequest;
use App\Models\Section;
use App\Services\SectionService;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

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

    public function store(SectionRequest $request) {}

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $section = Section::findOrFail($id);
        return view('Dashboard.sections.update', compact('section'));
    }

    public function update(SectionRequest $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
