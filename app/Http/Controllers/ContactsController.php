<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Https\Requests\ContactRequest;

class ContactsController extends Controller
{

    public function rules()
    {
        return [
            'fullname' => 'required',
            'gender' => 'required',
            'email' =>  'required|email',
            'postcode' =>  'required',
			'address' => 'required',
			'opinion' => 'required'
        ];
    }
    

    public function index(Request $request)
    {
        return view('index');
    }
    

    
    public function confirm(Request $request)
    {

        $request->validate([
            'fullname' => 'required',
            'gender' =>  'required',
            'email' =>  'required|email',
            'postcode' =>  'required|in:-',
			'address' => 'required',
			'opinion' => 'required|max:120'
        ]);
        [
            'name.required' => '名前を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスの形式で入力してください',
            'postocode.required' => '郵便番号は半角数字８桁で入力してください',
            'registered_at.date' => '日付の形式で入力してください',
            'address.required' => '住所を入力してください',
            'opinion.required' => 'ご意見を入力してください',
        ];
        $inputs = $request->all();

return view('confirm',['inputs'=>$inputs,]);


return view('confirm',['inputs'=>$inputs,]);
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
                return view('thanks');
            }    
    }
    public function find(Request $request)
    {
        $param=[
            'fullname' => $request->fullname,
            'gender' =>  $request->gender,
            'email' =>  $request->email,
			'opinion' => $request->opinion,
            ];
            return view('admin', $param);
    }

    public function search(Request $request)
    {
        $id = $request->id;
        $fullname = $request->fullname;
        $gender = $request->gender;
        $email = $request->email;
        $opinion = $request->opinion;
        $from = $request-> from;
        $until = $request-> until;
        $created_at =$request->created_at;

        if (!empty($gender)){
            $contacts = Contact::where('gender', 'LIKE BINARY', "%{$gender}%")->get();
        }

        if (!empty($from)&&!empty($until)){
            $contacts = Contact::getDate($from, $until);

        }elseif ((!empty($from))&&($created_at>$from)){
            $contacts = Contact::where('created_at', '>=', $from)->get();

        }elseif((!empty($until))&&($created_at < $until)){
            $contacts = Contact::where('created_at', '<=', $until)->get();
        }
        
        

        if (!empty($fullname)){
            $contacts = Contact::where('fullname', 'LIKE BINARY', "%{$fullname}%")->get();
        }

        if (!empty($email)){
            $contacts = Contact::where('email', 'LIKE BINARY', "%{$email}%")->get();
        }
        $param=[
            'id' => $id,
            'contacts' => $contacts,
            'fullname' => $fullname,
            'gender' => $gender,
            'email' => $email,
            'opinion' => $opinion
                ];
        return view('admin', $param);
    }
    
    public function remove(Request $request)
    {
        Contact::find($request->id)->delete();
        return view('admin');
    }
    public function reset(Request $request)
    {
        return view ('admin');
    }


}