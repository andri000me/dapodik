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
        <section class="col-lg-6 connectedSortable">

          <div class="box box-info">
            <div class="box-body" style="min-height: 450px;">
              <?php  
                $query3 = mysqli_query($conn, "SELECT profil.nama_sekolah, kepsek.npsn,kepsek.kepala_sekolah, curdate() FROM `kepsek` JOIN profil ON profil.npsn = kepsek.npsn WHERE (curdate() - tgl_berahir) > 0 ORDER BY tgl_berahir DESC LIMIT 3");

                $query4 = mysqli_query($conn, "SELECT profil.nama_sekolah, kepsek.npsn,kepsek.kepala_sekolah, kepsek.tgl_berahir, curdate() FROM `kepsek` JOIN profil ON profil.npsn = kepsek.npsn WHERE kepsek.tgl_berahir BETWEEN CURRENT_DATE AND (CURRENT_DATE + INTERVAL $interval MONTH) ORDER BY tgl_berahir ASC");

              ?>
              <h3 class="box-title" style="margin-bottom: 1.5em;">Reminder Masa Berakhir Kepala Sekolah</h3>

              <div class="alerts">
                <?php  
                  while($berakhir = mysqli_fetch_array($query3, MYSQLI_BOTH)){
                    echo "
                    <div class='alert alert-danger alert-dismissible'>
                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                      <h4>$berakhir[nama_sekolah]</h4>
                      Jabatan Kepala Sekolah untuk $berakhir[kepala_sekolah] Telah Berakhir
                    </div>
                    ";
                  }
                ?>
                
              </div>
              

              <form class="row" style="margin-bottom: 40px" action="index.php" method="get">
                <div class="col-md-4" style="text-align: right;">
                  <label style="margin-top: 5px;">Filter Reminder</label>
                </div>
                <div class="form-group col-md-4">
                   <select class='col-md-4 form-control' name="interval">
                      <option value="1" <?php if($interval == 1){echo "selected";} ?> >1 Bulan</option>
                      <option value="2" <?php if($interval == 2){echo "selected";} ?> >2 Bulan</option>
                      <option value="3" <?php if($interval == 3){echo "selected";} ?> >3 Bulan</option>
                      <option value="4" <?php if($interval == 4){echo "selected";} ?> >4 Bulan</option>
                      <option value="5" <?php if($interval == 5){echo "selected";} ?> >5 Bulan</option>
                      <option value="6" <?php if($interval == 6){echo "selected";} ?> >6 Bulan</option>
                  </select>
                </div>
                
                <div class="form-group col-md-1">
                  <button class="btn btn-info" type="submit">Filter</button>
                </div>
              </form>

               <table>
                <thead>
                  <th>Masa Berakhir</th>
                  <th>Nama Kepsek</th>
                  <th>Nama Sekolah</th>
                </thead>
                <tbody>
                  <?php  
                  while ($listberakhir = mysqli_fetch_array($query4, MYSQLI_BOTH)) {
                    echo "
                    <tr>
                      <td>$listberakhir[tgl_berahir]</td>
                      <td>$listberakhir[kepala_sekolah]</td>
                      <td>$listberakhir[nama_sekolah]</td>
                    </tr>
                    ";
                  }
                  ?>
                  
                </tbody>
              </table>


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
      $query = mysqli_query($conn, "SELECT (SUM(jumlah_putra) + SUM(jumlah_putri)) AS total, tahun_ajaran FROM `siswa` GROUP BY tahun_ajaran ORDER BY tahun_ajaran DESC LIMIT 5");
      $query2 = mysqli_query($conn, "SELECT (SUM(jumlah_putra) + SUM(jumlah_putri)) AS total, tahun_ajaran FROM `siswa` GROUP BY tahun_ajaran ORDER BY tahun_ajaran DESC LIMIT 5");

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


      for ($i=0; $i < 5; $i++) {
        $x = 4-$i; 
        echo "'$list[$x]'";

        if($i > 4){
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


            for ($i=0; $i < 5; $i++) {
              $y = 4-$i; 
              echo "'$lists[$y]'";

              if($i > 4){
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