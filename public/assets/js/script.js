$(document).ready(function ()
{
	uri = 'http://localhost/lrvl5_gbq/public/';
	//uri = 'http://192.168.1.111/lrvl5_gbq/public/';
	//uri = 'http://queue.gangstownbarbershop.com/';

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="xsrf-token"]').attr('content')
		}
	});

	btn_occupied = $('button[name="occupied"]');
	btn_skip = $('button[name="skip"]');
	btn_print = $('button[name="print"]');
	btn_call = $('button[name="call"]');
	nomor = $('.nomor');
	form_main = $('form[name="form_main"]');
	form_ticket = $('form[name="form_ticket"]');
	number = $('input[name="number"]');

	function btn_disabled() {
		if (number.val() > 0) {
			btn_occupied.removeClass('disabled');
			btn_skip.removeClass('disabled');
			btn_call.removeClass('disabled');
		} else {
			btn_occupied.addClass('disabled');
			btn_skip.addClass('disabled');
			btn_call.addClass('disabled');
		}
	}

	function getQueue() {
		$.get(uri+'queue', function(result) {
			if (result.number != 0) {
				nomnum = Number(result.number);

				nomor.html(nomnum);
				number.val(nomnum);

				btn_disabled();
			}
		});
	}

	function getPrintQueue() {
		$.get(uri+'ticket/queue', function(result) {
			nomnum = Number(result.number) + 1;

			nomor.html(nomnum);
			number.val(nomnum);
		});
	}

	if (window.location.href == uri) {
		getQueue();
	} else {
		getPrintQueue();
	}

	

	function postCall() {
		$.ajax({
			url: uri+'call',
			data: form_main.serialize(),
			type: 'post',
			beforeSend: function() {
				$('#wav').empty();
			},
			success: function (result) {
				if (result.length == 1) {
					$('#wav').append('<audio id="audio-1"><source src="assets/audio/'+result[0]+'.wav"></audio>');
				} else if (result.length == 2) {
					if (result[0] == 1 && result[1] == 0) {
						$('#wav').append('<audio id="audio-1"><source src="assets/audio/10.wav"></audio>');
					} else if (result[0] == 1 && result[1] == 1) {
						$('#wav').append('<audio id="audio-1"><source src="assets/audio/11.wav"></audio>');
					} else if (result[0] == 1 && result[1] > 1) {
						$('#wav').append('<audio id="audio-1"><source src="assets/audio/'+result[1]+'.wav"></audio>');
						$('#wav').append('<audio id="audio-2"><source src="assets/audio/belas.wav"></audio>');
					} else if (result[0] > 1) {
						$('#wav').append('<audio id="audio-1"><source src="assets/audio/'+result[0]+'.wav"></audio>');
						$('#wav').append('<audio id="audio-2"><source src="assets/audio/puluh.wav"></audio>');
						$('#wav').append('<audio id="audio-3"><source src="assets/audio/'+result[1]+'.wav"></audio>');
					}
				} else if (result.length == 3) {
					if (result[0] == 1 && result[1] == 0 && result[2] == 0) {
						$('#wav').append('<audio id="audio-1"><source src="assets/audio/100.wav"></audio>');
					} else if (result[0] == 1 && result[1] == 1 && result[2] == 0) {
						$('#wav').append('<audio id="audio-1"><source src="assets/audio/100.wav"></audio>');
						$('#wav').append('<audio id="audio-2"><source src="assets/audio/10.wav"></audio>');
					} else if (result[0] == 1 && result[1] == 1 && result[2] == 1) {
						$('#wav').append('<audio id="audio-1"><source src="assets/audio/100.wav"></audio>');
						$('#wav').append('<audio id="audio-2"><source src="assets/audio/11.wav"></audio>');
					} else if (result[0] == 1 && result[1] == 0 && result[2] >= 1) {
						$('#wav').append('<audio id="audio-1"><source src="assets/audio/100.wav"></audio>');
						$('#wav').append('<audio id="audio-2"><source src="assets/audio/'+result[2]+'.wav"></audio>');
					} else if (result[0] == 1 && result[1] == 1 && result[2] > 1) {
						$('#wav').append('<audio id="audio-1"><source src="assets/audio/100.wav"></audio>');
						$('#wav').append('<audio id="audio-2"><source src="assets/audio/'+result[2]+'.wav"></audio>');
						$('#wav').append('<audio id="audio-3"><source src="assets/audio/belas.wav"></audio>');
					} else if (result[0] == 1 && result[1] > 1 && result[2] >= 1) {
						$('#wav').append('<audio id="audio-1"><source src="assets/audio/100.wav"></audio>');
						$('#wav').append('<audio id="audio-2"><source src="assets/audio/'+result[1]+'.wav"></audio>');
						$('#wav').append('<audio id="audio-3"><source src="assets/audio/puluh.wav"></audio>');
						$('#wav').append('<audio id="audio-4"><source src="assets/audio/'+result[2]+'.wav"></audio>');
					} else if (result[0] == 1 && result[1] > 1 && result[2] == 0) {
						$('#wav').append('<audio id="audio-1"><source src="assets/audio/100.wav"></audio>');
						$('#wav').append('<audio id="audio-2"><source src="assets/audio/'+result[1]+'.wav"></audio>');
						$('#wav').append('<audio id="audio-3"><source src="assets/audio/puluh.wav"></audio>');
					} else if (result[0] == 1 && result[1] > 1 && result[2] == 0) {
						$('#wav').append('<audio id="audio-1"><source src="assets/audio/100.wav"></audio>');
						$('#wav').append('<audio id="audio-2"><source src="assets/audio/'+result[1]+'.wav"></audio>');
						$('#wav').append('<audio id="audio-3"><source src="assets/audio/puluh.wav"></audio>');
					} else if (result[0] > 1 && result[1] == 0 && result[2] == 0) {
						$('#wav').append('<audio id="audio-1"><source src="assets/audio/'+result[0]+'.wav"></audio>');
						$('#wav').append('<audio id="audio-2"><source src="assets/audio/ratus.wav"></audio>');
					} else if (result[0] > 1 && result[1] == 1 && result[2] == 0) {
						$('#wav').append('<audio id="audio-1"><source src="assets/audio/'+result[0]+'.wav"></audio>');
						$('#wav').append('<audio id="audio-2"><source src="assets/audio/ratus.wav"></audio>');
						$('#wav').append('<audio id="audio-3"><source src="assets/audio/10.wav"></audio>');
					} else if (result[0] > 1 && result[1] == 1 && result[2] == 1) {
						$('#wav').append('<audio id="audio-1"><source src="assets/audio/'+result[0]+'.wav"></audio>');
						$('#wav').append('<audio id="audio-2"><source src="assets/audio/ratus.wav"></audio>');
						$('#wav').append('<audio id="audio-3"><source src="assets/audio/11.wav"></audio>');
					} else if (result[0] > 1 && result[1] == 1 && result[2] >= 1) {
						$('#wav').append('<audio id="audio-1"><source src="assets/audio/'+result[0]+'.wav"></audio>');
						$('#wav').append('<audio id="audio-2"><source src="assets/audio/ratus.wav"></audio>');
						$('#wav').append('<audio id="audio-3"><source src="assets/audio/'+result[2]+'.wav"></audio>');
						$('#wav').append('<audio id="audio-4"><source src="assets/audio/belas.wav"></audio>');
					} else if (result[0] > 1 && result[1] == 0 && result[2] >= 1) {
						$('#wav').append('<audio id="audio-1"><source src="assets/audio/'+result[0]+'.wav"></audio>');
						$('#wav').append('<audio id="audio-2"><source src="assets/audio/ratus.wav"></audio>');
						$('#wav').append('<audio id="audio-3"><source src="assets/audio/'+result[2]+'.wav"></audio>');
					} else if (result[0] > 1 && result[1] > 1 && result[2] >= 1) {
						$('#wav').append('<audio id="audio-1"><source src="assets/audio/'+result[0]+'.wav"></audio>');
						$('#wav').append('<audio id="audio-2"><source src="assets/audio/ratus.wav"></audio>');
						$('#wav').append('<audio id="audio-3"><source src="assets/audio/'+result[1]+'.wav"></audio>');
						$('#wav').append('<audio id="audio-4"><source src="assets/audio/puluh.wav"></audio>');
						$('#wav').append('<audio id="audio-5"><source src="assets/audio/'+result[2]+'.wav"></audio>');
					} else if (result[0] > 1 && result[1] > 1 && result[2] == 0) {
						$('#wav').append('<audio id="audio-1"><source src="assets/audio/'+result[0]+'.wav"></audio>');
						$('#wav').append('<audio id="audio-2"><source src="assets/audio/ratus.wav"></audio>');
						$('#wav').append('<audio id="audio-3"><source src="assets/audio/'+result[1]+'.wav"></audio>');
						$('#wav').append('<audio id="audio-4"><source src="assets/audio/puluh.wav"></audio>');
					}
				}
			},
			error: function (xhr) {
				alert(xhr.status+' '+xhr.statusText);
			},
			complete: function() {
				audi = document.getElementById('audio-0');
				audi.play();

				audi.onended = function() {
					audio = document.getElementById('audio-1');
					audio.play();

					audio.onended = function() {
						audioo = document.getElementById('audio-2');
						audioo.play();

						audioo.onended = function() {
							audiooo = document.getElementById('audio-3');
							audiooo.play();

							audiooo.onended = function() {
								audioooo = document.getElementById('audio-4');
								audioooo.play();

								audioooo.onended = function() {
									audiooooo = document.getElementById('audio-5');
									audiooooo.play();
								}
							}
						}
					}
				}
			}
		});
	}

	function postOccupied() {
		$.post(uri+'occupied', form_main.serialize(), function() {
			getQueue();
		});
	}

	function postSkip() {
		$.post(uri+'skip', form_main.serialize(), function() {
			getQueue();
		});
	}

	function postPrint() {
		$.post(uri+'ticket/print', form_ticket.serialize(), function() {
			getPrintQueue();
		});
	}

	btn_call.click(function() {
		postCall();

		return false;
	});

	btn_occupied.click(function() {
		postOccupied();

		return false;
	});

	btn_skip.click(function() {
		postSkip();

		return false;
	});

	btn_print.click(function() {
		postPrint();

		//window.print();

		return false;
	});

	$(document).keydown(function() {
		if (event.which == 65) {
			event.prefentDefault;

			postSkip();
		} else if (event.which == 83) {
			event.prefentDefault;

			postCall();
		} else if (event.which == 68) {
			event.prefentDefault;

			postOccupied();
		} else if (event.which == 32) {
			event.prefentDefault;

			postPrint();
		}

	});

	/*queuecopy = setInterval(function() {
		$.post(uri+'queuecopy');
	}, 60000);*/

	// ============ Date Report ========
	$('.tanggal').each(function(){
	$(this).datepicker({
			dayNamesMin: [ "Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab" ],
			changeYear:true,
			changeMonth:true,
			dateFormat:"yy-mm-dd",
			duration:"fast"
		});
	});
});