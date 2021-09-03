<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="HQWEB">
    <link rel="icon" href="/favicon.ico">

    <title>Simple DNS Lookup | نیم سرور چکر</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/check.css" rel="stylesheet">

  </head>

  <body>

<?php
$dataless='Details for';
?>



	<div class="row marketing">

		<?php

			if(isset($_POST['submit']))
					{
						$domain_regex = '/[a-z\d][a-z\-\d\.]+[a-z\d]/i';
						$domain = $_POST['domain'];
						$dns_a = dns_get_record($domain, DNS_A);
						$dns_ns = dns_get_record($domain, DNS_NS);
						$dns_mx = dns_get_record($domain, DNS_MX);
						$dns_soa = dns_get_record($domain, DNS_SOA);
						$dns_txt = dns_get_record($domain, DNS_TXT);
						$dns_aaaa = dns_get_record($domain, DNS_AAAA);
						$dns_all = dns_get_record($domain, DNS_ALL);

		?>
		
		<table class="main">
			
				<thead>
					<td class="webdev">Record</td>
					<td class="socod">Class</td>
					<td class="webdev">TTL</td>
					<td class="socod"><?php echo($_POST['domain']); ?></td>
			</thead>
					
			<tr>
				<td><h4><span class="webdev"><?php echo($dns_a[0]['type']); ?></span></h4></td>
				<td class="socod"><?php echo($dns_a[0]['class']); ?></td>
				<td class="webdev"><?php echo($dns_a[0]['ttl']); ?></td>
				<td>
					<?php 
					foreach($dns_a as $value)
						{
							?>	<h4 class="socod">
									<?php
										echo($value['ip']);
									?>
								</h4>
							<?php } ?>
				</td>
			</tr>
			<?php $result_aaaa = empty($dns_aaaa); if($result_aaaa != null){ ?>
			<tr>
				<td   class="webdev"> <h3>AAAA</h3></td>
				<td class="socod">/</td>
				<td class="vert-align 1382">/</td>
				<td calss="webdev"><h3>No AAAA record for this server (IPV6)</h4></td>
			</tr>
			<?php } else { ?>
			<tr>
				<td class="webdev"><?php echo($dns_aaaa[0]['type']); ?><?php echo($result_aaaa); ?></span></td>
				<td class="socod"><?php echo($dns_aaaa[0]['class']); ?></td>
				<td class="webdev"><?php echo($dns_aaaa[0]['ttl']); ?></td>
				<td>
					<?php 
					foreach($dns_aaaa as $value)
						{
							?><h4  class="socod">
								<?php  echo($value['ipv6']); ?>
							</h4>
							<?php } ?>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td class="webdev"><span ><?php echo($dns_ns[0]['type']); ?></span></td>
				<td class="socod"><?php echo($dns_ns[0]['class']); ?></td>
				<td class="webdev"><?php echo($dns_ns[0]['ttl']); ?></td>
				<td>
					<?php 
					foreach($dns_ns as $value)
						{
							?><h4  class="socod">
								<?php  echo($value['target']); ?>
								(<?php echo(gethostbyname($value['target'])) ?>)
							</h4>
							<?php } ?>
				</td>
			</tr>
			<tr>
				<td class="webdev"><?php echo($dns_mx[0]['type']); ?></span></td>
				<td class="socod"><?php echo($dns_mx[0]['class']); ?></td>
				<td class="webdev"><?php echo($dns_mx[0]['ttl']); ?></td>
				<td>
					<?php 
					foreach($dns_mx as $value)
						{
							?><h4  class="socod"> 
								[<?php  echo($value['pri']); ?>] 
								<?php  echo($value['target']); ?>
								(<?php echo(gethostbyname($value['target'])) ?>)
							</h4>
							<?php } ?>
				</td>
			</tr>
			<tr>
				<td class="webdev"><span><?php echo($dns_soa[0]['type']); ?></span></td>
				<td class="socod"><?php echo($dns_soa[0]['class']); ?></td>
				<td class="webdev"><?php echo($dns_soa[0]['ttl']); ?></td>
				<td>
						<h4 class="socod">Email : <?php $email = explode(".", $dns_soa[0]['rname']); echo($email[0].'@'.$email[1].'.'.$email[2]); ?></h4>
						<h4 class="socod">Serial : <?php echo($dns_soa[0]['serial']); ?></h4>
						<h4 class="socod">Refresh : <?php echo($dns_soa[0]['refresh']); ?></h4>
						<h4 class="socod">Retry : <?php echo($dns_soa[0]['retry']); ?></h4>
						<h4 class="socod">Expire : <?php echo($dns_soa[0]['expire']); ?></h4>
						<h4 class="socod">Minimum TTL : <?php echo($dns_soa[0]['minimum-ttl']); ?></h4>
				</td>
			</tr>
			<tr>
				<td class="webdev"><span><?php echo($dns_txt[0]['type']); ?></span></td>
				<td class="socod"><?php echo($dns_txt[0]['class']); ?></td>
				<td class="webdev"><?php echo($dns_txt[0]['ttl']); ?></td>
				<td>
						<h3   class="socod"><?php echo($dns_txt[0]['txt']); ?></h3>
				</td>
			</tr>
			<tr>
				
			</tr>
		</table>

	</div>

<?php
					}
?>


    </div> <!-- /container -->
  </body>
</html>
