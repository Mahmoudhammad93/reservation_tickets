<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Education;
use App\Experience;
use App\Skill;
use App\Resume;
use App\Language;
use Illuminate\Support\Facades\DB;

class ResumeController extends Controller
{
    //
    public function get_resume_info(){
        // return 'test';
        $user = User::with('education','cv','skills','experiences','portfolio')->first();
        return $user;
    }
}
