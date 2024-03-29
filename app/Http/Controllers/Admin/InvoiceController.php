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
        $invoices = Invoice::with(['detail.commands.product','user'])->orderBy('created_at','desc')->get();
        return view("admin.invoice.boutique",compact('invoices'));
    }

    public function invoiceSubscribe()
    {
        $invoices = InvoiceSubscibe::with(['subscribe','user'])->orderBy('created_at','desc')->get();
        return view("admin.invoice.subscribe",compact('invoices'));
    }

    public function invoiceProduct(Invoice $idInvoice) {
        $invoice = $idInvoice->load(['detail.commands.product','user']);
        return view("admin.invoice.facture",compact('invoice'));
    }


    public function invoiceSubscription(InvoiceSubscibe $idInvoice)
    {
        $invoice = $idInvoice->load(['subscribe','user']);
        // $invoices = InvoiceSubscibe::with(['subscribe','user'])->get();
        return view("admin.invoice.factureSubscription",compact('invoice'));
    }
}
