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
        $students = Student::all();

        return response()->json([
            'success' => true,
            'message' => 'Retrieved',
            "data" => $students
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $student = Student::create($request->validate());
        $student = StudentType::find($request->student_type_id);

        if ($student) {

            $studentCard = StudentCard::create([
                'card_number' => fake()->uuid()
            ]);

            $student = Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'date_of_birth' => $request->date_of_birth,
                'student_type_id' => $request->student_type_id,
                'student_card_id' => $studentCard->student_card_id
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Created Successfully',
                "data" => $student
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Student type is invalid type',
            "data" => $student
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
                'message' => 'Retrieved Successfully',
                "data" => $student
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Student is not found.',
            "data" => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $studentType = StudentType::find($request->student_type_id);

        if (!$studentType) {
            return response()->json([
                'success' => false,
                'message' => 'Student type id is invalid type',
                'data' => $studentType,
            ]);
        } else {
            if ($student) {
                $student->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'date_of_birth' => $request->date_of_birth,
                    'student_type_id' => $request->student_type_id
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Updated Successfully',
                    "data" => $student
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Student is not found.',
                    "data" => $student
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        // $student->delete();
        // $student->card->delete();
        dd($student->type);
        return response()->json([
            'success' => true,
            'message' => 'Deleted Successfully',
            "data" => $student
        ]);
    }
}
