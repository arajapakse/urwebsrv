/* 
sbex.js - SBEX Application
@asanka
*/



function confirmSubmit() {

	var agree=confirm("Are you sure you wish to continue?");
	
	if (agree)
		return true ;
	else
		return false ;
}


function confirmRemove() {

	var agree=confirm("Are you sure you wish remove this record?");
	
	if (agree)
		return true ;
	else
		return false ;
}



function verify(){
    msg = "Are you absolutely sure that you want to submit this form?";
    //all we have to do is return the return value of the confirm() method
    return confirm(msg);
}


function preview()  {
	
	window.open('jex5.htm','jav','width=300,height=200,resizable=yes'); 

} 

function reloadWindow(elem) {
	// build string
	var str = "index.php?a=request&f=speaker&ssAction=process&ssForm=requestform"+elem+"";
	
	
	window.location = str;
	
	
}