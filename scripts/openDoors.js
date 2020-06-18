
/************ OPEN MODALS DEPENDING ON THE "DOOR" ************/


$("#door-1").click(function() {
	window.location.href = "http://localhost/Hovedopgave-Bodylab/index.php?question=1";
});

$("#door-2").click(function() {	
	
	if($("#door-1").hasClass("doorOpen")) {
		window.location.href = "http://localhost/Hovedopgave-Bodylab/index.php?question=2";
	}
	
	else {
		$("#openPre").css('display','block');
		$("#success").css('display','none');
		$(window).scrollTop($('#openPre').offset().top-20);
	}

});

$("#door-3").click(function() {	
	
	if($("#door-2").hasClass("doorOpen")) {
		window.location.href = "http://localhost/Hovedopgave-Bodylab/index.php?question=3";
	}
	
	else {
		$("#openPre").css('display','block');
		$("#success").css('display','none');
		$(window).scrollTop($('#openPre').offset().top-20);
	}

});

$("#door-4").click(function() {	
	
	if($("#door-3").hasClass("doorOpen")) {
		window.location.href = "http://localhost/Hovedopgave-Bodylab/index.php?question=4";
	}
	
	else {
		$("#openPre").css('display','block');
		$("#success").css('display','none');
		$(window).scrollTop($('#openPre').offset().top-20);
	}

});

function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}

if(getUrlParameter('question') == 1) {
	
	$(document).ready(function() {
		$('#open_question').modal('show');
		$('html, body').addClass('no-scroll');
		$("#success").css('display','none');
	});
}

if(getUrlParameter('question') == 2) {
	
	$(document).ready(function() {
		$('#open_question').modal('show');
		$('html, body').addClass('no-scroll');
		$("#success").css('display','none');
	});
}

if(getUrlParameter('question') == 3) {
	
	$(document).ready(function() {
		$('#open_question').modal('show');
		$('html, body').addClass('no-scroll');
		$("#success").css('display','none');
	});
}

if(getUrlParameter('question') == 4) {
	
	$(document).ready(function() {
		$('#open_question').modal('show');
		$('html, body').addClass('no-scroll');
		$("#success").css('display','none');
	});
}

/************ IF NONE CHECKBOX CHECKED = SHOW ERROR MSG - IF SUCCESS = HIDE MODAL AND INSERT DATA ************/

$(".btn-primary").click(function(e) {
	
	if ($('.sev_check:checked').length) {
		
		$(this).parent().parent().find('.error').css('display','none');
			$(this).parents('.modal').modal('hide');
			$('html, body').removeClass('no-scroll');
	}
	
	else {
		e.preventDefault()
			$(this).parent().parent().find('.error').css('display','block');	
	}
});

/************ TO TEST IF DATES ARE WORKING ************/

var date = new Date();
var year = date.getFullYear();
var month = date.getMonth();
var day = date.getDate();

/*****
	ERROR IF-STATEMENT:
	if (year == 2020 && month == 4 && day < 31) {
	
	SUCCESS IF-STATEMENT:
	if (year == 2020 && month == 5 && day < 31) {
*****

if (year == 2020 && month == 4 && day < 31) {
	alert('DATE: ' +  day + ' ' + month + ' ' + year + '\nMonth: Jan = 0, Dec = 11');
}

else {
	document.getElementById('dateError').style.display = 'block';
	document.getElementById('dateError').innerHTML = 'Lågen kan først åbnes fra <br> <strong> D. 1 juli - 31. juli </strong>';
}

**/



