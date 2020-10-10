<?php

namespace App\Http\Controllers;

use App\Pass;
use App\Printtable;
use Illuminate\Http\Request;

use Auth;

class PassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {


        $passes = Pass::where('user_id',Auth::user()->id)->get();
//        $passes = Pass::where('user_id',2)->get();
//                $count=1;

//        foreach($passes as $pass){
//         $pass->code = $this->generatecode2($count);
//        $count++;
//            $pass->save();
//    }
        return view('pass.index',compact('passes'));
    }

    public function edit(Pass $pass)
    {
        $passes = Pass::where('user_id',Auth::user()->id)->get();
        return view('pass.edit',compact('pass','passes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname'=>'required',
            'middlename'=>'required',
            'lastname'=>'required',
            'fulladdress'=>'required',
            'cellphone'=>'required',
            'sex'=>'required',
            'age'=>'required',
        ]);

        $user_id = Auth::user()->id;

        $pass = new Pass;

        $pass->fill($request->all());
        $pass->user_id = $user_id;
        $pass->code = $this->generatecode();
        $pass->employer = $request->employer;
        $pass->save();

        return redirect(route('passes.index'));

    }

    private function generatecode2($pass){

        $date = date('Ymd');

//        $pass= Pass::get()->count();
        $trailing ="000";
        if($pass==0){
            $trailing ="000";
            $pass =1;
        }

        if($pass<10 && $pass>0){
            $trailing ="000";
        }

        if($pass<100 && $pass>9){
            $trailing ="00";
        }

        if($pass<1000 && $pass>100){
            $trailing ="0";
        }

        if($pass>=1000){
            $trailing ="";
        }

        return $date.$trailing.$pass;

    }

    private function generatecode(){

        $date = date('Ymd');

        $pass= Pass::get()->count();

        if($pass==0){
            $trailing ="000";
            $pass =1;
        }

        if($pass<10 && $pass>0){
            $trailing ="000";
        }

        if($pass<100 && $pass>10){
            $trailing ="00";
        }

        if($pass<1000 && $pass>100){
            $trailing ="0";
        }

        if($pass>=1000){
            $trailing ="";
        }

        return $date.$trailing.$pass;

    }

    public function loadpasses(){

        $passes = Pass::get()->all();

        $view = view('pass.table.passes',compact('passes'))->render();

        return response()->json(['view'=>$view]);
    }

    public function printpass(){

        $passes = Pass::where('user_id',Auth::user()->id)->where('printpass',1)->get();

        return view ('pass.printpass',compact('passes'));

    }

    public function addtoprint(){

            $id = $_POST['id'];

            $pass = Pass::find($id);

            $pass->printpass = 1;

            $pass->save();

        return response()->json(['msg'=>'added to print']);
    }

    public function removetoprint(){

        $id = $_POST['id'];

        $pass = Pass::find($id);

        $pass->printpass = 0;

        $pass->save();

        return response()->json(['msg'=>'delete to print']);
    }


    public function loadprint(){

        $passes = Pass::where('user_id',Auth::user()->id)->where('printpass',1)->get();

        $view = view('pass.table.prints',compact('passes'))->render();

        return response()->json(['view'=>$view]);
    }

    public function verify($id){

        $id = Pass::find($id);

        return view ('pass.verify',compact('pass'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pass  $pass
     * @return \Illuminate\Http\Response
     */
    public function show(Pass $pass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pass  $pass
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pass  $pass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pass $pass)
    {
        $request->validate([
            'firstname'=>'required',
            'middlename'=>'required',
            'lastname'=>'required',
            'fulladdress'=>'required',
            'cellphone'=>'required',
            'sex'=>'required',
            'age'=>'required',
        ]);

        $user_id = Auth::user()->id;

        $pass->fill($request->all());
        $pass->user_id = $user_id;
//        $pass->code = $this->generatecode();
        $pass->save();

        return redirect(route('passes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pass  $pass
     * @return \Illuminate\Http\Response
     */
    public function deletepass ()
    {
        $id=$_POST['id'];
        $pass = Pass::find($id);

        $pass->delete();

        return response()->json(['msg'=>'Record deleted.']);
    }
}
