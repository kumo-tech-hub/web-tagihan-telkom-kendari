<?php
namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Company;
use App\Models\AccountManager;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailToCustomer;
class MailController extends Controller{
    public function index(){
        $contracts = Contract::with(['company', 'accountManager', 'produk'])
        ->latest()
        ->paginate(10);
    
    return view('email-manual', compact('contracts'));
    }

    public function sendEmail(Request $request,$id){    
        $contract = Contract::with(['company', 'accountManager', 'produk'])
            ->where(['id' => $id])
            ->first();
        Mail::to($contract->company->email)->send(new SendMailToCustomer($contract));
        return redirect()->route('mail.index');
    }
}
