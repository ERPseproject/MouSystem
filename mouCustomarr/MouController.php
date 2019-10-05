<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;

class MouController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customers::all()->toArray();
        return view('mou.customers.showcus', compact('customers'));

    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mou.customers.createcus');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'tax_id' => 'required',
            'status' => 'required'
        ]);
        $mou = new Customers([
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'tax_id' => $request->get('tax_id'),
            'status' => $request->get('status')
        ]);
        $mou->save();
        return redirect('/mou/customer/show')->with('success','Data Added');
        // ->route('/mou/customer/showcus')->
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customers = Customers::find($id);
        return view('mou.customers.edit', compact('customers', 'id'));
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
            'name' => 'required',
            'address' => 'required',
            'tax_id' => 'required',
            'status' => 'required'
        ]);
        $customers = Customers::find($id);
        $customers->name = $request->get('name');
        $customers->address = $request->get('address');
        $customers->tax_id = $request->get('tax_id');
        $customers->status = $request->get('status');

        $customers->save();
        return redirect('/mou/customer/show')->with('success','อัพเดทเรียบร้อย');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idcustomer)
    {
        $customers = Customers::find($idcustomer);
        $customers->delete();
        return redirect('/mou/customer/show');
    }
}
