<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Agreement;
use App\Models\AgreementItem;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // get date range
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $orderBy = $request->input('order_by', 'agreements_count');
    
        // filter and order the staff
        $staffs = $this->getFilteredAndOrderedStaffs($startDate, $endDate, $orderBy);

        // calculate total agreements for the month, total profit accross all staff
        $overallMetrics = $this->calculateOverallMetrics($staffs);
    
        return view('report.index', compact('staffs', 'overallMetrics'));
    }
    
    private function getFilteredAndOrderedStaffs($startDate, $endDate, $orderBy)
    {
        // get all users with the required metrics
        $staffs = User::withCount(['agreements' => function ($query) use ($startDate, $endDate) {
            $this->applyDateRangeFilter($query, $startDate, $endDate);
        }])
        ->with(['agreements' => function ($query) use ($startDate, $endDate) {
            $this->applyDateRangeFilter($query, $startDate, $endDate);
        }])
        ->get()
        ->map(function ($user) {
            return $this->calculateMetrics($user);
        });
    
        // order the results based on selected metric
        return $staffs->sortByDesc($orderBy);
    }
    
    private function applyDateRangeFilter($query, $startDate, $endDate)
    {
        if ($startDate) {
            $query->where('created_at', '>=', $startDate);
        }
        if ($endDate) {
            $query->where('created_at', '<=', $endDate);
        }
    }
    
    // calculate total agreements, items purchased, total cost price, average cost price and max cost price
    private function calculateMetrics($user)
    {
        $user->items_purchased_count = $user->agreements->sum(function ($agreement) {
            return $agreement->agreementItems->count();
        });
        $user->total_cost_price = $user->agreements->sum(function ($agreement) {
            return $agreement->agreementItems->sum('cost_price');
        });
        $user->average_cost_price = round($user->agreements->flatMap(function ($agreement) {
            return $agreement->agreementItems;
        })->avg('cost_price'), 2);
        $user->max_cost_price = $user->agreements->flatMap(function ($agreement) {
            return $agreement->agreementItems;
        })->max('cost_price');
        return $user;
    }

    // calculate total agreements for the month, total profit accross all staff
    private function calculateOverallMetrics($staffs)
    {
        $totalAgreements = $staffs->sum('agreements_count');

        // calculate gross profit
        $totalCostPrice = $staffs->sum('total_cost_price');
        $totalRetailPrice = $staffs->sum(function ($staff) {
            return $staff->agreements->sum(function ($agreement) {
                return $agreement->agreementItems->sum('retail_price');
            });
        });
        $grossProfit = $totalRetailPrice - $totalCostPrice;

        return compact('totalAgreements', 'grossProfit');
    }
}
