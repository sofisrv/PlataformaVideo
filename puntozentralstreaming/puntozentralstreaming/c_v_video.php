<?php
include ('bucket.php');
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
  $video= $_GET['id_video'];
   $query = $mysqli -> query ("SELECT * FROM video WHERE id_video='$video'");
                  while ($valores = mysqli_fetch_array($query)) {
                    $n_video=$valores['video'];
                  }
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
  $URL = 'https://s3.us-east-2.amazonaws.com/' . $bucketName . '/' . $keyname;
  // Add it to S3
  try {
    $s3->getObject([
        'Bucket' => $bucketName,
        'Key'    => $keyname
    ]);
  } catch (S3Exception $e) {
    die('Error:' . $e->getMessage());
  } catch (Exception $e) {
    die('Error:' . $e->getMessage());
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <link  rel="icon" href="logos/logocen.png" type="image/png"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>video</title>
</head>
<style>
.rv{
   position: absolute;
  right: 0;
  width: 80%;
  padding: 16px;
  background-color: white;
  margin-top: 10%;
  margin-right: 10%;
}
</style>
<?php
  include("navegacioncliente.php");
  require 'conexion.php';
?>
<body oncontextmenu="return false" onkeydown="return false">
    <video class="rv" id="videoPlayer" controls controlslist="nodownload" autoplay>
        <source src="<?php echo $URL?>" type="video/mp4">

    </video>
    <br>
</body>
</html>