<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Request;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function index(){
        return Inertia::render('Dashboard');
    }

    public function about(){
        return Inertia::render('About');
    }
}
