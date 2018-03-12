function popUp(title,message) {
		var html_e_dialogue = '<div id="dial" class="alert alert-warning alert-dismissible" role="alert">'+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'+title+'!</strong>'+message+'</div>';
		$('#message_container').append(html_e_dialogue);
		setTimeout(function () {
			$('#dial').remove();
		}, 5000);
	}
function checkVals() {
	var reg_pattern = new RegExp(/^[789]\d{9}$/);
		//Html Data Validations
		if($('#email').val().length == 0){
			popUp("Email","Cannot be empty");
			return false;
		}
		else if ($('#phone').val().length<10) {
			popUp('Phone',"number invalid!");
			return false;
		}
		else if (!reg_pattern.test($('#phone').val())) {
			popUp('Please Enter'," Indian Phone Number!");
			return false;
		}
		else if ($('#roll').val().length < 12) {
			popUp('Roll Number'," invalid!");
			return flase;
		}
		else if ($('#pass_o').val().length < 6 ) {
			popUp('Password'," Cannot be less then 6 Characters!");
			return false;
		}
		else if ($('#pass_o').val() != $('#pass_t').val()) {
			popUp('Password'," Dont Match!");
			return false;
		}
		else{
			$('#regf').submit();	
		}
}