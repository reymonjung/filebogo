<?php
$url = parse_url(urldecode($_GET['url']));

if($_GET['filename']) $filename=$_GET['filename'].'jpg';
else $filename='photo.jpg';
// header('Content-Type: image/png');
// header("Content-Disposition: inline;filename='".$filename."'");
// // header("referer: ".$url['protocol'].$url['host'].$url['path']);
// header("Pragma: no-cache");
// header("Expires: 0");

$ctx = stream_context_create(array(   
   'http' => array(   
       'timeout' => 1 
       )   
   )   
);  

//$content = file_get_contents(urldecode($_GET['url'],0,$ctx);
$fp = fopen(urldecode($_GET['url']),"rb",false, $ctx);
fpassthru($fp); 
// $fp = file_post_contents(urldecode($_GET['url']));
// echo $fp;


function file_post_contents($url,$headers=false) {
    $url = parse_url($url);

    if (!isset($url['port'])) {
      if ($url['scheme'] == 'http') { $url['port']=80; }
      elseif ($url['scheme'] == 'https') { $url['port']=443; }
    }
    $url['query']=isset($url['query'])?$url['query']:'';

    $url['protocol']=$url['scheme'].'://';
    $eol="\r\n";

    $headers =  "POST ".$url['protocol'].$url['host'].$url['path']." HTTP/1.0".$eol. 
                "Host: ".$url['host'].$eol. 
                "Referer: ".$url['protocol'].$url['host'].$url['path'].$eol. 
                "Content-Type: application/x-www-form-urlencoded".$eol. 
                "Content-Length: ".strlen($url['query']).$eol.
                $eol.$url['query'];
    $fp = fsockopen($url['host'], $url['port'], $errno, $errstr, 30); 
    if($fp) {
      fwrite($fp, $headers);
      $result = '';
      while(!feof($fp)) { $result .= fgets($fp, 128); }
      fclose($fp);
      if (!$headers) {
        //removes headers
        $pattern="/^.*\r\n\r\n/s";
        $result=preg_replace($pattern,'',$result);
      }
      return $result;
    }
}