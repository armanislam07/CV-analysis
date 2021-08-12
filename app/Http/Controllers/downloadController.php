<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserPersonalinfo;
use App\Education;
use DB;
use PDF;

class downloadController extends Controller
{
    public function exportpdf($id)
    {
        $userId = UserPersonalinfo::find($id)->user_id;
        // echo $userId;
        $resumes = DB::table('users')
                    ->join('user_personalinfos', 'users.id', '=', 'user_personalinfos.user_id')
                    ->join('user_career_infos', 'users.id', '=', 'user_career_infos.user_id')                    
                    ->select('users.name','users.avatar', 'user_personalinfos.*', 'user_career_infos.*')
                    ->where('users.id', '=', $userId)
                    ->get();
        $educations = Education::where('user_id', '=', $userId)->get();
        //dd($education);
        $pdf = PDF::loadView('users.pdf', compact('resumes', 'educations'));
        return $pdf->download('resume.pdf');
    }
}
