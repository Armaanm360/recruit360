<?php

// use App\Http\Controllers\Accounts\AccountsController;
// use App\Http\Controllers\AccountTransactions\AccountTransactionsController;
// use App\Http\Controllers\Auth\Admin\UserController;
// use App\Http\Controllers\Agents\AgentsController;
// use App\Http\Controllers\Clients\ClientsController;
// use App\Http\Controllers\Deligates\DeligatesController;
// use App\Http\Controllers\Expense\ExpenseController;
// use App\Http\Controllers\Sponsors\SponsorsController;
// use App\Http\Controllers\Reports\Ledger\AgentsLedger;
// use App\Http\Controllers\Reports\Ledger\ClientLedger;
// use App\Http\Controllers\Reports\Ledger\DeligatesLedger;
// use App\Http\Controllers\Reports\Ledger\SponsorsLedger;
// use App\Http\Controllers\Configuration\MedicalController;

//use App\Http\Controllers\Configuration\Head as HeadController;

use App\Http\Controllers\Accounts\AccountsController;
use App\Http\Controllers\Configuration\HeadController;
use App\Http\Controllers\RefundController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes([
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]);

Route::get('/home', 'HomeController@index')->name('home');

/* users */

Route::resource('users', Admin\UserController::class)->middleware('auth');

/* Role */

Route::resource('roles', Admin\RoleController::class)->middleware('auth');

/* Permission */

Route::resource('permissions', Admin\PermissionController::class)->middleware('auth');

/* Accounts */
Route::resource('accounts', Accounts\AccountsController::class)->middleware('auth');

/* Accounts Transaction */
Route::resource('accountransactions', AccountTransactions\AccountTransactionsController::class)->middleware('auth');

Route::get('status', 'Configuration\StatusController@index')->middleware('auth');
Route::get('create/status', 'Configuration\StatusController@create')->middleware('auth');
Route::post('store/status', 'Configuration\StatusController@store')->middleware('auth');
Route::get('status/edit/{id}', 'Configuration\StatusController@edit')->middleware('auth');
Route::post('status/update', 'Configuration\StatusController@updatedata')->middleware('auth');
Route::get('status/delete/{id}', 'Configuration\StatusController@deletedata')->middleware('auth');



/* Agents */
Route::resource('agents', Agents\AgentsController::class)->middleware('auth');
Route::get('search_agents', 'Agents\AgentsController@agentSearch')->middleware('auth');
Route::get('agent-wise-client-list/{id}', 'Agents\AgentsController@agentClient')->middleware('auth');


/* Clients */
Route::resource('clients', Clients\ClientsController::class)->middleware('auth');
Route::resource('client-overall-data', Clients\ClientOverallDataController::class)->middleware('auth');
Route::get('search_clients', 'Clients\ClientsController@clientSearch')->middleware('auth');
Route::get('view/client/{id}', 'Clients\ClientsController@show');
Route::get('get-agent-id/{id}', 'Clients\ClientsController@agentSearch')->middleware('auth');
Route::get('client-cv-list', 'Clients\ClientsController@listClientCV')->middleware('auth');
Route::get('view/client/cv/{id}', 'Clients\ClientsController@viewCV')->middleware('auth');
Route::get('clientslist-excel-export', 'Clients\ClientsController@clientListExcel')->middleware('auth');
Route::get('flight-list', 'Clients\ClientsController@flightList')->middleware('auth');
Route::get('flight-wise-client-list/{id}', 'Clients\ClientsController@clientflightList')->middleware('auth');
Route::get('office-wise-client-list/{id}', 'Clients\ClientsController@clientofficeList')->middleware('auth');
Route::get('manpower-office', 'Clients\ClientsController@manpowerOfficeList')->middleware('auth');

// Vendor

Route::resource('vendors', Vendor\VendorController::class)->middleware('auth');
Route::get('vendor/clear/{id}', 'Vendor\VendorController@vendorClear');
Route::get('search-vendors', 'Vendor\VendorController@vendorSearch')->middleware('auth');

/* Deligates */
Route::resource('deligates', Deligates\DeligatesController::class)->middleware('auth');
Route::get('delegate/clear/{id}', 'Deligates\DeligatesController@deligateClear');

Route::get('deligate-wise-client-list/{id}', 'Deligates\DeligatesController@deligateClient')->middleware('auth');
/* Expense */

Route::resource('expense', Expense\ExpenseController::class)->middleware('auth');

/* Expense */
Route::resource('product', Product\ProductController::class)->middleware('auth');

/* Sponser */
Route::resource('sponser', Sponsors\SponsorsController::class)->middleware('auth');
Route::get('sponser/clear/{id}', 'Sponsors\SponsorsController@sponsorClear');


/* Reports  Ledger*/


/* Agents  Ledger*/
Route::resource('agentsledger', Reports\Ledger\AgentsLedgerController::class)->middleware('auth');



/* Clients  Ledger*/
Route::resource('clientsledger', Reports\Ledger\ClientLedger::class)->middleware('auth');
Route::get('clientsledger-excel-export/{id1}/{id2}/{id3}', 'Reports\Ledger\ClientLedger@clientLedgerExcel');


/* Deligates  Ledger*/
Route::resource('deligatesledger', Reports\Ledger\DeligatesLedger::class)->middleware('auth');



/* Sponsers  Ledger*/
Route::resource('sponsersledger', Reports\Ledger\SponsorsLedger::class)->middleware('auth');


/* Sponsers  Ledger*/
Route::resource('visa', Visa\VisaController::class)->middleware('auth');
Route::get('visa-status', 'Visa\VisaController@visaStatusIndex')->middleware('auth');
Route::get('change/visa/status/{id}', 'Visa\VisaController@visaStatusEdit')->middleware('auth');
Route::post('visa/status/update', 'Visa\VisaController@visaStatusUpdate')->middleware('auth');

/* Medical */
Route::resource('medical', Configuration\MedicalController::class)->middleware('auth');


/* Medical Test */
Route::resource('medicaltest', MedicalTest\MedicalTestController::class)->middleware('auth');
Route::get('search-medical', 'MedicalTest\MedicalTestController@medicalSearch')->middleware('auth');
Route::get('search-clients', 'MedicalTest\MedicalTestController@ClientsSearch')->middleware('auth');


/* Final Medical Test */
Route::resource('final-medical-test', MedicalTest\FinalMedicalTestController::class)->middleware('auth');

/* Police Clearance */
Route::resource('police-clearance', PoliceClearance\PoliceClearanceController::class)->middleware('auth');

/* Training Card */
Route::resource('training-card', TrainingCard\TrainingCardController::class)->middleware('auth');

/* Configuration  Ledger*/
Route::resource('companyinfo', Configuration\CompanyInfoController::class);
Route::get('company/clear/{id}', 'Configuration\CompanyInfoController@companyClear');

/* Passport */
Route::resource('passport', Passport\PassportController::class);
Route::get('passport-status', 'Passport\PassportController@passportStatusIndex')->middleware('auth');
Route::get('change/passport/status/{id}', 'Passport\PassportController@passportStatusEdit')->middleware('auth');
Route::post('passport/status/update', 'Passport\PassportController@passportStatusUpdate')->middleware('auth');
Route::get('passport/clear/{id}', 'Passport\PassportController@passportClear');



Route::resource('manpowers', Manpower\ManpowerController::class);
Route::get('manpower/clear/{id}', 'Manpower\ManpowerController@officeClear');



                        //  INVOICE ROUTES

Route::resource('invoice', Invoice\InvoiceController::class)->middleware('auth');
// Route::get('search-agent/{any}', function(){
//     return search_agent();
// })->middleware('auth');

Route::get('search-agent', function (Request $request) {
    return search_agent($request->q);
});

Route::get('search-client', function (Request $request) {
    return search_client($request->q);
});

Route::get('search-sponser', function (Request $request) {
    return search_sponser($request->q);
});

Route::get('search-client-full-information', function (Request $request) {
    return search_client_full_information($request->q);
});

Route::get('get-invoice-full-information', function (Request $request) {
    return get_invoice_full_information($request->q);
});

Route::get('search-deligate', function (Request $request) {
    return search_deligate($request->q);
});




/* Client Information */

Route::get('client-info/{clientid}', 'Common\CommonController@clientInfo');



Route::get('expense-subhead/{headid}', 'Common\CommonController@expenseSubHead');


Route::resource('head', Configuration\HeadController::class);

Route::resource('subhead', Configuration\SubHeadController::class);



/* return a page */
Route::get('create-expense-render/{purpose}', 'Expense\ExpenseController@createRenderExpense');



/* Refund */
Route::resource('refund', Refund\RefundController::class);
Route::get('search_client_wise_invoice', function (Request $request) {
    return search_client_wise_invoice($request->q);
});



Route::post('refund-data-get', 'Refund\RefundController@clientInvoice');


// Report

Route::get('client-ledger-report','Reports\Ledger\ClientLedger@clientreportForm');
Route::post('get-client-ledger','Reports\Ledger\ClientLedger@clientReport');
Route::get('get-client-ledger-report','Reports\Ledger\ClientLedger@clientReport');
Route::get('client-info/{clientid}', 'Common\CommonController@clientInfo');

Route::get('report/agent-ledger-report','Reports\Ledger\AgentsLedgerController@agentreportForm');
Route::post('report/get-agent-ledger','Reports\Ledger\AgentsLedgerController@agentReport');
Route::get('report/get-agent-ledger-report','Reports\Ledger\AgentsLedgerController@agentReport');
Route::get('agentsledger-excel-export/{id1}/{id2}/{id3}', 'Reports\Ledger\AgentsLedgerController@agentLedgerExcel');


Route::get('report/deligate-ledger-report','Reports\Ledger\DeligatesLedger@deligatereportForm');
Route::post('report/get-deligate-ledger','Reports\Ledger\DeligatesLedger@deligateReport');
Route::get('report/get-deligate-ledger-report','Reports\Ledger\DeligatesLedger@deligateReport');

Route::get('report/sponsor-ledger-report','Reports\Ledger\SponsorsLedger@sponsorreportForm');
Route::post('report/get-sponsor-ledger','Reports\Ledger\SponsorsLedger@sponsorReport');
Route::get('report/get-sponsor-ledger-report','Reports\Ledger\SponsorsLedger@sponsorReport');
Route::get('report/get-sponsor-ledger-report','Reports\Ledger\SponsorsLedger@sponsorReport');


//---- Money Reciept Routes -----

Route::resource('money-reciept', MoneyReciept\MoneyRecieptController::class)->middleware('auth');


//---- Money Reciept Agent -----

Route::resource('money-reciept-agent', MoneyReciept\AgentMoneyRecieptController::class)->middleware('auth');


//---- Money Reciept Sponsor -----

Route::resource('money-reciept-sponsor', MoneyReciept\SponsorMoneyRecieptController::class)->middleware('auth');


//---- Money Reciept Deligate -----

Route::resource('money-reciept-deligate', MoneyReciept\DeligateMoneyRecieptController::class)->middleware('auth');


/* Get Accounts */
Route::get('get-accounts/{account_id}', 'Accounts\AccountsController@getAccount');

Route::get('report/client-wise-sales-collection-report','Reports\ClientWiseSalesCollection\ClientWiseSalesCollectionController@index');
Route::post('report/get-client-wise-collection-sales','Reports\ClientWiseSalesCollection\ClientWiseSalesCollectionController@get_report');
Route::get('report/profit-loss','Reports\ProfitLoss\ProfitLossController@index');
Route::post('report/get-profit-loss','Reports\ProfitLoss\ProfitLossController@get_profit_loss');
Route::get('report/sales-profit','Reports\ReportController@sales_profit');
Route::post('report/get-sales-profit','Reports\ReportController@get_sales_profit');
Route::get('report/accounts-report','Reports\ReportController@accounts_report');

/* Agent Clint Report */
Route::get('report/agent-wise-sales-report', 'Reports\AgentSalesReport\AgentSalesReportController@index');
Route::post('report/agent-wise-sales-report-store', 'Reports\AgentSalesReport\AgentSalesReportController@getAgentReport');


/* Agent Clint Report */
Route::get('report/specific-agent-wise-sales-report/{agentId}', 'Reports\AgentSalesReport\AgentSalesReportController@specificIndex');
Route::post('report/specific-agent-wise-sales-store', 'Reports\AgentSalesReport\AgentSalesReportController@getSpecificAgentReport');


// Client Submitted Report

Route::get('report/client-submitted-report', 'Reports\ClientSubmittedReport\ClientSubmittedReportController@index');
Route::post('get-client-submitted-report', 'Reports\ClientSubmittedReport\ClientSubmittedReportController@clientSubmittedReport');


// Vendor Submitted Report

Route::get('report/vendor-submitted-report', 'Reports\VendorSubmittedReport\VendorSubmittedReportController@index');
Route::post('get-vendor-submitted-report', 'Reports\VendorSubmittedReport\VendorSubmittedReportController@vendorSubmittedReport');

// Account Report

Route::get('report/accounts-collection-report', 'Reports\AccountsCollectionReport\AccountsCollectionReportController@index');
Route::post('report/get-accounts-collection-report', 'Reports\AccountsCollectionReport\AccountsCollectionReportController@AccountsReport');


// Expense Report

Route::get('report/expense-report', 'Reports\ExpenseReport\ExpenseReportController@index');
Route::post('report/get-expense-report', 'Reports\ExpenseReport\ExpenseReportController@ExpenseReport');


// Refund Report

Route::get('report/refund-report', 'Reports\RefundReport\RefundReportController@index');
Route::post('report/get-refund-report', 'Reports\RefundReport\RefundReportController@RefundReport');


//job type


Route::resource('jobtype', Configuration\JobType\JobTypeController::class)->middleware('auth');

//visa forms

Route::get('saudi/visa', 'Clients\Visaforms@saudiClient');
Route::get('saudi/visa/form/{id}', 'Clients\Visaforms@saudiForms');
