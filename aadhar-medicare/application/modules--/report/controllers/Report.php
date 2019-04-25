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


function searchStock() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['stockSearch'] = $this->model_report->getSearchStock($p_id,$p_name);
    $this->load->view('add-product-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function searchReorderLevel() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['reorderLevel'] = $this->model_report->getSearchReorderLevel($p_id,$p_name);
    $this->load->view('minimum-reorder-level-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}


function searchTemplate() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['searchTemplate'] = $this->model_report->getTemplateSearch($temp_id,$p_name,$f_date,$t_date);
    $this->load->view('template-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function view_template() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
    $this->load->view('view-template');
	}
	else
	{
	redirect('index');
	}
}


function searchMasterCutting() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['masterCuttingSearch'] = $this->model_report->getSearchMasterCutting($p_id,$p_name,$f_date,$t_date);
    $this->load->view('master-cutting-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function view_master_cutting() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
    $this->load->view('view-master-cutting');
	}
	else
	{
	redirect('index');
	}
}

function searchQualityCheck(){
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['qcSearch'] = $this->model_report->getSearchQc($p_id,$t_name,$f_date,$t_date);
    $this->load->view('qc-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function view_qc() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
    $this->load->view('view-qc');
	}
	else
	{
	redirect('index');
	}
}

function searchTailor(){
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['tailorSearch'] = $this->model_report->getSearchTailor($t_name,$f_date,$t_date);
    $this->load->view('tailor-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function searchWhereQty(){
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['WhereQtySearch'] = $this->model_report->getSearchWhereQty($t_name,$f_date,$t_date);
    $this->load->view('where-qty-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function view_tailor() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
    $this->load->view('view-tailor');
	}
	else
	{
	redirect('index');
	}
}


function searchPacking() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
	$postlist['packingSearch'] = $this->model_report->getSearchPacking($p_id,$f_date,$t_date);
    $this->load->view('packing-report', $postlist);
	}
	else
	{
	redirect('index');
	}
}

function view_packing() {
		extract($_POST);
    if($this->session->userdata('is_logged_in')){
    $this->load->view('view-packing');
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