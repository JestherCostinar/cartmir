<?= $this->extend('Admin/layout/frontend.php') ?>

<?= $this->section('content') ?>
<?= $this->include('Admin/layout/inc/navbar.php'); ?>

<section class="dasbord_section">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-12 col-md-12 col-12 dasbord_subbox">
        <?= $this->include('Admin/layout/inc/sidebar.php'); ?>

        <div class="right_box">

          <div class="right_amountbox">
            <div class="right_txtbox">
              <div class="user_box">
                <h4>Total Order</h4>
              </div>
              <h5>200</h5>
            </div>
            <div class="right_txtbox1">
              <div class="user_box">
                <h4>Total User</h4>
              </div>
              <h5>2000</h5>
            </div>
            <div class="right_txtbox2">
              <div class="user_box">
                <h4>Complete</h4>
              </div>
              <h5>400</h5>
            </div>
            <div class="right_txtbox3">
              <div class="user_box">
                <h4>Pending</h4>
              </div>
              <h6>100</h6>
            </div>
          </div>
          <div class="graph_section">
            <div class="graph_box">
              <!-- <figure class="highcharts-figure">
                                    <div id="container"></div>
                                </figure> -->
              <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
            </div>
            <div class="graph_box1">
              <canvas id="myChart1" style="width:100%;height:400px;"></canvas>
            </div>
          </div>
          <div class="table_box">
            <h3>Recent Order</h3>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Order No </th>
                  <th>Amount</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>#ubk012234</td>
                  <td>500</td>
                  <td class="table_txt">Complete</td>
                </tr>
                <tr>
                  <td>#ubk012234</td>
                  <td>700</td>
                  <td class="table_txt1">Pending</td>
                </tr>
                <tr>
                  <td>#ubk012444</td>
                  <td>500</td>
                  <td class="table_txt">Complete</td>
                </tr>
                <tr>
                  <td>#ubk012284</td>
                  <td>300</td>
                  <td class="table_txt1">Pending</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<?= $this->endSection(); ?>

<?= $this->section('scripts') ?>
<script>
  var xValues = ["Firefox", "Opera Mini", "Chrome", "Google"];
  var yValues = [55, 49, 44, 24, 15];
  var barColors = [
    "#b91d47",
    "#00aba9",
    "#2b5797",
    "#e8c3b9",
    "#1e7145"
  ];

  new Chart("myChart1", {
    type: "doughnut",
    data: {
      labels: xValues,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    },
    options: {
      title: {
        display: true,
        text: ""
      }
    }
  });
</script>

<script>
  function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
  }

  function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
  }
</script>
<script>
  var xValues = [];
  var yValues = [];
  generateData("Math.sin(x)", 0, 10, 0.5);

  new Chart("myChart", {
    type: "line",
    data: {
      labels: xValues,
      datasets: [{
        fill: false,
        pointRadius: 2,
        borderColor: "rgba(0,0,255,0.5)",
        data: yValues
      }]
    },
    options: {
      legend: {
        display: false
      },
      title: {
        display: true,
        text: "",
        fontSize: 16
      }
    }
  });

  function generateData(value, i1, i2, step = 1) {
    for (let x = i1; x <= i2; x += step) {
      yValues.push(eval(value));
      xValues.push(x);
    }
  }
</script>
<script>
  // A point click event that uses the Renderer to draw a label next to the point
  // On subsequent clicks, move the existing label instead of creating a new one.
  Highcharts.addEvent(Highcharts.Point, 'click', function() {
    if (this.series.options.className.indexOf('popup-on-click') !== -1) {
      const chart = this.series.chart;
      const date = Highcharts.dateFormat('%A, %b %e, %Y', this.x);
      const text = `<b>${date}</b><br/>${this.y} ${this.series.name}`;

      const anchorX = this.plotX + this.series.xAxis.pos;
      const anchorY = this.plotY + this.series.yAxis.pos;
      const align = anchorX < chart.chartWidth - 200 ? 'left' : 'right';
      const x = align === 'left' ? anchorX + 10 : anchorX - 10;
      const y = anchorY - 30;
      if (!chart.sticky) {
        chart.sticky = chart.renderer
          .label(text, x, y, 'callout', anchorX, anchorY)
          .attr({
            align,
            fill: 'rgba(0, 0, 0, 0.75)',
            padding: 10,
            zIndex: 7 // Above series, below tooltip
          })
          .css({
            color: 'white'
          })
          .on('click', function() {
            chart.sticky = chart.sticky.destroy();
          })
          .add();
      } else {
        chart.sticky
          .attr({
            align,
            text
          })
          .animate({
            anchorX,
            anchorY,
            x,
            y
          }, {
            duration: 250
          });
      }
    }
  });


  Highcharts.chart('container', {

    chart: {
      scrollablePlotArea: {
        minWidth: 700
      }
    },

    data: {
      csvURL: 'https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/analytics.csv',
      beforeParse: function(csv) {
        return csv.replace(/\n\n/g, '\n');
      }
    },

    title: {
      text: 'Daily sessions at www.highcharts.com'
    },

    subtitle: {
      text: 'Source: Google Analytics'
    },

    xAxis: {
      tickInterval: 7 * 24 * 3600 * 1000, // one week
      tickWidth: 0,
      gridLineWidth: 1,
      labels: {
        align: 'left',
        x: 3,
        y: -3
      }
    },

    yAxis: [{ // left y axis
      title: {
        text: null
      },
      labels: {
        align: 'left',
        x: 3,
        y: 16,
        format: '{value:.,0f}'
      },
      showFirstLabel: false
    }, { // right y axis
      linkedTo: 0,
      gridLineWidth: 0,
      opposite: true,
      title: {
        text: null
      },
      labels: {
        align: 'right',
        x: -3,
        y: 16,
        format: '{value:.,0f}'
      },
      showFirstLabel: false
    }],

    legend: {
      align: 'left',
      verticalAlign: 'top',
      borderWidth: 0
    },

    tooltip: {
      shared: true,
      crosshairs: true
    },

    plotOptions: {
      series: {
        cursor: 'pointer',
        className: 'popup-on-click',
        marker: {
          lineWidth: 1
        }
      }
    },

    series: [{
      name: 'All sessions',
      lineWidth: 4,
      marker: {
        radius: 4
      }
    }, {
      name: 'New users'
    }]
  });
</script>
<?= $this->endSection(); ?>