<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Applyer;
use App\JobCircular;
use App\JobExperienceArea;
use App\Experience;
use App\UserExpArea;
use App\Education;
use Auth;
use DB;

class UserCircularApplyController extends Controller
{
    public function applymatchied($id)
    {
    	if (Auth::check()) {
            $user_id = Auth::user()->id;
            $circular_id = JobCircular::find($id)->id;
            $com_id = JobCircular::find($id)->com_id;
            $com_keyword = JobCircular::find($id)->job_exp_keyword;
            $check_apply = Applyer::where('circular_id','=',$circular_id)
                                ->where('user_id','=',$user_id)
                                ->count();
            if ($check_apply > 0) {
                return redirect()->back()->with('error','You Already apply this circular');
            }else{
                    $examination = Education::where('user_id','=',$user_id)->count();
                if ($examination > 0) {
                    $check_exp_year_count = Experience::where('user_id','=',$user_id)->count();

                    $job_exp_area_count = JobExperienceArea::where('circuler_id','=',$circular_id)->count();
                        
                    $user_exp_keyword_count = Experience::where('user_id','=', $user_id)
                                            ->where('user_exp_keyword','=', $com_keyword)->count();

                    $examination = Education::where('user_id','=',$user_id)->orderBy('id','desc')->pluck('subject'); 

                    $exp_area = JobExperienceArea::where('circuler_id','=',$circular_id)->pluck('job_exp_area');               

                    $education_count = JobCircular::where('id','=',$circular_id)
                                                ->where('education_requirements','LIKE', '%'.$examination[0].'%')->count();

                    if ($check_exp_year_count > 0 && $user_exp_keyword_count > 0 && $education_count > 0) {

                        $resume_exp = Experience::where('user_id','=',$user_id)
                                ->pluck('user_exp_keyword');
                        $from_date = Experience::where('user_id','=',$user_id)
                                ->where('user_exp_keyword', '=', $com_keyword)
                                ->orderBy('exp_from_date','desc')
                                ->take(1)
                                ->pluck('exp_from_date')[0];
                        $to_date = Experience::where('user_id','=',$user_id)
                                    ->where('user_exp_keyword', '=', $com_keyword)
                                    ->orderBy('exp_from_date','desc')
                                    ->take(1)
                                    ->pluck('exp_to_date')[0];
                    
                    // $examination = Education::where('user_id','=',$user_id)->orderBy('id','desc')->pluck('subject');
                    
                    
                        if (is_null($to_date)) {
                            $to = Carbon::now();
                            $total_date = $to->diff($from_date)->format('%y'.'.'.'%m');
                        }else{
                            $from = new Carbon($from_date);
                            $to = new Carbon($to_date); 
                            // $realAge = Carbon::parse($to)->diff(Carbon::parse($from))->format('%y'.'.'.'%m');
                            $total_date = $to->diff($from)->format('%y'.'.'.'%m');
                        }

                        // $exp_area = JobExperienceArea::where('circuler_id','=',$circular_id)->pluck('job_exp_area');

                        // $job_exp_area_count = JobExperienceArea::where('circuler_id','=',$circular_id)->count();
                        
                        // $user_exp_keyword_count = Experience::where('user_id','=', $user_id)
                        //                             ->where('user_exp_keyword','=', $com_keyword)->count();

                        $exp_years_count = JobCircular::where('id','=',$circular_id)
                                                ->where('experience','<=', $total_date)->count();
                        // $education_count = JobCircular::where('id','=',$circular_id)
                        //                         ->where('education_requirements','LIKE', '%'.$examination[0].'%')->count();

                        // foreach ($resume_exp as $keyword => $k) {
                        //         // $date = Carbon::now()->format('m-d-y');    
                        //         $jobs = DB::table('job_circulars')
                        //             ->join('com_profiles', 'job_circulars.com_id', '=', 'com_profiles.com_id')              
                        //             ->join('experiences','job_circulars.job_exp_keyword', '=', 'experiences.user_exp_keyword')     
                        //             // ->join('education','job_circulars.education_requirements', '=', 'education.exam_title')  
                        //             ->select('job_circulars.*', 'com_profiles.com_name', 'com_profiles.com_logo')
                        //             // ->where('job_circulars.job_deadline', '>', $date)
                        //             ->where('experiences.user_id','=', $user_id)
                        //             ->where('experiences.user_exp_keyword','=', $com_keyword)
                        //             ->where('job_circulars.experience','<=', $total_date)
                        //             ->where('job_circulars.education_requirements','LIKE', '%'.$examination[0].'%')
                        //             // ->where('experiences.exp_area','LIKE', '%'.$exp_area[0].'%')
                        //             ->count();        
                        // }

                        $UExp_area = 0;
                            foreach ($exp_area as $area => $exp) {
                                $check_exp_area = UserExpArea::where('user_id','=',$user_id)
                                            ->where('user_exp_area','=',$exp)->count();
                                // $check = collect([$check_exp_area]);
                                if ($check_exp_area > 0) {
                                    $UExp_area++;
                                }
                                
                            }

                        //calucation matching
                            $total_exp_area_count = $UExp_area / $job_exp_area_count * 100;
                            $total_exp_years_count = $exp_years_count * 100;
                            $total_user_exp_keyword_count = $user_exp_keyword_count * 100;
                            $total_education_count = $education_count * 100;

                            $total_parcent = ($total_exp_area_count + $total_exp_years_count + $total_user_exp_keyword_count + $total_education_count)/400 * 100;

                        //check matching parcentage

                            $check_percentage = JobCircular::where('id','=', $circular_id)
                                                ->where('accepted_parcent', '<=', $total_parcent)->count();

                               // echo "<pre>";
                               //  print_r([
                               //      'experience area = '.$UExp_area,'keyword = '.$user_exp_keyword_count,
                               //      'experience years = '.$exp_years_count,'education = '.$education_count,
                               //      'total exp area = '.$job_exp_area_count,'total exp area count = '.$total_exp_area_count,
                               //      'total exp year count = '.$total_exp_years_count,'total exp keyword count = '.$total_user_exp_keyword_count,'total education count = '.$total_education_count,'Total result = '.$total_parcent,'accepted status = '.$check_percentage
                               //  ]);
                            //applyer information stored
                                                
                                $applyer_status = new Applyer;
                                $applyer_status->com_id = $com_id;
                                $applyer_status->user_id = $user_id;
                                $applyer_status->circular_id = $circular_id;
                                $applyer_status->status = $check_percentage;
                                $applyer_status->accepted = $total_parcent;
                                $applyer_status->save();

                            // if ($jobs > 0) {
                                    
                                //     $applyer_status = new Applyer;
                                //     $applyer_status->com_id = $com_id;
                                //     $applyer_status->user_id = $user_id;
                                //     $applyer_status->circular_id = $circular_id;
                                //     $applyer_status->status = $check_percentage;
                                //     $applyer_status->accepted = $total_parcent;
                                //     $applyer_status->save();
                                // }else{
                                //     $applyer_status = new Applyer;
                                //     $applyer_status->com_id = $com_id;
                                //     $applyer_status->user_id = $user_id;
                                //     $applyer_status->circular_id = $circular_id;
                                //     $applyer_status->status = '0';
                                //     $applyer_status->accepted = $total_parcent;
                                //     $applyer_status->save();
                                // } 
                            
                    return redirect()->route('home')->with('message', 'Apply successfully');

                    }elseif ($user_exp_keyword_count > 0 && $education_count > 0) {
                                         

                        $exp_area = JobExperienceArea::where('circuler_id','=',$circular_id)->pluck('job_exp_area');

                        $UExp_area = 0;
                            foreach ($exp_area as $area => $exp) {
                                $check_exp_area = UserExpArea::where('user_id','=',$user_id)
                                            ->where('user_exp_area','=',$exp)->count();
                                // $check = collect([$check_exp_area]);
                                if ($check_exp_area > 0) {
                                    $UExp_area++;
                                }
                                
                            }

                        //calucation matching
                            $total_exp_area_count = $UExp_area / $job_exp_area_count * 100;
                            $total_exp_years_count = 0;
                            $total_user_exp_keyword_count = $user_exp_keyword_count * 100;
                            $total_education_count = $education_count * 100;

                            $total_parcent = ($total_exp_area_count + $total_exp_years_count + $total_user_exp_keyword_count + $total_education_count)/400 * 100;

                        //check matching parcentage

                            $check_percentage = JobCircular::where('id','=', $circular_id)
                                                ->where('accepted_parcent', '<=', $total_parcent)->count();

                               // echo "<pre>";
                               //  print_r([
                               //      'experience area = '.$UExp_area,'keyword = '.$user_exp_keyword_count,
                               //      'experience years = '.$exp_years_count,'education = '.$education_count,
                               //      'total exp area = '.$job_exp_area_count,'total exp area count = '.$total_exp_area_count,
                               //      'total exp year count = '.$total_exp_years_count,'total exp keyword count = '.$total_user_exp_keyword_count,'total education count = '.$total_education_count,'Total result = '.$total_parcent,'accepted status = '.$check_percentage
                               //  ]);
                            //applyer information stored
                                                
                                $applyer_status = new Applyer;
                                $applyer_status->com_id = $com_id;
                                $applyer_status->user_id = $user_id;
                                $applyer_status->circular_id = $circular_id;
                                $applyer_status->status = $check_percentage;
                                $applyer_status->accepted = $total_parcent;
                                $applyer_status->save();

                            // if ($jobs > 0) {
                                    
                                //     $applyer_status = new Applyer;
                                //     $applyer_status->com_id = $com_id;
                                //     $applyer_status->user_id = $user_id;
                                //     $applyer_status->circular_id = $circular_id;
                                //     $applyer_status->status = $check_percentage;
                                //     $applyer_status->accepted = $total_parcent;
                                //     $applyer_status->save();
                                // }else{
                                //     $applyer_status = new Applyer;
                                //     $applyer_status->com_id = $com_id;
                                //     $applyer_status->user_id = $user_id;
                                //     $applyer_status->circular_id = $circular_id;
                                //     $applyer_status->status = '0';
                                //     $applyer_status->accepted = $total_parcent;
                                //     $applyer_status->save();
                                // } 
                            
                    return redirect()->route('home')->with('message', 'Apply successfully');
                    }elseif ($education_count > 0) {
                        
                        
                        //calucation matching
                            $total_exp_area_count = 0;
                            $total_exp_years_count = 0;
                            $total_user_exp_keyword_count = 0;
                            $total_education_count = $education_count * 100;

                            $total_parcent = ($total_exp_area_count + $total_exp_years_count + $total_user_exp_keyword_count + $total_education_count)/400 * 100;

                        //check matching parcentage

                            $check_percentage = JobCircular::where('id','=', $circular_id)
                                                ->where('accepted_parcent', '<=', $total_parcent)->count();

                               // echo "<pre>";
                               //  print_r([
                               //      'experience area = '.$UExp_area,'keyword = '.$user_exp_keyword_count,
                               //      'experience years = '.$exp_years_count,'education = '.$education_count,
                               //      'total exp area = '.$job_exp_area_count,'total exp area count = '.$total_exp_area_count,
                               //      'total exp year count = '.$total_exp_years_count,'total exp keyword count = '.$total_user_exp_keyword_count,'total education count = '.$total_education_count,'Total result = '.$total_parcent,'accepted status = '.$check_percentage
                               //  ]);
                            //applyer information stored
                                                
                                $applyer_status = new Applyer;
                                $applyer_status->com_id = $com_id;
                                $applyer_status->user_id = $user_id;
                                $applyer_status->circular_id = $circular_id;
                                $applyer_status->status = $check_percentage;
                                $applyer_status->accepted = $total_parcent;
                                $applyer_status->save();

                            
                            
                    return redirect()->route('home')->with('message', 'Apply successfully');

                    }else{
                        $applyer_status = new Applyer;
                        $applyer_status->com_id = $com_id;
                        $applyer_status->user_id = $user_id;
                        $applyer_status->circular_id = $circular_id;
                        $applyer_status->status = '0';
                        $applyer_status->accepted = '10';
                        $applyer_status->save();

                        return redirect()->back();
                    }
                }else{ return redirect()->back()->with('error','Please update your education');}
                
            }
            
            // echo "<pre>";
            // // print_r('circular id '.$circular_id.'<br>user id '.$user_id);
            // print_r([$applyer]);
            
            
        }else{return redirect()->route('login');}
    }
}
