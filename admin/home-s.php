  <?php  
    if(isset($_GET['interval'])){
      $interval = $_GET['interval'];
    }
    else{
      $interval = 6;
    }
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Beranda
      </h1>
    </section>

    <section class="content">
  
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-6 connectedSortable">
          <div class="box box-info">
            <div class="box-body" style="height: 450px;">
                  <h3 class="box-title" style="margin-bottom: 1.5em;">Rekapitulasi Total Siswa</h3>
             
                  <div class="chart">
                    <canvas id="areaChart" style="height:250px; display: none;"></canvas>
                    <canvas id="barChart" style="height:230px"></canvas>
                  </div>


            </div>
          </div>

        </section>

      </div>
      <!-- ./ row -->
    </section>
    <!-- ./ content -->

<style type="text/css">
  .alert{
    border: none;
    border-radius: 0;
    position: relative;
  }
  .alerts{
    margin-bottom: 3em;
  }
</style>

<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/chartjs/Chart.min.js"></script>


<script type="text/javascript">
  $(function(){
    $('#postlist').DataTable({
      'paging' : true,
      'searching' : true,
      'info' : true
    });

  });
</script>

<script type="text/javascript">
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------
    <?php 
      $query = mysqli_query($conn, "SELECT (SUM(jumlah_putra) + SUM(jumlah_putri)) AS total, tahun_ajaran FROM `siswa` WHERE npsn = '$_SESSION[npsn]' GROUP BY tahun_ajaran ORDER BY tahun_ajaran DESC LIMIT 5");
      $query2 = mysqli_query($conn, "SELECT (SUM(jumlah_putra) + SUM(jumlah_putri)) AS total, tahun_ajaran FROM `siswa` WHERE npsn = '$_SESSION[npsn]' GROUP BY tahun_ajaran ORDER BY tahun_ajaran DESC LIMIT 5");

    ?>

    var areaChartData = {
      labels: [
      <?php 
      $x=0; 
      $list = array();
      while ($fetch = mysqli_fetch_array($query, MYSQLI_BOTH)){
        $list[$x] = $fetch['tahun_ajaran'];
        $x++;
      } 


      for ($i=0; $i < count($list); $i++) {
        $x = (count($list)-1)-$i; 
        echo "'$list[$x]'";

        if($i > (count($list)-1)){
          echo "";
        }
        else{
          echo ",";
        }
      
      }
      ?>],


      datasets: [
        {
          label: "Electronics",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [
            <?php  
            $y=0; 
            $lists = array();
            while ($fetch2 = mysqli_fetch_array($query2, MYSQLI_BOTH)){
              $lists[$y] = $fetch2['total'];
              $y++;
            } 


            for ($i=0; $i < count($lists); $i++) {
              $y = (count($lists)-1)-$i; 
              echo "'$lists[$y]'";

              if($i > (count($lists)-1)){
                echo "";
              }
              else{
                echo ",";
              }
            
            }
            ?>
          ]
        }
      ]
    };
     //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
   
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 30,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
  });
</script>


    
  </div>
  <!-- /.content-wrapper -->

  <!-- this should be end of alooha -->