
$(document).on('submit', 'form.js-ajax', function (event) 
{
	// Don't submit form (stop redirecting)
	event.preventDefault();

	var form = $(this);
	var action = form.attr('action');

	$.post(action, form.serialize(), function(data, textStatus, jqXHR)
	{
		var messages = JSON.parse(data);

		// Form submission was successfull
		if (typeof messages.success !== 'undefined')
		{
			// Remove error states (possible from previous requests)
			$('.has-error').removeClass('has-error');
			// Display success message
			$('#js-form-messages').html('<div class="alert alert-success">' + messages.success + '</div>');
			// Add new user to table
			$('#js-users tbody').append('<tr>'
				+ '<td>' + messages.data.name + '</td>'
				+ '<td>' + messages.data.email + '</td>'
				+ '<td>' + messages.data.city + '</td>'
				+ '<td>' + messages.data.phone + '</td>'
			+ '</tr>');
		}
		// There was an error
		else
		{
			var generatedHTML = '';

			// Remove error states (possible from previous requests)
			$('.has-error').removeClass('has-error');

			$.each(messages.errors, function(index, value)
			{
				// Add error states to parent inputs
				$('#' + index).parents('.form-group').addClass('has-error');
				// Generate error messages
				generatedHTML += '<div class="alert alert-danger">' + value + '</div>';
			});

			$('#js-form-messages').html(generatedHTML);
		}
	});
});