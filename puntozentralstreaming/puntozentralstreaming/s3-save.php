<?php
    set_time_limit(0); 
    header('Content-Type: text/html; charset=utf-8');  
    @ob_start();
    include ('bucket.php');
    use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;
	$id_curso = $_POST['id_curso'];
	$titulo = $_POST['titulo'];
	$f_a = $_POST['f_a'];
	$video= $_FILES['file1']['name'];

			$sql = "INSERT INTO video (id_curso, video, titulo, f_a) VALUES ('$id_curso', '$video', '$titulo','$f_a')";
			$resultado = $mysqli->query($sql);
			$id_insert = $mysqli->insert_id;
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

	
	// For this, I would generate a unqiue random string for the key name. But you can do whatever.
	$keyName = $centro.'/' . basename($_FILES["file1"]['name']);
	$pathInS3 = 'https://s3.us-east-2.amazonaws.com/' . $bucketName . '/' . $keyName;

	// Add it to S3
	try {
		// Uploaded:
		$file = $_FILES["file1"]['tmp_name'];

		$s3->putObject([
        'Bucket' => $bucketName,
        'Key'    => $keyName,
        'SourceFile' => $file,
		'StorageClass' => 'STANDARD',
		'ACL' => 'public-read'
    ]);
    	header('Location: t_videos.php');
	} catch (S3Exception $e) {
		die('Error:' . $e->getMessage());
	} catch (Exception $e) {
		die('Error:' . $e->getMessage());
	}
	header('Location: t_videos.php');

	// Now that you have it working, I recommend adding some checks on the files.
	// Example: Max size, allowed file types, etc.
?>