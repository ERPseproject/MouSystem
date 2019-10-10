<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB as DB;

use App\Recipes;
use App\Pjs;
use Carbon\Carbon;
use DB;
class RecipeController extends Controller
{
    public function index()
    {
         
        return view('mou.recipes.recipe');
    }

    public function showrec()
    {
      //ดึงข้อมูลทั้งหมดคอนเวิตเปน array
      $recipes = Recipes::all()->toArray();
      return view('mou.recipes.showrec', compact('recipes'));
    }
    
    //ใช้ดึง proid จาก pjs
    public static function getPid()
    {
      $conn = mysqli_connect("localhost","root","","erp");
      mysqli_set_charset($conn,'utf8');
      mysqli_query($conn, "SET NAMES 'utf8' COLLATE 'utf8_general_ci';");
      $query = "SELECT proid FROM `pjs` ";
      $result = mysqli_query($conn, $query);
      if ($result-> num_rows > 0)
      {
        while ($row1 = mysqli_fetch_array($result))
        {
            echo 
          "<option>".$row1['proid']."</option>";
                       
         
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

    
    public function store(Request $request)
    {
        $recipe = new Recipes();
        

        $recipe->proid = $request->input('proid');
        // $recipe->image = $request->input('image');
        // $recipe->date =  $request->input('date');
        $recipe->money = $request->input('money');
        $recipe->date = Carbon::createFromFormat('d/m/Y', $request->date);
        $this->validate($request, [
          'image' => 'mimes:jpeg,png,bmp,tiff |max:4096',
        ],
        
          $messages = [
              'required' => 'The :attribute field is required.',
              'mimes' => 'Only jpeg, png, bmp,tiff are allowed.'
          ]
      );
      
       

        if ($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); //getting img extension
            $fname= $request->file('image')->getClientOriginalName();
            $filename = $fname . '.' . $extension;
            //file in /storage/app/public/uploads -> symlink กับ public เพื่อโชว์หน้าเว็บ
            $request->file('image')->storeAs('public/uploads/recipes/' ,$filename);
            $recipe->image = $filename;
        } else {
            return $request;
            $recipe->image = '';
        }
        $recipe->save();

         $new_p = $request->input('cname');;
         $type = $request->input('type');;
        //check is MOU or Open and cname is  '-' or not
        //ถ้าเป็น Open เข้าไปทำการอัพเดทชื่อใน cname ของ pjs
        //check - กรณี Open มีชื่อผู้บริการอยู่แล้ว
        if ( $type == "Open" and $new_p != "-"){

          $new_id = $recipe->proid;
  
          //$new_p = $request->input('cname');;
          //type Open เท่านั้น ป้องกันติ๊ก id ของ MOU แต่เลือก type = Open ทำให้เกิดการเปลี่ยนชื่อลูกค้า
          DB::table('pjs')->where('proid', $new_id)->where('type', 'Open')->update(['cname' => $new_p]);
  
        }
        
        //บวกไป pjs total
        $total = $request->input('money');
        $proid = $request->input('proid');
        Pjs::where('proid', $proid)->increment('total',$total);



        // return view('mou.recipes.recipe')->with('success','Data Added');
        //return redirect()->back()->with('success','Data Added');
        return redirect('/recipe/show')->with('success','Data Added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //ลบใบเสร็จ เงินที่เพิ่มไปโครงการก็ลบด้วย
        $recipes = Recipes::find($id);
        $total = $recipes->money;
        $proid = $recipes->proid;
        Pjs::where('proid', $proid)->decrement('total',$total);
        $recipes->delete();
        return redirect('/recipe/show');
    }



    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $recipes = Recipes::find($id);
      //dd($recipes);
       return view('mou.recipes.edit', compact('recipes', 'id'));
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
       $this->validate($request, [
           'proid' => 'required',
           'image' => 'required',
           'money' => 'required',
           'date' => 'required'
       ]);
       $recipes = Recipes::find($id);
       
       $recipes->proid = $request->get('proid');
      //$recipe->image = $request->get('image');
       $recipes->money = $request->get('money');
       
       $recipes->date = Carbon::createFromFormat('d/m/Y', $request->date);
       $this->validate($request, [
         'image' => 'mimes:jpeg,png,bmp,tiff |max:4096',
       ],
       
         $messages = [
             'required' => 'The :attribute field is required.',
             'mimes' => 'Only jpeg, png, bmp,tiff are allowed.'
         ]
        );
     
       if ($request->hasfile('image')){
           $file = $request->file('image');
           $extension = $file->getClientOriginalExtension(); //getting img extension
           $fname= $request->file('image')->getClientOriginalName();
           $filename = $fname . '.' . $extension;
           //file in /storage/app/public/uploads 
           $request->file('image')->storeAs('public/uploads/recipes/' ,$filename);
           $recipes->image = $filename;
       } else {
           return $request;
           $recipes->image = '';
       }
       $recipes->save();

       
       //บวกไป pjs total
       $newm = $request->input('money');
       $oldm = $request->input('oldm');
       $proid = $request->input('proid');
       //ลบเงินเก่า บวกด้วยเงินใหม่
       Pjs::where('proid', $proid)->decrement('total',$oldm);
       Pjs::where('proid', $proid)->increment('total',$newm);

       return redirect('/recipe/show'); //->with('success','Data Added');


  }

   


}
