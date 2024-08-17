$(document).ready(function() {
    var htmlCode = "";
	var xmlHttp = new XMLHttpRequest();
	var send = "scripts/php/hook.php";
	xmlHttp.open("GET", send, true);
	xmlHttp.send(null);
	xmlHttp.onreadystatechange = function() {
		if(xmlHttp.readyState == 4) {	
			var images = xmlHttp.responseText.split("~");
			images.forEach( (image) => {
				// col-6 inside the main row div
                htmlCode += '<div class="col-6">'
				htmlCode += `<a href="assets/images/gallery/${image}">`;
				htmlCode += `<img class="card-img-top img-thumbnail" src="assets/images/gallery/${image}"/>`;
				htmlCode += '</a>';			
                htmlCode += '</div>'
            });
				
			document.getElementById('gallery_coke').firstElementChild.innerHTML = htmlCode;
			document.getElementById('gallery_sprite').firstElementChild.innerHTML = htmlCode;
			document.getElementById('gallery_pepper').firstElementChild.innerHTML = htmlCode;
		}
	}
});

