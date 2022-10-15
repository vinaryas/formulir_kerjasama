<script>
	function setSelect2(element, url, placeholder, _data = function (params) {
		return {
			input: $.trim(params.term),
		};
	}) {
		$(element).select2({
			placeholder: placeholder,
			allowClear: true,
			ajax: {
				url: url,
				dataType: 'json',
				data: _data,
				processResults: function (data) {
					return {
						results: data
					};
				},
				cache: true
			}
		});
	}

	function setSelectedSelect2(select, data, id = 'id', text = 'name') {
		if(data != null){
			if (Array.isArray(data)) {
				$.each(data, function(index, val) {
					$(select).append('<option value="'+val[id]+'" selected="selected">'+val[text]+'</option>');
				});
			}else{
				$(select).append('<option value="'+data[id]+'" selected="selected">'+data[text]+'</option>');
			}
		}
	}

	function setSelectedSelectWithFormat(select, data, id = 'id', text) {
		$(select).append('<option value="'+data[id]+'" selected="selected">'+text+'</option>');
	}
</script>


$(document).on('shown.bs.dropdown', '.dt-responsive', function (e) {
    // The .dropdown container
    var $container = $(e.target);

    // Find the actual .dropdown-menu
    var $dropdown = $container.find('.dropdown-menu');
    if ($dropdown.length) {
        // Save a reference to it, so we can find it after we've attached it to the body
        $container.data('dropdown-menu', $dropdown);
    } else {
        $dropdown = $container.data('dropdown-menu');
    }

    $dropdown.css('top', ($container.offset().top + $container.outerHeight()) + 'px');
    $dropdown.css('left', $container.offset().left + 'px');
    $dropdown.css('position', 'absolute');
    $dropdown.css('display', 'block');
    $dropdown.appendTo('body');
});

$(document).on('hide.bs.dropdown', '.dt-responsive', function (e) {
    // Hide the dropdown menu bound to this button
    $(e.target).data('dropdown-menu').css('display', 'none');
});
        });