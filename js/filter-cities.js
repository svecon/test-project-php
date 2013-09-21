$('#js-filters').on('change', '#js-city', function (event) {
	
	var city = this.value;

	var rows = $('table[filterable] > tbody > tr');

	if (city == '')
	{
		rows.removeClass('hidden');
		return;
	}

	rows.each(function(index, element)
	{
		if ($(this).find('.js-city').html() === city)
			$(this).removeClass('hidden');
		else
			$(this).addClass('hidden');
	});
});
