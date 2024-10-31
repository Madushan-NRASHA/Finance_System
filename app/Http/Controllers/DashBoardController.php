<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function Dashboard()
    {
        $userCount = Customer::count();
        $tasks = Task::all();
//        $paidCustomers = Customer::where('payment_status', 'paid')->count();
//        $delayedCustomers = Customer::where('status', 'delayed')->count();
//        $closedCustomers = Customer::where('status', 'closed')->count();

        return view('admin.dashboard', [
            'userCount' => $userCount,
            'tasks' => $tasks,
//            'paidCustomers' => $paidCustomers,
//            'delayedCustomers' => $delayedCustomers,
//            'closedCustomers' => $closedCustomers
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'task' => 'required|max:100|min:5',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Task::create([
            'task' => $request->task,
            'iscompleted' => false
        ]);

        return redirect()->route('dashboard.index')
            ->with('success', 'Task created successfully');
    }

    public function markCompleted($id)
    {
        $task = Task::findOrFail($id);
        $task->iscompleted = !$task->iscompleted;
        $task->save();

        return redirect()->route('dashboard.index')
            ->with('success', 'Task status updated successfully');
    }

    public function delete($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('dashboard.index')
            ->with('success', 'Task deleted successfully');
    }

    public function updateView($id)
    {
        $task = Task::findOrFail($id);
//        return view('admin.updatetview', compact('task',$task));
        return view('admin.updatetview')->with('taskdata', $task);


    }

//    public function update(Request $request, $id)
//    {
//        $validator = Validator::make($request->all(), [
//            'task' => 'required|max:100|min:5',
//        ]);
//
//        if ($validator->fails()) {
//            return redirect()->back()
//                ->withErrors($validator)
//                ->withInput();
//        }
//
//        $task = Task::findOrFail($id);
//        $task->task = $request->task;
//        $task->save();
//
//        return redirect()->route('dashboard.index')
//            ->with('success', 'Task updated successfully');
//
//    }
    public function updatetasks(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'task-name' => 'required|max:100|min:5',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $id = $request->id;

        $taskName = $request->input('task-name'); // Get the task name from the request

        $data = Task::findOrFail($id);

        // Update the task name
        $data->task = $taskName; // Assuming 'task' is the field name in your Task model

        // Save the updated task
        $data->save();

        // Retrieve all tasks after updating
        $tasks = Task::all();

        // Return the view with the updated tasks data
        return view('dashboard.index', ['tasks' => $tasks]);
    }
}
