<?php
header('Content-Type: text/html; charset=utf-8');  
@ob_start();
 require 'bucket.php';
    use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;
	$video= $_GET['id_video'];
	 $query = $mysqli -> query ("SELECT * FROM video WHERE id_video='$video'");
                  while ($valores = mysqli_fetch_array($query)) {
                    $n_video=$valores['video'];
                  }
			$sql = "DELETE FROM video where id_video='$video'";
			$resultado = $mysqli->query($sql);
			

	// Connect to AWS
	try {
		// You may need to change the region. It will say in the URL when the bucket is open
		// and on creation.
		$s3 = S3Client::factory(
			array(
				'credentials' => array(
					'key' => $IAM_KEY,
					'secret' => $IAM_SECRET
				),
				'version' => 'latest',
				'region'  => 'us-east-2'
			)
		);
	} catch (Exception $e) {
		// We use a die, so if this fails. It stops here. Typically this is a REST call so this would
		// return a json object.
		die("Error: " . $e->getMessage());
	}


	$keyname = $centro.'/'.$n_video;
	$pathInS3 = 'https://s3.us-east-2.amazonaws.com/' . $bucketName . '/' . $keyname;
	echo $keyname;

	// Add it to S3
	try {
		$s3->deleteObject([
		    'Bucket' => $bucketName,
		    'Key'    => $keyname
		]);

	} catch (S3Exception $e) {
		die('Error:' . $e->getMessage());
	} catch (Exception $e) {
		die('Error:' . $e->getMessage());
	}
	header('Location: t_videos.php');

	// Now that you have it working, I recommend adding some checks on the files.
	// Example: Max size, allowed file types, etc.
?>