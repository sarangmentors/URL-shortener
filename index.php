
<?php
	include("connection.php");

	
	
	
	$msg = "";
	
if(isset($_GET['r']) || !empty($_GET['r']))
{
	$url_id = $_GET['r'];

	// Checking database if the the URL keyword is in it or not.
	// If query is true it will redirect to long URL.
	// Otherwise it will redirect to index.php ( our home page )
	
	$sql = "SELECT long_url FROM url_shortner WHERE url_id = '$url_id'";
	
	$result = mysqli_query($db,$sql);
	
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

	if(mysqli_num_rows($result) == 1)
	{
		$l_url = $row['long_url'];
		
		echo "<script>window.location.href='$l_url'</script>";
		
	}
	else
	{
    echo "<script>window.location.href='index.php'</script>";
	
	}
}


	
if(isset($_POST["submit"]))	
{
	// Checking database if the the Long URL already exist or not.
	// If result is true it will show message that this URL already exit.
	// Otherwise it will add to database and you will get a short URL.
	
	$long_url = $_POST["long_url"];
	$long_url = mysqli_real_escape_string($db, $long_url);
	
	$sql="SELECT long_url FROM url_shortner WHERE long_url = '$long_url'";
	
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

	if(mysqli_num_rows($result) == 0)
	{
		// URL Validation
		if (!filter_var($_POST['long_url'], FILTER_VALIDATE_URL) === false) 
		{
				
	$str=str_replace("https://","","$long_url");
	$words = explode(".", "$str");
	$url_id = "";
	foreach ($words as $w) 
	{
 		 $url_id .= $w[0];
	}

			
			$short_url = $site . "/" . $url_id;
			
			
			$query = mysqli_query($db, "INSERT url_shortner (url_id, long_url, short_url) VALUES ('$url_id','$long_url','$short_url')");
			
			if($query)
			{
				$msg = "<b>Your Short URL is</b>: <a href='".$short_url."'>$short_url</a>";
			}
			else
			{
				$msg = "There is some problem";
			}
		} 
		else 
		{
			$msg = $_POST['long_url'] ."is not a valid URL";
		}
	}
	else
	{
		$msg = "Sorry! This URL already exist.";
		
	}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>URL Shortener</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
        <link rel="stylesheet" href="style.css" />
     
    </head>
    <body>
        <!--hero section-->
        <section class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-8 mx-auto">
                        <div class="card border-none">
                            <div class="card-body">
                               
                                <p class="mt-4 text-white lead text-center">
                                  <clip>  Make Basic URL Shortener</clip>
                                </p>
                                <div class="mt-4">
                                    <form method="post">
                                        <div class="form-group">
                                            <input type="url" name="long_url" class="form-control" id="email" value="" placeholder="Past a link to shorten it" required>
                                        </div>
                                            <label>
                                            
                                          <span class="custom-control-description text-white"><?php echo $msg;?> </span>
                                        </label>
                                      
                                       
                                        
                                        <button type="submit" name="submit" class="btn btn-primary float-right">SHORTEN</button>
                                    </form>
                                 
                                   
                              
                            </div>
                            
                        </div>
                        
                    </div>
         
                                     
           
                    
                    
                    <div class="clearfix">
   
                    
                    </div>
                  <div class="col-sm-12 mt-5 footer">
                                     
                        
                    </div>
                </div>
            </div>
            
        </section>

    </body>
</html>

