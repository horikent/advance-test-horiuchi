<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Https\Requests\ContactRequest;

class ContactsController extends Controller
{
    public function index(Request $request)
    {
        return view('/index');
    }
    
    public function confirm(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'gender' =>  'required',
            'email' =>  'required|email',
            'postcode' =>  'required',
			'address' => 'required',
			'opinion' => 'required'
        ]);
        $inputs = $request->all();

        return view('/confirm',['inputs'=>$inputs,
    ]);
    }

    public function create(Request $request)
    {
        $param=[
            'fullname' => $request->fullname,
            'gender' =>  $request->gender,
            'email' =>  $request->email,
            'postcode' => $request->postcode,
			'address' => $request->address,
			'building_name' => $request->building_name,
			'opinion' => $request->opinion
            ];
            Contact::create($param);

        $action = $request->input('action');
        $inputs = $request->except('action');
            if($action !== 'submit'){
            return redirect('/index')
                ->withInput($inputs);
            }else{
                return view('/thanks');
            }    
    }
    public function find(Request $request)
    {
        $param=[
            'fullname' => $request->fullname,
            'gender' =>  $request->gender,
            'email' =>  $request->email,
			'opinion' => $request->opinion
            ];
            return view('/admin', $param);
    }

    public function search(Request $request)
    {
        $fullname = $request->fullname;
        $gender = $request->gender;
        $email = $request->email;
        if (!empty($fullname)){
            $contacts= Contact::where('fullname', 'likebinary', "%{$fullname}%")->get();
        }
        if (!empty($gender)){
            $contacts = Contact::where('gender', 'likebinary', "%{$gender}%")->get();
        }
        if (!empty($email)){
            $contacts = Contact::where('email', 'likebinary', "%{$email}%")->get();
        }
        return redirect('/admin');
    }


}