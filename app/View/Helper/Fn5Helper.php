<?php
class Fn5Helper extends AppHelper {


	public function confirmModal($title, $buttonLabel, $content, $url = null) {

		$formName = str_replace('.', '', uniqid('post_', true));
		$formUrl = $this->url($url);

		$form = "<form id='" . $formName . "' name='" . $formName . "' action='" . $formUrl ."' method='post' style='display:none;'>";
		$form .= "<input type='hidden' name='_method' value='POST'>";
		$form .= "</form>";

		$onClick = 'document.' . $formName . '.submit();';

		$out = "<div id='Modal" . $formName . "' class='reveal-modal tiny' data-reveal><h2>" . $title . 
		"</h2>" . $form . "<p>" . $content . "</p><button class='button tiny radius alert' onclick='" . $onClick . " event.returnValue = false; return false;'>" . __('Accept') . "</button><a class='close-reveal-modal'>&#215;</a></div>";

		$out .= "<a href='#' data-reveal-id='Modal" . $formName . "' data-reveal>" . $buttonLabel . "</a>";
		return $out;
	}


	public function drawStatus($status){
		$out = "";

		switch ($status) {
			case 1: // activo
				$out = "<i class='status active has-tip' data-tooltip title='" . __('Active') . "'></i>";
				break;
			
			default: // inactivo
				$out = "<i class='status inactive has-tip has-tip' data-tooltip title='" . __('Inactive') . "'></i>";
				break;
		}

		return $out;
	}

	public function drawStatusBillable($status){
		$out = "";

		switch ($status) {
			case 1: // activo
				$out = "<i class='status active has-tip' data-tooltip title='" . __('Billable') . "'></i>";
				break;
			
			default: // inactivo
				$out = "<i class='status inactive has-tip has-tip' data-tooltip title='" . __('No Billable') . "'></i>";
				break;
		}

		return $out;
	}


	public function dropdownButton($title, $links, $key){
		$out = "<a href='#' data-options='align:left' data-dropdown='drop" . $key . "' class='dropdown'>"
		. $title . "</a><br>"
		. "<ul id='drop" . $key . "' data-dropdown-content class='f-dropdown'>";

		foreach ($links as $link) {
			$out .= "<li>" . $link . "</li>";
		}

		$out .= "</ul>";

		return $out;
	}
}
?>