<?php
$key="4650402c9154a8fc83ad7d6bf561ba77";
$link="http://api.coinlayer.com/api/live?access_key=".$key;//."&symbols=DOGE,Bitcoin";(for specific value use this one)

$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$link);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$result=curl_exec($ch);
curl_close($ch);
$result=json_decode($result,true);
if(isset($result['success'])){
	if($result['success']==1){
		$strtime=date('Y-m-d h:i:s',$result['timestamp']);
		echo "<b>".$strtime."</b>";
		echo "<br/><br/>";
		foreach($result['rates'] as $key=>$val){
			echo $key.":- ".$val;
			echo "<br/>";
		}
	}else{
		echo $result['error']['type'];
		if(isset($result['error']['info'])){
			echo $result['error']['info'];
		}
	}
}else{
	echo "Something went wrong";
}
?>