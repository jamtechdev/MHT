<?php

    function isActiveRoute($route, $output = 'active')
    {
        if (is_array($route)) {
            if (in_array(Route::currentRouteName(), $route)) {
                return $output;
            }
        } else {
            if (Route::currentRouteName() == $route) {
                return $output;
            }
        }
    }

    function isOtherLoad() {
        $isOtherLoad = false;
        $currentURLData = parse_url(url()->full());
        if(isset($currentURLData['path']) && !in_array($currentURLData['path'], ['/', '/free', '/register', '/register-499'])) {
            $isOtherLoad = true;
        } else {
            if(isset($currentURLData['query']) && in_array($currentURLData['query'], ['type=free', 'type=register', 'type=register499', 'type=free&utm_campaign=retargeting&utm_medium=topbanner'])) {
                $isOtherLoad = true;
            }
        }
        return $isOtherLoad;
    }

    // Create Wistia Project
    function createWistiaProject($instructorName) {
        if($instructorName != '') {

            $url = 'https://api.wistia.com/v1/projects.json';

            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

            $headers = array(
            "Accept: application/json",
            "Authorization: Bearer ".config("services.wistia.token"),
            "Content-Type: application/json",
            );
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

            $data = array(
                'name' => (env('APP_URL') == 'https://www.martialartszen.com/') ? $instructorName : "Local ".$instructorName,
                'anonymousCanUpload' => false,
                'anonymousCanDownload' => false,
                'public' => true,
            );

            $payload = json_encode($data);

            curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);

            $resp = curl_exec($curl);
            curl_close($curl);
            $result = json_decode($resp, true);
            return $result['hashedId'];
        } else {
            return '';
        }
    }

    // Delete Video From Wistia
    function deleteWistiaVideo($videoId) {
        $url = 'https://api.wistia.com/v1/medias/'.$videoId.'.json';

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Accept: application/json",
            "Authorization: Bearer ".config("services.wistia.token"),
            "Content-Type: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $resp = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($resp, true);
        return $result;
    }