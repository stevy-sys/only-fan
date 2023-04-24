<?php

namespace App\Http\Controllers\Admin;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\InvoiceSubscibe;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function invoiceBoutique()
    {
        $invoices = Invoice::with(['detail','user'])->get();
        return view("admin.invoice.boutique",compact('invoices'));
    }

    public function invoiceSubscribe()
    {
        $invoices = InvoiceSubscibe::with(['subscribe','user'])->get();
        return view("admin.invoice.subscribe",compact('invoices'));
    }

    public function invoice()
    {
        // $invoices = InvoiceSubscibe::with(['subscribe','user'])->get();
        return view("admin.invoice.facture");
    }
}
