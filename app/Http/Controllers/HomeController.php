<?php

namespace App\Http\Controllers;

use App\Models\JournalVoucher;
use Illuminate\Http\Request;
use App\User;
use App\Models\Project;
use App\Models\Donor;
use App\Models\CashPaymentVoucher;
use App\Models\CashReceiptVoucher;
use App\Models\BankReceiptVoucher;
use App\Models\BankPaymentVoucher;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalUsers = User::count();
        $totalProjects = Project::count();
        $totalDonors = Donor::count();
        $totalJvs = JournalVoucher::count();
        $totalCPV = CashPaymentVoucher::count();
        $totalCRV = CashReceiptVoucher::count();
        $totalBPV = BankPaymentVoucher::count();
        $totalBRV = BankReceiptVoucher::count();
        return view('home', compact('totalUsers','totalProjects','totalDonors', 'totalJvs', 'totalBRV','totalBPV','totalCRV','totalCPV'));
    }
}
