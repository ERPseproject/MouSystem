<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Pjs;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class PjsController extends Controller
{
  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cus = DB::table('customers')->select('name')->get();
        $hr = DB::table('hr')->select('fname','lname')->get();
        $hr2 = DB::table('hr')->select('fname','lname')->get();
        $hr3 = DB::table('hr')->select('fname','lname')->get();
        $hr4 = DB::table('hr')->select('fname','lname')->get();
        return view('mou.mouIn.create', compact('cus','hr','hr2','hr3','hr4'));
    }

    public function showmin()
    {
      //$pjs = DB::table('pjs')->first();
      //$pjs = Pjs::orderBy('id', 'desc')->first()->id;
    
      $pjs = Pjs::all()->toArray();
      return view('mou.mouIn.showmin', compact('pjs'));
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
        
        $this->pjs['opend'] = strlen($request->opend)? Carbon::createFromFormat('d/m/Y', $request->opend) : null;
        $this->pjs['closed'] = strlen($request->closed)? Carbon::createFromFormat('d/m/Y', $request->closed) : null;
        
        $pjs->year= $request->input('year');
        
        if ($request->file('fname') == null) {
          $file = "";
        }else{
          $filename= $request->file('fname')->getClientOriginalName();
          //file in /storage/app/public/uploads and public/storage/uploads/pdf
          $request->file('fname')->storeAs('public/uploads/pdf/' ,$filename); 
          $pjs->fname = $filename;
        }
        $pjs->save();
        
     
        return redirect('/mou/mouIn/showmin')->with('success','Data Added');
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
      $pjs = Pjs::find($id);
      $cus = DB::table('customers')->select('name')->get();
      $hr = DB::table('hr')->select('fname','lname')->get();
      $hr2 = DB::table('hr')->select('fname','lname')->get();
      $hr3 = DB::table('hr')->select('fname','lname')->get();
      $hr4 = DB::table('hr')->select('fname','lname')->get();
      return view('mou.mouIn.edit', compact('pjs', 'id','cus','hr','hr2','hr3','hr4'));
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
      $pjs = Pjs::find($id);
      $pjs->name = $request->get('name');
        $pjs->leader =$request->get('leader');
        $pjs->mem1 = $request->get('mem1');
        $pjs->mem2= $request->get('mem2');
        $pjs->mem3= $request->get('mem3');
        $pjs->proid= $request->get('proid');
        $pjs->type= $request->get('type');
        $pjs->cname= $request->get('cname');
        $pjs->budget= $request->get('budget');
        $pjs->opend = strlen($request->opend)? Carbon::createFromFormat('d/m/Y', $request->opend) : null;
        $pjs->closed = Carbon::createFromFormat('d/m/Y', $request->closed);
        // $this->pjs['opend'] = strlen($request->opend)? Carbon::createFromFormat('d/m/Y', $request->opend) : null;
        // $this->pjs['closed'] = strlen($request->closed)? Carbon::createFromFormat('d/m/Y', $request->closed) : null;
        
        $pjs->year= $request->input('year');
        
        if ($request->file('fname') == null) {
          $file = "";
        }else{
          $filename= $request->file('fname')->getClientOriginalName();
          //file in /storage/app/public/uploads and public/storage/uploads/pdf
          $request->file('fname')->storeAs('public/uploads/pdf/' ,$filename); 
          $pjs->fname = $filename;
        }
        $pjs->save();
        
     
        return redirect('/mou/mouIn/showmin')->with('success','Data Added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $pjs = Pjs::find($id);
      $pjs->delete();
      return redirect('/mou/mouIn/');
    }
}


