<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Admin;
use Session;
use Hash;
class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.admin_dashboard');
    }

    public function settings()
    {
        $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email )->first();
        return view('admin.admin_settings',compact('adminDetails'));
    }

    public function checkCurrentPassword(Request $request)
    {
        $data = $request->all();
        if(Hash::check($data['current_pw'],Auth::guard('admin')->user()->password )){
            echo 'true';
        }else{
            echo 'false';
        }
    }

    public function updateCurrentPassword(Request $request)
    {

            $data = $request->all();

            if(Hash::check($data['current_pw'],Auth::guard('admin')->user()->password )){

                if($data['new_pw'] == $data['confirm_pw']){
                   Admin::where('id',Auth::guard('admin')->user()->id)->update(["password"=>Hash::make($request['new_pw'])]);
                   $request->session()->flash('success', 'Password Has Been Updated Successfully!');
                   return redirect()->back();
                }else{

                    $request->session()->flash('error', 'New Password and current password does not match!');
                    return redirect()->back();
                }
            }else{
                $request->session()->flash('error', 'Your Current Password is Wrong!');
                return redirect()->back();
            }

    }

    public function updateAdminDetails(Request $request)
    {
        if($request->isMethod('post')){
          $data = $request->all();
          $rules = [
              'admin_name' => 'required|regex:/^[\pL\s\-]+$/u',
              'mobile'    =>  'required|numeric'
          ];
          $customMessages = [
              'admin_name.required' => 'Name can not be blank!' ,
              'admin_name.regex'  => 'Name should only contains chracter!',
              'mobile.required' => 'Mobile Number not be blank!' ,
              'mobile.numeric' => 'Enter a valid mobile number!' ,
          ];
          $this->validate($request,$rules,$customMessages);

          Admin::where('email',Auth::guard('admin')->user()->email)
               ->update(
                   [
                       'name' => $data['admin_name'],
                       'mobile' => $data['mobile']
                   ]
               );
          session::flash('success','Admin details updated successfully!');
          return redirect()->back();
        }

        return view('admin.update_admin_details');

    }

    public function login(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                 'email' => 'required|email',
                 'password'=> 'required'
            ];

            $customErrorMessage = [
                 'email.required' => 'Email id can not be blank!',
                 'email.email' => 'Enter a valid email address!',
                 'password.required' => 'Password can not be blank!',
            ];

            $this ->validate($request,$rules,$customErrorMessage);

           if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' =>$data['password']])){
               return redirect('admin/dashboard');
           }
           else{
              Session::flash('error_message','Invalid username or Password');
               return redirect()->back();
           }

        }
        return view('admin.admin_login');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}
