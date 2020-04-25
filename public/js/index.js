// select2 library for skills field
$(function(){
	$("#skills").select2();
})

$( "#birthday, #job-started" ).datepicker({
	dateFormat: 'yy-mm-dd'
});

$("div.desc").hide();
$("input[name$='profession']").click(function() {
    var test = $(this).val();
    console.log(test);
    $("div.desc").hide();
    $("." + test).show();
});

let random = () => {
	let state = document.querySelector('#state').value;
	if(state === "New Delhi") {
		city = "Gurugram";
	} else if(state === "Maharashtra") {
		city = "Mumbai";
	}
	let sample = document.querySelector('#city').innerHTML=`<input type='text' name='city' value='${city}' style='border: none; outline: none;'>`;
}









































