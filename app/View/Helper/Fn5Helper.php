<?php
class Fn5Helper extends AppHelper {


	public function confirmModal($title, $content, $url = null) {

		$formName = str_replace('.', '', uniqid('post_', true));
		$formUrl = $this->url($url);

		$form = "<form id='" . $formName . "' name='" . $formName . "' action='" . $formUrl ."' method='post' style='display:none;'>";
		$form .= "<input type='hidden' name='_method' value='POST'>";
		$form .= "</form>";

		$onClick = 'document.' . $formName . '.submit();';

		$out = "<div id='Modal" . $formName . "' class='reveal-modal' data-reveal><h2>" . $title . 
		"</h2>" . $form . "<p>" . $content . "</p><button onclick='" . $onClick . " event.returnValue = false; return false;'>" . __('Accept') . "</button><a class='close-reveal-modal'>&#215;</a></div>";

		$out .= "<a href='#' data-reveal-id='Modal" . $formName . "' data-reveal>Delete</a>";
		return $out;
	}
}
?>