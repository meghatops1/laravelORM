<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Image;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Session;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('emp.home',['user'=>$request->session()->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emp.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Employee();
        $data->emp_name= $request->emp_name;
        $data->email=$request->email;
        $data->password=$request->password;
        $result=$data->save();
        $data->emp_id;
        $image= new Image();
        $image->imagename='test.png';
        $data->images()->save($image);

        if($data){
            echo "inserted";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        echo "<pre>";
        print_r($employee);
        $image=$employee->images;
        echo "<hr>";
        echo "<pre>";
        print_r($image);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }

    public function empLogin(){
        return view('emp.login');
    }
    public function empLoginPost(Request $request){
       $data = Employee::where(['email'=>$request->email,'password'=>$request->password])->first();
       echo "<pre>";
       print_r($data);
      if($data && !empty($data)){
            session(['email'=>$data->email,'emp_id'=>$data->emp_id,"emp_name"=>$data->emp_name]);
            print_r($request->session()->all());
            //exit;
            return redirect('/emptask');
      }
    }
    public function logoutEmp(Request $request){
        $request->session()->flush();
        return redirect('/emplogin');
    }
}
