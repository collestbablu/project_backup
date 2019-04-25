<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting (E_ALL ^ E_NOTICE);
class Report extends my_controller {
function __construct(){
   parent::__construct(); 
    $this->load->model('model_report');	
}     

function report_function() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
    $this->load->view('open-page-report');
	}
	else
	{
	redirect('index');
	}
}

function searchSalary() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['salarySearch'] = $this->model_report->getSearchSalary($emp,$loc,$f_date,$t_date,$range);
    $this->load->view('salary-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function searchInvoice() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['invoiceSearch'] = $this->model_report->getSearchInvoice($inv_no,$cust_name,$f_date,$t_date,$range);
    $this->load->view('invoice-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}


function searchPickUp() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['pickupSearch'] = $this->model_report->getSearchPickup($p_name,$f_date,$t_date,$range);
    $this->load->view('add-pickup-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function searchPickUpCost() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['pickupCostSearch'] = $this->model_report->getSearchPickupCost($p_name,$f_date,$t_date,$range);
    $this->load->view('add-pickup-cost-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}



function searchDelivery() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['deliverySearch'] = $this->model_report->getDelivery($v_name,$range,$f_date,$t_date);
    $this->load->view('delivery-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function searchDeliveryCost() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['deliverySearch'] = $this->model_report->getDeliveryCost($v_name,$range,$f_date,$t_date);
    $this->load->view('delivery-cost-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function searchBranchDelivery() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['branchdeliverySearch'] = $this->model_report->getBranchDelivery($branch,$range,$f_date,$t_date);
    $this->load->view('branch-delivery-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function searchBranchDeliveryCost() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['branchdeliverycostSearch'] = $this->model_report->getBranchDeliveryCost($branch,$range,$f_date,$t_date);
    $this->load->view('branch-delivery-cost-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}


function searchExpense() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['expenseSearch'] = $this->model_report->getSearchExpense($pers_name,$exp_account,$exp_type,$paidto,$f_date,$t_date,$range);
    $this->load->view('expense-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function searchRental(){
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['searchRental'] = $this->model_report->getSearchRental($r_name,$loc,$f_date,$t_date,$range);
    $this->load->view('rental-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function searchBooking(){
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['bookingSearch'] = $this->model_report->getSearchBooking($c_no,$c_name,$f_date,$t_date,$range);
    $this->load->view('booking-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function searchContact() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['searchContact'] = $this->model_report->getSearchContact($p_name,$groupname);
    $this->load->view('contact-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}



function searchPurchaseOrder() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['purchaseOrderSearch'] = $this->model_report->getSearchPurchaseOrder($p_no,$v_name,$f_date,$t_date,$g_total);
    $this->load->view('add-purchaseorder-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}	

function searchSalesOrder() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['saleOrderSearch'] = $this->model_report->getSearchSaleOrder($p_no,$v_name,$f_date,$t_date,$g_total);
    $this->load->view('add-saleorder-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}	

}

?>