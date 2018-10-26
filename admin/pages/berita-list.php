  <?php

    $conn = mysqli_connect("localhost", "root", "", "dapodik");
    $blogq = mysqli_query($conn, "SELECT * FROM berita order by id");

   ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Berita
        <small>List Berita</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Berita</li>
      </ol>
    </section>

    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-edit"></i>

              <h3 class="box-title">List</h3>
            </div>
            <div class="box-body">
              <table id="postlist">
                <thead>
                  <tr>
                    <th>Mark</th>
                    <th>No</th>
                    <th>Date</th>
                    <th width="500">Blog</th>
                    <th>Label</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    while($blog = mysqli_fetch_array($blogq, MYSQLI_BOTH)){ ?>
                    <tr>
                      <td><input type="checkbox" name="mark"></td>
                      <?php    

                      if(strlen($blog['content']) > 170){
                          $string = substr($blog['content'], 0, 170);
                          $content = substr($string, 0, strrpos($string, " ")).' <a href="readmore">[...]</a>';
                        }
                      else{
                          $content = $blog['content'];
                      }

                      echo "
                      <td>$blog[id]</td>
                      <td>$blog[date]</td>
                      <td>
                        <h5>$blog[title]</h5>
                        <p>$content</p>
                      </td>
                      <td>
                        <li>$blog[label]</li> 
                      </td>
                      <td><a href=pages/post-update.php?postid=$blog[id]>Edit</a> | <a>Hapus</a></td>
                      ";

                      ?>
                    </tr>
                      <?php
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

  </div>
  <!-- /.content-wrapper -->