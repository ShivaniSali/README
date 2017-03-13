<?php

define('API_KEY','320776994:AAHVe69uZSpM0Gs5dDqwFA6rESCiRc7QXew'); 

function bot($method, $datas=[]){
	$url = "https://api.telegram.org/bot".API_KEY."/".$method;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$datas);
	$res = curl_exec($ch);
	if(curl_error($ch)){
		var_dump(curl_error($ch));
	}else{
		return json_decode($res);
	}
}

$update = json_decode(file_get_contents('php://input'));

if(isset($update->message)){
	$message = $update->message;
	$message_id = $update->message->message_id;
	$text = $message->text;
	$chat_id = $message->chat->id;
	 
	if($text == 'Start'){
		bot('sendMessage',[
			'chat_id' => $chat_id,
			'text' =>"Welcome. \nSearch Data... \n1.KPI \nreports"
			]) ;
		}
		else if($text == 'KPI'){ 
                bot('sendMessage',[
			'chat_id' => $chat_id,
			'text' => 'Profit margin for accessories',
			'url' => 'http://bi.actionate.com:9000/single/?appid=b93c0e71-2b65-45fd-a196-7703b42c014b&obj=drvSBu&opt=nointeraction&select=clearall'
			]);
		}
		else if($text == '1'){ 
                bot('sendMessage',[
			'chat_id' => $chat_id,
			'text' => "Profit margin for accessories is 49.9%"																
			]);
		}
		else if($text == '2'){ 
                bot('sendMessage',[
			'chat_id' => $chat_id,
			'text' => "Avg orders/month for accessories is 1.26k"
			]);
		}
		else if($text == '3'){ 
                bot('sendMessage',[
			'chat_id' => $chat_id,
			'text' => "Profit margin for bikes is 7.8%"
			]);
		}
		else if($text == '4'){ 
                bot('sendMessage',[
			'chat_id' => $chat_id,
			'text' => "Avg orders/month for bikes is 1.18k"
			]);
		}
		else if($text == 'reports'){ 
                bot('sendMessage',[
			'chat_id' => $chat_id,
			'text' => "Choose a report \nDashboard"
			]);
		}
		else if($text == 'Dashboard'){ 
                bot('sendMessage',[
			'chat_id' => $chat_id,
			'text' => "https://predoole.000webhostapp.com/dashboard.pdf"
			]);
		}
	}
