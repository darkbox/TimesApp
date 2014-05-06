<?php
App::import('Vendor','tcpdf_min/tcpdf');

class XTCPDF extends TCPDF{

	public $companyName;
	public $companyCountry;
	public $invoiceCode;
	public $invoiceDate;
	public $dueDate;
	public $clientName;
	public $clientAddress;
	public $clientCity;
	public $clientState;
	public $clientZipCode;
	public $clientCountry;

	public function Header() {
		$this->SetY(15);

		$datediff = strtotime($this->dueDate) - strtotime($this->invoiceDate);
		 // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->SetY(15);
        $this->Cell(0, 15, $this->companyName, 0, false, 'L', 0, '', 0, false, 'T', 'T');
        $this->SetFont('helvetica', '', 12);
        $this->MultiCell(130,30,'<b>Invoice: ' . $this->invoiceCode . '</b><br><b>Date of invoice:</b> ' . $this->invoiceDate . '<br><b>Payment is due:</b> ' . $this->dueDate . '(' . floor($datediff/(60*60*24)) . ' days)', 0, 'L', false, 0, 110, 15, true, 0, true);
        $this->MultiCell(200,30,'<b>To</b> ' . '<b><br>' . $this->clientName . '</b><br>' . $this->clientAddress . '<br>' . 
        																				$this->clientCity . ' ' . $this->clientState . ' ' . $this->clientZipCode .
        																				'<br>' . $this->clientCountry, 0, 'L', false, 0, 15, 40, true, 0, true);
        $this->MultiCell(130,30,'<b>From</b> ' . '<b><br>' . $this->companyName . '</b><br>' . $this->companyCountry, 0, 'L', false, 0, 110, 40, true, 0, true);
	}

	public function setParameters($companyName = "", $companyCountry = "", $invoiceCode = "", $invoiceDate = "", $dueDate = "", $clientName = "", $clientAddress = "", $clientCity = "", $clientState = "", $clientZipCode = "", $clientCountry = "") {
		$this->companyName = $companyName;
		$this->companyCountry = $companyCountry;
		$this->invoiceCode = $invoiceCode;
		$this->invoiceDate = $invoiceDate;
		$this->dueDate = $dueDate;
		$this->clientName = $clientName;
		$this->clientAddress = $clientAddress;
		$this->clientCity = $clientCity;
		$this->clientState = $clientState;
		$this->clientZipCode = $clientZipCode;
		$this->clientCountry = $clientCountry;
	}

	// Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Date: ' . date('d/m/Y', time()) . ' Página ' . $this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

}

?>