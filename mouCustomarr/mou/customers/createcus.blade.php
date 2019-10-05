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
            alert('ยังไม่ได้กรอกชื่อผู้รับบริการ');
            return false;
      }
      if(document.getElementById('address').value == "")
      {
            alert('ยังไม่ได้กรอกที่อยู่');
            return false;
      }
      if(document.getElementById('tax').value == "")
      {
            alert('ยังไม่ได้กรอกเลขประจำตัวผู้เสียภาษี');
            return false;
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

                      
                      <form method="post" action="{{url('mou')}}" onSubmit="JavaScript:return fncSubmit();">
                        {{csrf_field()}}
                      <h1 class="w3-text-teal">เพิ่มข้อมูลผู้รับบริการ</h1>
                      <div class="form-group">
                        <label >ชื่อผู้รับบริการ:</label>
                        <input name="name" type="text" class="form-control" id="name">
                      </div>
                      <div class="form-group">
                        <label for=>ที่อยู่:</label>
                        <input name="address" type="text" class="form-control" id="address">
                      </div>

                      <div class="form-group">
                        <label >เลขประจำตัวผู้เสียภาษี:</label>
                        <input name="tax_id" type="text" class="form-control" onKeyPress="CheckNum()" id="tax">
                      </div>

                      <div class="form-group">
                        <label >สถานภาพ:</label>
                        <select class="form-control" name="status">
                          <option>ราชการ</option>
                          <option>เอกชน</option>
                          <option>รัฐวิสาหกิจ</option>
                          <option>องค์การมหาชน</option>
                        </select>
                      </div>

                      <a href="{{url('/mou/customer/show')}}" class="btn btn-success">ดูข้อมูลผู้รับบริการ</a> <input type="submit" value="ตกลง" class="btn btn-default">
                       </form>
<!-- 
                       @if(count($errors)>0)
                      <div class="alert alert-danger">
                          <ul>
                            @foreach($errors->all as $error)
                              <li>{{$error}}</li>
                            @endforeach
                          </ul>
                      </div> -->
<!-- 
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
