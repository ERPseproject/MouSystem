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
                      <h1 class="w3-text-teal">ระบบโครงการพัฒนาวิชาการและบริการ</h1> <br>

                      <div class="list-group">
                        <ul>
                        <li><a class="w3-bar-item w3-button w3-hover-black" class="list-group-item" href="/mou/mouIn">เพิ่มโครงการพัฒนาวิชาการ</a></li><br>
                        <li><a class="w3-bar-item w3-button w3-hover-black" class="list-group-item" href="/mou/customer">เพิ่มข้อมูลผู้รับบริการ</a></li><br>
                        <li><a class="w3-bar-item w3-button w3-hover-black" class="list-group-item" href="#">ค้นหาข้อมูลโครงการพัฒนาวิชาการ</a></li><br>
                        <li><a class="w3-bar-item w3-button w3-hover-black" class="list-group-item" href="#">ค้นหาข้อมูลโครงการบริการ</a></li><br>
                        <li><a class="w3-bar-item w3-button w3-hover-black" class="list-group-item" href="/recipe">การบันทึกใบเสร็จ</a></li><br>
                      </ul>

                      </div>

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
