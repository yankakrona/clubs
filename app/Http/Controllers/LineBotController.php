<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LINE\LINEBot;
use LINE\LINEBot\MessageBuilder;
class LineBotController extends Controller
{


    /**
     * View callback
     *
     * @param  int  $request
     * @return Response
     */
    public function callBackLinBotAPI( Request $request)
    {
      // Receive request for entry point in this process
      // Get the signature in the request header
      $channelAccessToken = 'RhjfQAHqdLt77DI9pIkHxik1XjQuRzLTBX/Y88MX2HuWWZdoa+OVHsWoKpBTkQOS6dFI3W8/IBbabsQmchobQ60tIa8n/UHTD1s+uW+NiG16yswe0TF+81l7eX74U+WwrcEX1MKGia9aRs7AcLg9CgdB04t89/1O/w1cDnyilFU=';
      $channelSecret = '959863692c2e981286c4c4f4a6c5f8e9';
    }
}
