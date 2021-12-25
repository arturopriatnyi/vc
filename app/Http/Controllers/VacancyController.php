<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::all();

        return view('vacancies.index', compact('vacancies'));
    }

    public function create()
    {
        return view('vacancies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'company_name' => 'required',
            'description' => 'required',
            'salary_min' => 'integer',
            'salary_max' => 'integer',
        ]);

        Vacancy::create($request->all());

        return redirect()->route('vacancies.index')->with('success', 'Vacancy created successfully.');
    }

    public function show(Vacancy $vacancy)
    {
        return view('vacancies.show', compact('vacancy'));
    }

    public function edit(Vacancy $vacancy)
    {
        return view('vacancies.edit',compact('vacancy'));
    }

    public function update(Request $request, Vacancy $vacancy)
    {
        $request->validate([
            'title' => 'required',
            'company_name' => 'required',
            'description' => 'required',
            'salary_min' => 'integer',
            'salary_max' => 'integer',
        ]);

        $vacancy->update($request->all());

        return redirect()->route('vacancies.index')->with('success', 'Vacancy updated successfully');
    }

    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();

        return redirect()->route('vacancies.index')->with('success', 'Vacancy deleted successfully');
    }
}
