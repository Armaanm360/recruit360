@inject('dashboard','App\Models\Dashboard\Dashboard')
<script src="{{ asset('public/frontend/') }}/assets/js/plugins.js"></script>
<!--Plugin Js-->
{{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
<script src="{{ asset('public/frontend/') }}/assets/js/theme.js"></script>
<script src="{{ asset('public/frontend/') }}/assets/js/bundle/apexcharts.bundle.js"></script>
<!-- Vendor Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>


<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>
function printDiv(divName) {
    var divContents = document.getElementById(divName).innerHTML;
            var a = window.open('', '', 'height=1200, width=1200');
            a.document.write('<html>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
}

    function showTime() {
        var date = new Date();
        var h = date.getHours(); // 0 - 23
        var m = date.getMinutes(); // 0 - 59
        var s = date.getSeconds(); // 0 - 59
        var session = "AM";
        if (h == 0) {
            h = 12;
        }
        if (h > 12) {
            h = h - 12;
            session = "PM";
        }
        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;
        var time = h + ":" + m + ":" + s + " " + session;
        document.getElementById("MyClockDisplay").innerText = time;
        document.getElementById("MyClockDisplay").textContent = time;
        setTimeout(showTime, 1000);
    }

    showTime();

    // Horizontal Bar Chart
    // <?php
    // $sponsors = $dashboard->last_seven_sponsors();
    // ?>
    // new Chartist.Bar('#C_HorizontalBarChart', {
    //     labels: [ ?php echo $sponsors['sponsor']; ?> ],
    //     series: [
    //         [ ?php echo $sponsors['credit']; ?> ],
    //         [ ?php echo $sponsors['debit']; ?> ],
    //     ]
    // }, {
    //     seriesBarDistance: 100,
    //     reverseData: true,
    //     horizontalBars: true,
    //     axisY: {
    //         offset: 70,
    //     },
    // });

</script>
<script src="{{ asset('public/frontend/') }}/assets/js/bundle/dataTables.bundle.js"></script>
<script>

    $(document).ready(function() {
        $('#myTable')
            .dataTable();

            $(document).ready( function() {
    $('.today').val(getToday());
  });

  function getToday(){
	const local = new Date();
    local.setMinutes(local.getMinutes() - local.getTimezoneOffset());
	return local.toJSON().slice(0,10);
  }
    });
    // $(document).ready(function() {


    // LUNO Revenue


    </script>
    <?php
    $yearData = $dashboard->this_year_sales();
    ?>
<script>
    $(document).ready(function() {
    var options = {
        series: [{
            name: 'Sales',
            data: [<?php echo $yearData['sales']?>]
        }, {
            name: 'Costs',
            data: [<?php echo $yearData['costs']?>]
        }, {
            name: 'Revenue',
            data: [<?php echo $yearData['revenue'] ?>]
        }],
      chart: {
        type: 'bar',
        height: 260,
        stacked: true,
        stackType: '100%',
        toolbar: {
          show: false,
        },
      },
      colors: ['var(--chart-color1)', 'var(--chart-color2)', 'var(--chart-color3)'],
      responsive: [{
        breakpoint: 480,
        options: {
          legend: {
            position: 'bottom',
            offsetX: -10,
            offsetY: 0
          }
        }
      }],
      xaxis: {
        categories: ['Jan', 'Feb', 'March', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
      },
      fill: {
        opacity: 1
      },
      dataLabels: {
        enabled: false,
      },
      legend: {
        position: 'bottom',
        horizontalAlign: 'center',
      },
    };
    var chart = new ApexCharts(document.querySelector("#apex-AudienceOverview"), options);
    chart.render();

    });

</script>


   <script src="{{ asset('public/frontend/') }}/assets/js/bundle/daterangepicker.bundle.js"></script>

<script>
    $(document).ready(function() {
      var date = new Date();
      var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
      $('#daterange').daterangepicker({ startDate: firstDay, endDate: date });
    });
    $(document).ready(function() {
        $('#myTable')
            .dataTable();


        });
</script>

