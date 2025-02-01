<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\City;
use App\Models\Representative;
use App\Models\State;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students.index', [
            'students' => Student::with(['birthdateCity', 'birthdateCity.state'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create', [
            'states' => State::with('cities')->get(),
            'representatives' => Representative::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $validated = $request->validated();
        preg_match('/^(?<cityId>\d+) - (?<cityName>.+)$/', $validated['birthplace_city_id'], $matches);

        $state = State::find($validated['birthplace_state_id']);
        $city = City::query()->find($matches['cityId'] ?? null);
        assert($state instanceof State);
        assert($city instanceof City || is_null($city));

        if (!$city) {
            $city = $state->cities()->create([
                'name' => $validated['birthplace_city_id'],
                'user_id' => auth()->id()
            ]);

            assert($city instanceof City);
        }

        $validated['birthplace_city_id'] = $city->id;

        Student::create($validated + ['user_id' => auth()->id()]);

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show', [
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit', [
            'student' => $student,
            'states' => State::with('cities')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $validated = $request->validated();
        preg_match('/^(?<cityId>\d+) - (?<cityName>.+)$/', $validated['birthplace_city_id'], $matches);

        $state = State::find($validated['birthplace_state_id']);
        $city = City::query()->find($matches['cityId'] ?? null);
        assert($state instanceof State);
        assert($city instanceof City || is_null($city));

        if (!$city) {
            $city = $state->cities()->create([
                'name' => $validated['birthplace_city_id'],
                'user_id' => auth()->id()
            ]);

            assert($city instanceof City);
        }

        $validated['birthplace_city_id'] = $city->id;
        $student->update($validated);

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index');
    }
}
