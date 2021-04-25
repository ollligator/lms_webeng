<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SolutionFormRequest;

class SolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Task $task, SolutionFormRequest $request)
    {
        $validated_data = $request->validated();
        $validated_data['student_name'] = Auth::user()->name;
        $validated_data['student_email'] = Auth::user()->email;
        $validated_data['points'] = 0;
        $validated_data['task_id'] = $task->id;
        $validated_data['is_evaluated'] = false;
        $task->solutions()->create($validated_data);
        return redirect()->route('tasks.show', [ 'task' => $task->id ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function show(Solution $solution)
    {
        return view('solutions.show', [
            // 'subjects' => Auth::user()->subjects
            'solution' => $solution
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function edit(Solution $solution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function update(SolutionFormRequest $request, Solution $solution)
    {
        $max_points = $solution->task->points;
        $validated_data = $request->validated();
        $validated_data['student_email'] = Auth::user()->email;
        if(!Auth::user()->is_teacher)
        {
            $validated_data['student_name'] = Auth::user()->name;
            $validated_data['points'] = 0;
            $validated_data['is_evaluated'] = false;
        }
        else{
            $validated_data= $request->validate([
                'points'=>['required','numeric',"between:0,$max_points"],
                ],
            );
        }
        $validated_data['is_evaluated'] = true;
        $validated_data['task_id'] = $solution->task->id;
        $solution->update($validated_data);
        return redirect()->route('tasks.show', [ 'task' =>  $solution->task->id ]);

        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solution  $solution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solution $solution)
    {
        //
    }
}
