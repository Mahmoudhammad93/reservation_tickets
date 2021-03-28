<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Education;
use App\Experience;
use App\Skill;
use App\Resume;
use App\Language;
use App\Portfolio;
use Illuminate\Support\Facades\DB;

class ResumeController extends Controller
{
    //
    public function get_resume_info(){
        // return 'test';
        $user = User::with('education','cv','skills','experiences')->first();
        $portfolio = Portfolio::paginate(6);
        return ['user' => $user, 'portfolio' => $portfolio];
    }
}
