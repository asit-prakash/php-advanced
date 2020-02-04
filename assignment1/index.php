<!DOCTYPE html>
<html>
	<head>
		<title>FETCH API</title>
		<style>
			*{
				 font-family: "ss-light";
			 }
			 .image0, .image2, .image4, .image6
			 {
			 	width:40%;
			 	float:left;
			 	height :430px;
			 	width :430px;
			 	padding:20px 80px 80px 80px;
			 }
			 .content0, .content2, .content4, .content6
			 {
			 	width:48%;
			 	float: right;
			 	margin-right:100px;
			 	padding-top: 20px;
			 }
			 .image1, .image3, .image5
			 {
			 	float: right;
			 	margin-top: 120px;
			 	margin-right: 280px;
			 }
			 .content1, .content3, .content5
			 {
			 	width:43%;
			 	margin-left: 40px;
			 	margin-left: 80px;
			 }
			 h2
			 {
			 	color: orange;
			 }
			 p
			 {
			 	color: gray;
			 	font-size: 20px;
			 }
			 ul
			 {
			 	color: gray;
			 	padding-left: 50px;
			 	font-size: 20px;
			 }
		</style>
	</head>
		<?php
			
			class services
			{
				function __construct()
				{
					require './vendor/autoload.php';
					$client = new GuzzleHttp\Client();
					$response = $client->request('GET', 'https://ir-revamp-dev.innoraft-sites.com/jsonapi/node/services',
							['headers' => ['User-Agent', 'myreader']]);
					$show=json_decode($response->getBody());
					//print_r($show);
					echo "<div class='parent'>";
					$i=0;
					foreach ($show->data as $key=>$value)
					{
						//echo "<div class='container$i'>";
						echo "<div class='image$i'>";
						$ImgApi=$value->relationships->field_image->links->related->href;
						$ResImgApi = $client->request('GET', $ImgApi);
						$showimg=json_decode($ResImgApi->getBody());
						$ImgPath=$showimg->data->attributes->uri->url;
						$GetImg="https://ir-revamp-dev.innoraft-sites.com/".$ImgPath;
						echo "<img src =$GetImg>"."<br>";
						echo "</div>";
						echo "<div class='content$i'>";
						if($value->attributes->field_services!="")
						{
							echo "<h2>";
							$content1=$value->attributes->title;
							echo $content1."<br>";
							echo "</h2>";
							echo "<p>";
							$content2=$value->attributes->body->summary;
							echo $content2."<br>";
							echo "</p>";
							$content3=$value->attributes->field_services->value;
							echo $content3."<br>";
						}
						else
						{
							echo "<h2>";
							$content1=$show->data[$i]->attributes->title;
							echo $content1."<br>";
							echo "</h2>";
							echo "<p>";
							$content2=$show->data[$i]->attributes->body->summary;
							echo $content2."<br><br>";
							echo "</p>";
						}
						echo "</div>";
						//echo "</div>";
						$i++;
					}
					echo "</div>";
				}
			}
			$obj=new services;
		?>
</html>
