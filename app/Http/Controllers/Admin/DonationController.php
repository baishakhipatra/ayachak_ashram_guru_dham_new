<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    public function index(Request $request)
    {
        $donations = Donation::query();

        if ($request->filled('from_date')) {
            $donations->whereDate('created_at', '>=', $request->from_date);
        }

        if ($request->filled('to_date')) {
            $donations->whereDate('created_at', '<=', $request->to_date);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $donations->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('phone_number', 'like', "%$search%")
                ->orWhere('address', 'like', "%$search%");
            });
        }

        if ($request->filled('amount_range')) {
            switch ($request->amount_range) {
                case '0-100':
                    $donations->whereBetween('amount', [0, 100]);
                    break;
                case '100-500':
                    $donations->whereBetween('amount', [100, 500]);
                    break;
                case '500-1000':
                    $donations->whereBetween('amount', [500, 1000]);
                    break;
                case '1000-5000':
                    $donations->whereBetween('amount', [1000, 5000]);
                    break;
                case '5000+':
                    $donations->where('amount', '>', 5000);
                    break;
            }
        }

        $donations = $donations->latest()->paginate(20);

        return view('admin.donations.index', compact('donations'));
    }

    public function create(){
        return view('admin.donations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name'    => 'required|string|max:255',
            'email'        => 'required|email|max:255|unique:donations,email',
            'phone_number' => 'required|digits:10',
            'pan_number'   => 'nullable|string|max:20',
            'address'      => 'required|string|max:500',
            'city_village' => 'required|string|max:255',
            'district'     => 'required|string|max:255',
            'state'        => 'required|string|max:255',
            'zipcode'      => 'required|string|max:20',
            'amount'       => 'required|numeric|min:1',
        ]);

        $validated['country'] = 'India';

        Donation::create($validated);

        return redirect()->route('admin.donations.index')->with('success', 'Donation submitted successfully!');
    }

}
