

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
    <!-- datetime picker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
      $( "#datepicker" ).datepicker({
        dateFormat: 'dd/mm/yy',
        changeMonth: false,
        changeYear: true,       
      });
    } );
    </script>
    
    <script>
      function fileValidation(){
          var fileInput = document.getElementById('file');
          var filePath = fileInput.value;
          var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
          if(!allowedExtensions.exec(filePath)){
              alert('อัพโหลดได้เฉพาะไฟล์นามสกุล .jpeg/.jpg/.png/.gif เท่านั้น');
              fileInput.value = '';
              return false;
          }else{
              //Image preview
              if (fileInput.files && fileInput.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function(e) {
                      document.getElementById('imagePreview').innerHTML = '<img class="img-responsive" src="'+e.target.result+'"/>';
                  };
                  reader.readAsDataURL(fileInput.files[0]);
              }
          }
      }
    </script>

    <!-- พิมพ์ได้เฉพาะตัวเลข -->
    <script language="javascript">
      function CheckNum(){
       if (event.keyCode < 48 || event.keyCode > 57){
          event.returnValue = false;
        }
      }
      </script>

    <script type="text/javascript">
    function fncSubmit()
    {
      if(document.getElementById('file').value == "")
      {
            alert('ยังไม่ได้เลือกไฟล์');
            return false;
      }
      if($("#datepicker").datepicker("getDate") === null)
      {
            alert("ยังไม่ได้เลือกวันที่ออกใบเสร็จ");
            return false;
      }
      if(document.getElementById('money').value == "")
      {
            alert('ยังไม่ได้กรอกจำนวนเงิน');
            return false;
      }
    }
    </script>

    



    <!-- <script language="javascript">
      function show_table(id) {
        if(id == 'Open') { // ถ้าเลือก radio button 1 ให้โชว์ table 1 และ ซ่อน table 2
          document.getElementById("a").style.display = "";
          document.getElementById("b").style.display = "";
          document.getElementById("c").style.display = "";
          document.getElementById("d").style.display = "";
          document.getElementById("e").style.display = "";
        } else if(id == 'MOU') { // ถ้าเลือก radio button 2 ให้โชว์ table 2 และ ซ่อน table 1
          document.getElementById("a").style.display = "none";
          document.getElementById("b").style.display = "none";
          document.getElementById("c").style.display = "none";
          document.getElementById("d").style.display = "none";
          document.getElementById("e").style.display = "none";
        }
      }
    </script> -->


</head>

<header>
<body>

    <!-- nav bar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #8B0000;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Logo Web</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="main">
        <div class="container-fluid ">
            <div class="row content">
                <div class="col-sm-2 sidenav">
                  <h2 class="w3-bar-item"><b>Menu</b></h2>
                  <h4><a class="w3-bar-item w3-button w3-hover-black" href="/moufirst/">หน้าแรกระบบ</a><br><br>
                  <a class="w3-bar-item w3-button w3-hover-black" href="/mou/mouIn">เพิ่มโครงการพัฒนาวิชาการ</a><br><br>
                  <a class="w3-bar-item w3-button w3-hover-black" href="/mou/customer">เพิ่มข้อมูลผู้รับบริการ</a><br><br>
                  <a class="w3-bar-item w3-button w3-hover-black" href="#">ค้นหาข้อมูลโครงการพัฒนาวิชาการ</a><br><br>
                  <a class="w3-bar-item w3-button w3-hover-black" href="#">ค้นหาข้อมูลโครงการบริการ</a><br><br>
                  <a class="w3-bar-item w3-button w3-hover-black" href="/recipe">การบันทึกใบเสร็จ</a><br></h4>
                </div>



                <div class="col-sm-8">
                  <div class="w3-row w3-padding-40">
                    <div class="w3-twothird w3-container">
                      <h1 class="w3-text-teal">แก้ไขข้อมูลการบันทึกใบเสร็จ</h1><br>
                      <div class="form-group">


                         <form method="post" action="{{action('RecipeController@update', $id)}}" enctype="multipart/form-data" onSubmit="JavaScript:return fncSubmit();">
                        {{csrf_field()}}

                        <!-- ดึงจากดาต้าเบสโครงการ -->
                        <label >เลขรหัสกำกับโครงการ :</label>
                        <select class="form-control" name="proid" value="{{$recipes->proid}}">
                        <option >{{$recipes->proid}}</option>
                        @foreach($pjs as $pjs)

                          <option> {{$pjs->proid}}</option>
                        @endforeach
          
                        </select>
                      </div>
                    <b>อัพโหลดใบเสร็จ:</b>
                      <input type="file" name="image" class="custom-file-input" id="file" accept="image/*" onchange="return fileValidation()">
                      <!-- Image preview -->
                       <br><br>   
                      <a height="100" width="80" id="2" data-toggle="modal" data-target="#myModal" > คลิ๊กเพื่อดูรูปภาพ </a>
                       <div id="myModal" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                             <div class="modal-content">
                               <div class="modal-body">
                                  <div id="imagePreview" ></div> 
                                    </div>
                                       <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                              </div>
                         </div>
                      </div>
                      <br>
                      <br>


                      <div class="form-group">
                        <label >วันที่ที่ใบเสร็จออก:</label>
                        <input type="text" id="datepicker" name="date" value="{{ date('d/m/Y', strtotime($recipes->date)) }}">
                      </div>

                      <div class="form-group">
                        <label>จำนวนเงิน:</label>
                        <input type="text" class="form-control" name="money" onKeyPress="CheckNum()" id="money"
                        value="{{$recipes->money}}">
                        <input type="hidden" class="form-control" name="oldm"
                        value="{{$recipes->money}}">
                      </div>

                      <!-- <div class="radio" >
                        <label><input value="MOU" type="radio" name="type" onclick="show_table(this.value);" checked="checked">MOU</label>
                        <label><input value="Open" type="radio" name="type" onclick="show_table(this.value);">Open</label>
                      </div> -->

            
                      
                      <a href="{{url('/recipe/show')}}" class="btn btn-success">ยกเลิก</a> <input type="submit" value="ยืนยัน" class="btn btn-default">
                      <input type="hidden" name="_method" value="PATCH" />
                      </form>

                      <!-- @if(count($errors)>0)
                      <div class="alert alert-danger">
                          <ul>
                            @foreach($errors->all as $error)
                              <li>{{$error}}</li>
                            @endforeach
                          </ul>
                      </div>

                      @endif
                      @if( \Session::has('success'))
                      <div class="alert alert-success">
                        <p>{{ \Session::get('success')}}</p>
                      </div>
                      @endif -->
                    </div>
                  </div>
                </div>
                <div class="col-sm-2 sidenav"></div>
            </div>
        </div>
    </div>

        <footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</header>
</html>
