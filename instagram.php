	
	
	<link rel="stylesheet" href="http://therewego.net/MyCss/jquery.fancybox-1.3.4.css" type="text/css">
	<script type='text/javascript' src='http://therewego.net/MyJavaScript/jquery.min.js'></script>
	<script type='text/javascript' src='http://therewego.net/MyJavaScript/jquery.fancybox-1.3.4.pack.js'></script>
	
	

	<script type="text/javascript">
		$(function() {
			$("a.group").fancybox({
				'nextEffect'	:	'fade',
				'prevEffect'	:	'fade',
				'overlayOpacity' :  0.8,
				'overlayColor' : '#000000',
				'arrows' : false,
			});			
		});
	</script>
	

 <h1>Wordpress</h1>
 
	  <?php
		// Supply a user id and an access token
		$userid = "10832256";
		$accessToken = "10832256.5b9e1e6.855221894d394827a27b513ff51dd35b";

		// Gets our data
		function fetchData($url){
		     $ch = curl_init();
		     curl_setopt($ch, CURLOPT_URL, $url);
		     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		     curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		     $result = curl_exec($ch);
		     curl_close($ch); 
		     return $result;
		}

		// Pulls and parses data.
		$result = fetchData("https://api.instagram.com/v1/users/{$userid}/media/recent/?access_token={$accessToken}");
		$result = json_decode($result);
	?>


	<?php foreach ($result->data as $post): ?>
		<!-- Renders images. @Options (thumbnail,low_resoulution, high_resolution) -->
		
			<a class="group" rel="group1" href="<?= $post->images->standard_resolution->url ?>"><img src="<?= $post->images->thumbnail->url ?>"></a>
		
	<?php endforeach ?>
	