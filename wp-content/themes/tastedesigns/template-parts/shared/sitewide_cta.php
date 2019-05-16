<?php

/*

SITEWIDE CTA
logic found in /lib/sitewide_cta.php

*/

if (
	!empty( $GLOBALS['callToAction'] ) &&
	!empty( $GLOBALS['callToAction']['title'] ) &&
	!empty( $GLOBALS['callToAction']['subtitle'] ) &&
	!empty( $GLOBALS['callToAction']['buttonText'] ) &&
	!empty( $GLOBALS['callToAction']['buttonUrl'] )
)
{
	?>
	<div>
		<h2>
			<?php echo $GLOBALS['callToAction']['subtitle']; ?>
		</h2>
		<h3>
			<?php echo $GLOBALS['callToAction']['title']; ?>
		</h3>
		<a href="<?php echo $GLOBALS['callToAction']['buttonUrl']; ?>" ><?php echo $GLOBALS['callToAction']['buttonText']; ?></a>
	</div>
	<?php
}