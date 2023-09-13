<p style="margin-bottom: 0px;">{{__('mails.follow-us-on-social-media')}}</p>
<p style="margin-top:  6px; margin-bottom: 4px;">
    <a href="#" target="_blank"><img src="https://softmartialartszen.progfeel.co.in/assets/mailimages/fb.jpg" alt="" style="width:30px; padding-right:5px;"></a>
    <a href="#" target="_blank"><img src="https://softmartialartszen.progfeel.co.in/assets/mailimages/twitter.png" alt="" style="width:30px;"></a>
</p>
<p style="margin-top: 0px; margin-bottom: 15px;">{{__('mails.you-are-receiving-this-message-because-you-signed-up-for-boycott')}}</p>
<p style="margin-top: 0px; margin-bottom: 15px;">
<!-- {{-- @if($unsubscribe!="") <a href="{{$unsubscribe}}" style="color:#666666; text-decoration:none ">{{__('mails.unsubscribe')}} </a>
    | @endif --}} --> 
    <a href="{{ config('app.url') }}/privacy-policy" target="_blank" style="color:#666666; text-decoration:none ">{{__('mails.privacy-policy')}}</a> | 
    <a href="{{ config('app.url') }}/contact" target="_blank" style="color:#666666; text-decoration:none ">{{__('mails.contact')}}</a></p>
<p> <a href="{{ config('app.url') }}" style="color:#dc2d1a; text-decoration:none;" target="_blank">{{__('mails.www-hashtagboycott-com')}}</a><br> &copy; {{date('Y')}}, {{ __('mails.hashtag-boycott-llc-all-rights-reserved') }}</p>