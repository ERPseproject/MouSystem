<!DOCTYPE html>
<html lang="en">

<head>
    <title>แสดงข้อมูลโครงการ</title>
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
                         <h2 >ข้อมูลโครงการ</h2>
                         <br>
                         <div> 
                                <a href="{{url('/mou/mouIn')}}" class="btn btn-success"> เพิ่มข้อมูลโครงการ</a>
                                <br>
                                <br>
                            
                         </div>
                         <table class="table table-bordered table-striped">
                            <tr>
                                <th>ชื่อโครงการ</th>
                                <th>หัวหน้าโครงการ</th>
                                <th>ผู้รับผิดชอบคนที่ 2</th>
                                <th>ผู้รับผิดชอบคนที่ 3</th>
                                <th>ผู้รับผิดชอบคนที่ 4</th>
                                <th>เลขรหัสกำกับโครงการ</th>
                                <th>ชนิดโครงการ</th>
                                <th>ชื่อผู้รับบริการ</th>
                                <th>งบประมาณ</th>
                                <th>ไฟล์ pdf </th>
                                <th>วันเปิดโครงการ</th>
                                <th>วันปิดโครงการ</th>
                                <th>ปีงบประมาณ</th>
                                <th>รายรับร่วมปี</th>
                                
                            </tr>
                            
                             @foreach($pjs as $row)
                             <tr>
                             
                                <td>{{$row['name']}}</td>
                                <td>{{$row['leader']}}</td>
                                <td>{{$row['mem1']}}</td>
                                <td>{{$row['mem2']}}</td>
                                <td>{{$row['mem3']}}</td>
                                <td>{{$row['proid']}}</td>
                                <td>{{$row['type']}}</td>
                                <td>{{$row['cname']}}</td>
                                <td>{{$row['budget']}}</td>

                                <td><a href="{{ asset('storage/uploads/pdf/'.$row['fname']) }}"> {{$row['fname']}} </a></td>
                                
                                
                                <td> {{ $row['opend'] ? \Carbon\Carbon::parse($row['opend'])->format('d/m/Y') : null }}</td>
                                <td> {{ $row['closed'] ? \Carbon\Carbon::parse($row['closed'])->format('d/m/Y') : null}}</td>
                               
                                <td>{{$row['year']}}</td>
                                <td>{{$row['total']}}</td>
                               
                             
                                <td><a href="{{action('PjsController@edit', $row['id'])}}" class='btn btn-primary'>แก้ไข</a></td>
                                <form method="post" class="delete_form" action="{{action('PjsController@destroy', $row['id'])}}">
                                {{ csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE" />
                                <td><button type="submit" class="btn btn-danger">ยกเลิก</button></form></td> 
                                
                                </form>
                                </tr>
                             @endforeach
                             </table>  
                                   


                        </div>
                    </div>
                    </div>
                    <div class="col-sm-2 sidenav"></div>
            </div>
        </div>
        <script type="text/javascript">
        $(document).ready(function(){
            $('.delete_form').on('submit', function(){
                if(confirm("คุณต้องการยกเลิกการเพิ่มข้อมูลโครงการใช่หรือไม่ ?"))
                {
                    return true;
                }
                else
                {
                    return false;
                }
            });
        });
        </script>
    
        <footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</header>
</html>
