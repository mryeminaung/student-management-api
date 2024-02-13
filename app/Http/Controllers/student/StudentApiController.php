<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentCard;
use Illuminate\Http\Request;

class StudentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $student = Student::create($request->validate());
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

        dd($student);
        // dd($studentCard['card_number']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);
        return response()->json($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'student_type_id' => $request->student_type_id
        ]);

        return response()->json($student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $studentCard = StudentCard::find($id);

        $student->delete();
        $studentCard->delete();

        return response()->json($studentCard);
    }
}
