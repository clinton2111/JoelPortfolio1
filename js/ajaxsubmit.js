$('form.contactForm').on('submit', function() {

	var element = $(this), url = element.attr('action'), type = element.attr('method'), data = {};

	element.find('[name]').each(function(index, value) {
		var element = $(this), name = element.attr('name');
		value = element.val();

		data[name] = value;
	});

	$.ajax({
		url : url,
		type : type,
		data : data,
		success : function(response) {
			if (data) {
				console.log(response);
				$("#status").html("<span style='color:#000000'>Success:</span> Message sent successfully.");
			} else {
				console.log(response);
				$("#status").html("<span style='color:#cc0000'>Error:</span> There was an error sending your message.");
			}

		}
	});
	return false;
});
