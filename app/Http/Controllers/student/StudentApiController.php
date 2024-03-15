<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentCard;
use App\Models\StudentType;
use Illuminate\Http\Request;

class StudentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => "Resource created successfully.",
            "data" => Student::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $isValid = StudentType::findOrFail($request->student_type_id);

        if ($isValid) {

            $studentCard = StudentCard::create([
                'card_number' => fake()->uuid()
            ]);

            $student = Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'date_of_birth' => $request->date_of_birth,
                'student_type_id' => $request->student_type_id,
                'student_card_id' => $studentCard->id
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Resource created successfully.',
                "data" => $student
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Failed to create resource. Please check your input and try again.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        if ($student) {
            return response()->json([
                'success' => true,
                'message' => "Resource retrieved successfully.",
                "data" => $student
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Failed to retrieve resource. Please try again later..',
            "data" => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $isValid = StudentType::findOrFail($request->student_type_id);

        if ($isValid) {
            return response()->json([
                'error' => true,
                'message' => 'Failed to update resource. Please ensure the data is valid and try again.',
            ]);
        }

        if ($student) {
            $student->update([
                'name' => $request->name,
                'email' => $request->email,
                'date_of_birth' => $request->date_of_birth,
                'student_type_id' => $request->student_type_id
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Resource updated successfully.',
                "data" => $student
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Failed to update resource. Please ensure the data is valid and try again.',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        if ($student) {
            $student->card->delete();
            $student->delete();

            return response()->json([
                'success' => true,
                'message' => 'Resource deleted successfully.',
                "data" => $student
            ]);
        }
        return response()->json([
            'error' => true,
            'message' => 'Failed to delete resource. Please try again later.',
        ]);
    }
}
