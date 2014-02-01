<?php
require_once("Blurb.php");

class StyleBlurb extends Blurb
{
	public function render()
	{
		return '<div class="blurbdiv">'.Blurb::render().'</div>';
	}
}
?>