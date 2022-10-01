function setSelect2(
    element,
    url,
    placeholder,
    _data = function (params) {
        return {
            input: $.trim(params.term),
        };
    }
) {
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
