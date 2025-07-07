<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Get filter parameters
        $quarter = $request->get('quarter');
        $year = $request->get('year', date('Y'));
        
        // Build base query with year filter
        $baseQuery = Contract::whereYear('created_at', $year);
        
        // Apply quarter filter if selected
        if ($quarter) {
            $baseQuery = $this->applyQuarterFilter($baseQuery, $quarter);
        }
        
        // Succeeded: kontrak Paid dan tanggal bayar <= jatuh tempo
        $succeeded = (clone $baseQuery)->where('paid_status', 'Paid')
            ->whereColumn('updated_at', '<=', 'end_date')
            ->count();

        // Failed: kontrak Unpaid dan sudah lewat jatuh tempo
        $failed = (clone $baseQuery)->where(function($q) {
                $q->where('paid_status', 'Unpaid')
                  ->where('end_date', '<', Carbon::now());
            })
            ->count();

        // Upcoming: kontrak Unpaid dan jatuh tempo di masa depan
        $upcoming = (clone $baseQuery)->where('paid_status', 'Unpaid')
            ->where('end_date', '>=', Carbon::now())
            ->count();

        // User count (tidak terpengaruh filter)
        $users = User::count();

        // Data untuk chart
        $chartData = $this->getChartData($quarter, $year);
        
        return view('index', compact('succeeded', 'failed', 'upcoming', 'users', 'chartData', 'quarter', 'year'));
    }

    private function applyQuarterFilter($query, $quarter)
    {
        switch ($quarter) {
            case 'Q1':
                return $query->whereMonth('created_at', '>=', 1)
                           ->whereMonth('created_at', '<=', 3);
            case 'Q2':
                return $query->whereMonth('created_at', '>=', 4)
                           ->whereMonth('created_at', '<=', 6);
            case 'Q3':
                return $query->whereMonth('created_at', '>=', 7)
                           ->whereMonth('created_at', '<=', 9);
            case 'Q4':
                return $query->whereMonth('created_at', '>=', 10)
                           ->whereMonth('created_at', '<=', 12);
            default:
                return $query;
        }
    }

    private function getChartData($quarter, $year)
    {
        $data = [];
        
        if ($quarter) {
            // Data per bulan dalam quarter
            $months = $this->getMonthsInQuarter($quarter);
            
            foreach ($months as $month) {
                $monthData = $this->getMonthlyData($month, $year);
                $data[] = [
                    'month' => Carbon::createFromDate($year, $month, 1)->format('M'),
                    'succeeded' => $monthData['succeeded'],
                    'upcoming' => $monthData['upcoming'],
                    'failed' => $monthData['failed']
                ];
            }
        } else {
            // Data per quarter untuk tahun penuh
            for ($q = 1; $q <= 4; $q++) {
                $quarterData = $this->getQuarterlyData($q, $year);
                $data[] = [
                    'quarter' => "Q$q",
                    'succeeded' => $quarterData['succeeded'],
                    'upcoming' => $quarterData['upcoming'],
                    'failed' => $quarterData['failed']
                ];
            }
        }
        
        return $data;
    }

    private function getMonthsInQuarter($quarter)
    {
        switch ($quarter) {
            case 'Q1': return [1, 2, 3];
            case 'Q2': return [4, 5, 6];
            case 'Q3': return [7, 8, 9];
            case 'Q4': return [10, 11, 12];
            default: return [];
        }
    }

    private function getMonthlyData($month, $year)
    {
        $succeeded = Contract::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->where('paid_status', 'Paid')
            ->whereColumn('updated_at', '<=', 'end_date')
            ->count();

        $failed = Contract::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->where(function($q) {
                $q->where('paid_status', 'Unpaid')
                  ->where('end_date', '<', Carbon::now());
            })
            ->count();

        $upcoming = Contract::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->where('paid_status', 'Unpaid')
            ->where('end_date', '>=', Carbon::now())
            ->count();

        return compact('succeeded', 'failed', 'upcoming');
    }

    private function getQuarterlyData($quarter, $year)
    {
        $months = $this->getMonthsInQuarter("Q$quarter");
        
        $succeeded = Contract::whereYear('created_at', $year)
            ->whereIn(\DB::raw('MONTH(created_at)'), $months)
            ->where('paid_status', 'Paid')
            ->whereColumn('updated_at', '<=', 'end_date')
            ->count();

        $failed = Contract::whereYear('created_at', $year)
            ->whereIn(\DB::raw('MONTH(created_at)'), $months)
            ->where(function($q) {
                $q->where('paid_status', 'Unpaid')
                  ->where('end_date', '<', Carbon::now());
            })
            ->count();

        $upcoming = Contract::whereYear('created_at', $year)
            ->whereIn(\DB::raw('MONTH(created_at)'), $months)
            ->where('paid_status', 'Unpaid')
            ->where('end_date', '>=', Carbon::now())
            ->count();

        return compact('succeeded', 'failed', 'upcoming');
    }

    // Method untuk AJAX request
    public function getFilteredData(Request $request)
    {
        $quarter = $request->get('quarter');
        $year = $request->get('year', date('Y'));
        
        $chartData = $this->getChartData($quarter, $year);
        
        return response()->json([
            'chartData' => $chartData,
            'success' => true
        ]);
    }
}