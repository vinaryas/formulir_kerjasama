<script>
	function exportExcel(url, nama, btn, icon1, icon2){
		$.ajax({
			xhrFields: {
				responseType: 'blob',
			},
			type: "GET",
			url: url,
			beforeSend: function(){
				$(btn).addClass('disabled');
				$(icon1).addClass('d-none');
				$(icon2).removeClass('d-none');
			},
			complete: function(){
				$(btn).removeClass('disabled');
				$(icon2).addClass('d-none');
				$(icon1).removeClass('d-none');
			},
			success: function(result, status, xhr) {

				var disposition = xhr.getResponseHeader('content-disposition');
				var matches = /"([^"]*)"/.exec(disposition);
				var filename = (matches != null && matches[1] ? matches[1] : nama);

				// The actual download
				var blob = new Blob([result], {
					type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
				});
				var link = document.createElement('a');
				link.href = window.URL.createObjectURL(blob);
				link.download = filename;

				document.body.appendChild(link);

				link.click();
				document.body.removeChild(link);
			}
		});
	}
</script>
