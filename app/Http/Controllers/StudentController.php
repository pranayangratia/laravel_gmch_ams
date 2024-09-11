<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class StudentController extends Controller
{
    public function dashboard(Request $request): View|Factory|Application
    {

        $query = Activity::with('user')->where('user_id', Auth::user()->id)->latest();


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
        $activities = $query->simplePaginate(12);


        return view('student.dashboard', compact('activities'));


        //
    }

    public function show()
    {
        return view('student.add-activity');

    }

    public function create(Request $request): Application|Redirector|RedirectResponse

    {
//       dd($request->all());

        $validType = [
            'lecture',
            'seminar',
            'group_discussion',
            'presentation',
            'research_work',
            'grand_round',
            'graded_responsibility',
            'elog_book'
        ];

// Validate incoming request data
        $validatedData = $request->validate([
            'description' => 'required',
            'type' => ['required', 'in:' . implode(',', $validType)],
            'user_id' => 'required|exists:users,id', // Ensure user_id exists in the users table
            'attachment' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
        ]);

// Handle file attachment if present
        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('attachments', 'public');
        }

// Create a new activity record
        Activity::create([
            'type' => $validatedData['type'],
            'description' => $validatedData['description'],
            'user_id' => $validatedData['user_id'],
            'attachment_path' => $attachmentPath,
        ]);


// Redirect to the student dashboard route
        return redirect()->route('student.dashboard');


    }
    public function attachmentDownload($id): StreamedResponse
    {
        // Find the activity by ID
        $activity = Activity::findOrFail($id);

        // Get the attachment path
        $attachmentPath = $activity->attachment_path;

        // Ensure the file exists
        if (!$attachmentPath || !Storage::disk('public')->exists($attachmentPath)) {
            abort(404, 'File not found');
        }

        // Return the file as a download response
        return Storage::disk('public')->download($attachmentPath);
    }
}
