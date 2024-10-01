<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use App\Models\AgreementItem;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AgreementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agreements = Agreement::paginate(10);

        return view('agreement.index', compact('agreements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agreement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {       
        // restructure agreement items
        $items = [];
        foreach ($request->item_name as $index => $name) {
            $items[] = [
                'name' => $name,
                'description' => $request->item_description[$index] ?? null,
                'quantity' => $request->item_quantity[$index],
                'cost_price' => $request->item_cost_price[$index],
                'retail_price' => $request->item_retail_price[$index],
            ];
        }

        $request->merge(['items' => $items]);

        $data = $request->validate([
            'customer_forename' => 'required|string|max:255',
            'customer_surname' => 'required|string|max:255',
            'customer_date_of_birth' => 'required|date',
            'items' => 'array',
            'items.*.name' => 'required|string|max:255',
            'items.*.description' => 'nullable|string|max:255',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.cost_price' => 'required|numeric|min:0',
            'items.*.retail_price' => 'required|numeric|min:0',
        ]);

        
        // atomic transaction, for data integrity in high-concurrency environment
        DB::transaction(function () use ($request) {
            $agreement = Agreement::create([
                'created_by' => Auth::id(),
                'customer_forename' => $request->customer_forename,
                'customer_surname' => $request->customer_surname,
                'customer_date_of_birth' => $request->customer_date_of_birth,
            ]);

            foreach ($request->items as $item) {
                AgreementItem::create([
                    'agreement_id' => $agreement->id,
                    'name' => $item['name'],
                    'description' => $item['description'],
                    'quantity' => $item['quantity'],
                    'cost_price' => $item['cost_price'],
                    'retail_price' => $item['retail_price'],
                ]);
            }
        });

        return redirect()->route('agreement.index')->with('success', 'Agreement created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // get the agreeement
        $agreement = Agreement::with(['agreementItems', 'user'])->findOrFail($id);

        return view('agreement.show', compact('agreement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $agreement = Agreement::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $agreement->delete();

        return redirect()->route('agreement.index')->with('success', 'Agreement deleted successfully.');

    }
}
