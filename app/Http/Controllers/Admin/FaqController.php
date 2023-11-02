<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    public function index(){
        $faqs = Faq::with(['faq'])->whereNotNull('heading')->get();
        // dd($faqs->toArray());
        return view('admin.faq.index',compact('faqs'));
    }

    public function create($parent_id){
        $faq = Faq::whereId($parent_id)->first();
        if($faq){
            $faqs = Faq::with(['faq'])->whereNotNull('heading')->get();
            return view('admin.faq.create', compact('faqs','faq'));
        }
        else{
            return redirect()->back()->with('error','FAQ heading not found');
        }
    }

    public function storeFaqHeading(Request $request){
        // dd($request->all());

        $validatedData = $request->validate([
            'heading' => ['required'],
            'question' => ['required'],
            'answer' => ['required'],
        ],[
            'heading.required' => 'The Faq Heading field is required'
        ]);

        $faq = new Faq;
        $faq->parent_id = $request->heading;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $result = $faq->save();

        if($result){
            return redirect()->route('admin::faq.index')->with('success','Question and Answer added successfully');
        }
        else{
            return redirect()->back()->with('error','Something went wrong, Please try again');
        }
    }

    public function editFaqHeading($faq_id){
        $faq = Faq::where('id',$faq_id)->first();
        if($faq){
            $faqs = Faq::with(['faq'])->whereNotNull('heading')->get();
            // dd($faqs,$faq);
            return view('admin.faq.edit', compact('faqs','faq'));
        }
        else{
            return redirect()->back()->with('error','FAQ heading not found');
        }
    }

    public function updateFaqHeading(Request $request){

        // dd($request->all());
        $validatedData = $request->validate([
            'heading' => ['required'],
            'question' => ['required'],
            'answer' => ['required'],
        ],[
            'heading.required' => 'The Faq Heading field is required'
        ]);

        $faq = Faq::find($request->id);
        $faq->parent_id = $request->heading;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $result = $faq->save();

        if($result){
            return redirect()->route('admin::faq.index')->with('success','Question and Answer updated successfully');
        }
        else{
            return redirect()->back()->with('error','Something went wrong, Please try again');
        }
    }

    public function deleteFaqHeading($id,Request $request){
        // dd($id,$request->all());
        $faq = Faq::find($id)->delete();
        if($faq){
            return response()->json(['status' => 'success' , 'message' => 'Faq Heading delete successfully']);
        }
        else{
            return response()->json(['status' => 'error' , 'message' => 'Something went wrong, Please try again']);
        }
    }

    public function storeFaq(Request $request){
        $validator = Validator::make($request->all(),[
            'heading' => 'required|unique:faqs,heading',
        ]);
        
        if($validator->fails()){
            return response()->json([ 'status' => 'error' , 'message' => $validator->errors()->first()]);
        }
        else{
            // dd($request->all());
            $faq = new Faq;
            $faq->heading = $request->heading;
            $result = $faq->save();
            if($result){
                return response()->json([ 'status' => 'success' , 'message' => 'Heading saved successfully']);
            }
            else{
                return response()->json([ 'status' => 'error' , 'message' => 'Something went wrong, Please try again']);
            }
        }
    }

    public function showEditFaq($id){
        $faq = Faq::find($id);
        if($faq){
            return view('admin.faq.faq_edit', compact('faq'));
        }
        else{
            return redirect()->back()->with('error','FAQ heading not found');
        }
    }

    public function updateFaq(Request $request){
        $validatedData = $request->validate([
            'heading' => 'required|unique:faqs,heading,'.$request->id,
        ],[
            'heading.required' => 'The Faq Heading field is required'
        ]);


        $faq = Faq::find($request->id);
        $faq->heading = $request->heading;
        $result = $faq->update();
        
        if($result){
            return redirect()->route('admin::faq.index')->with('success','Faq heading name updated successfully');
        }
        else{
            return redirect()->back()->with('error','Something went wrong, Please try again');
        }
    }
}
