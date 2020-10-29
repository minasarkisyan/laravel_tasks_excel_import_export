<?php

namespace App\Http\Controllers;

use App\Http\Repositories\TaskRepository;
use App\Models\Task;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{

    protected $tasks;


    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $tasks = $this->tasks->forUser($request->user());

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $request->user()->tasks()->create([
            'name' => $request['name'],
            'status' => true
        ]);

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Task $task
     */
    public function show(Task $task)
    {

        return view('tasks.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Task $task
     * @return Application|Factory|View|Response
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Task $task
     * @return RedirectResponse
     */
    public function update(Request $request, Task $task)
    {
        if ($request['name']) {
            $task->name = $request['name'];
            $task->update();

            return redirect()->route('tasks.index')->with('message', 'Task edit');
        }

        if (!$request['status']) {
            $task->statusCompleted();
            $task->update();
            return back()->with('message', 'Status complete');
        }


    }

    /**
     * Remove the specified resource from storage.
     * @param Task $task
     * @return Application|RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('tasks');
    }

}
