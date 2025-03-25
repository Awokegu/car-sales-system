<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SalesReportController extends Controller
{
    public function index()
    {
        $sales = Sale::with(['car', 'customer'])->paginate(10);
        return view('sales-reports', compact('sales'));
    }

    public function exportCSV()
    {
        $sales = Sale::with(['car', 'customer'])->get();

        $csvFileName = 'sales_report_' . now()->format('Ymd') . '.csv';

        $response = new StreamedResponse(function () use ($sales) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Transaction ID', 'Car', 'Customer', 'Price', 'Date']);

            foreach ($sales as $sale) {
                fputcsv($handle, [$sale->id, $sale->car->name, $sale->customer->name, $sale->price, $sale->created_at->format('Y-m-d')]);
            }

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="' . $csvFileName . '"');

        return $response;
    }
}
