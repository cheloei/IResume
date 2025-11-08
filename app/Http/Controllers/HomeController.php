<?php

namespace App\Http\Controllers;

use App\Models\skill;
use App\Models\resume;
use App\Models\grammer;
use App\Models\message;
use App\Models\callData;
use App\Models\education;
use App\Models\portfolio;
use App\Models\experience;
use App\Models\personInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $resumes = auth()->user()->resumes;
        return view('panel.main', compact('resumes'));
    }

    public function edit(resume $resume){
        if($resume->persion()->count() == 0){
            personInfo::create([
                'resume' => $resume->id
            ]);
        }

        if($resume->callData()->count() == 0){
            callData::create([
                'email' => auth()->user()->email,
                'resume' => $resume->id
            ]);
        }

        if($resume->persion()->count() == 0){
            personInfo::create([
                'resume' => $resume->id
            ]);
        }
        return view('panel.edit', compact('resume'));
    }

    public function createResume(Request $request){
        $valid = Validator::make($request->all(), [
            'name' => 'required|string|max:50'
        ]);

        if(!$valid->fails() && auth()->user()->resumes->where('name', $request->name)->count() == 0){
            resume::create([
                'name' => $request->name,
                'user_id' => auth()->user()->id
            ]);
            return redirect()->back()->with('success');
        }else{
            return redirect()->back()->with('error');
        }
    }

    public function editAction(Request $request){
        $validate = Validator::make($request->all(), [
            'id' => 'required|integer',
            'web' => 'integer|required',
            'print' => 'integer|required',
            'poster' => 'nullable|image',
            'profile' => 'nullable|image',
            'expertise' => 'required|string',
            'name' => 'required|string',
            'birth' => 'required|integer',
            'soldier' => 'required|integer',
            'site' => 'nullable|url',
            'phone' => 'required',
            'email' => 'required|email',
            'info' => 'required|string',
            'confrontation' => 'nullable|string',
            'education' => ['nullable', function($attr, $val, $fail){
                if(gettype(json_decode($val, true)) != 'array'){
                    $fail("he $attr field must be an array.");
                }
            }],
            'skill' => ['nullable', function($attr, $val, $fail){
                if(gettype(json_decode($val, true)) != 'array'){
                    $fail("he $attr field must be an array.");
                }
            }],
            'experience' => ['nullable', function($attr, $val, $fail){
                if(gettype(json_decode($val, true)) != 'array'){
                    $fail("he $attr field must be an array.");
                }
            }],
            'callData' => ['nullable', function($attr, $val, $fail){
                if(gettype(json_decode($val, true)) != 'array'){
                    $fail("he $attr field must be an array.");
                }
            }],
            'grammer' => ['nullable', function($attr, $val, $fail){
                if(gettype(json_decode($val, true)) != 'array'){
                    $fail("he $attr field must be an array.");
                }
            }],
            'map' => 'nullable|string',
            'mapUrl' => ['nullable', 'url' , function($attr, $val, $fail){
                if(!strpos($val, 'balad.ir/p/')){
                    $fail('invalid balad address ');
                }
            }]
        ]);

        if(!$validate->fails() && resume::find($request->id)->user->id == auth()->user()->id){
            if($request->hasFile('poster')){
                if(Storage::disk('public')->exists('images/poster/' . resume::find($request->id)->poster)){
                    Storage::disk('public')->delete('images/poster/' . resume::find($request->id)->poster);
                }
                $imageName = Carbon::now()->microsecond . '.' . $request->poster->extension();
                $request->poster->storeAs('images/poster', $imageName, 'public');
                resume::find($request->id)->update([
                    'poster' => $imageName
                ]);
            }

            if($request->hasFile('profile')){  
                if(Storage::disk('public')->exists('images/profile/' . resume::find($request->id)->persion->profile)){
                    Storage::disk('public')->delete('images/profile/' . resume::find($request->id)->persion->profile);
                }
                $imageName = Carbon::now()->microsecond . '.' . $request->profile->extension();
                $request->profile->storeAs('images/profile', $imageName, 'public');
            }

            resume::find($request->id)->update([
                'web' => $request->web,
                'print' => $request->print
            ]);

            resume::find($request->id)->persion()->update([
                'name' => $request->name,
                'skill' => $request->expertise,
                'birth' => $request->birth,
                'military' => $request->soldier,
                'info' => $request->info,
                'confrontation' => !empty($request->confrontation) ? $request->confrontation : resume::find($request->id)->persion->confrontation,
                'address' => !empty($request->map) ? $request->map : resume::find($request->id)->persion->address,
                'map' => !empty($request->mapUrl) ? $request->mapUrl : resume::find($request->id)->persion->map,
                'profile' => $request->hasFile('profile') ? $imageName : resume::find($request->id)->persion->profile
            ]);

            if(!empty($request->callData)){
                $callValidate = Validator::make(json_decode($request->callData, true), [
                    'rubika' => ['nullable', function($attr, $val, $fail){
                        if(!strpos($val, 'rubika.ir/')){
                            $fail("invalid $attr address");
                        }
                    }],
                    'bale' => ['nullable', function($attr, $val, $fail){
                        if(!strpos($val, 'web.bale.ai/')){
                            $fail("invalid $attr address");
                        }
                    }],
                    'eitaa' => ['nullable', function($attr, $val, $fail){
                        if(!strpos($val, 'eitaa.com/')){
                            $fail("invalid $attr address");
                        }
                    }],
                    'aparat' => ['nullable', function($attr, $val, $fail){
                        if(!strpos($val, 'www.aparat.com/')){
                            $fail("invalid $attr address");
                        }
                    }],
                    'gap' => ['nullable', function($attr, $val, $fail){
                        if(!strpos($val, 'gap.im/')){
                            $fail("invalid $attr address");
                        }
                    }],
                    'telegram' => ['nullable', function($attr, $val, $fail){
                        if(!strpos($val, 't.me/')){
                            $fail("invalid $attr address");
                        }
                    }],
                    'facebook' => ['nullable', function($attr, $val, $fail){
                        if(!strpos($val, '')){
                            $fail("invalid $attr address");
                        }
                    }],
                    'twitter' => ['nullable', function($attr, $val, $fail){
                        if(!strpos($val, '')){
                            $fail("invalid $attr address");
                        }
                    }],
                    'youtube' => ['nullable', function($attr, $val, $fail){
                        if(!strpos($val, 'www.youtube.com/')){
                            $fail("invalid $attr address");
                        }
                    }],
                    'github' => ['nullable', function($attr, $val, $fail){
                        if(!strpos($val, 'github.com/')){
                            $fail("invalid $attr address");
                        }
                    }],
                    'linkedin' => ['nullable', function($attr, $val, $fail){
                        if(!strpos($val, 'www.linkedin.com')){
                            $fail("invalid $attr address");
                        }
                    }],
                    'inestagram' => ['nullable', function($attr, $val, $fail){
                        if(!strpos($val, 'www.instagram.com/')){
                            $fail("invalid $attr address");
                        }
                    }]
                ]);
                if(!$callValidate->fails()){
                    resume::find($request->id)->callData()->update([
                        'site' => !empty($request->site) ? $request->site : null,
                        'phone' => $request->phone,
                        'rubika' => !empty(json_decode($request->callData, true)['rubika']) ? json_decode($request->callData, true)['rubika'] : null,
                        'bale' => !empty(json_decode($request->callData, true)['bale']) ? json_decode($request->callData, true)['bale'] : null,
                        'eitaa' => !empty(json_decode($request->callData, true)['eitaa']) ? json_decode($request->callData, true)['eitaa'] : null,
                        'aparat' => !empty(json_decode($request->callData, true)['aparat']) ? json_decode($request->callData, true)['aparat'] : null,
                        'gap' => !empty(json_decode($request->callData, true)['gap']) ? json_decode($request->callData, true)['gap'] : null,
                        'telegram' => !empty(json_decode($request->callData, true)['telegram']) ? json_decode($request->callData, true)['telegram'] : null,
                        'facebook' => !empty(json_decode($request->callData, true)['facebook']) ? json_decode($request->callData, true)['facebook'] : null,
                        'twitter' => !empty(json_decode($request->callData, true)['twitter']) ? json_decode($request->callData, true)['twitter'] : null,
                        'youtube' => !empty(json_decode($request->callData, true)['youtube']) ? json_decode($request->callData, true)['youtube'] : null,
                        'github' => !empty(json_decode($request->callData, true)['github']) ? json_decode($request->callData, true)['github'] : null,
                        'linkedin' => !empty(json_decode($request->callData, true)['linkedin']) ? json_decode($request->callData, true)['linkedin'] : null,
                        'inestagram' => !empty(json_decode($request->callData, true)['inestagram']) ? json_decode($request->callData, true)['inestagram'] : null
                    ]);
                }
            }
            
            if(!empty($request->education)){
                resume::find($request->id)->education()->delete();
                foreach (json_decode($request->education, true) as $edu) {
                    $validateEdu = Validator::make($edu, [
                        'name' => 'required|string',
                        'from' => 'required|string',
                        'to' => 'required|string',
                        'map' => 'required|string',
                        'desc' => 'nullable|string'
                    ]);
                    if(!$validateEdu->fails()){
                        education::create([
                            'name' => $edu['name'],
                            'from' => $edu['from'],
                            'to' => $edu['to'],
                            'map' => $edu['map'],
                            'desc' => !empty($edu['desc']) ? $edu['desc'] : null,
                            'resume' => $request->id
                        ]);
                    }
                }
            }

            if(!empty($request->skill)){
                resume::find($request->id)->skill()->delete();
                foreach (json_decode($request->skill, true) as $skill) {
                    $validateEdu = Validator::make($skill, [
                        'name' => 'required|string',
                        'level' => 'required|integer|min:5|max:100'
                    ]);
                    if(!$validateEdu->fails()){
                        skill::create([
                            'name' => $skill['name'],
                            'level' => $skill['level'],
                            'resume' => $request->id
                        ]);
                    }
                }
            }

            if(!empty($request->experience)){
                resume::find($request->id)->experience()->delete();
                foreach (json_decode($request->experience, true) as $edu) {
                    $validateEdu = Validator::make($edu, [
                        'name' => 'required|string',
                        'map' => 'required|string',
                        'desc' => 'nullable|string',
                        'from' => 'required|string',
                        'to' => 'required|string'
                    ]);
                    if(!$validateEdu->fails()){
                        experience::create([
                            'name' => $edu['name'],
                            'map' => $edu['map'],
                            'from' => $edu['from'],
                            'to' => $edu['to'],
                            'desc' => !empty($edu['desc']) ? $edu['desc'] : null,
                            'resume' => $request->id
                        ]);
                    }
                }
            }

            if(!empty($request->grammer)){
                resume::find($request->id)->grammer()->delete();
                foreach (json_decode($request->grammer, true) as $grammer) {
                    $validateEdu = Validator::make($grammer, [
                        'lang' => 'required|string',
                        'level' => 'required|integer'
                    ]);
                    if(!$validateEdu->fails()){
                        grammer::create([
                            'lang' => $grammer['lang'],
                            'level' => $grammer['level'],
                            'resume' => $request->id
                        ]);
                    }
                }
            }


            return 'ok';
        }else{
            return $validate->errors()->messages();
        }
    }

    public function insertPortfolio(Request $request){
        $valid = Validator::make($request->all(), [
            'poster' => 'nullable|image',
            'name' => 'required|string',
            'url' => 'required|url',
            'id' => 'required|integer'
        ]);
        if(!$valid->fails() && resume::find($request->id)->user->id == auth()->user()->id){
            if($request->hasFile('poster')){
                $imageName = Carbon::now()->microsecond . '.' . $request->poster->extension();
                $request->poster->storeAs('images/portfolio', $imageName, 'public');
            }
            portfolio::create([
                'image' => $request->hasFile('poster') ? $imageName : (resume::find($request->id)->portfolio()->where('oldest', '1')->where('url', $request->url)->count() == 1 ? resume::find($request->id)->portfolio->where('oldest', '1')->where('url', $request->url)->first()->image : null),
                'title' => $request->name,
                'url' => $request->url,
                'resume' => $request->id,
                'oldest' => 2
            ]);
            return 'ok';
        }else{
            return $valid->errors()->messages();
        }
    }

    public function okPortfolio(Request $request){
        $valid = Validator::make($request->all(), [
            'id' => 'required|string'
        ]);
        if(!$valid->fails() && resume::find($request->id)->user->id == auth()->user()->id){
            foreach (resume::find($request->id)->portfolio->where('oldest', '2') as $portfolio) {
                if(resume::find($request->id)->portfolio()->where('oldest', '2')->where('url', $portfolio->url)->count() > 1){
                    resume::find($request->id)->portfolio()->where('oldest', '2')->where('url', $portfolio->url)->delete();
                }
            }
            resume::find($request->id)->portfolio()->where('oldest', '1')->delete();
            resume::find($request->id)->portfolio()->where('oldest', '2')->update([
                'oldest' => '1'
            ]);
            return 'ok';
        }else{
            return $valid->errors()->messages();
        }
    }

    public function view(resume $resume){
        if($resume->persion()->count() == 0){
            personInfo::create([
                'resume' => $resume->id
            ]);
        }

        if($resume->callData()->count() == 0){
            callData::create([
                'email' => auth()->user()->email,
                'resume' => $resume->id
            ]);
        }

        if($resume->persion()->count() == 0){
            personInfo::create([
                'resume' => $resume->id
            ]);
        }
        switch ($resume->web) {
            case 1:
                return view('template.web.DevFolio', compact('resume'));
            case 2:
                return view('template.web.browny-master', compact('resume'));
            case 3:
                $theme = 'light';
                return view('template.web.personal', compact('resume', 'theme'));
            case 4:
                $theme = 'dark';
                return view('template.web.personal', compact('resume', 'theme'));
            default:
                # code...
                break;
        }
    }

    public function print(resume $resume){
        return view('layouts.print', compact('resume'));
    }

    public function sendMassage(Request $request){
        $validate = $request->validate([
            'resume' => 'integer|required',
            'name' => 'string|required',
            'email' => 'email|required',
            'subject' => 'string|required',
            'message' => 'string|required'
        ]);

        $result = message::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'resume' => $request->resume
        ]);
        if($result){
            return redirect()->back()->with('success');
        }else{
            return redirect()->back()->with('error');
        }
    }

    public function messages(resume $resume){
        if($resume->user->id == auth()->user()->id){
            return view('panel.messages', compact('resume'));
        }
    }
}