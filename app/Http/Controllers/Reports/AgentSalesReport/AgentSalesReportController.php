<?php

namespace App\Http\Controllers\Reports\AgentSalesReport;

use App\Http\Controllers\Controller;
use App\Models\Invoice\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgentSalesReportController extends Controller
{
    public function index()
    {
        // echo 1;
        // die;
        return view('pages.report.agent-wise-sale-report.index');
    }

    



    public function getAgentReport(Request $request)
    {
        $date_range = $request->daterange;
        $date_range = str_replace(' ', '', $date_range);
        $date_range = explode('-', $date_range);
        $to = Carbon::parse($date_range[1])->format('Y/m/d');
        $from = Carbon::parse($date_range[0])->format('Y/m/d');
        $data['from'] = date('Y-m-d', strtotime(str_replace('/', '-', $from)));
        $data['to'] = date('Y-m-d', strtotime(str_replace('/', '-', $to)));


      $data['data']  =  Invoice::whereInvoiceHasDeleted("NO")
      ->where('invoice_agent_id',$request->agent_id)
      ->whereDate('invoice_sales_date', '>=', $from)
      ->whereDate('invoice_sales_date', '<=', $to)
      ->get();

        // echo '<pre>';
        // print_r($data['data']);
        // die;





        return view('pages.report.agent-wise-sale-report.agent_sales_report', $data);
    }





    public function specificIndex($agent_id)
    {
        $data['agent_id'] = $agent_id;
        return view('pages.report.agent-wise-sale-report.specific_agent_sales', $data);
    }

    public function getSpecificAgentReport(Request $request)
    {
        $date_range = $request->daterange;
        $date_range = str_replace(' ', '', $date_range);
        $date_range = explode('-', $date_range);
        $to = Carbon::parse($date_range[1])->format('Y/m/d');
        $from = Carbon::parse($date_range[0])->format('Y/m/d');
        $data['from'] = date('Y-m-d', strtotime(str_replace('/', '-', $from)));
        $data['to'] = date('Y-m-d', strtotime(str_replace('/', '-', $to)));

        $data['count_agent']  =  Invoice::whereInvoiceHasDeleted("NO")
        ->where('invoice_agent_id', $request->agent_id)
        ->whereDate('invoice_sales_date', '>=', $from)
        ->whereDate('invoice_sales_date', '<=', $to)
        ->count();


      $data['data']  =  Invoice::whereInvoiceHasDeleted("NO")
      ->where('invoice_agent_id',$request->agent_id)
      ->whereDate('invoice_sales_date', '>=', $from)
      ->whereDate('invoice_sales_date', '<=', $to)
      ->get();



        // echo '<pre>';
        // print_r($data['data']);
        // die;

        return view('pages.report.agent-wise-sale-report.specific_agent_sales_report', $data);
    }










    public function negativeFunUser($user_id)
    {
        return   Lead::where('active_status', 1)->where('assigned_to', $user_id)->where('lead_status', 3)->count();
    }

    public function totalFunUser($user_id)
    {
        return   Lead::where('active_status', 1)->where('assigned_to', $user_id)->count();
    }

    public function soldFunUser($user_id)
    {
        return   Lead::where('active_status', 1)->where('assigned_to', $user_id)->where('lead_status', 4)->count();
    }


    public function contactFunUser($user_id)
    {
        return   Lead::where('active_status', 1)->where('assigned_to', $user_id)->where('contact_status', 1)->count();
    }

    public function positiveFunUser($user_id)
    {
        return   Lead::where('active_status', 1)->where('assigned_to', $user_id)->where('lead_status', 2)->count();
    }

    public function phoneFunUser($user_id)
    {
        return   Lead::where('active_status', 1)->where('assigned_to', $user_id)->where('phone_call', 1)->count();
    }
    public function visitFunUser($user_id)
    {
        return   Lead::where('active_status', 1)->where('assigned_to', $user_id)->where('visit', 1)->count();
    }
    public function demoFunUser($user_id)
    {
        return   Lead::where('active_status', 1)->where('assigned_to', $user_id)->where('demo_link', 1)->count();
    }
    public function agreementFunUser($user_id)
    {
        return   Lead::where('active_status', 1)->where('assigned_to', $user_id)->where('agreement_paper', 1)->count();
    }





    // public function stakeholderProductStat()
    // {


    //     $products = DB::table('products')->where('active_status', 1)->select('products.id', 'products.product_name')->get();
    //     $productArray = array();
    //     foreach ($products as $leed) {
    //         $tamb = array(
    //             'product_id' => $leed->id,
    //             'product' => $leed->product_name,
    //             'total_leads' => $this->totalFun($leed->id),
    //             'contact'  => $this->contactFun($leed->id),
    //             'postive'  => $this->positiveFun($leed->id),
    //             'negative' => $this->negativeFun($leed->id),
    //             'sold'     => $this->soldFun($leed->id),
    //         );

    //         array_push($productArray, $tamb);
    //     }

    //     return response()->json([
    //         'data' => $productArray,
    //         'success' => true
    //     ], 200);
    // }


    public function stakeholderUserStat()
    {


        $sources = DB::table('users')->whereIn('id','!=',array(18,19,21))->select('users.id', 'users.name')->get();
        $sourceArray = array();
        foreach ($sources as $leed) {
            $sour = array(
                'user_id' => $leed->id,
                'user_name' => $leed->name,
                'total_leads' => $this->totalFunOrg($leed->id),
                'contact'  => $this->contactFunOrg($leed->id),
                'postive'  => $this->positiveFunOrg($leed->id),
                'negative' => $this->negativeFunOrg($leed->id),
                'sold'     => $this->soldFunOrg($leed->id),
                'phonecall'     => $this->phoneFunUser($leed->id),
                'visit'     => $this->visitFunUser($leed->id),
                'demo'     => $this->demoFunUser($leed->id),
                'agreement'     => $this->agreementFunUser($leed->id),
            );

            array_push($sourceArray, $sour);
        }

        return response()->json([
            'data' => $sourceArray,
            'success' => true
        ], 200);
    }



}
