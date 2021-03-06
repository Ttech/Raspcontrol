<?php
	class hddPercentage {
		function freeStorage(){
			exec('df -hT | grep -vE "tmpfs|rootfs|Filesystem"', $drivesarray);
			?>
				<div class="sdIcon">
					<img src="_lib/images/sd.png" align="middle"> 
				</div>
				
				<div class="sdTitle">
					Storage
				</div>
				
				<br/><br/><br/><br/><br/>
			<?php

			for ($drive=0; $drive<count($drivesarray); $drive++) 
			{
				$drivesarray[$drive] = preg_replace('!\s+!', ' ', $drivesarray[$drive]);
				preg_match_all('/\S+/', $drivesarray[$drive], $drivedetails);
				list($fs, $type, $size, $used, $available, $percentage, $mounted) = $drivedetails[0];

				if(rtrim($percentage, '%') > '80'){
			    $warning = "<img src=\"_lib/images/warning.png\" height=\"18\" />";
			    $bar = "barAmber";
	          } else {
	            $warning = "<img src=\"_lib/images/ok.png\" height=\"18\" />";
	            $bar = "barGreen";
	          } 
				?>
			
			
				<div class="sdName">
					<?php echo $mounted?>
				</div>
					
				<div class="sdWarning">
					<?php echo $warning ?>
				</div>
				
				<div class="sdText">
					<div class="graph">
						<strong class="<?php echo $bar; ?>" style="width:<?php echo $percentage ?>;"><?php echo $percentage ?></strong>
				</div>
				
				<div class="clear"></div>
				
				<br/>
				
				Total: <strong><?php echo $size ?>B</strong> &middot
				Free: <strong><?php echo $available ?>B</strong> &middot		
				Format: <strong><?php echo $type ?>B</strong>
				</div>
						
				<div class="clear"></div>
			
				
				
				
				
<?php				
		}
		}
		}
?>