<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Role;
use App\Models\User;
use App\Models\postrequirment;
use App\Models\itemadd;
use App\Models\request_product;
use Hash;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Staff::paginate(10);
        return view('backend.staff.staffs.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('backend.staff.staffs.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(User::where('email', $request->email)->first() == null){
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->mobile;
            $user->user_type = "staff";
            $user->password = Hash::make($request->password);
            if($user->save()){
                $staff = new Staff;
                $staff->user_id = $user->id;
                $staff->role_id = $request->role_id;
                if($staff->save()){
                    flash(translate('Staff has been inserted successfully'))->success();
                    return redirect()->route('staffs.index');
                }
            }
        }

        flash(translate('Email already used'))->error();
        return back();
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
        $staff = Staff::findOrFail(decrypt($id));
        $roles = Role::all();
        return view('backend.staff.staffs.edit', compact('staff', 'roles'));
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
        $staff = Staff::findOrFail($id);
        $user = $staff->user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->mobile;
        if(strlen($request->password) > 0){
            $user->password = Hash::make($request->password);
        }
        if($user->save()){
            $staff->role_id = $request->role_id;
            if($staff->save()){
                flash(translate('Staff has been updated successfully'))->success();
                return redirect()->route('staffs.index');
            }
        }

        flash(translate('Something went wrong'))->error();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy(Staff::findOrFail($id)->user->id);
        if(Staff::destroy($id)){
            flash(translate('Staff has been deleted successfully'))->success();
            return redirect()->route('staffs.index');
        }

        flash(translate('Something went wrong'))->error();
        return back();
    }
    
    public function requiremtIndex(){
       $requirement= postrequirment::paginate(15);
        return view('backend.postrequirement.requirement_index',compact('requirement'));
    }
    
    
      public function requirementdelete($id)
    {
       
            postrequirment::find($id)->delete();
            flash(translate('Requirement request has been deleted successfully'))->success();
            return redirect()->back();
        
    }
    
    public function itemadd(){
        
        return view('backend.postrequirement.itemadd');
    }
    
      public function itemadds(Request $request){
        
       $data=$request->item;
       $row=itemadd::where('item',$data)->first();
       if($row){
            flash(translate('Item already added'))->error();
           return redirect()->back();
       }else{
           $datas=$request->all();
        itemadd::create($datas);
        flash(translate('Item added successfully'))->success();
        return redirect()->route('allitem');
       }
       
      
    }
    
    
    public function allitem(){
        $requirement=itemadd::all();
        return view('backend.postrequirement.allitem',compact('requirement'));
    }
    
         public function itemdelete($id)
    {
       
            itemadd::find($id)->delete();
            flash(translate('Item has been deleted successfully'))->success();
            return redirect()->back();
        
    }
    
    
    
        public function showrequestproduct()
    {
        $showdata = request_product::paginate(15);

        return view('showRequestProduct', compact('showdata'));
    }
    
    
    
        public function edits($id)
    {
        $showdata = request_product::find($id);
        return view('update', compact('showdata'));
    }

    public function updatedata(Request $request, $id)
    {

        //dd($request->all());

        $update = request_product::find($id);
        $recorddata = $request->all();
        $update->update($recorddata);
        // $showdata = request_product::find($id);
        // $showdata->Name = $request->input('Name');
        // $showdata->Phone = $request->input('Phone');
        // $showdata->Email = $request->input('Email');
        // $showdata->Product_link = $request->input('Product_link');
        // $showdata->Size = $request->input('Size');
        // $showdata->color = $request->input('color');
        // $showdata->Quantity = $request->input('Quantity');
        // $showdata->Comments = $request->input('Comments');
        // $showdata->update();
        return redirect()->route('showproduct')->with('message', 'Data updated Successfully');
    }


    public function delete($id)
    {
        $del = request_product::find($id);
        $del->delete();
        return redirect()->back()->with('error', 'Deleted Successfully');
    }
    
    
    public function termsview()
    {
        return view('backend.terms');
    }

    public function termsstore(Request $request)
    {
        //dd($request->all());

        $terms=$request->all();
        terms::create($terms);
        return redirect()->back()->with('message','Data Inserted');

    }


    public function termsedit()
    {
        return view('backend.updateterns');
    }

    public function termsupdate(Request $request, $id)
    {

        $t=terms::find($id);
        $data=$request->all();
        $t->update($data);
        return redirect()->back()->with('message','Data Updated');
    }
}
