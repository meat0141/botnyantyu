<?php

/**
 * Copyright 2016 LINE Corporation
 *
 * LINE Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require_once('./LINEBotTiny.php');

$channelAccessToken = 'lVzVYCUZdRdnngJB1MkDp8zeMHna0bJ0nn4V7wx7rzFPVziPA068UCdMeWZhhUbf22yymj2ResvB1/e62dVRuU+5rsPSP2mYqS/uk76m0gVB5+DvQGWuwRMbxu0GrxDwruCjH14DLc9aNdgCybDXIgdB04t89/1O/w1cDnyilFU=en';
$channelSecret = '366f07af94baeadfccdbbdfc50cc1a71';

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
                    $d_message = null;
                    foreach(str_split($message['text']) as $value){
                        $d_message = $value.'゛';
                    }
                    $client->replyMessage([
                        'replyToken' => $event['replyToken'],
                        'messages' => [
                            [
                                'type' => 'text',
                                'text' => $d_message.'っ゛て゛何゛だ゛ニ゛ャ゛ア゛ン゛！！？'
                            ]
                        ]
                    ]);
                    break;
                default:
                    error_log('Unsupported message type: ' . $message['type']);
                    break;
            }
            break;
        default:
            error_log('Unsupported event type: ' . $event['type']);
            break;
    }
};
