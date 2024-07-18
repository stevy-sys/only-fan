<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Customers;
use Illuminate\Http\Request;
use App\Models\DetailPayment;
use App\Models\InvoiceSubscibe;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomerAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.customer.login');
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('admin/dashboard');
        }

        return redirect()->back()->withInput()->withErrors(['email' => 'These credentials do not match our records.']);
    }


    public function getStat() {
        $mois_francais = [
            1 => 'janvier',
            2 => 'février',
            3 => 'mars',
            4 => 'avril',
            5 => 'mai',
            6 => 'juin',
            7 => 'juillet',
            8 => 'août',
            9 => 'septembre',
            10 => 'octobre',
            11 => 'novembre',
            12 => 'décembre'
        ];

        // Obtenir le mois actuel
        $currentMonth = Carbon::now()->month;

        // Initialiser les résultats avec des mois vides jusqu'au mois courant
        $results = [];
        for ($month = 1; $month <= $currentMonth; $month++) {
            $monthName = $mois_francais[$month];
            $results[$monthName] = [];
        }

        // Récupérer toutes les colonnes et regrouper les enregistrements par mois
        $invoices = InvoiceSubscibe::select('*', DB::raw('YEAR(created_at) as year'), DB::raw('MONTH(created_at) as month'))
            ->orderBy('year')
            ->orderBy('month')
            ->with('subscribe')
            ->get()
            ->groupBy(function ($date) {
                return $date->created_at->format('Y-m'); // Grouper par année et mois
            });

        // Transformer les résultats pour utiliser les noms des mois en français comme clés
        foreach ($invoices as $key => $monthlyInvoices) {
            $month = (int) explode('-', $key)[1]; // Extraire le numéro du mois
            $monthName = $mois_francais[$month]; // Obtenir le nom du mois en français

            $results[$monthName] = $monthlyInvoices->toArray();
        }
        

        $userTotal = User::where('role_id',1)->get()->count();
        $userSubscribe = User::where('role_id',1)->where('premium',1)->get()->count();
        $userNotSubscribe = User::where('role_id',1)->where('premium',0)->get()->count();

        $data = [
            'stat' => $results,
            'user' => [
                "userTotal" => $userTotal,
                "userSubscribe" => (100 * $userSubscribe)/($userTotal),
                "userNotSubscribe" => (100 * $userNotSubscribe)/($userTotal),
            ]
        ];
        return $data ;
    }

    public function dashboard()
    {

        $totalPaidProduct = DetailPayment::where('status', 'payer')->sum('total');
        // return $totalPaidProduct;

        $subInvoice = InvoiceSubscibe::with('subscribe')->get();
        $totalSubscription = 0 ;
        foreach ($subInvoice as $invoice) {
            $totalSubscription = $totalSubscription + $invoice->subscribe->amount;
        }
        // return $totalSubscription ;

        return view('admin.dashboard',[
            'totalPaidProduct' => $totalPaidProduct,
            'totalSubscription' => $totalSubscription
        ]);
    }

    public function new()
    {
        return view('admin.new_admin.index');
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('customer.login');
    }

    public function create()
    {
        return view('auth.customer.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:6'
        ]);

        $customer = new Customers();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = bcrypt($request->password);
        $customer->save();

        return redirect()->route('customer.login')->with('success', 'Customer created successfully.');
    }
}
