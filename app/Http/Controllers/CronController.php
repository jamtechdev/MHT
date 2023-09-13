<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Redirect;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\Rules;
use App\Models\User;
use App\Models\SendgridTemplate;
use App\Models\login_deatils;
use App\Models\StudentSubscription;
use App\Mail\VerifyEmailReminder;
use Sichikawa\LaravelSendgridDriver\SendGrid;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Mail, Hash, Auth, Storage, Session, Config;

class CronController extends Controller
{
    use SendGrid;
    
    /**
    * Author Ganesh 
    * Set CRON for send email verification reminder
    * Route Name : sendEmailVerificationReminder
    * Method : GET
    * Created at :- 2022-07-06
    * @return \Illuminate\View\View
    */

    // public function sendVerifyEmailReminder()
    // {
    //     $user = User::where('email_verified_at',NULL)
    //                 ->where('email_verify_reminder','!=',3)
    //                 ->get();
       
    //     if(!empty($user))
    //     {
    //         $todayDate = strtotime(date("Y-m-d"));

    //         try{
    //             foreach($user as $u)
    //             {
    //                 $numberDays = "";
                   
    //                 $created_date = strtotime(date("Y-m-d",strtotime($u['created_at'])));
    
    //                 $timeDiff = abs($todayDate - $created_date);
    
    //                 $numberDays = $timeDiff/86400;  // 86400 seconds in one day
    
    //                 // and you might want to convert to integer
    //                 $numberDays = intval($numberDays);
    //                 // echo $numberDays;die;
    
    //                 if($numberDays == 1)
    //                 {
    //                     User::where('id',$u->id)->update(['email_verify_reminder'=>1]);
                         
    //                     $template = SendgridTemplate::where('id',6)->first();

    //                     $template_id = "d-".$template->template_id;   

    //                     $email = new \SendGrid\Mail\Mail();
        
    //                     $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
    //                     $email->setSubject('Try MartialArtsZen.com using this referral');
    //                     $email->addTo($u->email);
    //                     $email->addContent("text/html","Join me and improve your skills in various disciplines");
    //                     $email->addDynamicTemplateDatas([
    //                         "first_name"=>$u->firstname,
    //                         "default"=>"Valued customer",
    //                         "verifyUrl"=>route('student.login')
    //                         ]);
    //                     $email->setTemplateId($template_id);
                      
    //                     $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
            
    //                     try{
    //                         $response = $sendgrid->send($email);
    //                         print $response->statusCode(). "\n";
    //                     }
    //                     catch(Exception $e)
    //                     {
    //                         echo "Caught Exception:".$e->getMessage()."\n";
    //                     } 
    //                 }   
    
    //                 if($numberDays == 3)
    //                 {
    //                     User::where('id',$u->id)->update(['email_verify_reminder'=>2]);
    
    //                     $template = SendgridTemplate::where('id',7)->first();

    //                     $template_id = "d-".$template->template_id;   

    //                     $email = new \SendGrid\Mail\Mail();
        
    //                     $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
    //                     $email->setSubject('Try MartialArtsZen.com using this referral');
    //                     $email->addTo($u->email);
    //                     $email->addContent("text/html","Join me and improve your skills in various disciplines");
    //                     $email->addDynamicTemplateDatas([
    //                         "first_name"=>$u->firstname,
    //                         "default"=>"Valued customer",
    //                         "verifyUrl"=>route('student.login')
    //                         ]);
    //                     $email->setTemplateId($template_id);
                      
    //                     $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
            
    //                     try{
    //                         $response = $sendgrid->send($email);
    //                         print $response->statusCode(). "\n";
    //                     }
    //                     catch(Exception $e)
    //                     {
    //                         echo "Caught Exception:".$e->getMessage()."\n";
    //                     } 
    //                 }    
    //                 if($numberDays == 7)
    //                 {
    //                     User::where('id',$u->id)->update(['email_verify_reminder'=>3]);
                    
    //                     $template = SendgridTemplate::where('id',8)->first();

    //                     $template_id = "d-".$template->template_id;   

    //                     $email = new \SendGrid\Mail\Mail();
        
    //                     $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
    //                     $email->setSubject('Try MartialArtsZen.com using this referral');
    //                     $email->addTo($u->email);
    //                     $email->addContent("text/html","Join me and improve your skills in various disciplines");
    //                     $email->addDynamicTemplateDatas([
    //                         "first_name"=>$u->firstname,
    //                         "default"=>"Valued customer",
    //                         "verifyUrl"=>route('student.login')
    //                         ]);
    //                     $email->setTemplateId($template_id);
                      
    //                     $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
            
    //                     try{
    //                         $response = $sendgrid->send($email);
    //                         print $response->statusCode(). "\n";
    //                     }
    //                     catch(Exception $e)
    //                     {
    //                         echo "Caught Exception:".$e->getMessage()."\n";
    //                     }
    //                 }
                    
    //             }

    //             return "Verify email reminder sent successfully";
    //         }catch(Exception $e)
    //         {
    //             return $e;
    //         }
    //     } 
    // }

    // public function sendSignUpReminder()
    // {
       
       
    //     $user_data = User::where('email_verified_at','!=',NULL)
    //                     ->where('email_sign_up_reminder','!=',3)
    //                     ->where(function($query2){
    //                         $query2->where('age_group','=',NULL)
    //                         ->orwhere('gender','=',NULL)
    //                         ->orWhere('who_will_be_training',NULL)
    //                         ->orWhere('disciplines_in_martial_arts',NULL)
    //                         ->orWhere('stretching_flexibility_spiritual_meditative_arts',NULL)
    //                         ->orWhere('health_and_wellness_guidance',NULL)
    //                         ->orWhere('all_fitness_including',NULL)
    //                         ->orWhere('fitness',NULL)
    //                         ->orWhere('preferred_language',NULL)
    //                         ->orWhere('instructor_gender',NULL)
    //                         ->orWhere('preferred_training_style',NULL)
    //                         ->orWhere('instructor_experience',NULL);
    //                     })->get();
                        

    //     if(!empty($user_data))
    //     {
            
    //         $todayDate1 = strtotime(date("Y-m-d"));

    //         try{
    //                 foreach($user_data as $u1)
    //                 {
                      
    //                     $created_date1 = strtotime(date("Y-m-d",strtotime($u1['created_at'])));
        
    //                     $timeDiff1 = abs($todayDate1 - $created_date1);
        
    //                     $numberDays1 = $timeDiff1/86400;  // 86400 seconds in one day
        
    //                     // and you might want to convert to integer
    //                     $numberDays1 = intval($numberDays1);
    //                     // echo $numberDays;die;
    //                     if($numberDays1 == 1)
    //                     {

    //                         User::where('id',$u1->id)->update(['email_sign_up_reminder'=>1]);
                            
    //                         $template = SendgridTemplate::where('id',3)->first();

    //                         $template_id = "d-".$template->template_id;   

    //                         $email = new \SendGrid\Mail\Mail();
            
    //                         $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
    //                         $email->setSubject('Try MartialArtsZen.com using this referral');
    //                         $email->addTo($u1->email);
    //                         $email->addContent("text/html","Join me and improve your skills in various disciplines");
    //                         $email->addDynamicTemplateDatas([
    //                             "first_name"=>$u1->firstname,
    //                             "default"=>"Valued customer",
    //                             "verifyUrl"=>route('student.login')
    //                             ]);
    //                         $email->setTemplateId($template_id);
                          
    //                         $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
                
    //                         try{
    //                             $response = $sendgrid->send($email);
    //                             print $response->statusCode(). "\n";
    //                         }
    //                         catch(Exception $e)
    //                         {
    //                             echo "Caught Exception:".$e->getMessage()."\n";
    //                         }
    //                     }   

    //                     if($numberDays1 == 3)
    //                     {
    //                         User::where('id',$u1->id)->update(['email_sign_up_reminder'=>2]);

    //                         $template = SendgridTemplate::where('id',4)->first();

    //                         $template_id = "d-".$template->template_id;   

    //                         $email = new \SendGrid\Mail\Mail();
            
    //                         $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
    //                         $email->setSubject('Try MartialArtsZen.com using this referral');
    //                         $email->addTo($u1->email);
    //                         $email->addContent("text/html","Join me and improve your skills in various disciplines");
    //                         $email->addDynamicTemplateDatas([
    //                             "first_name"=>$u1->firstname,
    //                             "default"=>"Valued customer",
    //                             "verifyUrl"=>route('student.login')
    //                             ]);
    //                         $email->setTemplateId($template_id);
                          
    //                         $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
                
    //                         try{
    //                             $response = $sendgrid->send($email);
    //                             print $response->statusCode(). "\n";
    //                         }
    //                         catch(Exception $e)
    //                         {
    //                             echo "Caught Exception:".$e->getMessage()."\n";
    //                         }
    //                     }    
    //                     if($numberDays1 == 7)
    //                     {
    //                         User::where('id',$u1->id)->update(['email_sign_up_reminder'=>3]);

    //                         $template = SendgridTemplate::where('id',5)->first();

    //                         $template_id = "d-".$template->template_id;   

    //                         $email = new \SendGrid\Mail\Mail();
            
    //                         $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
    //                         $email->setSubject('Try MartialArtsZen.com using this referral');
    //                         $email->addTo($u1->email);
    //                         $email->addContent("text/html","Join me and improve your skills in various disciplines");
    //                         $email->addDynamicTemplateDatas([
    //                             "first_name"=>$u1->firstname,
    //                             "default"=>"Valued customer",
    //                             "verifyUrl"=>route('student.login')
    //                             ]);
    //                         $email->setTemplateId($template_id);
                          
    //                         $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
                
    //                         try{
    //                             $response = $sendgrid->send($email);
    //                             print $response->statusCode(). "\n";
    //                         }
    //                         catch(Exception $e)
    //                         {
    //                             echo "Caught Exception:".$e->getMessage()."\n";
    //                         }
    //                     }
        
    //                 }

    //                 return "Complete preference survey reminder sent successfully";

    //         }catch(Exception $e)
    //         {
    //             return $e;
    //         }
    //     } 
    // }
    
    // public function sendNewSiteLaunchReminder()
    // {
    //     $user_data = User::where('free_site_user',0)
    //                     ->where('new_site_launch_reminder','!=',3)
    //                     ->get();
                        

    //     if(!empty($user_data))
    //     {
    //         $todayDate1 = strtotime(date("Y-m-d"));

    //         try{
    //             foreach($user_data as $u1)
    //             {
    //                 $created_date1 = strtotime(date("Y-m-d",strtotime($u1['free_site_launch_date'])));
        
    //                 $timeDiff1 = abs($todayDate1 - $created_date1);
    
    //                 $numberDays1 = $timeDiff1/86400;  // 86400 seconds in one day
    
    //                 // and you might want to convert to integer
    //                 $numberDays1 = intval($numberDays1);
    //                 // echo $numberDays;die;
    //                 if($numberDays1 == 1)
    //                 {   
    //                     User::where('id',$u1->id)->update(['new_site_launch_reminder'=>1]);    
                        
    //                     $template = SendgridTemplate::where('id',9)->first();

    //                     $template_id = "d-".$template->template_id;   

    //                     $email = new \SendGrid\Mail\Mail();
        
    //                     $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
    //                     $email->setSubject('Try MartialArtsZen.com using this referral');
    //                     $email->addTo($u1->email);
    //                     $email->addContent("text/html","Join me and improve your skills in various disciplines");
    //                     $email->addDynamicTemplateDatas([
    //                         "first_name"=>$u1->firstname,
    //                         "default"=>"Valued customer",
    //                         "verifyUrl"=>route('student.login')
    //                         ]);
    //                     $email->setTemplateId($template_id);
                        
    //                     $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
            
    //                     try{
    //                         $response = $sendgrid->send($email);
    //                         print $response->statusCode(). "\n";
    //                     }
    //                     catch(Exception $e)
    //                     {
    //                         echo "Caught Exception:".$e->getMessage()."\n";
    //                     }
    //                 }
    //                 if($numberDays1 == 3)
    //                 {   
    //                     User::where('id',$u1->id)->update(['new_site_launch_reminder'=>2]);    
                        
    //                     $template = SendgridTemplate::where('id',10)->first();

    //                     $template_id = "d-".$template->template_id;   

    //                     $email = new \SendGrid\Mail\Mail();
        
    //                     $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
    //                     $email->setSubject('Try MartialArtsZen.com using this referral');
    //                     $email->addTo($u1->email);
    //                     $email->addContent("text/html","Join me and improve your skills in various disciplines");
    //                     $email->addDynamicTemplateDatas([
    //                         "first_name"=>$u1->firstname,
    //                         "default"=>"Valued customer",
    //                         "verifyUrl"=>route('student.login')
    //                         ]);
    //                     $email->setTemplateId($template_id);
                        
    //                     $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
            
    //                     try{
    //                         $response = $sendgrid->send($email);
    //                         print $response->statusCode(). "\n";
    //                     }
    //                     catch(Exception $e)
    //                     {
    //                         echo "Caught Exception:".$e->getMessage()."\n";
    //                     }
    //                 }
    //                 if($numberDays1 == 7)
    //                 {   
    //                     User::where('id',$u1->id)->update(['new_site_launch_reminder'=>3]);    
                        
    //                     $template = SendgridTemplate::where('id',11)->first();

    //                     $template_id = "d-".$template->template_id;   

    //                     $email = new \SendGrid\Mail\Mail();
        
    //                     $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
    //                     $email->setSubject('Try MartialArtsZen.com using this referral');
    //                     $email->addTo($u1->email);
    //                     $email->addContent("text/html","Join me and improve your skills in various disciplines");
    //                     $email->addDynamicTemplateDatas([
    //                         "first_name"=>$u1->firstname,
    //                         "default"=>"Valued customer",
    //                         "verifyUrl"=>route('student.login')
    //                         ]);
    //                     $email->setTemplateId($template_id);
                        
    //                     $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
            
    //                     try{
    //                         $response = $sendgrid->send($email);
    //                         print $response->statusCode(). "\n";
    //                     }
    //                     catch(Exception $e)
    //                     {
    //                         echo "Caught Exception:".$e->getMessage()."\n";
    //                     }
    //                 }
                    
    //             }

    //             return "New site launch reminder sent successfully";

    //         }catch(Exception $e)
    //         {
    //             return $e;
    //         }
    //     } 
    // }
    
    public function sendRedeemPromotionReminder()
    {
        $user_data = User::where('redeem_promotion_reminder','!=',3)
                        ->where('accept_bronze_plan','=',2)
                        ->orWhere('accept_bronze_plan',NULL)
                        ->get();
                        

        if(!empty($user_data))
        {
            $todayDate1 = strtotime(date("Y-m-d"));

            try{
                    foreach($user_data as $u1)
                    {
                        $created_date1 = strtotime(date("Y-m-d",strtotime($u1['created_at'])));
        
                        $timeDiff1 = abs($todayDate1 - $created_date1);
        
                        $numberDays1 = $timeDiff1/86400;  // 86400 seconds in one day
        
                        // and you might want to convert to integer
                        $numberDays1 = intval($numberDays1);
                        // echo $numberDays;die;
                        if($numberDays1 == 1)
                        {
                            User::where('id',$u1->id)->update(['redeem_promotion_reminder'=>1]);
                            
                            $template = SendgridTemplate::where('id',12)->first();

                            $template_id = "d-".$template->template_id;   

                            $email = new \SendGrid\Mail\Mail();
            
                            $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                            $email->setSubject('Try MartialArtsZen.com using this referral');
                            $email->addTo($u1->email);
                            $email->addContent("text/html","Join me and improve your skills in various disciplines");
                            $email->addDynamicTemplateDatas([
                                "first_name"=>$u1->firstname,
                                "default"=>"Valued customer",
                                "verifyUrl"=>route('student.login')
                                ]);
                            $email->setTemplateId($template_id);
                            
                            $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
                
                            try{
                                $response = $sendgrid->send($email);
                                print $response->statusCode(). "\n";
                            }
                            catch(Exception $e)
                            {
                                echo "Caught Exception:".$e->getMessage()."\n";
                            }
                        }   

                        if($numberDays1 == 3)
                        {
                            User::where('id',$u1->id)->update(['redeem_promotion_reminder'=>2]);

                            $template = SendgridTemplate::where('id',13)->first();

                            $template_id = "d-".$template->template_id;   

                            $email = new \SendGrid\Mail\Mail();
            
                            $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                            $email->setSubject('Try MartialArtsZen.com using this referral');
                            $email->addTo($u1->email);
                            $email->addContent("text/html","Join me and improve your skills in various disciplines");
                            $email->addDynamicTemplateDatas([
                                "first_name"=>$u1->firstname,
                                "default"=>"Valued customer",
                                "verifyUrl"=>route('student.login')
                                ]);
                            $email->setTemplateId($template_id);
                            
                            $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
                
                            try{
                                $response = $sendgrid->send($email);
                                print $response->statusCode(). "\n";
                            }
                            catch(Exception $e)
                            {
                                echo "Caught Exception:".$e->getMessage()."\n";
                            }

                        }    
                        if($numberDays1 == 7)
                        {
                            User::where('id',$u1->id)->update(['redeem_promotion_reminder'=>3]);

                            $template = SendgridTemplate::where('id',14)->first();

                            $template_id = "d-".$template->template_id;   

                            $email = new \SendGrid\Mail\Mail();
            
                            $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                            $email->setSubject('Try MartialArtsZen.com using this referral');
                            $email->addTo($u1->email);
                            $email->addContent("text/html","Join me and improve your skills in various disciplines");
                            $email->addDynamicTemplateDatas([
                                "first_name"=>$u1->firstname,
                                "default"=>"Valued customer",
                                "verifyUrl"=>route('student.login')
                                ]);
                            $email->setTemplateId($template_id);
                            
                            $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
                
                            try{
                                $response = $sendgrid->send($email);
                                print $response->statusCode(). "\n";
                            }
                            catch(Exception $e)
                            {
                                echo "Caught Exception:".$e->getMessage()."\n";
                            }

                        }
        
                    }

                    return "Redeem promotion reminder sent successfully";

            }catch(Exception $e)
            {
                return $e;
            }
        } 
    }

    public function sendReferralEmailReminder()
    {
        $user_data = User::where('free_site_user','=',0)
                        ->where('first_time_login_date','!=',NULL)
                        ->get();
        
        $template = SendgridTemplate::where('id',2)->first();

        $template_id = "d-".$template->template_id;                 

        if(!empty($user_data))
        {
            $todayDate = strtotime(date("Y-m-d"));

            try{
                foreach($user_data as $u)
                {
                    $created_date = strtotime(date("Y-m-d",strtotime($u['first_time_login_date'])));
    
                    $timeDiff = abs($todayDate - $created_date);
    
                    $numberDays = $timeDiff/86400;  // 86400 seconds in one day

                    $numberDays = intval($numberDays);

                    if($numberDays == 5)
                    {
                        User::where('id',$u->id)->update(['first_refer_email_reminder_send_date'=>date('Y-m-d')]);
                        
                        $email = new \SendGrid\Mail\Mail();
            
                        $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                        $email->setSubject('Try MartialArtsZen.com using this referral');
                        $email->addTo($u->email);
                        $email->addContent("text/html","Join me and improve your skills in various disciplines");
                        $email->addDynamicTemplateDatas([
                            "first_name"=>$u->firstname,
                            "default"=>"Valued customer",
                            "email_form"=>route('email_form')
                            ]);
                        $email->setTemplateId($template_id);
                        
                        $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
            
                        try{
                            $response = $sendgrid->send($email);
                            print $response->statusCode(). "\n";
                        }
                        catch(Exception $e)
                        {
                            echo "Caught Exception:".$e->getMessage()."\n";
                        }
                        
                    }   
    
                }
            }catch(Exception $e)
            {
                return $e;
            }
        }
        
        $user_data1 = User::where('free_site_user','=',0)
                        ->where('first_time_login_date','!=',NULL)
                        ->where('first_refer_email_reminder_send_date','!=',NULL)
                        ->where('referral_email_sent_by_existing_user','!=',1)
                        ->get();
        
        $template_1 = SendgridTemplate::where('id',2)->first();

        $template_id_1 = "d-".$templat_1->template_id;                   

        if(!empty($user_data1))
        {
            $todayDate1 = strtotime(date("Y-m-d"));

            try{
                foreach($user_data as $u1)
                {
                    $created_date1 = strtotime(date("Y-m-d",strtotime($u1['first_refer_email_reminder_send_date'])));
    
                    $timeDiff1 = abs($todayDate1 - $created_date1);
    
                    $numberDays1 = $timeDiff1/86400;  // 86400 seconds in one day

                    $numberDays1 = intval($numberDays1);

                    if($numberDays1 == 7)
                    {   
                        $email = new \SendGrid\Mail\Mail();
            
                        $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                        $email->setSubject('Try MartialArtsZen.com using this referral');
                        $email->addTo($u1->email);
                        $email->addContent("text/html","Join me and improve your skills in various disciplines");
                        $email->addDynamicTemplateDatas([
                            "first_name"=>$u1->firstname,
                            "default"=>"Valued customer",
                            "email_form"=>route('email_form')
                            ]);
                        $email->setTemplateId($template_id_1);
                        
                        $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
            
                        try{
                            $response = $sendgrid->send($email);
                            print $response->statusCode(). "\n";
                        }
                        catch(Exception $e)
                        {
                            echo "Caught Exception:".$e->getMessage()."\n";
                        }
                        
                    }   
    
                }
            }catch(Exception $e)
            {
                return $e;
            }
        } 
    }

    /** -------------------------------------- Soft Launch CRONS ---------------------------------------- */
    
    /**
     * Author Ganesh
     * Created CRON for sending email's to free user to upgrade plan
     * after 10 day's
     * created_at :- 26-09-2022
     */

    // public function sendUpgradePlanEmail()
    // {
    //     $user_data = User::where('subscription_id','=',1)->orWhere('upgrade_plan_reminder','=',1)->orWhere('upgrade_plan_reminder','=',2)->get();

    //     $firstUpsellTemplate = SendgridTemplate::where('id',23)->first();
    //     $secondUpsellTemplate = SendgridTemplate::where('id',22)->first();

    //     $first_template_id = "d-".$firstUpsellTemplate->template_id;
    //     $second_template_id = "d-".$secondUpsellTemplate->template_id;                 

    //     if(!empty($user_data))
    //     {
    //         $todayDate = strtotime(date("Y-m-d"));

    //         try{
    //             foreach($user_data as $u)
    //             {
                    
    //                 $created_date = strtotime(date("Y-m-d",strtotime($u['created_at'])));
    
    //                 $timeDiff = abs($todayDate - $created_date);
    
    //                 $numberDays = $timeDiff/86400;  // 86400 seconds in one day

    //                 $numberDays = intval($numberDays);

    //                 if($numberDays == 1)
    //                 { 
    //                     //echo "hii";
    //                     $email = new \SendGrid\Mail\Mail();
            
    //                     $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
    //                     $email->setSubject('Try MartialArtsZen.com using this referral');
    //                     $email->addTo($u->email);
    //                     $email->addContent("text/html","Join me and improve your skills in various disciplines");
    //                     $email->addDynamicTemplateDatas([
    //                         "first_name"=>$u->firstname,
    //                         "default"=>"Valued customer",
    //                         "actionUrl"=>route('bronzePlanStripe1',['lastPage'=>'bronzePlanStripe'])
    //                         ]);
    //                     $email->setTemplateId($first_template_id);
                        
    //                     $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
            
    //                     try{
    //                         $response = $sendgrid->send($email);

    //                         User::where('id',$u->id)->update(['upgrade_plan_reminder'=>1]);

    //                         print $response->statusCode(). "\n";
    //                     }
    //                     catch(Exception $e)
    //                     {
    //                         echo "Caught Exception:".$e->getMessage()."\n";
    //                     }
                        
    //                 }  
                    
    //                 if($numberDays == 3)
    //                 { 
    //                     $email = new \SendGrid\Mail\Mail();
            
    //                     $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
    //                     $email->setSubject('Try MartialArtsZen.com using this referral');
    //                     $email->addTo($u->email);
    //                     $email->addContent("text/html","Join me and improve your skills in various disciplines");
    //                     $email->addDynamicTemplateDatas([
    //                         "first_name"=>$u->firstname,
    //                         "default"=>"Valued customer",
    //                         "actionUrl"=>route('bronzePlanStripe1',['lastPage'=>'bronzePlanStripe'])
    //                         ]);
    //                     $email->setTemplateId($second_template_id);
                        
    //                     $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
            
    //                     try{
    //                         $response = $sendgrid->send($email);

    //                         User::where('id',$u->id)->update(['upgrade_plan_reminder'=>2]);

    //                         print $response->statusCode(). "\n";
    //                     }
    //                     catch(Exception $e)
    //                     {
    //                         echo "Caught Exception:".$e->getMessage()."\n";
    //                     }
                        
    //                 }   

    //                 if($numberDays == 7)
    //                 { 
    //                     $email = new \SendGrid\Mail\Mail();
            
    //                     $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
    //                     $email->setSubject('Try MartialArtsZen.com using this referral');
    //                     $email->addTo($u->email);
    //                     $email->addContent("text/html","Join me and improve your skills in various disciplines");
    //                     $email->addDynamicTemplateDatas([
    //                         "first_name"=>$u->firstname,
    //                         "default"=>"Valued customer",
    //                         "actionUrl"=>route('bronzePlanStripe1',['lastPage'=>'bronzePlanStripe'])
    //                         ]);
    //                     $email->setTemplateId($second_template_id);
                        
    //                     $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
            
    //                     try{
    //                         $response = $sendgrid->send($email);

    //                         User::where('id',$u->id)->update(['upgrade_plan_reminder'=>3]);

    //                         print $response->statusCode(). "\n";
    //                     }
    //                     catch(Exception $e)
    //                     {
    //                         echo "Caught Exception:".$e->getMessage()."\n";
    //                     }
                        
    //                 }   
    
    //             }
    //         }catch(Exception $e)
    //         {
    //             return $e;
    //         }
    //     }
    // }

    public function sendUpgradePlanEmail()
    {
        $user_data = User::where('subscription_id','=',1)->Where('upgrade_plan_reminder','=',0)->orWhere('upgrade_plan_reminder','=',1)->orWhere('upgrade_plan_reminder','=',2)->get();

        $firstUpsellTemplate = SendgridTemplate::where('id',23)->first();
        $secondUpsellTemplate = SendgridTemplate::where('id',29)->first();
        $thirdUpsellTemplate = SendgridTemplate::where('id',30)->first();

        $first_template_id = "d-".$firstUpsellTemplate->template_id;
        $second_template_id = "d-".$secondUpsellTemplate->template_id;      
        $third_template_id = "d-".$thirdUpsellTemplate->template_id;                 

        if(!empty($user_data))
        {
            $todayDate = strtotime(date("Y-m-d"));

            try{
                foreach($user_data as $u)
                {      
                    $created_date = strtotime(date("Y-m-d",strtotime($u['created_at'])));
    
                    $timeDiff = abs($todayDate - $created_date);
    
                    $numberDays = $timeDiff/86400;  // 86400 seconds in one day

                    $numberDays = intval($numberDays);

                    if($numberDays == 7)
                    { 

                        $email = new \SendGrid\Mail\Mail();
            
                        $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                        $email->setSubject('Try MartialArtsZen.com using this referral');
                        $email->addTo($u->email);
                        $email->addContent("text/html","Join me and improve your skills in various disciplines");
                        $email->addDynamicTemplateDatas([
                            "first_name"=>$u->firstname,
                            "default"=>"Valued customer",
                            "actionUrl"=>route('bronzePlanStripe1',['lastPage'=>'bronzePlanStripe','sendUpgradeConfirmEmail'=>1])
                            ]);
                        $email->setTemplateId($first_template_id);
                        
                        $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
            
                        try{
                            $response = $sendgrid->send($email);

                            User::where('id',$u->id)->update(['upgrade_plan_reminder'=>1,'upgrade_plan_reminder_date'=>date("Y-m-d")]);

                            print $response->statusCode(). "\n";
                        }
                        catch(Exception $e)
                        {
                            echo "Caught Exception:".$e->getMessage()."\n";
                        }
                        
                    }  
                    
            
                    $upgrade_plan_reminder_date = strtotime(date("Y-m-d",strtotime($u['upgrade_plan_reminder_date'])));
                    if($upgrade_plan_reminder_date)
                    {
                        $timeDiff1 = abs($todayDate - $upgrade_plan_reminder_date);
    
                        $numberDays1 = $timeDiff1/86400;  // 86400 seconds in one day
    
                        $numberDays1 = intval($numberDays1);
    
                        if($numberDays1 == 7)
                        { 
                            $email = new \SendGrid\Mail\Mail();
                
                            $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                            $email->setSubject('Try MartialArtsZen.com using this referral');
                            $email->addTo($u->email);
                            $email->addContent("text/html","Join me and improve your skills in various disciplines");
                            $email->addDynamicTemplateDatas([
                                "first_name"=>$u->firstname,
                                "default"=>"Valued customer",
                                "actionUrl"=>route('bronzePlanStripe1',['lastPage'=>'bronzePlanStripe','sendUpgradeConfirmEmail'=>1])
                                ]);
                            $email->setTemplateId($second_template_id);
                            
                            $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
                
                            try{
                                $response = $sendgrid->send($email);
    
                                User::where('id',$u->id)->update(['upgrade_plan_reminder'=>2,'upgrade_plan_reminder_date'=>date("Y-m-d")]);
    
                                print $response->statusCode(). "\n";
                            }
                            catch(Exception $e)
                            {
                                echo "Caught Exception:".$e->getMessage()."\n";
                            }
                            
                        }   
    
                        if($numberDays1 == 14)
                        { 
                            $email = new \SendGrid\Mail\Mail();
                
                            $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                            $email->setSubject('Try MartialArtsZen.com using this referral');
                            $email->addTo($u->email);
                            $email->addContent("text/html","Join me and improve your skills in various disciplines");
                            $email->addDynamicTemplateDatas([
                                "first_name"=>$u->firstname,
                                "default"=>"Valued customer",
                                "actionUrl"=>route('bronzePlanStripe1',['lastPage'=>'bronzePlanStripe','sendUpgradeConfirmEmail'=>1])
                                ]);
                            $email->setTemplateId($third_template_id);
                            
                            $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
                
                            try{
                                $response = $sendgrid->send($email);
    
                                User::where('id',$u->id)->update(['upgrade_plan_reminder'=>3,'upgrade_plan_reminder_date'=>date("Y-m-d")]);
    
                                print $response->statusCode(). "\n";
                            }
                            catch(Exception $e)
                            {
                                echo "Caught Exception:".$e->getMessage()."\n";
                            }
                            
                        }   
                    }
                }
            }catch(Exception $e)
            {
                return $e;
            }
        }
    }

    /**
     * Author Ganesh
     * Created CRON for sending verify email reminder for soft launch
     * created_at :- 10-10-2022
     * email_verify_reminder
    */

    public function sendSoftVerifyEmailReminder()
    {
        $sendgirdTemplate = SendgridTemplate::where('id',25)->first();

        $template_id = "d-".$sendgirdTemplate->template_id;                 

        $user = User::where('email_verified_at',NULL)
                    ->where('email_verify_reminder','!=', 3)
                    ->get();
       
        if(!empty($user))
        {
            $todayDate = strtotime(date("Y-m-d"));

            try{
                foreach($user as $u)
                {
                    $verification_url = URL::temporarySignedRoute(
                        'verification.verify',
                        Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
                        [
                            'id' => $u->getKey(),
                            'hash' => sha1($u->getEmailForVerification()),
                        ]
                    );

                    $numberDays = "";
                   
                    $created_date = strtotime(date("Y-m-d",strtotime($u['created_at'])));
    
                    $timeDiff = abs($todayDate - $created_date);
    
                    $numberDays = $timeDiff/86400;  // 86400 seconds in one day
    
                    // and you might want to convert to integer
                    $numberDays = intval($numberDays);
                    // echo $numberDays;die;
    
                    if($numberDays == 1)
                    {
                        User::where('id',$u->id)->update(['email_verify_reminder'=>1]);

                        $email = new \SendGrid\Mail\Mail();
        
                        $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                        $email->setSubject('Try MartialArtsZen.com using this referral');
                        $email->addTo($u->email);
                        $email->addContent("text/html","Join me and improve your skills in various disciplines");
                        $email->addDynamicTemplateDatas([
                            "first_name"=>$u->firstname,
                            "default"=>"Valued customer",
                            "actionUrl"=>$verification_url
                            ]);
                        $email->setTemplateId($template_id);
                      
                        $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
            
                        try{
                            $response = $sendgrid->send($email);
                            print $response->statusCode(). "\n";
                        }
                        catch(Exception $e)
                        {
                            echo "Caught Exception:".$e->getMessage()."\n";
                        } 
                    }   
    
                    if($numberDays == 3)
                    {
                        User::where('id',$u->id)->update(['email_verify_reminder'=>2]);

                        $email = new \SendGrid\Mail\Mail();
        
                        $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                        $email->setSubject('Try MartialArtsZen.com using this referral');
                        $email->addTo($u->email);
                        $email->addContent("text/html","Join me and improve your skills in various disciplines");
                        $email->addDynamicTemplateDatas([
                            "first_name"=>$u->firstname,
                            "default"=>"Valued customer",
                            "actionUrl"=>$verification_url
                            ]);
                        $email->setTemplateId($template_id);
                      
                        $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
            
                        try{
                            $response = $sendgrid->send($email);
                            print $response->statusCode(). "\n";
                        }
                        catch(Exception $e)
                        {
                            echo "Caught Exception:".$e->getMessage()."\n";
                        } 
                    }    
                    if($numberDays == 7)
                    {
                        User::where('id',$u->id)->update(['email_verify_reminder'=>3]);

                        $email = new \SendGrid\Mail\Mail();
        
                        $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                        $email->setSubject('Try MartialArtsZen.com using this referral');
                        $email->addTo($u->email);
                        $email->addContent("text/html","Join me and improve your skills in various disciplines");
                        $email->addDynamicTemplateDatas([
                            "first_name"=>$u->firstname,
                            "default"=>"Valued customer",
                            "actionUrl"=>$verification_url
                            ]);
                        $email->setTemplateId($template_id);
                      
                        $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
            
                        try{
                            $response = $sendgrid->send($email);
                            print $response->statusCode(). "\n";
                        }
                        catch(Exception $e)
                        {
                            echo "Caught Exception:".$e->getMessage()."\n";
                        }
                    }
                    
                }

                return "Verify email reminder sent successfully";
            }catch(Exception $e)
            {
                return $e;
            }
        } 
    }

    /**
    * Author : Ganesh
    * Set CRON for sending email reminder to complete payments
    * create at:10/10/2022
    */

    public function sendPaymentReminder()
    {
        //get all users whos plan is bronz i.e 2 and payment_status is 0
        $getUser=User::where('subscription_id','!=','1')
                        ->where('payment_status','0')
                        ->where('payment_reminder','0')
                        ->orwhere('payment_reminder','1')
                        ->orwhere('payment_reminder','2')
                        ->get();

        $template = SendgridTemplate::where('id', 26)->first();

        $template_id = "d-".$template->template_id;

        $current_date=date('Y-m-d');

        foreach($getUser as $user)
        {
            $login_date=date('Y-m-d',strtotime($user->created_at));

            $diff=strtotime($current_date)-strtotime($login_date);
            $days=round($diff / (60 * 60 * 24));

            if( $days == 1)
            {
                $email = new \SendGrid\Mail\Mail();

                $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                $email->setSubject('Try MartialArtsZen.com using this referral');
                $email->addTo($user->email);
                $email->addContent("text/html","Join me and improve your skills in various disciplines");
                $email->addDynamicTemplateDatas([
                "first_name"=>$user->firstname,
                "default"=>"Valued customer",
                "actionUrl"=>route('student.login')
                ]);
                
                $email->setTemplateId($template_id);

                $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));

                try{
                    $response = $sendgrid->send($email);

                    $updateReminder=User::find($user->id);
                    $updateReminder->payment_reminder = 1;
                    $updateReminder->update();

                    print $response->statusCode(). "\n";
                }
                catch(Exception $e)
                {
                    echo "Caught Exception:".$e->getMessage()."\n";
                }
            }

            if($days==3)
            {
                $email = new \SendGrid\Mail\Mail();

                $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                $email->setSubject('Try MartialArtsZen.com using this referral');
                $email->addTo($user->email);
                $email->addContent("text/html","Join me and improve your skills in various disciplines");
                $email->addDynamicTemplateDatas([
                "first_name"=>$user->firstname,
                "default"=>"Valued customer",
                "actionUrl"=>route('student.login')
                ]);
                
                $email->setTemplateId($template_id);

                $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));

                try{
                    $response = $sendgrid->send($email);

                    $updateReminder=User::find($user->id);
                    $updateReminder->payment_reminder = 2;
                    $updateReminder->update();

                    print $response->statusCode(). "\n";
                }
                catch(Exception $e)
                {
                    echo "Caught Exception:".$e->getMessage()."\n";
                }
            }

            if($days == 7)
            {
                $email = new \SendGrid\Mail\Mail();

                $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                $email->setSubject('Try MartialArtsZen.com using this referral');
                $email->addTo($user->email);
                $email->addContent("text/html","Join me and improve your skills in various disciplines");
                $email->addDynamicTemplateDatas([
                "first_name"=>$user->firstname,
                "default"=>"Valued customer",
                "actionUrl"=>route('student.login')
                ]);
                
                $email->setTemplateId($template_id);

                $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));

                try{
                    $response = $sendgrid->send($email);
                    
                    $updateReminder=User::find($user->id);
                    $updateReminder->payment_reminder = 3;
                    $updateReminder->update();

                    print $response->statusCode(). "\n";
                }
                catch(Exception $e)
                {
                    echo "Caught Exception:".$e->getMessage()."\n";
                }
            }
        }

        // Set reminders to plan upgraded users who's payment is not done

        $getUser1=User::where('subscription_id','!=','1')
                        ->where('payment_status','0')
                        ->where('plan_upgraded_date','!=', NULL)
                        ->where('plan_upgraded_payment_reminder','0')
                        ->orwhere('plan_upgraded_payment_reminder','1')
                        ->orwhere('plan_upgraded_payment_reminder','2')
                        ->get();

        foreach($getUser1 as $user1)
        {
            $login_date1=date('Y-m-d',strtotime($user1->plan_upgraded_date));

            $diff=strtotime($current_date)-strtotime($login_date1);
            $days=round($diff / (60 * 60 * 24));

            if( $days == 1)
            {
                $email = new \SendGrid\Mail\Mail();

                $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                $email->setSubject('Try MartialArtsZen.com using this referral');
                $email->addTo($user1->email);
                $email->addContent("text/html","Join me and improve your skills in various disciplines");
                $email->addDynamicTemplateDatas([
                "first_name"=>$user1->firstname,
                "default"=>"Valued customer",
                "actionUrl"=>route('bronzePlanStripe2')
                ]);
                
                $email->setTemplateId($template_id);

                $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));

                try{
                    $response = $sendgrid->send($email);

                    $updateReminder=User::find($user1->id);
                    $updateReminder->plan_upgraded_payment_reminder = 1;
                    $updateReminder->update();

                    print $response->statusCode(). "\n";
                }
                catch(Exception $e)
                {
                    echo "Caught Exception:".$e->getMessage()."\n";
                }
            }

            if($days==3)
            {
                $email = new \SendGrid\Mail\Mail();

                $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                $email->setSubject('Try MartialArtsZen.com using this referral');
                $email->addTo($user1->email);
                $email->addContent("text/html","Join me and improve your skills in various disciplines");
                $email->addDynamicTemplateDatas([
                "first_name"=>$user1->firstname,
                "default"=>"Valued customer",
                "actionUrl"=>route('bronzePlanStripe2')
                ]);
                
                $email->setTemplateId($template_id);

                $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));

                try{
                    $response = $sendgrid->send($email);

                    $updateReminder=User::find($user1->id);
                    $updateReminder->plan_upgraded_payment_reminder = 2;
                    $updateReminder->update();

                    print $response->statusCode(). "\n";
                }
                catch(Exception $e)
                {
                    echo "Caught Exception:".$e->getMessage()."\n";
                }
            }

            if($days == 7)
            {
                $email = new \SendGrid\Mail\Mail();

                $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                $email->setSubject('Try MartialArtsZen.com using this referral');
                $email->addTo($user1->email);
                $email->addContent("text/html","Join me and improve your skills in various disciplines");
                $email->addDynamicTemplateDatas([
                "first_name"=>$user1->firstname,
                "default"=>"Valued customer",
                "actionUrl"=>route('bronzePlanStripe2')
                ]);
                
                $email->setTemplateId($template_id);

                $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));

                try{
                    $response = $sendgrid->send($email);
                    
                    $updateReminder=User::find($user1->id);
                    $updateReminder->plan_upgraded_payment_reminder = 3;
                    $updateReminder->update();

                    print $response->statusCode(). "\n";
                }
                catch(Exception $e)
                {
                    echo "Caught Exception:".$e->getMessage()."\n";
                }
            }
        }
    }

    /**Author :Ganesh
    * send email to user after 30 days if he/she did not login
    * create at:03/10/2022
    * updated_at : 14-10-2022
    */

    public function sendLoginMail()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET')); 

        $getData=login_deatils::where('email_reminder_flag','!=',3)->get();
      
        $current_date=date('Y-m-d');

        $convert_current_date=date($current_date);

        foreach($getData as $data)
        {
            $login_date_user=$data->login_date;
            $email_send_date=$data->email_send_date;
                
            //check the date diff between current and login_date
            $date1 = $login_date_user;
            $date2 = $current_date;

            $diff=strtotime($date2)-strtotime($date1);
            $days=round($diff / (60 * 60 * 24));

            //check the diff between current and email_send date
            $email_days_diff=strtotime($date2)-strtotime($email_send_date);
            $email_send_days=round($email_days_diff/(60*60*24));

            $login_table_id=$data->id;

            //if diff between login and current_days is  equal to 31 then send mail else nothing;
            if($days == 31)
            {  
                $getEmail=user::find($data->student_id);
                $user_emil=$getEmail->email; 
                
                // mail send code
                $template = SendgridTemplate::where('id',24)->first();

                $template_id = "d-".$template->template_id;

                $email = new \SendGrid\Mail\Mail();

                $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                $email->setSubject('Try MartialArtsZen.com using this referral');
                $email->addTo($user_emil);
                $email->addContent("text/html","Join me and improve your skills in various disciplines");
                $email->addDynamicTemplateDatas([
                "first_name"=>$getEmail->firstname,
                "default"=>"Valued customer",
                "actionUrl"=>route('student.login')
                ]);      
                
                $email->setTemplateId($template_id);

                $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));

                try{
                    $response = $sendgrid->send($email);
                    echo "Email sent to inactive users successfully";
                }
                catch(Exception $e)
                {
                    echo "Caught Exception:".$e->getMessage()."\n";
                }

                $update_reminder_flag=login_deatils::where('id',$login_table_id);
                $update_reminder_flag->update([
                    'email_send_date'=>date('Y-m-d'),
                    'email_reminder_flag'=>'1',
                ]);
            }

            //after 1st mail send if action is not done then send mail again after 7days of 1st mail send
            if($email_send_days == 7)
            {
                $getEmail=user::find($data->student_id);
                $user_emil=$getEmail->email;
                
                // mail send code
                $template = SendgridTemplate::where('id',24)->first();

                $template_id = "d-".$template->template_id;

                $email = new \SendGrid\Mail\Mail();

                $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                $email->setSubject('Try MartialArtsZen.com using this referral');
                $email->addTo($user_emil);
                $email->addContent("text/html","Join me and improve your skills in various disciplines");
                $email->addDynamicTemplateDatas([
                "first_name"=>$getEmail->firstname,
                "default"=>"Valued customer",
                "actionUrl"=>route('student.login')
                ]);
      
                $email->setTemplateId($template_id);

                $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));

                try{
                $response = $sendgrid->send($email);
                echo "Email sent to inactive users successfully";
                }
                catch(Exception $e)
                {
                echo "Caught Exception:".$e->getMessage()."\n";
                }

                $update_reminder_flag=login_deatils::where('id',$login_table_id);
                $update_reminder_flag->update([
                    'email_send_date'=>date('Y-m-d'),
                    'email_reminder_flag'=>'2',
                ]);
            }

            //after 2nd mail send if action is not done then send mail again after 14days of 2nd mail send
            if($email_send_days == 14)
            {
                $getEmail=user::find($data->student_id);
                $user_emil=$getEmail->email;
                
                // mail send code
                $template = SendgridTemplate::where('id',24)->first();

                $template_id = "d-".$template->template_id;

                $email = new \SendGrid\Mail\Mail();

                $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                $email->setSubject('Try MartialArtsZen.com using this referral');
                $email->addTo($user_emil);
                $email->addContent("text/html","Join me and improve your skills in various disciplines");
                $email->addDynamicTemplateDatas([
                "first_name"=>$getEmail->firstname,
                "default"=>"Valued customer",
                "actionUrl"=>route('student.login')
                ]);
                    
                    
                $email->setTemplateId($template_id);

                $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));

                try{
                    $response = $sendgrid->send($email);
                    echo "Email sent to inactive users successfully";
                }
                catch(Exception $e)
                {
                    echo "Caught Exception:".$e->getMessage()."\n";
                }

                $update_reminder_flag=login_deatils::where('id',$login_table_id);
                $update_reminder_flag->update([
                    'email_send_date'=>date('Y-m-d'),
                    'email_reminder_flag'=>'3',
                ]);
            }
        }
    }


    /**
    * Author Ganesh
    * Get students subscription data for renewal date
    * createdAt :- 2022-10-17
    */

    public function getStudentSubscriptionData()
    {
        // Set Stripe API Key
        \Stripe\Stripe::setApiKey(config("services.stripe.secret"));

        $stripe = new \Stripe\StripeClient(config("services.stripe.secret"));
        
        $users = User::get();

        if(!empty($users))
        {
            foreach($users as $user)
            {
                if(!empty($user->customer_id))
                {
                    $stripeSubscription = $stripe->customers->retrieve($user->customer_id, []);        
                    
                    if(!empty($stripeSubscription->subscriptions->data))
                    {   
                        $subscriptionHistory = StudentSubscription::where('student_id',$user->id)->where('plan_subscription_id',$stripeSubscription->subscriptions->data[0]->id)->first();

                        if($subscriptionHistory)
                        {
                            $subscriptionHistory->update([
                                'subscription_end_date'=>date("Y-m-d",$stripeSubscription->subscriptions->data[0]->current_period_end),
                            ]);
                        }
                        else
                        {
                            StudentSubscription::create(['student_id'=>$user->id,'subscription_id'=>$user->subscription_id,'plan_subscription_id'=>$stripeSubscription->subscriptions->data[0]->id,'subscription_end_date'=>date("Y-m-d",$stripeSubscription->subscriptions->data[0]->current_period_end)])->save();
                        }

                        $updateUserSubscriptionId = User::where('id',$user->id)->first();

                        $updateUserSubscriptionId->update(['plan_subscription_id'=>$stripeSubscription->subscriptions->data[0]->id]);  
                    }
                  
                }
            }
        } 
        
        return "Success";
    }

    /**
    * Author Ganesh
    * Downgrade subscription to free plan if user not paid for bronze, silver, gold plan
    * createdAt :- 2022-10-17
    */

    public function downgradeSubscriptionPlan()
    {   
        $users = StudentSubscription::where('status','cancelled')->where('subscription_end_date',date("Y-m-d"))->get();

        if(!empty($users))
        {
            foreach($users as $user)
            {
                $updateUserSubscriptionId = User::where('id',$user->student_id)->first();

                $updateUserSubscriptionId->update(['subscription_id'=>1,'payment_status'=>0]);  
            }
        } 
        
        return "Success";
    }

    /**
     * Send mail to free site user about payment
     */
    public function sendReminderFreeSiteForPayment()
    {
        $getUser=User::where('free_site_user','1')->get();

        foreach($getUser as $data)
        {
            $userEmail=$data->email;

            $template = SendgridTemplate::where('id',15)->first();

            $template_id = "d-".$template->template_id;

            $email = new \SendGrid\Mail\Mail();

            $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
            $email->setSubject('Try MartialArtsZen.com using this referral');
            $email->addTo($userEmail);
            $email->addContent("text/html","Join me and improve your skills in various disciplines");
            $email->addDynamicTemplateDatas([
            "first_name"=>$data->firstname,
            "default"=>"Valued customer",
            //"verifyUrl"=>route('student.login')
            ]);
            //echo "<pre>";
            
            $email->setTemplateId($template_id);

            // $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));

            // try{
            // $response = $sendgrid->send($email);
            // }
            // catch(Exception $e)
            // {
            // echo "Caught Exception:".$e->getMessage()."\n";
            // }
            

        }
        
    }
        
    /**Author :Ganesh
    * send reminder emails for payment failure
    * create at:19/10/2022
    * updated_at : 19-10-2022
    */

    public function sendPaymentFailureReminder()
    {
        $getUser1=User::where('payment_failed_date','!=',NULL)
        ->where('payment_failed_reminder','0')
        ->orwhere('payment_failed_reminder','1')
        ->orwhere('payment_failed_reminder','2')
        ->get();
 
        $template = SendgridTemplate::where('id',28)->first();

        $template_id = "d-".$template->template_id;

        $current_date = date("Y-m-d");

        foreach($getUser1 as $user1)
        {
            $login_date1=date('Y-m-d',strtotime($user1->payment_failed_date));

            $diff=strtotime($current_date)-strtotime($login_date1);
            $days=round($diff / (60 * 60 * 24));

            if( $days == 3)
            {
                $email = new \SendGrid\Mail\Mail();

                $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                $email->setSubject('Try MartialArtsZen.com using this referral');
                $email->addTo($user1->email);
                $email->addContent("text/html","Join me and improve your skills in various disciplines");
                $email->addDynamicTemplateDatas([
                "first_name"=>$user1->firstname,
                "default"=>"Valued customer",
                "actionUrl"=>route('bronzePlanStripe2')
                ]);

                $email->setTemplateId($template_id);

                $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));

                try{
                    $response = $sendgrid->send($email);

                    $updateReminder=User::find($user1->id);
                    $updateReminder->payment_failed_reminder = 1;
                    $updateReminder->update();

                    print $response->statusCode(). "\n";
                }
                catch(Exception $e)
                {
                    echo "Caught Exception:".$e->getMessage()."\n";
                }
            }

            if($days==5)
            {
                $email = new \SendGrid\Mail\Mail();

                $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                $email->setSubject('Try MartialArtsZen.com using this referral');
                $email->addTo($user1->email);
                $email->addContent("text/html","Join me and improve your skills in various disciplines");
                $email->addDynamicTemplateDatas([
                "first_name"=>$user1->firstname,
                "default"=>"Valued customer",
                "actionUrl"=>route('bronzePlanStripe2')
                ]);

                $email->setTemplateId($template_id);

                $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));

                try{
                    $response = $sendgrid->send($email);

                    $updateReminder=User::find($user1->id);
                    $updateReminder->payment_failed_reminder = 2;
                    $updateReminder->update();

                    print $response->statusCode(). "\n";
                }
                catch(Exception $e)
                {
                    echo "Caught Exception:".$e->getMessage()."\n";
                }
            }

            if($days == 7)
            {
                $email = new \SendGrid\Mail\Mail();

                $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                $email->setSubject('Try MartialArtsZen.com using this referral');
                $email->addTo($user1->email);
                $email->addContent("text/html","Join me and improve your skills in various disciplines");
                $email->addDynamicTemplateDatas([
                "first_name"=>$user1->firstname,
                "default"=>"Valued customer",
                "actionUrl"=>route('bronzePlanStripe2')
                ]);

                $email->setTemplateId($template_id);

                $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));

                try{
                    $response = $sendgrid->send($email);
                    
                    $updateReminder=User::find($user1->id);
                    $updateReminder->payment_failed_reminder = 3;
                    $updateReminder->update();

                    print $response->statusCode(). "\n";
                }
                catch(Exception $e)
                {
                    echo "Caught Exception:".$e->getMessage()."\n";
                }
            }
        }
    } 

    public function sendReferralEmail()
    {
        $user_data = User::get();
        
        $template = SendgridTemplate::where('id',31)->first();

        $template_id = "d-".$template->template_id;                 

        if(!empty($user_data))
        {
            $todayDate = strtotime(date("Y-m-d"));

            try{
                foreach($user_data as $u)
                {
                    $created_date = strtotime(date("Y-m-d",strtotime($u['created_at'])));

                    $timeDiff = abs($todayDate - $created_date);

                    $numberDays = $timeDiff/86400;  // 86400 seconds in one day

                    $numberDays = intval($numberDays);

                    if($numberDays == 1)
                    {   
                        $email = new \SendGrid\Mail\Mail();
            
                        $email->setFrom("admin@free.martialartszen.com","MartialArtsZen");
                        $email->setSubject('Try MartialArtsZen.com using this referral');
                        $email->addTo($u->email);
                        $email->addContent("text/html","Join me and improve your skills in various disciplines");
                        $email->addDynamicTemplateDatas([
                            "first_name"=>$u->firstname,
                            "default"=>"Valued customer",
                            "actionUrl"=>route('email_form')
                            ]);
                        $email->setTemplateId($template_id);
                        
                        $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
            
                        try{
                            $response = $sendgrid->send($email);
                            print $response->statusCode(). "\n";
                        }
                        catch(Exception $e)
                        {
                            echo "Caught Exception:".$e->getMessage()."\n";
                        }
                        
                    }   

                }
            }catch(Exception $e)
            {
                return $e;
            }
        }
    }
}

