<?php
function randomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$api = $_POST['api1'];
$text = $_POST['text1'];
date_default_timezone_set('Asia/Bangkok');
/* hvgMolwtWzhnmsC9iItXpuYlAOFi02k3 */
/* ms644rfDkxf7aOqmE1kFiSy4hYfnatpA */
//$api = "hvgMolwtWzhnmsC9iItXpuYlAOFi02k3";
//$text = "Chào mọi người nhé ahihihihi";
$str = $text;
$input = $text;
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.fpt.ai/hmi/tts/v5',
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_RETURNTRANSFER => 1,
  CURLOPT_POSTFIELDS => $input,
  CURLOPT_HTTPHEADER => array(
    "api-key: ".$api,
    "speed: ",
    "voice: banmai"
  ),
));

$response = curl_exec($curl);
$aaa = json_decode($response,true);
if (in_array("async", $aaa)){
      $link = $aaa["async"];
      $filename = "Time: ".date("d/m/Y H:i:s") . " - <b>Link</b> : <a target=\"_blank\" href=".$link."> Download sau 10phut</a></br>";
      $pathname = "link/".date("m");
      $dirname = dirname($pathname);
      if (!is_dir($pathname)){ 
      mkdir($pathname,0755,true);
      }
      $file=fopen($pathname."/".date("d").".html","a+");
      fwrite($file,$filename."<br/>");
      fclose($file);
      echo "<font color=\"green\">Da tao link OK</a> - Code: ".randomString(5);

    $link = $aaa["message"];

    }else {
        echo "<font color=\"red\">API dã hết. cần thay API</a>";    
}
$err = curl_error($curl);
curl_close($curl);

if ($err) {
  echo 'cURL Error #:' . $err;
}
?>
