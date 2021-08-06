<?php

namespace App\Http\Controllers;
use App\Models\Candidate;
use Illuminate\Http\Request;

class FetchApiController extends Controller
{
    public function create(){
        $pid=Candidate::pluck('id')->toArray();
        return view('createcandidate',compact('pid'));
    }
    public function savedata(Request $request){
      $model=new Candidate();
      $model->name=$request->name;
      $model->pid=($request->pid!='')?($request->pid):'';
      $model->save();
      return response('success');
    }
    public function getallcandidates(){
     $candidates=Candidate::select('name')->get();
     return response()->json($candidates);
     
    }
    public function getallcandidatesbyid($id){
        $candidates=Candidate::where('pid',$id)->select('name')->get();
        $pcandidate=Candidate::where('id',$id)->select('name')->get();
        $data=[
            "candidate"=>$pcandidate,
            "sub-candidate"=>$candidates,
        ];
        return response()->json($data);
    }
}
