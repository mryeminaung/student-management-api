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
        $students = Student::paginate(2);
        return response()->json([
            'success' => true,
            'message' => 'Action is OK',
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
    public function show(string $id)
    {
        $student = Student::find($id);
        if ($student) {
            return response()->json([
                'success' => true,
                'message' => 'Retrieved Successfully',
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $studentCard = StudentCard::find($id);

        if ($student && $studentCard) {
            $student->delete();
            $studentCard->delete();

            return response()->json([
                'success' => true,
                'message' => 'Deleted Successfully',
                "data" => $student
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Student is not found.',
            "data" => $student
        ]);
    }
}
