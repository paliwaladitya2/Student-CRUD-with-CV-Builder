<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\cv;

class cvController extends Controller
{
    public function index() {
    	return view('frontend.index');
    }
    
    public function about() {
    	return view('frontend.about');
    }
    
    public function contact() {
    	return view('frontend.contact');
    }

    public function privacy_policy() {
    	return view('frontend.privacy_policy');
    }

    public function cv_builder() {
    	return view('frontend.cv_builder');
    }
    
    public function cv_generator(Request $request) {
        $cv = new cv;

        // Personal Informations
    	$cv->full_name = $request->get('full_name');
    	$cv->email = $request->get('email');
    	$cv->mobile = $request->get('mobile');
    	$cv->fathers_name = $request->get('fathers_name');
    	$cv->mothers_name = $request->get('mothers_name');
    	$cv->nationality = $request->get('nationality');
    	$cv->religion = $request->get('religion');
    	$cv->marital_status = $request->get('marital_status');
    	$cv->date_of_birth = $request->get('date_of_birth');
    	$cv->present_adddress = $request->get('present_adddress');
    	$cv->permanent_adddress = $request->get('permanent_adddress');
    	$cv->mailing_adddress = $request->get('mailing_adddress');
    	$cv->objective = $request->get('objective');

        // Handling photo
        $newPhotoName = time() . '-' . $request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->move(public_path('uploads'), $newPhotoName);
        $cv->photo_name = $newPhotoName;
        $cv->photo_path = "/uploads/".$newPhotoName;

        // Education Qualifications
        // SSC Informations
    	$cv->ssc_year = $request->get('ssc_year');
    	$cv->ssc_group = $request->get('ssc_group');
    	$cv->ssc_board = $request->get('ssc_board');
    	$cv->ssc_result = $request->get('ssc_result');

        // HSC Informations
        $hsc_year = $request->get("hsc_year");
        if (!empty($hsc_year)) {
            $cv->hsc_year = $request->get('hsc_year');
            $cv->hsc_group = $request->get('hsc_group');
            $cv->hsc_board = $request->get('hsc_board');
            $cv->hsc_result = $request->get('hsc_result');
        }
        
        // Diploma Informations
        $diploma_year = $request->get("diploma_year");
        if (!empty($diploma_year)) {
            $cv->diploma_year = $request->get('diploma_year');
            $cv->diploma_group = $request->get('diploma_group');
            $cv->diploma_board = $request->get('diploma_board');
            $cv->diploma_result = $request->get('diploma_result');
        }
        
        // BSc Informations
        $bsc_year = $request->get("bsc_year");
        if (!empty($bsc_year)) {
            $cv->bsc_year = $request->get('bsc_year');
            $cv->bsc_group = $request->get('bsc_group');
            $cv->bsc_board = $request->get('bsc_board');
            $cv->bsc_result = $request->get('bsc_result');
        }

        // MSc Informations
        $msc_year = $request->get("msc_year");
        if (!empty($msc_year)) {
            $cv->msc_year = $request->get('msc_year');
            $cv->msc_group = $request->get('msc_group');
            $cv->msc_board = $request->get('msc_board');
            $cv->msc_result = $request->get('msc_result');
        }
        
        // Additional Informations
        $experience = $request->get("experience");
        if (!empty($experience)) {
            $cv->experience = $request->get('experience');
        }

        $references = $request->get("references");
        if (!empty($references)) {
            $cv->references = $request->get('references');
        }

        $cv->save();
        return redirect()->route('cv',['id'=>$cv->id]);
    }

    public function cv(Request $request, $id) {
        $cv = cv::where('id', $id)->first();
        
        if(!$cv) {
            return abort(404);
        }

    	return view('frontend.cv', compact('cv'));
    }

}
