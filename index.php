<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- AlirezEzzat -->
    <!-- My id @alirezaezzatofficial -->
    <meta name="description" content="">
    <meta name="author" content="HQWEB">
    <link rel="icon" href="/favicon.ico">

    <title>Simple DNS Lookup | نیم سرور چکر</title>

    <!-- Bootstrap core CSS -->
	<meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.5.1.js" 
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" 
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
   <script src="https://kit.fontawesome.com/cb4778956c.js" crossorigin="anonymous"></script>

  </head>

  <body class="center">
 
  <div class="box">
        <form name="search" method="post" action="check.php">
            <input type="text" class="input" name="domain" placeholder="<?php if(isset($_POST['submit'])) { echo($_POST['domain']); }else{echo("www.domain.com");} ?>" requirerd>
            <style type="text/css">
.hidden{
    display:none;
}
</style>
<button type="submit" name="submit" class="hidden">Lookup DNS</button>
        </form>
        <div class="btn" onclick="document.search.txt.value = ''">
            <span></span>
            <span></span>
        </div>
    </div>
   
    <script>
        $(".btn").click(function() {
            $(".input").toggleClass("click")
            $("span").toggleClass("click")
        })
    </script>
  
  
 

		

	
  </body>
</html>
