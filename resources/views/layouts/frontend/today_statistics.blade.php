<div class="row align-items-center">
    <div class="col-auto">
        <h1 class="fs-5 color-900 mt-1 mb-0">Welcome back, {{ Auth::user()->name }}!</h1>

        <small class="text-muted">
            <div id="MyClockDisplay" class="clock" style="top:21%;left:20%" onload="showTime()"></div>
        </small>
    </div>
    <div class="col d-flex justify-content-lg-end mt-2 mt-md-0">
        <div class="p-2 me-md-3">
            <div><span class="h6 mb-0">{{ get_today_sales() }} TK </span> </div>
            <small class="text-muted text-uppercase">Sale</small>
        </div>
        <div class="p-2 me-md-3">
            <div><span class="h6 mb-0">{{ get_today_expense() }} TK</span> </div>
            <small class="text-muted text-uppercase">Expense</small>
        </div>
        <div class="p-2 pe-lg-0">
            <div><span class="h6 mb-0">{{ get_today_sales_profit() }} TK</span> </div>
            <small class="text-muted text-uppercase">Revenue</small>
        </div>
    </div>
</div> <!-- .row end -->