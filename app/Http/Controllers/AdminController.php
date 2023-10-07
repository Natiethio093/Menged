<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Buscompany;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function Add_bus_company(){
        return view("Admin.Addbuscompany");
    }
    public function add_company(Request $req){
        if(Auth::id()){
        $validatepro=$req->validate([
           'name'=>'required|String|max:100',
           'email'=>'required|Email',
           'phone'=>'required|String|max:10',
           'address'=>'required|String|max:100',
           'password'=>'required|String|min:8',
           'description'=>'required|String|max:100',
           'busnumber'=>'required|Integer|min:10',
           'cimage'=>'required',
         //   'logo'=>'required',
        ]);
        $company=new User();
        $buscompany=new Buscompany();
        $company->name=$validatepro['name'];
        $buscompany->name=$validatepro['name'];
        $company->email=$validatepro['email'];
        $buscompany->email=$validatepro['email'];
        $company->phone=$validatepro['phone'];
        $buscompany->contact_info=$validatepro['phone'];
        $company->address=$validatepro['address'];
        $company->usertype='2';
        $company->password=Hash::make($validatepro['password']);
        $buscompany->description=$validatepro['description'];
        $buscompany->number_of_buses=$validatepro['busnumber'];
        $cimage=$validatepro['cimage'];
      //   $logo=$validatepro['logo'];
        $imagename=$cimage->getClientOriginalName();//time() give image a unique name
        $imagename=time().'.'.$cimage->getClientOriginalExtension();
        $validatepro['cimage']->move('images', $imagename);//we will store image on product folder of the public directory
        $buscompany->image=$imagename;
      //   $logoname=time().'.'.$logo->getClientOriginalExtension();
      //   $validatepro['logo']->move('images', $logoname);
      //   $buscompany->logo=$logoname;
        $company->save();
        $buscompany->save();
        return redirect()->back()->with('message','Company Added Successfully');
     }
     else{
        return redirect('login');
     }
     }
     public function dashboard(){
       return view('admin.dashboard');
     }
     public function showcompany(){
      $showcompany=Buscompany::paginate(9);
      return view('admin.showbuscompany',compact('showcompany'));
     }
     public function deletecomp($compId){
       Buscompany::where('id',$compId)->delete();
      
     }
}
