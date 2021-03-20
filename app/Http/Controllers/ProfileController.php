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

class ProfileController extends Controller
{
    //
    public function index(){
        return view('admin.profile.index');
    }

    // To get profile any user
    public function get_any_user($id){
        $user = User::where('id', $id)->first();
        return view('admin.users.profile.index',compact('user'));
    }

    public function user_data(){
        $user = User::where('id', auth()->user()->id)->first();
        return $user;
    }

    public function update_profile(Request $request, $id){
        // return $request;
        $user = User::find($id);
        if($request->file('cover')){

            $file = $request->file('cover');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('storage/file'),$filename);
            $user->image_cover = $filename;
        }

        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->gender = $request['gender'];
        $user->address = $request['address'];
        $user->country = $request['country'];
        $user->job_title = $request['job_title'];
        $user->nationality = $request['nationality'];
        $user->phone = $request['phone'];
        $user->another_phone = $request['another_phone'];
        $user->age = $request['age'];
        $user->cover_letter = $request['cover_letter'];

        $user->save();
        return $user;
    }

    public function image_update(Request $request){
        // return $request['image'];
        $user = User::where('id',auth()->user()->id)->first();
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move(public_path('storage/file'),$filename);

        $user->image = $filename;
        $user->save();

        return $user;
    }

    // To get and set schools

    public function add_school(Request $request){
        return $this->add($request,1);
    }

    public function get_schools(){
        return $this->getData(1);
    }

    public function delete_school($id){
        return $this->delete($id);
    }

    public function get_school($id){
        return response()->json($this->get_row('educational',$id));
    }

    public function update_school(Request $request, $id){
        return $this->update($request, $id, 1);
    }

    // To get and set universties

    public function add_university(Request $request){
        return $this->add($request,2);
    }

    public function get_universites(){
        return $this->getData(2);
    }

    public function delete_university($id){
        return $this->delete($id);
    }

    public function get_university($id){
        return response()->json($this->get_row('educational',$id));
    }

    public function update_university(Request $request, $id){
        return $this->update($request, $id, 2);
    }

    // To get and set masters

    public function add_master(Request $request){
        return $this->add($request,3);
    }

    public function get_masters(){
        return $this->getData(3);
    }

    public function delete_master($id){
        return $this->delete($id);
    }

    public function get_master($id){
        return response()->json($this->get_row('educational',$id));
    }

    public function update_master(Request $request, $id){
        return $this->update($request, $id, 3);
    }

    // To get and set doctorates

    public function add_doctorate(Request $request){
        return $this->add($request,4);
    }

    public function get_doctorates(){
        return $this->getData(4);
    }

    public function delete_doctorate($id){
        return $this->delete($id);
    }

    public function get_doctorate($id){
        return response()->json($this->get_row('educational',$id));
    }

    public function update_doctorate(Request $request, $id){
        return $this->update($request, $id, 4);
    }

    private function add(Request $request,$type){
        $row = new Education;
        $row->name = $request['name'];
        if (isset($request['faculty']) || isset($request['university'])){
            $row->faculty = $request['faculty'];
            $row->university = $request['university'];
            $row->description = $request['description'];
        }
        $row->from = $request['from'];
        $row->to = $request['to'];
        $row->user_id = auth()->user()->id;
        $row->type = $type;
        $row->save();
        return $row;
    }

    private function getData($type){
        return Education::where('type',$type)->where('user_id',auth()->user()->id)->get();
    }

    private function delete($id){
        $data = Education::find($id)->delete();
    }

    private function update(Request $request,$id,$type){
        $row = Education::find($id);
        $row->name = $request['name'];
        if (isset($request['faculty']) || isset($request['university'])){
            $row->faculty = $request['faculty'];
            $row->university = $request['university'];
            $row->description = $request['description'];
        }
        $row->from = $request['from'];
        $row->to = $request['to'];
        $row->user_id = auth()->user()->id;
        $row->type = $type;
        $row->save();
        return $row;
    }

    // To get and set works

    public function add_work(Request $request){
        $row = new Experience;
        $row->company = $request['company'];
        $row->position = $request['position'];
        $row->description = $request['description'];
        $row->from = $request['from'];
        $row->to = $request['to'];
        $row->currently_work = $request['current'];
        $row->user_id = auth()->user()->id;
        $row->save();
        return $row;
    }

    public function get_works(){
        return Experience::where('user_id',auth()->user()->id)->get();
    }

    public function get_work($id){
        return response()->json($this->get_row('experiences',$id));
    }

    public function update_work(Request $request,$id){
        $row = Experience::find($id);
        $row->company = $request['company'];
        $row->position = $request['position'];
        $row->description = $request['description'];
        $row->from = $request['from'];
        $row->to = $request['to'];
        $row->currently_work = $request['current'];
        $row->user_id = auth()->user()->id;
        $row->save();
        return $row;
    }

    public function delete_work($id){
        $data = Experience::find($id)->delete();
    }

    // To get and set skills

    public function add_skill(Request $request){
        $skill = new Skill;
        if($request->file('file')){

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('storage/file'),$filename);
            $skill->image = $filename;
        }

        $skill->name = $request['name'];
        $skill->color = $request['color'];
        $skill->percent = $request['percent'];
        $skill->user_id = auth()->user()->id;
        $skill->experince = $request['experince'];
        $skill->description = $request['desc'];
        $skill->save();
        return $skill;
    }

    public function get_skills(){
        return Skill::where('user_id',auth()->user()->id)->get();
    }

    public function delete_skill($id){
        $data = Skill::find($id)->delete();
    }

    public function get_skill($id){
        return response()->json($this->get_row('skills',$id));
    }

    public function update_skill(Request $request,$id){
        // return $request;
        $skill = Skill::find($id);
        if($request->file('file')){

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('storage/file'),$filename);
            $skill->image = $filename;
        }
        $skill->name = $request['name'];
        $skill->color = $request['color'];
        $skill->percent = $request['percent'];
        $skill->user_id = auth()->user()->id;
        $skill->experince = $request['experince'];
        $skill->description = $request['desc'];
        $skill->save();
        return $skill;
    }

    private function get_row($table, $id){
        $data = DB::table($table)->find($id);
        return $data;
    }

    // To get and set cv

    public function upload_cv(Request $request){
        $cv = Resume::where('user_id',auth()->user()->id)->first();
        if($cv){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('storage/file'),$filename);

            $cv->file = $filename;
            $cv->user_id = auth()->user()->id;
        }else{
            $cv = new Resume;
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('storage/file'),$filename);

            $cv->file = $filename;
            $cv->user_id = auth()->user()->id;
        }
        $cv->save();

        return $cv;
    }

    public function get_cv(){
        $cv = Resume::where('user_id',auth()->user()->id)->first();
        return $cv;
    }

    // To get and set languages

    public function add_language(Request $request){
        $language = new Language;
        $language->name = $request['name'];
        $language->speak = $request['speaking'];
        $language->read = $request['reading'];
        $language->write = $request['writing'];
        $language->user_id = auth()->user()->id;

        $language->save();
        return $language;
    }

    public function get_languages(){
        return Language::where('user_id',auth()->user()->id)->get();
    }

    public function delete_language($id){
        $language = Language::find($id)->delete();
    }

    public function get_language($id){
        return response()->json($this->get_row('languages',$id));
    }

    public function update_language(Request $request){
        $language = Language::where('user_id',auth()->user()->id)->first();
        $language->name = $request['name'];
        $language->speak = $request['speaking'];
        $language->read = $request['reading'];
        $language->write = $request['writing'];
        $language->user_id = auth()->user()->id;

        $language->save();
        return $language;
    }

    public function add_project(Request $request){
        // return $request;
        $work = new Portfolio;
        if($request->file('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('storage/file'),$filename);
            $work->image = $filename;
        }

        $work->name = $request['name'];
        $work->link = $request['link'];
        $work->description = $request['description'];
        $work->userId = auth()->user()->id;

        $work->save();
        return $work;
    }

    public function get_projects(){
        $works = Portfolio::where('userId',auth()->user()->id)->get();
        return $works;
    }

    public function get_project($id){
        $row = Portfolio::find($id);
        return $row;
    }

    public function delete_project($id){
        $row = Portfolio::find($id)->delete();
    }

    public function update_project(Request $request, $id){
        $work = Portfolio::find($id);
        if($request->file('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('storage/file'),$filename);
            $work->image = $filename;
        }

        $work->name = $request['name'];
        $work->link = $request['link'];
        $work->description = $request['description'];
        $work->userId = auth()->user()->id;

        $work->save();
        return $work;
    }
}
