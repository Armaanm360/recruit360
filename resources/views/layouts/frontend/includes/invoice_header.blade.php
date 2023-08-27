@inject('company','App\Models\Configuration\CompanyInfo')
@php
$companyData = $company->get_company_info();
@endphp
@if($companyData)
<div class="logoInvoice" style="margin-top:4px;max-height:200px">
    <img src="{{asset('public/').$companyData->company_logo}}" width="120px" alt="logo">
    <p style="margin: 0px">{{$companyData->company_name}}</p>
    <p style="margin: 0px">Phone : {{$companyData->company_phone}}</p>
    <Address style="margin: 0px">Address : {{$companyData->company_address}}</Address>
    <Address style="margin: 0px">Website : <a href="//{{$companyData->company_website}}" target="__blank">{{$companyData->company_website}}</a></Address>
  </div>
  @else
  <div class="logoInvoice" style="margin-top: -125px;max-height:200px">
    <img src="{{asset('public')}}/frontend/assets/img/logo.png" width="530px" alt="logo">
    <p>Company Name</p>
    <p>Company Phone</p>
    <Address>Company Address</Address>
  </div>
  @endif
