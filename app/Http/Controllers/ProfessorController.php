<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index(): View
    {
        $students = User::where('role', 'student')->latest()->simplePaginate(12);
        return view('professor.index', compact('students'));

    }

    public function show($id , Request $request):view
    {
        $query = Activity::where('user_id', $id)->latest();


// Apply the 'type' filter if it's provided
        if($type = $request->input('type')){
            $query->where('type', $type);
        }


// Apply the 'search' filter if it's provided
        if ($search = $request->input('search')) {
            $query->where(function ($query) use ($search) {
                $query->where('type', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }
        // Apply the 'date' filter if it's provided
        if ($date = $request->input('date')) {
            // Check the length of the date string to determine the format
            $query->where(function ($query) use ($date) {
                if (strlen($date) === 4) {
                    // Year only
                    $query->whereYear('created_at', $date);
                } elseif (strlen($date) === 7) {
                    // Year and month
                    [$year, $month] = explode('-', $date);
                    $query->whereYear('created_at', $year)
                        ->whereMonth('created_at', $month);
                } elseif (strlen($date) === 10) {
                    // Year, month, and day
                    $query->whereDate('created_at', $date);
                }
            });
        }


// Paginate the results
        $activities = $query->simplePaginate(12);

        return view('professor.student-dashboard',compact('activities'));




    }

    public function showActivities( Request $request)
    {
        $query = Activity::latest();

// Apply the 'type' filter if it's provided
        if ($type = $request->input('type')) {
            $query->where('type', $type);
        }

// Apply the 'search' filter if it's provided
        if ($search = $request->input('search')) {
            $query->where(function ($query) use ($search) {
                $query->where('type', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

// Apply the 'date' filter if it's provided
        if ($date = $request->input('date')) {
            // Check the length of the date string to determine the format
            $query->where(function ($query) use ($date) {
                if (strlen($date) === 4) {
                    // Year only
                    $query->whereYear('created_at', $date);
                } elseif (strlen($date) === 7) {
                    // Year and month
                    [$year, $month] = explode('-', $date);
                    $query->whereYear('created_at', $year)
                        ->whereMonth('created_at', $month);
                } elseif (strlen($date) === 10) {
                    // Year, month, and day
                    $query->whereDate('created_at', $date);
                }
            });
        }

// Paginate the results
        $activities = $query->simplePaginate();

        return view('professor.student-dashboard', compact('activities'));
    }
}
