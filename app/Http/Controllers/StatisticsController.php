<?php

namespace App\Http\Controllers;

use App\Models\Organizations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function organizationsStatistics(Request $request)
    {
        // Валидация входных параметров
        $validated = $request->validate([
            'date_from' => 'nullable|date',
            'date_to' => 'nullable|date',
            'organizations' => 'nullable|array',
            'organizations.*' => 'integer|exists:organizations,id'
        ]);

        $dateFrom = $validated['date_from'] ?? null;
        $dateTo = $validated['date_to'] ?? null;
        $organizationIds = $validated['organizations'] ?? [];

        // Основной запрос с агрегацией данных
        $statistics = Organizations::select([
            'organizations.id',
            'organizations.name',
            DB::raw('COALESCE(SUM(CASE WHEN operations.seller_id = organizations.id THEN operations.amount ELSE 0 END), 0) as total_sales'),
            DB::raw('COUNT(CASE WHEN operations.seller_id = organizations.id THEN 1 END) as sales_count'),
            DB::raw('COALESCE(SUM(CASE WHEN operations.buyer_id = organizations.id THEN operations.amount ELSE 0 END), 0) as total_purchases'),
            DB::raw('COUNT(CASE WHEN operations.buyer_id = organizations.id THEN 1 END) as purchases_count'),
            DB::raw('(COALESCE(SUM(CASE WHEN operations.seller_id = organizations.id THEN operations.amount ELSE 0 END), 0) -
                  COALESCE(SUM(CASE WHEN operations.buyer_id = organizations.id THEN operations.amount ELSE 0 END), 0)) as balance')
        ])
        ->leftJoin('operations', function ($join) use ($dateFrom, $dateTo) {
            $join->on('organizations.id', '=', 'operations.seller_id')
                 ->orOn('organizations.id', '=', 'operations.buyer_id');

            if ($dateFrom) {
                $join->where('operations.operated_at', '>=', $dateFrom);
            }
            if ($dateTo) {
                $join->where('operations.operated_at', '<=', $dateTo);
            }
        })
        ->when(!empty($organizationIds), function ($query) use ($organizationIds) {
            return $query->whereIn('organizations.id', $organizationIds);
        })
        ->groupBy('organizations.id', 'organizations.name')
        ->get();

        return response()->json([
            'data' => $statistics,
            'filters' => [
                'date_from' => $dateFrom,
                'date_to' => $dateTo,
                'organizations' => $organizationIds
            ],
            'meta' => [
                'total_organizations' => $statistics->count(),
                'generated_at' => now()->toDateTimeString()
            ]
        ], 200, [], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
