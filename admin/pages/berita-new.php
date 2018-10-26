  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Berita
        <small>Berita Baru</small>
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
        <form action="pages/post-proses.php" method="post" id="form">
        <section class="col-lg-9 connectedSortable">

          <!-- Newpost widget -->
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-pencil"></i>

              <h3 class="box-title">Tulis</h3>
            </div>
            <div class="box-body">
                <div id="post-title-wrapper">
                  <img id="background-header">
                  <div class="form-group">
                    <input type="text" class="form-control" name="post-title" placeholder="Title" id="post-title">
                  </div>
                </div>
                <div>
                  <textarea id="summernote" name="content" cols ="130" class="input-block-level"></textarea>
                </div>
             
            </div>
            <div class="box-footer clearfix">

              <button type="button" class="pull-right btn btn-default" id="sendPost">Post
                </button>
              <button type="button" class="pull-left btn btn-default" id="savePost">Save
                </button>
              
            </div>
          </div>

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-3 connectedSortable">

          <!-- Properties widget -->
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-gear"></i>

              <h3 class="box-title">Post Properties</h3>
            </div>
            <div class="box-body">
              <div id="label">
                <h5>Label</h5>
                
                  <textarea name="label" col="4" class="form-control"></textarea>
               
                <small style="color: #aeaeae">Type labels above, separate each label with comma</small>
              </div>
              <div id="image-header">
                <h5>Image Header</h5> 
                
                <div class="form-group">
                  <div class="btn btn-default btn-file image-box">
                    <div id="image-box">
                      <img id="blog-header">
                    </div>
                    <label id='blog-header-label'>
                      <span><i class="fa fa-camera"></i>Add Image Header</span>
                    </label> 
                    <input type="file" name="file" onchange="imagecrop(this)" accept="image/*" id="imageinput">
                  </div>
                  <a class="btn btn-default center" id="inputinimage">try image</a> <small id="small">drag in thumbnail to change position, scroll to zoom</small>

                  <!-- <textarea name="image" col="1" class="form-control imageurl"> </textarea> -->

                  <div id="imageurl"></div>

                </div>
                             
              </div>
            </div>
          </div>

        </section>
        <!-- right col -->
        </form>
        <script type="text/javascript">
          $('#sendPost').click(function(){
            $(form).submit();
          })

          /*function imagecrop(input){
            if(input.files && input.files[0]){
              var reader = new FileReader();
              reader.onload = function(e){
                $('#blog-header')
                      .attr('src', e.target.result)
                      .css({'width':'100%', 
                            'height' : '100%', 
                            'position' : 'absolute',
                            'left' : '0'});
                $('#blog-header-label')
                      .css('display','none');
                $('#image-box')
                      .css('padding', '0');
                $('.image-box')
                      .css('padding', '0');

              };
              reader.readAsDataURL(input.files[0]);
            }
          } */

         function imagecrop(input){
          
          if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){

              var $w = $('.basic-width'),
                  $h = $('.basic-height'),
                  basic = $('#blog-header').croppie({
                              viewport : {height : '100%', width : '100%'}
              });
              $('#blog-header-label')
                      .css('display','none');
              $('#imageinput')
                      .css('display','none');
              $('.cr-slider-wrap')
                      .css({'position' : 'absolute',
                           'top ' : '120px',
                           'z-index' : '999'});
              $('#image-box')
                      .css({'padding' : '0', 
                            'height'  : '100px'});
              $('.image-box')
                      .css('padding', '0');
              $('#inputinimage')
                      .css('display', 'block');
              $('#small')
                      .css('display', 'block');
              $('#post-title')
                      .css({'border' : 'none',
                            'background' : 'none',
                            'font-size' : '20px',
                            'text-align': 'center',
                            'font-weight' : '800'
                            })
              basic.croppie('bind', {
                url : e.target.result
              });


              $('#inputinimage').on('click', function(){
                var w = parseInt($w.val(), 10),
                    h = parseInt($h.val(), 10),s
                    size = 'viewport';
                    if (w || h) {
                      size = { width: w, height: h };
                    }
                var resim =  basic.croppie('result', {
                        type : 'canvas',
                        size : 'original'
                    }).then(function(src){
                        $('#background-header')
                            .attr('src', src)2
                    })

                var resrc = basic.croppie('result', {
                        type : 'rawcanvas',
                        size : 'original',
                        format : 'jpeg'
                    }).then(function(canvas){
                        var dataurl = canvas.toDataURL()
                        console.log(canvas)  
                        $('#imageurl').html(canvas)

                        $.ajax({
                          type : 'POST',
                          url : 'pages/post-proses.php',
                          data : {image:dataurl}
                        })
                    })
              });  

            };
            reader.readAsDataURL(input.files[0]);
          }
         }

         function cropping(){
          
         }

        </script>
        <style type="text/css">
          .croppie-container .cr-viewport{
            border : none;
          }
          #inputinimage, #small{
            margin-top: 1em;
            text-align: center;
            display: none;
            font-size: 10px;
            padding: 5px;
          }
          #background-header{
            z-index: 0; 
            left: 0px;  
            width: 100%;
            height: 100%;
          } 
          #post-title{
            position: relative;
            z-index: 2;
            width: 100%;
            overflow: hidden;
          }
          .croppie-result{
            width: 100% !important;
            height: 100% !important;
          }
          .imageurl{
            font-size: 9px;
            margin-top: 5px;
          }
        </style>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
    
  </div>
  <!-- /.content-wrapper -->


