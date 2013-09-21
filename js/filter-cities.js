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
		if (this.innerHTML.indexOf(city) == -1)
			$(this).addClass('hidden');
		else $(this).removeClass('hidden');
	});
});
