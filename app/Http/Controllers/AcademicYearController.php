<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;

use App\Http\Requests\AcademicYearRequest;
use App\Http\Resources\AcademicYearResource;

class AcademicYearController extends Controller
{
    public function index()
    {
        $academicYears = AcademicYear::all();
        return AcademicYearResource::collection($academicYears);
    }

    public function store(AcademicYearRequest $request)
    {
        $data = $request->validated();

        $academicYear = AcademicYear::create($data);
        return new AcademicYearResource($academicYear);
    }

    public function show(AcademicYear $academicYear)
    {
        return new AcademicYearResource($academicYear);
    }

    public function update(AcademicYearRequest $request, AcademicYear $academicYear)
    {
        $data = $request->validated();

        $academicYear->update($data);
        return new AcademicYearResource($academicYear);
    }

    public function destroy(AcademicYear $academicYear)
    {
        $academicYear->delete();
        return response()->json(null, 204);
    }
}
