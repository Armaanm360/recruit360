<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice\Invoice;
use App\Models\Invoice\InvoiceBilling;
use App\Models\Clients\Client;
use App\Models\Clients\ClientTransaction;
use App\Models\ClientTransection;
use App\Models\Ledger\ClientLedger;
use App\Models\Product\Product;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $data['list'] = Invoice::whereInvoiceHasDeleted('NO')->orderBy('invoice_id','desc')->get();
     return view('pages.invoice.invoice_list',$data);
    }

    public function get_invoice_number() {
        $date = date("Y-m-d");
        $invoice_date = date("ymd");
        $lastInvoice = Invoice::where('invoice_date', 'LIKE', "%{$date}%")->get();
        return $invoice_date .str_pad(($lastInvoice->count() + 1), 2, "0", STR_PAD_LEFT);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['invoiceNO'] = $this->get_invoice_number();
        $product_list = Product::where('product_status',1)->get();
        return view('pages.invoice.create_invoice',$data,compact('product_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'client_name' => 'required',
            'agent_name' => 'required',
            // 'deligate_name' => 'required',
            //'sponser_name' => 'required',
        ]);

        $client_id = $request->invoice_client_id;

        $invoice = new Invoice;
        $invoice['invoice_no'] = $request->invoice_no;
        $invoice['invoice_client_id'] = $request->invoice_client_id;
        $invoice['invoice_agent_id'] = $request->invoice_agent_id;
        $invoice['invoice_delegate_id'] = $request->invoice_delegate_id;
        $invoice['invoice_sponsor_id'] = $request->invoice_sponsor_id;
        $invoice['invoice_discount'] = $request->discount;
        // $invoice['invoice_sponsor_id'] = 1;
        $invoice['invoice_subtotal'] = $request->invoice_subtotal;
        $invoice['invoice_net_total'] = $request->invoice_net_total;
        $invoice['invoice_date'] = date('Y-m-d');
        $invoice['invoice_sales_date'] = $request->invoice_sales_date;
        $invoice['invoice_terms'] = $request->invoice_terms;
        $invoice['invoice_has_deleted'] = "NO";
        $invoice['invoice_created_by'] = Auth::user()->id;

        $invoice->save();
// print_r($request->billing_rows);die;
        $invoice_id = $invoice->invoice_id;
        $totalCostPrice = 0;
        $totalSalePrice = 0;
        // echo "<pre>";print_r($request->all());
       for($i = 1; $i<=$request->billing_rows; $i++)
        {
            $vendor = 'billing_vendor_'.$i;
            $billingId = 'invoice_billing_id_'.$i;
            $product = 'billing_product_'.$i;
            $description = 'billing_description_'.$i;
            $quantity = 'billing_quantity_'.$i;
            $unit_price = 'billing_unit_price_'.$i;
            $subtotal = $request->invoice_subtotal;
            $cost_price =  'billing_cost_price_'.$i;
            $sale_price =  'billing_unit_price_'.$i;

             $totalCostPrice+=  $request->$cost_price;
             $totalSalePrice+=  $request->$sale_price;



        $invoiceBilling = new InvoiceBilling;
        $invoiceBilling['billing_invoice_id'] = $invoice_id;
        $invoiceBilling['billing_vendor'] = $request->$vendor;
        $invoiceBilling['billing_product'] = $request->$product;
        $invoiceBilling['billing_description'] = $request->$description;
        $invoiceBilling['billing_quantity'] = $request->$quantity;
        $invoiceBilling['billing_cost_price'] = $request->$cost_price;
        $invoiceBilling['billing_sale_price'] = $request->$sale_price;
        $invoiceBilling['billing_unit_price'] = $request->$unit_price;
        $invoiceBilling['billing_subtotal'] = $request->$subtotal;
        $invoiceBilling['billing_status'] = 1;
        $invoiceBilling['billing_date'] = date('Y-m-d');
        $invoiceBilling->save();
        }

        $totalSalesProfit = $totalSalePrice - $totalCostPrice;

        Invoice::where('invoice_id',$invoice_id)->update([
            'invoice_total_cost' => $totalCostPrice,
            'invoice_total_profit'=> $totalSalesProfit
        ]);


        $client_transaction = new ClientTransaction();
        $client_transaction->client_transaction_type = "DEBIT";
        $client_transaction->client_transaction_client_id = $client_id;
        $client_transaction->client_transaction_invoice_id = $invoice_id;
        $client_transaction->client_transaction_amount = $request->invoice_net_total;
        $client_transaction->client_transaction_last_balance = get_client_current_balance_by_client_id($client_id);
        $client_transaction->client_transaction_date = date("Y-m-d");
        $client_transaction->client_transaction_create_date = date("Y-m-d");
        $client_transaction->save();

        $client_tansaction_id = $client_transaction->client_transaction_id;

        $update_client_transection = ClientTransaction::find($client_tansaction_id)->update([
            'client_transaction_last_balance' => get_client_current_balance_by_client_id($client_id)
        ]);

        $client_transaction = $client_transaction->client_transaction_id;

        $client_ledger = new ClientLedger();
        $client_ledger->client_id = $client_id;
        $client_ledger->client_transaction_id = $client_transaction;
        $client_ledger->client_ledger_invoice_id = $invoice_id;
        $client_ledger->client_ledger_type = 'SALE';
        $client_ledger->client_ledger_status = true;
        $client_ledger->client_ledger_last_balance = get_client_current_balance_by_client_id($client_id);
        $client_ledger->client_ledger_date = date("Y-m-d");
        $client_ledger->client_ledger_create_date = date("Y-m-d");
        $client_ledger->client_ledger_dr = $request->invoice_net_total;;
        $client_ledger->client_ledger_prepared_by = Auth::user()->id;

        $client_ledger->save();

        $invoiceData['invoice'] = $request->all();

        return view('pages.money_reciept.create_money_reciept_for_invoice',$invoiceData);

//    echo '<pre>';print_r($request->all());die;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $data['invoice'] = Invoice::where('invoice_id',$id)
            ->join('agents','agents.agent_id','=','invoices.invoice_agent_id')
            ->join('clients','clients.client_id','=','invoices.invoice_client_id')
            ->join('deligates','deligates.deligate_id','=','invoices.invoice_delegate_id')
            //->join('sponsors','sponsors.sponsor_id','=','invoices.invoice_sponsor_id')
            ->get();
    // echo '<pre>';
    // print_r($data['invoice']);
    // die;

//    echo "<pre>";print_r($data['invoice']);die;
    return view('pages.invoice.view_invoice',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_list = Product::where('product_status',1)->get();
    $data['invoice'] = Invoice::whereInvoiceId($id)
            ->join('agents','agents.agent_id','=','invoices.invoice_agent_id')
            ->join('clients','clients.client_id','=','invoices.invoice_client_id')
            ->join('sponsors','sponsors.sponsor_id','=','invoices.invoice_sponsor_id')
            ->get();
    $data['deligates'] = Invoice::whereInvoiceId($id)
            ->join('deligates','deligates.deligate_id','=','invoices.invoice_delegate_id')
            ->select('deligates.deligate_name')
            ->first();


//    echo "<pre>";print_r($data['invoice']);die;
    return view('pages.invoice.edit_invoice',$data,compact('product_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // print_r($request->all());
     $request->validate([
            'client_name' => 'required',
            'agent_name' => 'required',
            // 'deligate_name' => 'required',
            'sponser_name' => 'required',
        ]);

        $client_id = $request->invoice_client_id;

        $invoice = Invoice::find($id);
        $invoiceNo = $invoice->invoice_no;
        $invoice['invoice_no'] = $request->invoice_no;
        $invoice['invoice_client_id'] = $request->invoice_client_id;
        $invoice['invoice_agent_id'] = $request->invoice_agent_id;
        $invoice['invoice_delegate_id'] = $request->invoice_delegate_id;
        $invoice['invoice_sponsor_id'] = $request->invoice_sponsor_id;
        $invoice['invoice_discount'] = $request->discount;
        // $invoice['invoice_sponsor_id'] = 1;
        $invoice['invoice_subtotal'] = $request->invoice_subtotal;
        $invoice['invoice_net_total'] = $request->invoice_net_total;
        $invoice['invoice_date'] = date('Y-m-d');
        $invoice['invoice_sales_date'] = $request->invoice_sales_date;
        $invoice['invoice_terms'] = $request->invoice_terms;
        $invoice['invoice_has_deleted'] = "NO";
        $invoice['invoice_updated_by'] = Auth::user()->id;

        $invoice->save();

        $invoice_id = $invoice->invoice_id;

        foreach($request->billing_rows as $rowBilling)
        {
            $vendor = 'billing_vendor_'.$rowBilling;
            $billingId = 'invoice_billing_id_'.$rowBilling;
            $product = 'billing_product_'.$rowBilling;
            $description = 'billing_description_'.$rowBilling;
            $quantity = 'billing_quantity_'.$rowBilling;
            $unit_price = 'billing_unit_price_'.$rowBilling;
            $subtotal = $request->invoice_subtotal;
            $cost_price =  'billing_cost_price_'.$rowBilling;
            $sale_price =  'billing_unit_price_'.$rowBilling;
            $invoiceBilling = InvoiceBilling::find($billingId);
    //    print_r($invoiceBilling);die;

    //         print_r($billingId);die;

        $invoiceBilling = InvoiceBilling::whereBillingId($request->$billingId)->update([
           "billing_invoice_id"=>$invoice_id,
            "billing_vendor"=>$request->$vendor,
            "billing_product"=>$request->$product,
            "billing_description"=>$request->$description,
            "billing_quantity"=>$request->$quantity,
            "billing_cost_price"=>$request->$cost_price,
            "billing_sale_price"=>$request->$sale_price,
            "billing_unit_price"=>$request->$unit_price,
            "billing_subtotal"=>$request->$subtotal,
            "billing_date"=>$request->invoice_sales_date
        ]);



//        $billingRow = [
//            "billing_invoice_id"=>$invoice_id,
//            "billing_vendor"=>$request->$vendor,
//            "billing_product"=>$request->$product,
//            "billing_description"=>$request->$description,
//            "billing_quantity"=>$request->$quantity,
//            "billing_cost_price"=>$request->$cost_price,
//            "billing_sale_price"=>$request->$sale_price,
//            "billing_unit_price"=>$request->$unit_price,
//            "billing_subtotal"=>$request->$subtotal,
//            "billing_subtotal"=>$request->$subtotal,
//            "billing_date"=>$request->invoice_sales_date,
//        ];
//        $invoiceBilling->billing_invoice_id = $invoice_id;
//        $invoiceBilling->billing_vendor = $request->$vendor;
//        $invoiceBilling->billing_product = $request->$product;
//        $invoiceBilling->billing_description = $request->$description;
//        $invoiceBilling->billing_quantity = $request->$quantity;
//        $invoiceBilling->billing_cost_price = $request->$cost_price;
//        $invoiceBilling->billing_sale_price = $request->$sale_price;
//        $invoiceBilling->billing_unit_price = $request->$unit_price;
//        $invoiceBilling->billing_subtotal = $request->$subtotal;
//        $invoiceBilling->billing_date = date('Y-m-d');
//        echo "<pre>";print_r($invoiceBilling);
//        $invoiceBilling->save($billingRow);
        }


        $client_transaction = ClientTransaction::whereClientTransactionInvoiceId($id)->update([

            "client_transaction_type" =>"DEBIT",
            "client_transaction_client_id"=>$client_id,
            "client_transaction_amount"=>$request->invoice_net_total,
            "client_transaction_date"=>$request->invoice_sales_date,
            "client_transaction_create_date"=>date("Y-m-d")
        ]);
//        $client_transaction->client_transaction_type = "DEBIT";
//        $client_transaction->client_transaction_client_id = $client_id;
//        $client_transaction->client_transaction_amount = $request->invoice_net_total;
////        $client_transaction->client_transaction_last_balance = get_client_current_balance_by_client_id($client_id);
//        $client_transaction->client_transaction_date = date("Y-m-d");
//        $client_transaction->client_transaction_create_date = date("Y-m-d");
//        $client_transaction->save();
//print_r($client_transaction);die;
        $client_tansaction_id = $client_transaction = ClientTransaction::whereClientTransactionInvoiceId($id)->get()[0]->client_transaction_id;

        $update_client_transection = ClientTransaction::find($client_tansaction_id)->update([
            'client_transaction_last_balance' => get_client_current_balance_by_client_id($client_id)
        ]);

//        $client_transaction = $client_transaction->id;

        $client_ledger = new ClientLedger();
        $client_ledger->client_id = $client_id;
        $client_ledger->client_transaction_id = $client_transaction;
        $client_ledger->client_ledger_invoice_id = $invoice_id;
        $client_ledger->client_ledger_type = 'SALE UPDATED';
        $client_ledger->client_ledger_status = true;
        $client_ledger->client_ledger_last_balance = get_client_current_balance_by_client_id($client_id);
        $client_ledger->client_ledger_date = date("Y-m-d");
        $client_ledger->client_ledger_create_date = date("Y-m-d");
        $client_ledger->client_ledger_dr = $request->invoice_net_total;;
        $client_ledger->client_ledger_prepared_by = Auth::user()->id;

        $client_ledger->save();

        $invoiceData['invoice'] = $request->all();

        $invoiceData['moneyReceipt'] = App\Models\MoneyReciept\MoneyReciept::whereMoneyRecieptInvoiceNo($invoiceNo)->get();

//        print_r($moneyReceipt);

if(!$invoiceData['moneyReceipt']->isEmpty())
{

        return view('pages.money_reciept.update_money_reciept_for_invoice',$invoiceData);
}else{
    return view('pages.money_reciept.create_money_reciept_for_invoice',$invoiceData);
}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $invoice = Invoice::find($id);
        $invoice->invoice_has_deleted = "YES";
        $invoice->save();

        ClientTransaction::where("client_transaction_invoice_id",$id)->update([
            "client_transaction_has_deleted"=>"YES"
        ]);

        $data = ['status'=>'okay'];
       return $data;
    }
}
