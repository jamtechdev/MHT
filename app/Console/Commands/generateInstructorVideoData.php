<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class generateInstructorVideoData extends Command
{
    /**
    * The name and signature of the console command.
    *
    * @var string
    */
    protected $signature = 'create:generateInstructorVideoData';

    /**
    * The console command description.
    *
    * @var string
    */
    protected $description = 'Command description';

    /**
    * Create a new command instance.
    *
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
    }

    /**
    * Execute the console command.
    *
    * @return int
    */
    public function handle()
    {
        // Get Videos Details Section
        $instructorsData = Config::get('instructor_videos.Instructors');
        if($instructorsData) {
            $freeVideoArray = $paidVideoArray = [];
            foreach($instructorsData as $insData) {
                if($insData != 'All Instructor') {
                    // Get Free Videos Data
                    $instructorFreeVideosData = Config::get('instructor_videos.free.'.$insData);
                    if($instructorFreeVideosData) {
                        foreach($instructorFreeVideosData as $insFreeData) {
                            $client = new \GuzzleHttp\Client();
                            $response = $client->request('GET', 'https://fast.wistia.net/oembed?url=http://home.wistia.com/medias/'.$insFreeData.'?videoWidth=900');

                            $statusCode = $response->getStatusCode();
                            if($statusCode == 200) {
                                $insFreeResponseData = json_decode($response->getBody(), true);
                                if($insFreeResponseData) {
                                    $data = [
                                        'employee_name' => $insData,
                                        'video_id' => $insFreeData,
                                        'thumbnail_url' => $insFreeResponseData['thumbnail_url'],
                                        'title' => $insFreeResponseData['title'],
                                        'duration' => $insFreeResponseData['duration'],
                                    ];
                                    array_push($freeVideoArray, $data);
                                }
                            }
                        }
                    }
                    // Get Paid Videos Data
                    // $instructorPaidVideosData = Config::get('instructor_videos.paid.'.$insData);
                    // if($instructorPaidVideosData) {
                    //     foreach($instructorPaidVideosData as $insPaidData) {
                    //         if($insPaidData != 'notgiven') {
                    //             $client = new \GuzzleHttp\Client();
                    //             $response = $client->request('GET', 'https://fast.wistia.net/oembed?url=http://home.wistia.com/medias/'.$insPaidData.'?videoWidth=900');
                    //             $statusCode = $response->getStatusCode();
                    //             if($statusCode == 200) {
                    //                 $insPaidResponseData = json_decode($response->getBody(), true);
                    //                 if($insPaidResponseData) {
                    //                     $data = [
                    //                         'employee_name' => $insData,
                    //                         'video_id' => $insPaidData,
                    //                         'thumbnail_url' => $insPaidResponseData['thumbnail_url'],
                    //                         'title' => $insPaidResponseData['title'],
                    //                         'duration' => $insPaidResponseData['duration'],
                    //                     ];
                    //                     array_push($paidVideoArray, $data);
                    //                 }
                    //             }
                    //         }
                    //     }
                    // }
                }
            }
            $jsonFreeVideo = json_encode($freeVideoArray);
            file_put_contents('public/storage/instructorfreevidoes.json', $jsonFreeVideo);
            echo "Free Videos Json File Created Successfully \n";
            // $jsonPaidVideo = json_encode($paidVideoArray);
            // file_put_contents('public/storage/instructorpaidvidoes.json', $jsonPaidVideo);
            // echo "Paid Videos Json File Created Successfully \n";
        }
    }
}
