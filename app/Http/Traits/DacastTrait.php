<?php
namespace App\Http\Traits;

trait DacastTrait {

    // create folder on Dacast
    public function createFolderOnDacast($name) {
        try{
            $curl = curl_init();
    
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://developer.dacast.com/v2/folder",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode([
                    'full_path' => '/'.$name
                ]),
                CURLOPT_HTTPHEADER => [
                    "X-Api-Key: ".config("services.dacast.api_key"),
                    "X-Format: default",
                    "accept: application/json",
                    "content-type: application/json"
                ],
            ]);
        
            $response = curl_exec($curl);
            $err = curl_error($curl);
        
            curl_close($curl);
        
            if ($err) {
                // dd($err);
                return array('status' => 'error', 'data' => $err);
            } else {
                $response = json_decode($response,true);
                if(isset($response['message'])){
                    return array('status' => 'error', 'data' => $response['detail']);
                }
                else{
                    return array('status' => 'success', 'data' => $response);
                }
                // return array('status' => 'success', 'data' => $response);
                // dd($response);
            }
        }
        catch(\Exception $e) {
            // dd($e->getMessage());
            return array('status' => 'error', 'data' => $e->getMessage());
        }
    }

    // create folder on Dacast
    public function addContentToFolderOnDacast($video_id, array $folder_id) {
        try{
            $curl = curl_init();
            
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://developer.dacast.com/v2/vod/". $video_id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "PUT",
                CURLOPT_POSTFIELDS => json_encode([
                    'folder_ids' => $folder_id
                ]),
                CURLOPT_HTTPHEADER => [
                    "X-Api-Key: ".config("services.dacast.api_key"),
                    "X-Format: default",
                    "accept: application/json",
                    "content-type: application/json"
                ],
            ]);
        
            $response = curl_exec($curl);
            $err = curl_error($curl);
        
            curl_close($curl);
        
            if ($err) {
                // dd($err);
                return array('status' => 'error', 'data' => $err);
            } else {
                $response = json_decode($response,true);
                // dd($response, 90);
                if(isset($response['message'])){
                    return array('status' => 'error', 'data' => $response['detail']);
                }
                else{
                    return array('status' => 'success', 'data' => $response);
                }
                // return array('status' => 'success', 'data' => $response);
                // dd($response);
            }
        }
        catch(\Exception $e) {
            // dd($e->getMessage());
            return array('status' => 'error', 'data' => $e->getMessage());
        }
    }

    public function createSubFolderOnDacast($main,$sub_folder) {
        try{
            $curl = curl_init();
    
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://developer.dacast.com/v2/folder",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode([
                    'full_path' => $main.'/'.$sub_folder
                ]),
                CURLOPT_HTTPHEADER => [
                    "X-Api-Key: ".config("services.dacast.api_key"),
                    "X-Format: default",
                    "accept: application/json",
                    "content-type: application/json"
                ],
            ]);
        
            $response = curl_exec($curl);
            $err = curl_error($curl);
        
            curl_close($curl);
        
            if ($err) {
                // dd($err);
                return array('status' => 'error', 'data' => $err);
            } else {
                $response = json_decode($response,true);
                return array('status' => 'success', 'data' => $response);
                // dd($response);
            }
        }
        catch(\Exception $e) {
            // dd($e->getMessage());
            return array('status' => 'error', 'data' => $e->getMessage());
        }
    }

    // Get information about an individual folder
    public function getFolderDataOnDacast($folder_id){
        try{
            $curl = curl_init();
    
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://developer.dacast.com/v2/folder/".$folder_id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "X-Api-Key: ".config("services.dacast.api_key"),
                  "X-Format: default",
                  "accept: application/json"
                ],
            ]);
        
            $response = curl_exec($curl);
            $err = curl_error($curl);
        
            curl_close($curl);
        
            if ($err) {
                // dd($err);
                return array('status' => 'error', 'data' => $err);
            } else {
                $response = json_decode($response,true);
                // dd($response, $response['message'], $response['detail']);
                if(isset($response['message'])){
                    return array('status' => 'error', 'data' => $response['detail']);
                }
                else{
                    return array('status' => 'success', 'data' => $response);
                }
            }
        }
        catch(\Exception $e) {
            // dd($e->getMessage());
            return array('status' => 'error', 'data' => $e->getMessage());
        }
    }

    // Delete folder on Dacast
    public function deleteFolderOnDacast($folder_id) {
        try{
            $curl = curl_init();
    
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://developer.dacast.com/v2/folder/".$folder_id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "DELETE",
                CURLOPT_HTTPHEADER => [
                    "X-Api-Key: ".config("services.dacast.api_key"),
                    "X-Format: default",
                    "accept: application/json"
                ],
            ]);
        
            $response = curl_exec($curl);
            $err = curl_error($curl);
        
            curl_close($curl);
        
            if ($err) {
                // dd($err);
                return array('status' => 'error', 'data' => $err);
            } else {
                $response = json_decode($response,true);
                return array('status' => 'success', 'data' => $response);
                // dd($response);
            }
        }
        catch(\Exception $e) {
            // dd($e->getMessage());
            return array('status' => 'error', 'data' => $e->getMessage());
        }
    }

    // video listing on Dacast
    public function listVideoOnDacast($page = 1,$limit = 5){
        try{
            $curl = curl_init();

            curl_setopt_array($curl, [
            CURLOPT_URL => "https://developer.dacast.com/v2/vod?page=". $page ."&per_page=". $limit ."&online=true",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-Api-Key: ".config("services.dacast.api_key"),
                "X-Format: default",
                "accept: application/json"
            ],
            ]);
        
            $response = curl_exec($curl);
            $err = curl_error($curl);
        
            curl_close($curl);
        
            if ($err) {
                // dd($err);
                return array('status' => 'error', 'data' => $err);
            } else {
                $response = json_decode($response,true);
                return array('status' => 'success', 'data' => $response);
                // dd($response);
            }
        }
        catch(\Exception $e) {
            // dd($e->getMessage());
            return array('status' => 'error', 'data' => $e->getMessage());
        }
    }

    // create video on Dacast
    public function createVideoOnDacast($source){
        try{
            $curl = curl_init();
    
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://developer.dacast.com/v2/vod",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode([
                    'source' => $source,
                    'upload_type' => 'curl',
                    'auto_encoding' => true
                ]),
                CURLOPT_HTTPHEADER => [
                    "X-Api-Key: ".config("services.dacast.api_key"),
                    "X-Format: default",
                    "accept: application/json",
                    "content-type: application/json"
                ],
            ]);
        
            $response = curl_exec($curl);
            $err = curl_error($curl);
        
            curl_close($curl);
        
            if ($err) {
                // dd($err);
                return array('status' => 'error', 'data' => $err);
            } else {
                $response = json_decode($response,true);
                if(isset($response['curl-command'])){
                    // echo $response['curl-command'];

                    $rerun = $this->rerunUploadFunction($source,$response['curl-command']);
                    // $rerun = 1;
                    return array($response,$rerun);
                }
                // return array('status' => 'success', 'data' => $response);
                // dd($response);
            }
        }
        catch(\Exception $e) {
            // dd($e->getMessage());
            return array('status' => 'error', 'data' => $e->getMessage());
        }
    }

    public function getVideoDetailByID($video_id){
        try{
            $curl = curl_init();
    
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://developer.dacast.com/v2/videos/". $video_id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "X-Api-Key: ". config("services.dacast.api_key"),
                    "X-Format: default",
                    "accept: application/json"
                ],
            ]);
        
            $response = curl_exec($curl);
            $err = curl_error($curl);
        
            curl_close($curl);
        
            if ($err) {
                // dd($err);
                return array('status' => 'error', 'data' => $err);
            } else {
                $response = json_decode($response,true);
                // dd($response);
                if(isset($response['message']) and (!empty($response['message']))){
                    return array('status' => 'error', 'data' => $response['detail']);
                }
                else{
                    return array('status' => 'success', 'data' => $response);
                }
                // return array('status' => 'success', 'data' => $response);
                // dd($response);
                // dd($response);
            }
        }
        catch(\Exception $e) {
            // dd($e->getMessage());
            return array('status' => 'error', 'data' => $e->getMessage());
        }
    }

    public function updateVideoTitleByID($video_id, $video_title){
        try{
            $curl = curl_init();
    
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://developer.dacast.com/v2/vod/". $video_id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "PUT",
                CURLOPT_POSTFIELDS => json_encode([
                    'title' => $video_title
                ]),
                CURLOPT_HTTPHEADER => [
                    "X-Api-Key: 1697816583cjfcrU0IYI1Nk7aWxoF9kr7HgAb5Laju",
                    "X-Format: default",
                    "accept: application/json",
                    "content-type: application/json"
                ],
            ]);
        
            $response = curl_exec($curl);
            $err = curl_error($curl);
        
            curl_close($curl);
        
            if ($err) {
                return array('status' => 'error', 'data' => $err);
            } else {
                $response = json_decode($response,true);
                // dd($response);
                return array('status' => 'success', 'data' => $response);
                // return array('status' => 'success', 'data' => $response);
                // dd($response);
                // dd($response);
            }
        }
        catch(\Exception $e) {
            // dd($e->getMessage());
            return array('status' => 'error', 'data' => $e->getMessage());
        }
    }
    
    public function getVideoDetailByTitle($title){
        try{
            $curl = curl_init();
            
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://developer.dacast.com/v2/vod?page=1&per_page=50&title=".$title,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "X-Api-Key: ". config("services.dacast.api_key"),
                    "X-Format: default",
                    "accept: application/json"
                ],
            ]);
        
            $response = curl_exec($curl);
            $err = curl_error($curl);
        
            curl_close($curl);
        
            if ($err) {
                // dd($err);
                return array('status' => 'error', 'data' => $err);
            } else {
                $response = json_decode($response,true);
                // dd($title, $response);
                if(isset($response['message']) and (!empty($response['message']))){
                    return array('status' => 'error', 'data' => $response['detail']);
                }
                else{
                    return array('status' => 'success', 'data' => $response);
                }
                // return array('status' => 'success', 'data' => $response);
                // dd($response);
                // dd($response);
            }
        }
        catch(\Exception $e) {
            // dd($e->getMessage());
            return array('status' => 'error', 'data' => $e->getMessage());
        }
    }

    
    public function updateVideoOnDacast($video_id,$video_array){
        try{
            $curl = curl_init();
    
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://developer.dacast.com/v2/vod/".$video_id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "PUT",
                CURLOPT_POSTFIELDS => json_encode([
                    'title' => $video_array['title'],
                    'description' => isset($video_array['description']) ? $video_array['description'] : 'Description',
                    'autoplay' => true,
                    'online' => isset($video_array['online']) ? $video_array['online'] : true,
                    'google_analytics' => true,
                ]),
                CURLOPT_HTTPHEADER => [
                    "X-Api-Key: ".config("services.dacast.api_key"),
                    "X-Format: default",
                    "accept: application/json",
                    "content-type: application/json"
                ],
            ]);
        
            $response = curl_exec($curl);
            $err = curl_error($curl);
        
            curl_close($curl);
        
            if ($err) {
                // dd($err);
                return array('status' => 'error', 'data' => $err);
            } else {
                $response = json_decode($response,true);
                // dd($response);
                return array('status' => 'success', 'data' => $response);
                // dd($response);
            }
        }
        catch(\Exception $e) {
            // dd($e->getMessage());
            return array('status' => 'error', 'data' => $e->getMessage());
        }
    }

    public function rerunUploadFunction($file_path, $curlCommand) {
        try {

            $upload_url = $this->extractURL($curlCommand);
            if (!$upload_url) {
                // dd('url not found in string, Please try again.');
                return ['status' => 'error', 'data' => 'url not found in string, Please try again.'];
            }
            
            // Initialize cURL session
            $ch = curl_init();

            // Set cURL options
            curl_setopt($ch, CURLOPT_URL, $upload_url);
            curl_setopt($ch, CURLOPT_UPLOAD, 1);
            curl_setopt($ch, CURLOPT_INFILE, fopen($file_path, 'r'));
            curl_setopt($ch, CURLOPT_INFILESIZE, filesize($file_path));

            // Execute the cURL request
            $response = curl_exec($ch);
            $err = curl_error($ch);
        
            curl_close($ch);
        
            if ($err) {
                // dd('Erro rerunUploadFunction',$err);
                return array('status' => 'error', 'data' => $err);
            }
            else{
                // Check the response
                $response = json_decode($response,true);
                return ['status' => 'success', 'data' => $response];
            }

        } catch (\Exception $e) {
            return ['status' => 'error', 'data' => $e->getMessage()];
        }
    }
    
    public function deleteVideoByID($video_id){
        try{
            $curl = curl_init();
    
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://developer.dacast.com/v2/videos/".$video_id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "DELETE",
                CURLOPT_HTTPHEADER => [
                    "X-Api-Key: ".config("services.dacast.api_key"),
                    "X-Format: default",
                    "accept: text/plain"
                ],
            ]);
        
            $response = curl_exec($curl);
            $err = curl_error($curl);
        
            curl_close($curl);
        
            if ($err) {
                // dd($err);
                return array('status' => 'error', 'data' => $err);
            } else {
                $response = json_decode($response,true);

                if(isset($response['message'])){
                    return array('status' => 'error', 'data' => $response['detail']);
                }
                else{
                    return array('status' => 'success', 'data' => $response);
                }       
            }
        }
        catch(\Exception $e) {
            // dd($e->getMessage());
            return array('status' => 'error', 'data' => $e->getMessage());
        }
    }
    
    // public function uploadVideoOnFolder($folder_id){
    //     try {
    //         // Initialize cURL session
    //         $curl = curl_init();

    //         curl_setopt_array($curl, [
    //             CURLOPT_URL => "https://developer.dacast.com/v2/vod/id",
    //             CURLOPT_RETURNTRANSFER => true,
    //             CURLOPT_ENCODING => "",
    //             CURLOPT_MAXREDIRS => 10,
    //             CURLOPT_TIMEOUT => 30,
    //             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //             CURLOPT_CUSTOMREQUEST => "PUT",
    //             CURLOPT_HTTPHEADER => [
    //                 "X-Api-Key: 1697816583cjfcrU0IYI1Nk7aWxoF9kr7HgAb5Laju",
    //                 "X-Format: default",
    //                 "accept: application/json",
    //                 "content-type: application/json"
    //             ],
    //         ]);

    //         $response = curl_exec($curl);
    //         $err = curl_error($curl);

    //         curl_close($curl);
        
    //         if ($err) {
    //             // dd('Erro rerunUploadFunction',$err);
    //             return array('status' => 'error', 'data' => $err);
    //         }
    //         else{
    //             // Check the response
    //             $response = json_decode($response,true);
    //             return ['status' => 'success', 'data' => $response];
    //         }

    //     } catch (\Exception $e) {
    //         return ['status' => 'error', 'data' => $e->getMessage()];
    //     }
    // }

    function extractURL($string) {
        $pattern = "/'(https:\/\/upload\.dacast\.com\/[^\']+)'/"; // Regular expression to match the URL
        if (preg_match($pattern, $string, $matches)) {
            return $matches[1];
        } else {
            return null;
        }
    }

}