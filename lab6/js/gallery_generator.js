$(document).ready(function() {
	let htmlCode = "";
	$.ajax({
		url: "scripts/php/hook.php",
		method: "GET",
		success: function(response) {
			const images = response.split("~");
			images.forEach(function(image) {
				// col-6 inside the main row div
				htmlCode += '<div class="col-6">';
				htmlCode += `<a data-fancybox="" data-caption="My X3D model render" href="assets/images/gallery/${image}">`;
				htmlCode += `<img class="card-img-top img-thumbnail" src="assets/images/gallery/${image}"/>`;
				htmlCode += '</a>';
				htmlCode += '</div>';
			});

			$('#gallery').children().first().html(htmlCode);
		}
	});
});

