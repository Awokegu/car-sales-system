<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::latest()->take(6)->get(); // Get latest 6 cars
        return view('home', compact('cars'));
    }
}
