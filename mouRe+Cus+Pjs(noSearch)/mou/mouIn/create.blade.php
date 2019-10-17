<!DOCTYPE html>
<html lang="en">

<head>
    <title>เพิ่มข้อมูลโครงการ</title>
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
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
    $( function() {
      $( "#datepicker2" ).datepicker({
        dateFormat: 'dd/mm/yy',
        changeMonth: false,
        changeYear: true,       
      });
    } );
    </script>

    <!-- เฉพาะตัวเลข -->
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
      
      if(document.getElementById('name').value == "")
      {
            alert('ยังไม่ได้กรอกชื่อโครงการ');
            return false;
      }
      if(document.getElementById('proid').value == "")
      {
            alert('ยังไม่ได้กรอกเลขกำกับโครงการ');
            return false;
      }
      // if(document.getElementById('type').vaule  == "MOU" )
      // {
       
      //     if(document.getElementById('budget').value == "")
      //     {
      //       alert('ยังไม่ได้กรอกจำนวนงบประมาณ');
      //       return false;
      //     }
      //     if(document.getElementById('file').value == "")
      //     {
      //           alert('ยังไม่ได้เลือกไฟล์');
      //           return false;
      //     }
    
      //     if(document.getElementById('year').value == "")
      //     {
      //        alert('ยังไม่ได้กรอกปีงบประมาณ');
      //         return false;
      //     }
      //     if($("#datepicker").datepicker("getDate") === null)
      //     {
      //       alert("ยังไม่ได้เลือกวันเปิดโครงการ");
      //       return false;
      //     }
      //     if($("#datepicker2").datepicker("getDate") === null)
      //     {
      //       alert("ยังไม่ได้เลือกวันปิดโครงการ");
      //       return false;
      //     }
      //  }
    
    }
    </script>

    <script language="javascript">
      function show_table(id) {
        if(id == 'MOU') { // ถ้าเลือก radio button 1 ให้โชว์ table 1 และ ซ่อน table 2
          document.getElementById("a").style.display = "";
          document.getElementById("b").style.display = "";
          document.getElementById("c").style.display = "";
          document.getElementById("d").style.display = "";
          document.getElementById("e").style.display = "";
          document.getElementById("f").style.display = "";
          document.getElementById("g").style.display = "";
          
        } else if(id == 'Open') { // ถ้าเลือก radio button 2 ให้โชว์ table 2 และ ซ่อน table 1
          document.getElementById("a").style.display = "none";
          document.getElementById("b").style.display = "none";
          document.getElementById("c").style.display = "none";
          document.getElementById("d").style.display = "none";
          document.getElementById("e").style.display = "none";
          document.getElementById("f").style.display = "none";
          document.getElementById("g").style.display = "none";
        }
      }
    </script>

    <!-- เฉพาะ pdf -->
    <script>
      function fileValidation(){
          var fileInput = document.getElementById('file');
          var filePath = fileInput.value;
          var allowedExtensions = /(\.pdf)$/i;
          if(!allowedExtensions.exec(filePath)){
              alert('อัพโหลดได้เฉพาะไฟล์นามสกุล .pdf เท่านั้น');
              fileInput.value = '';
              return false;
          }else{
   
          }
      }
    </script>


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
                  <div class="w3-row w3-padding-64">
                    <div class="w3-twothird w3-container">
                      <h1 class="w3-text-teal">เพิ่มข้อมูลโครงการพัฒนาวิชาการ</h1>
                      <div class="form-group">

                      <form method="post" action="{{ url('/storemou') }}" enctype="multipart/form-data" onSubmit="JavaScript:return fncSubmit();">
                      {{ csrf_field() }}

                      
                        <label >ชื่อโครงการ:</label>
                        <input type="text" class="form-control" name="name" id="name">
                      </div>

                      <div class="form-inline">
                      <!-- ต้องดึงจากก HR ทั้ง 4 อัน-->
                        <label >หัวหน้าโครงการ:</label>
                        <select class="form-control" name="leader">
                        @foreach($hr as $hr)

                          <option> {{$hr->fname}} {{$hr->lname}} </option>
                        @endforeach
                      
                        </select><br>
                        <label >ชื่อผู้รับผิดชอบ2:</label>
                        <select class="form-control" name="mem1">
                        @foreach($hr2 as $hr)

                        <option> {{$hr->fname}} {{$hr->lname}} </option>
                        @endforeach
                      
                            <option>-</option>
                        </select><br>
                        <label >ชื่อผู้รับผิดชอบ3:</label>
                        <select class="form-control" name="mem2">
                        @foreach($hr3 as $hr)

                        <option> {{$hr->fname}} {{$hr->lname}} </option>
                        @endforeach

                      
                            <option>-</option>
                        </select><br>
                        <label >ชื่อผู้รับผิดชอบ4:</label>
                        <select class="form-control" name="mem3">
                        @foreach($hr4 as $hr)

                        <option> {{$hr->fname}} {{$hr->lname}} </option>
                        @endforeach
                      
                            <option>-</option>
                        </select><br>
                      </div>
                      <br>
                      <div class="form-group">
                        <label >เลขกำกับโครงการ:</label>
                        <input type="text" class="form-control" name="proid" id="proid">
                      </div>


                      <!-- optradio -->
                      <div class="radio" >
                        <label><input value="MOU" type="radio" name="type" onclick="show_table(this.value);" checked="checked" id="type">MOU</label>
                        <label><input value="Open" type="radio" name="type" onclick="show_table(this.value);" id="type">Open</label>
                      </div><br>
                      <!-- <input type="text" class="form-control" name="type"> -->
                      <div class="form-group" id='a'>
                        <label >ผู้รับบริการ:</label>
                        <!-- ต้องดึงจาก customer DB --> 
                        <select class="form-control" id="cname" name="cname">
                        <option>-</option>
                        @foreach($cus as $cus)

                          <option> {{$cus->name}}</option>
                        @endforeach
                        </select>
                      </div>

                      <div class="form-group" id='b'>
                        <label>งบประมาณ:</label>
                        <input type="text" class="form-control" name="budget" onKeyPress="CheckNum()" id="budget">
                      </div>

                      <div class="form-group" id='c'>
                        <!-- up file-->
                      <b>อัพโหลดไฟล์เอกสาร:</b>
                        <input type="file" name="fname" id="file" accept=".pdf"" onchange="return fileValidation()"><br>
                        <input type="hidden" name="_token" value="{{ csrf_token()}}">
                      </div>

                      <form class="form-inline">
                        <div class="form-group" id='d'>
                          <label >วันเปิดโครงการ:</label>
                          <!-- <input type="text" class="form-control" name="opend" id='d'> -->
                          <input type="text" id="datepicker" name="opend">&nbsp;&nbsp;
                        </div>
                        <div class="form-group" id='g'>
                          <label id='f'>วันปิดโครงการ:</label>
                          <!-- <input type="text" class="form-control" name="closed" id='f'> -->
                          <input type="text" id="datepicker2" name="closed">&nbsp;
                        </div>
                     
                      <div class="form-group" id='e'>
                        <label>ปีงบประมาณ:</label>
                        <input type="text" class="form-control" name="year"  id='year' onKeyPress="CheckNum()">
                    
                      </div>

                      <input type="submit" class="form-control-btn">
                      </form>
                     </form>
                      <!-- @if(count($errors)>0)
                      <div class="alert alert-danger">
                          <ul>
                            @foreach($errors->all as $error)
                              <li>{{$error}}</li>
                            @endforeach
                          </ul>
                      </div>

                      @endif -->
                      @if( \Session::has('success'))
                      <div class="alert alert-success">
                        <p>{{ \Session::get('success')}}</p>
                      </div>
                      @endif
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
