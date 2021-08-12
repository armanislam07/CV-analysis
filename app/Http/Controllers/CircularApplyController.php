<?php

namespace App\Http\Controllers;

use App\Applyer;
use App\JobCircular;
use App\JobExperienceArea;
use App\Experience;
use App\Education;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use GetDate;
use Auth;
use DB;

class CircularApplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:company');
    }
    

    public function ApplyCircular($id)
    {
        if(Auth::guard('company')->check()){
            $profileId = Auth::guard('company')->user()->id;
            $total_apply = Applyer::where('com_id','=',$profileId)
                                    ->where('circular_id','=',$id)
                                    ->get();

            $total_applyers = DB::table('applyers')
                            ->join('job_circulars','applyers.circular_id','=','job_circulars.id')
                            ->join('user_personalinfos','applyers.user_id','=','user_personalinfos.user_id')
                            ->select('applyers.user_id','user_personalinfos.*','job_circulars.job_title')
                            ->where('applyers.circular_id','=',$id)
                            ->where('applyers.com_id','=',$profileId)
                            ->get();

            // echo "<pre>";
            // print_r($total_applyers);
            $circulars = JobCircular::where('com_id', '=', $profileId)->get();
            
            return view('company.allapplyed', compact('total_applyers'));
        }
    }

    public function applyerMatch($id)
    {
        
        if(Auth::guard('company')->check()){

            $profileId = Auth::guard('company')->user()->id;
            $user_id = Applyer::where('com_id','=',$profileId)
                                ->where('circular_id','=',$id)
                                ->pluck('user_id');

            // $resume_exp = Experience::select('user_exp_keyword')
            //         ->where('user_id','=',$user_id)
            //         ->get();

            // $from_date = Experience::where('user_id','=',$user_id)
            //             // ->where('user_exp_keyword', '=', $circuler_exp)
            //             ->orderBy('exp_from_date','desc')
            //             ->take(1)
            //             ->pluck('exp_from_date')[0];

            // $to_date = Experience::where('user_id','=',$user_id)
            //             // ->where('user_exp_keyword', '=', $circuler_exp)
            //             ->orderBy('exp_from_date','asc')
            //             ->take(1)
            //             ->pluck('exp_to_date')[0];

            // $examination = Education::where('user_id','=',$user_id)->orderBy('id','desc')->pluck('subject');
            
            //     if (is_null($to_date)) {
            //         $to = Carbon::now();
            //         $total_date = $to->diff($from_date)->format('%y'.'.'.'%m');
            //     }else{
            //         $from = new Carbon($from_date);
            //         $to = new Carbon($to_date); 
            //         // $realAge = Carbon::parse($to)->diff(Carbon::parse($from))->format('%y'.'.'.'%m');
            //         $total_date = $to->diff($from)->format('%y'.'.'.'%m');
            //     }
                
            //     foreach ($resume_exp as $keyword => $k) {
            //             $date = Carbon::now()->format('m-d-y');    
                                                
            //                 $shortlist = DB::table('applyers')
            //                     ->join('job_circulars','applyers.circular_id','=','job_circulars.id')
            //                     ->join('com_profiles', 'job_circulars.com_id', '=', 'com_profiles.com_id')              
            //                     ->join('experiences','job_circulars.job_exp_keyword', '=', 'experiences.user_exp_keyword') 
            //                     ->join('user_personalinfos','applyers.user_id','=','user_personalinfos.user_id')
            //                     ->select('applyers.user_id','user_personalinfos.*','job_circulars.job_title')
            //                     ->where('applyers.circular_id','=',$id)
            //                     ->where('applyers.com_id','=',$profileId)
            //                     ->where('job_circulars.job_exp_keyword','=', $keyword)
            //                     ->where('job_circulars.experience','<=', $total_date)
            //                     ->where('job_circulars.education_requirements','LIKE', '%'.$examination[0].'%')
            //                     ->get();       
            //     }   
                $applyer_short = DB::table('applyers')
                            ->join('job_circulars','applyers.circular_id','=','job_circulars.id')
                            ->join('user_personalinfos','applyers.user_id','=','user_personalinfos.user_id')
                            ->select('applyers.*','user_personalinfos.first_name','user_personalinfos.last_name','user_personalinfos.user_email','user_personalinfos.mobile_number','user_personalinfos.paresent_address','user_personalinfos.user_id','job_circulars.job_title')
                            ->where('applyers.circular_id','=',$id)
                            ->where('applyers.com_id','=',$profileId)
                            ->where('applyers.status','=', 1)
                            ->get();
            // echo "<pre>";
            // print_r ($applyer_short);
            
            // $subject = Education::select('subject')->where('user_id','=',$user_id)->get();      
            return view('company.sortedcv', compact('applyer_short'));
        }else{return redirect()->back();}
    }

    public function applyerUnmatch($id)
    {
        if(Auth::guard('company')->check()){

            $profileId = Auth::guard('company')->user()->id;
            $user_id = Applyer::where('com_id','=',$profileId)
                                ->where('circular_id','=',$id)
                                ->pluck('user_id');

            // $resume_exp = Experience::select('user_exp_keyword')
            //         ->where('user_id','=',$user_id)
            //         ->get();

            // $from_date = Experience::where('user_id','=',$user_id)
            //             // ->where('user_exp_keyword', '=', $circuler_exp)
            //             ->orderBy('exp_from_date','desc')
            //             ->take(1)
            //             ->pluck('exp_from_date')[0];

            // $to_date = Experience::where('user_id','=',$user_id)
            //             // ->where('user_exp_keyword', '=', $circuler_exp)
            //             ->orderBy('exp_from_date','asc')
            //             ->take(1)
            //             ->pluck('exp_to_date')[0];

            // $examination = Education::where('user_id','=',$user_id)->orderBy('id','desc')->pluck('subject');
            
            //     if (is_null($to_date)) {
            //         $to = Carbon::now();
            //         $total_date = $to->diff($from_date)->format('%y'.'.'.'%m');
            //     }else{
            //         $from = new Carbon($from_date);
            //         $to = new Carbon($to_date); 
            //         // $realAge = Carbon::parse($to)->diff(Carbon::parse($from))->format('%y'.'.'.'%m');
            //         $total_date = $to->diff($from)->format('%y'.'.'.'%m');
            //     }
                
            //     foreach ($resume_exp as $keyword => $k) {
            //             $date = Carbon::now()->format('m-d-y');    
                                                
            //                 $shortlist = DB::table('applyers')
            //                     ->join('job_circulars','applyers.circular_id','=','job_circulars.id')
            //                     ->join('com_profiles', 'job_circulars.com_id', '=', 'com_profiles.com_id')              
            //                     ->join('experiences','job_circulars.job_exp_keyword', '=', 'experiences.user_exp_keyword') 
            //                     ->join('user_personalinfos','applyers.user_id','=','user_personalinfos.user_id')
            //                     ->select('applyers.user_id','user_personalinfos.*','job_circulars.job_title')
            //                     ->where('applyers.circular_id','=',$id)
            //                     ->where('applyers.com_id','=',$profileId)
            //                     ->where('job_circulars.job_exp_keyword','=', $keyword)
            //                     ->where('job_circulars.experience','<=', $total_date)
            //                     ->where('job_circulars.education_requirements','LIKE', '%'.$examination[0].'%')
            //                     ->get();       
            //     } 
                  
                $applyer_unshort = DB::table('applyers')
                            ->join('job_circulars','applyers.circular_id','=','job_circulars.id')
                            ->join('user_personalinfos','applyers.user_id','=','user_personalinfos.user_id')
                            ->select('applyers.*','user_personalinfos.first_name','user_personalinfos.last_name','user_personalinfos.user_email','user_personalinfos.mobile_number','user_personalinfos.paresent_address','user_personalinfos.user_id','job_circulars.job_title')
                            ->where('applyers.circular_id','=',$id)
                            ->where('applyers.com_id','=',$profileId)
                            ->where('applyers.status','=', 0)
                            ->get();
            // echo "<pre>";
            // print_r ($applyer_short);
            
            // $subject = Education::select('subject')->where('user_id','=',$user_id)->get();      
            return view('company.unsortedcv', compact('applyer_unshort'));
        }else{return redirect()->back();}
    }

    public function manualAccept($id)
    {
        $manul_accept = Applyer::find($id);
        $manul_accept->status = 1;
        $manul_accept->save();
        return redirect()->back();
        
    }

    public function manualReject($id)
    {
        $manul_accept = Applyer::find($id);
        $manul_accept->status = 0;
        $manul_accept->save();
        return redirect()->back();
    }
}


            
            
                