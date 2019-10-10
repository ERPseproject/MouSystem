<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Pjs;

class PjsController extends Controller
{
  
    //ใช้ดึงชื่อ  HR
    public static function getHR()
    {
      $conn = mysqli_connect("localhost","root","","erp",);
      mysqli_set_charset($conn,'utf8');
      mysqli_query($conn, "SET NAMES 'utf8' COLLATE 'utf8_general_ci';");
      $query = "SELECT fname,lname FROM `hr` ";
      $result = mysqli_query($conn, $query);
      if ($result-> num_rows > 0)
      {
        while ($row1 = mysqli_fetch_array($result))
        {
            echo 
          "<option>".$row1['fname']." ".$row1['lname']."</option>";
                       
         
        }
        $conn-> close();
      }
    }
    //ใช้ดึงชื่อลูกค้า
    public static function getCus()
    {
      $conn = mysqli_connect("localhost","root","","erp");
      mysqli_set_charset($conn,'utf8');
      mysqli_query($conn, "SET NAMES 'utf8' COLLATE 'utf8_general_ci';");
      $query = "SELECT name FROM `customers` ";
      $result = mysqli_query($conn, $query);
      if ($result-> num_rows > 0)
      {
        while ($row1 = mysqli_fetch_array($result))
        {
            echo 
          "<option>".$row1['name']."</option>";
                       
         
        }
        $conn-> close();
      }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('mou.mouIn.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mou.mouIn.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pjs = new Pjs();

        $pjs->name = $request->input('name');
        $pjs->leader =$request->input('leader');
        $pjs->mem1 = $request->input('mem1');
        $pjs->mem2= $request->input('mem2');
        $pjs->mem3= $request->input('mem3');
        $pjs->proid= $request->input('proid');
        $pjs->type= $request->input('type');
        $pjs->cname= $request->input('cname');
        $pjs->budget= $request->input('budget');
        $pjs->opend= $request->input('opend');
        $pjs->closed= $request->input('closed');
        $pjs->year= $request->input('year');
        // $pjs->total= $request->input('total');
        // $pjs->fname = $request->input('fname');
        if ($request->file('fname') == null) {
          $file = "";
        }else{
          $filename= $request->file('fname')->getClientOriginalName();
          //file in /storage/app/public/uploads
          $request->file('fname')->storeAs('public/uploads/pdf/' ,$filename); 
          $pjs->fname = $filename;
        }
        $pjs->save();
        
     
        return redirect()->back()->with('success','Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}


