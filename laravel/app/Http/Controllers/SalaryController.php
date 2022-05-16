<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    private $month;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->month = date("m");
        $selected = 0;
        $salaries = Salary::whereRaw('MONTH(date) = '.$this->month)->orderBy('date', 'ASC')->paginate(7);
        return view('ptSalary', compact('salaries', 'selected'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('ptSalary');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'hour' => 'required',
            'wage' => 'required'
        ]);

        $salary = new Salary;
        $salary->date = request('date');
        $salary->hour = request('hour');
        $salary->total = request('hour') * request('wage');
        $salary->save();

        return redirect()->to('/salary');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function edit($salary)
    {
        $salaries = Salary::find((int)$salary);
        return response()->json([
            'status'=>200,
            'salary'=>$salaries,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salary $salary)
    {
        $request->validate([
            'edate' => 'required',
            'ehour' => 'required',
            'ewage' => 'required'
        ]);

        $salary->date = request('edate');
        $salary->hour = request('ehour');
        $salary->total = request('ehour') * request('ewage');
        $salary->save();

        return redirect()->to('/salary')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salary  $salary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary $salary)
    {
        $salary->delete();

        return redirect()->to('/salary');
    }

    public function filter(Request $request)
    {
        // $request->validate([
        //     'fil' => 'required'
        // ]);

        $this->month = $request->select;
        $selected = $this->month;
        $salaries = Salary::whereRaw('MONTH(date) = '.$this->month)->orderBy('date', 'ASC')->paginate(7);
        return view('ptSalary', compact('salaries', 'selected'));
        // return redirect()->route('salaries.index')->with(['salaries'=>$salaries, 'selected'=>$selected]);
        // return redirect()->action(
        //     [SalaryController::class, 'index'], ['salaries' => $salaries, 'selected' => $selected]
        // );
    }
}
