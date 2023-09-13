<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HomePageBanner;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\DataTables;
use DB;
class BannerChangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.homePageBanner.index");
    }

    /**
    * Author Ganesh 
    * Get Banners
    * Route : banners/datatable
    *Created at :- 18-08-2022
    * Method : GET
    * @return \Illuminate\View\View
    */
    public function getDatatable(HomePageBanner $homepagebanner)
    {
        $banners = $homepagebanner->all();

        $result = array();

        if(!empty($banners))
        {
            foreach($banners as $b)
            {   
                $result[] = array(
                                    'id' => $b->id,    
                                    'banner_id' => $b->banner_id,
                                    'thumbnail' => $b->thumbnailUrl,
                                    'status' => $b->status
                );    
            }
        }
        // print_r($result);die;
        //print_r($result);die;
        return DataTables::of($result)->addIndexColumn()->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.homePageBanner.create_banner");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('home_page_banners')->update(['status' => 0]);

        $result = HomePageBanner::create([
            'banner_id'=>$request->media_id,
            'thumbnailUrl'=>$request->thumbnailUrl,
            'status'=>1
        ]);

        if ($result) {
            return Redirect::back()->with("success", "Subscription plan has been created successfully");
        }
        return Redirect::back()->with("error", "Sorry, Something went wrong please try again");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("admin.homePageBanner.edit_banner");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function updateBanner(Request $request, HomePageBanner $homepagebanner)
    {
        $homepagebanner = $homepagebanner->find($request->banner_id);
        $homepagebanner->banner_id =  $request->media_id;
        $homepagebanner->thumbnailUrl =  $request->thumbnailUrl;
        $isEdit = $homepagebanner->update();

        if($isEdit)
        {
            return redirect('admins/bannerChange');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomePageBanner $homepagebanner,$id)
    {
  
        $data = $homepagebanner->where('id', $id)->first();
        if ($data) {
            $data->delete();
            $response['message'] = "Banner has been deleted successfully.";
            $response['status'] = true;
        } else {
            $response['message'] = "Banner does not found!";
            $response['status'] = false;
        }
        
        return response()->json($response);
    }

    /**
    * Author Ganesh 
    * update banner status
    * Route : bannerstatus/{class}
    *Created at :- 18-08-2022
    * Method : POST
    * @return \Illuminate\View\View
    */
    public function statusUpdate(Request $request, HomePageBanner $homepagebanner, $id)
    {
        if($request->value == 1)
        {
            DB::table('home_page_banners')->update(['status' => 0]);
        }


        $homepagebanner = $homepagebanner->find($id);
        $homepagebanner->status = $request->value;
        $isEdit = $homepagebanner->update();

        if($isEdit){
            $responseData = array('success'=>'1','message'=>"Banner status has been changed successfully.");
            return $responseData; //redirect('admins/subscriptionplan')->with("success", "Subscription plan status has been changed successfully.");
        }

        $responseData = array('success'=>'0','message'=>"Sorry, Something went wrong please try again");
        return $responseData; 
        //redirect('admins/subscriptionplan')->with("error", "Sorry, Something went wrong please try again");
    }
}
