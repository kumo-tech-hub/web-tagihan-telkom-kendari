<?php
namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Company;
use App\Models\AccountManager;
use App\Models\Produk;
use Illuminate\Http\Request;
class MailController extends Controller{
    public function index(){
        $contracts = Contract::with(['company', 'accountManager', 'produk'])
        ->latest()
        ->paginate(10);
    
    return view('email-manual', compact('contracts'));
    }
} 