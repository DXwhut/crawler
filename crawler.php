<?php
	require 'simple_html_dom.php';
	function getHtml($url){
		// $html = file_get_contents($url);
		$html = file_get_html($url);
		return $html;
	}

	function getImg($html){
		$reg = '/<[img|IMG].*?src=[\'\"]{0,1}([^>\'\"\ ]*).*?>/';

		// $result = preg_match_all($reg, $html, $match_result);
		// $x = 0;
		// foreach ($match_result[1] as $imgurl) {
			
		// 	$url="./img/".$x.".jpg";
		// 	$fp = @fopen($url, "w");
		// 	@fwrite($fp, file_get_contents($imgurl));
		// 	fclose($fp);
		// 	$x += 1 ;
		// }
		$x = 0;
		foreach($html->find('img') as $element){
echo $element->src.'<br>';
	        $url = "./img/".$x.".jpg";
	        $fp = @fopen($url, "w");
	        @fwrite($fp, file_get_contents($element->src));
	        // fclose($fp);
	        $x += 1 ;
		}    
   		
	}

	$html = getHtml("http://cn.bing.com/images/search?q=%e6%ad%a6%e6%b1%89%e5%a4%a7%e5%ad%a6&qpvt=%e6%ad%a6%e6%b1%89%e5%a4%a7%e5%ad%a6&qpvt=%e6%ad%a6%e6%b1%89%e5%a4%a7%e5%ad%a6&FORM=IGRE");
	getImg($html);
?>