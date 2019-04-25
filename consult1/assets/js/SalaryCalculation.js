
function salaryCalculate()
{
	var basic_salary =   parseInt(document.getElementById("basic_salary").value);
		alert(basic_salary);
	var conveyance =  document.getElementById("conveyance").value;
//	alert(conveyance);
	var EsI = document.getElementById("EsI").value;
	alert(EsI);
	var dearness_allowance=  document.getElementById("dearness_allowance").value;
	var tax=  document.getElementById("tax").value;
	var leave_tvl_allowance=  document.getElementById("leave_tvl_allowance").value;
	var other_deduction =  document.getElementById("other_deduction").value;
	var hra_salary =  document.getElementById("hra_salary").value;
	var medical_allowance =  document.getElementById("medical_allowance").value;
	var uniform_allowance =  document.getElementById("uniform_allowance").value;


//	 var earning_gross_salary =  document.getElementById("earning_gross_salary").value;
	//var deduction_gross_salary =  document.getElementById("deduction_gross_salary").value;
	//var net_monthly_salary =  document.getElementById("net_monthly_salary").value;
	//var ctc =  document.getElementById("ctc").value;
	
	var conveyance_net = basic_salary*conveyance/100;
	var esi_net = basic_salary*EsI/100;
	var dearness_allowance_net = basic_salary*dearness_allowance/100;
	var other_deduction_net=basic_salary*other_deduction/100;
	var hra_salary_net=basic_salary*hra_salary/100;
	var medical_allowance_net=basic_salary*medical_allowance/100;
	var uniform_allowance_net=basic_salary*uniform_allowance/100;
	
	var earning_gross_salary = basic_salary+conveyance_net+dearness_allowance_net+hra_salary_net+medical_allowance_net+uniform_allowance_net;
	
	document.getElementById("erg").value = earning_gross_salary;
		
	alert(earning_gross_salary);
}

