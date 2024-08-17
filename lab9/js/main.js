$(function() {
    $('[data-toggle="popover"]').popover();
     // iterate through each one and add event listener that executes swap function
     $('a[data-page]').each( (index, button) => {
        $(button).on('click', function(e) {
            swap($(this).data('page'));
        });
    });

    $('a[data-model]').each( (index, button) => {
        $(button).on('click', function(e) {
            swapModels($(this).data('model'));
        });
    });

    $.getJSON('./model/data.json', function(obj) {
        const data = obj.pageTextData;
        localStorage.setItem('strings', JSON.stringify(data));

        // x3d model cards
        $('.x3dmodel-card').each(function(i,e){
            $(this).find('.card-title').text(data[i+4]['x3dModelTitle']);
            $(this).find('.card-text').text(data[i+4]['x3dCreationMethod']);
        });

        // bottom card
        $('#bottom-card .card-title').text(data[4]['title']);
        $('#bottom-card .card-text').text(data[4]['description']);
          
        // gallery card
        $('.gallery-card .card-title').text(data[7]['galleryTitle']);
        $('.gallery-card .card-text').text(data[7]['galleryDescription']);

        // 3d camera card
        $('.camera-title h3').text(data[8]['CameraTitle']);
        $('.camera-description p').text(data[8]['CameraSubtitle'] );

        // animation card 
        $('.animation-title h3').text(data[9]['AnimationTitle']);
        $('.animation-description p').text(data[9]['AnimationDescription']);

        // rendering card 
        $('.rendering-title h3').text(data[10]['RenderLightningTitle']);
        $('.rendering-description p').text(data[10]['RenderLightningDescription']);
    });

    let htmlCode = "";
	$.ajax({
		url: "scripts/php/hook.php",
		method: "GET",
		success: function(response) {
			const images = response.images;
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

function swap(selected) {
    // all pages ids inside an array
	var pages = ['home', 'models'];
    // iterate through each one and add class d-none which is display: none unless it's the selected page
	pages.forEach( (page) => {
        if(page === selected){
             // remove the class d-none from the selected page
            $(`#${page}`).removeClass('d-none');
            $(`a[data-page=${page}]`).addClass('active');
            if(selected === 'models'){
                swapModels('coke');
            }
        } else{
            $(`#${page}`).addClass('d-none');
            $(`a[data-page=${page}]`).removeClass('active');
        }
    });
}

function swapModels(selected) {
    // all pages ids inside an array
    var models = ['coke', 'sprite', 'pepper'];
    // iterate through each one and add class d-none which is display: none unless it's the selected model
    models.forEach( (model) => {
        if(model === selected){
             // remove the class d-none from the selected model
            $(`#${model}_model`).removeClass('d-none');
            $(`a[data-model=${model}]`).addClass('active');
            $(`#${model}_modelX3D__${model}-TIMER`).attr('startTime', (new Date()).getTime() / 1000); // start the animation on switch
        }
        else{
            $(`#${model}_model`).addClass('d-none');
            $(`a[data-model=${model}]`).removeClass('active');
        }
    });

    let cardTitleIndex;
    switch(selected) {
        case 'coke':
            cardTitleIndex = 4;
            break;
        case 'sprite':
            cardTitleIndex = 5;
            break;
        case 'pepper':
            cardTitleIndex = 6;
            break;
    }

    const data = JSON.parse(localStorage.getItem('strings'));
    $('#bottom-card .card-title').text(data[cardTitleIndex]['title']);
    $('#bottom-card .card-text').text(data[cardTitleIndex]['description']);

    $('.x3dmodel-card .card-title').text(data[cardTitleIndex]['x3dModelTitle']);
    $('.x3dmodel-card .card-text').text(data[cardTitleIndex]['x3dCreationMethod']);

    setModelControlButtons(selected);
}

// get initial css var root color values to use them when resetting color to default
var initialPrimayColor = getComputedStyle(document.documentElement).getPropertyValue('--primary-color');
var initialBackgroundColor = getComputedStyle(document.documentElement).getPropertyValue('--background-color');

// change color based on how many times the button is clicked
var counter = 0;
function changeLook() {
	counter += 1;
	switch (counter) {
        case 1:
            document.documentElement.style.setProperty('--primary-color', '#440c72');
            document.documentElement.style.setProperty('--background-color', '#2C8EB8');
            break;
        case 2:
			document.documentElement.style.setProperty('--primary-color', '#afb90e');
            document.documentElement.style.setProperty('--background-color', '#b03524');
            break;
        case 3:
			document.documentElement.style.setProperty('--primary-color', '#34b90e');
            document.documentElement.style.setProperty('--background-color', '#641bb2');
            break;
        case 4:
            counter = 0;
			document.documentElement.style.setProperty('--primary-color', '#1894ab');
            document.documentElement.style.setProperty('--background-color', '#6d1313');
            break;
    }
}

function resetToDefault() {
	document.documentElement.style.setProperty('--primary-color', initialPrimayColor);
    document.documentElement.style.setProperty('--background-color', initialBackgroundColor);
}

function toggleLight(model) {
    const headlight = $(`#${model}_modelX3D__NavInfo001`).attr('headlight') === 'true';
    $(`#${model}_modelX3D__NavInfo001`).attr('headlight', !headlight);
}

function toggleOmniLight(model) {
    for(let i = 1; i <=6; i++ ){
        const selector = `#${model}_modelX3D__Omni00${i}`;
        const state = $(selector).attr('on') === 'true';
        $(selector).attr('on', !state);
    }
}

function setModelControlButtons(model){
    $('#camera-views-btns button').off('click'); // remove previous listeners
    $('#camera-views-btns button').on('click', function() {
        // const model = $(this).parent().attr('data-model');
        if ($(this).attr('data-light-btn') === 'true') {
            toggleLight(model);
            return;
        }

        const view = $(this).attr('data-view');
        $(`#${model}_modelX3D__${view}_view`).attr('bind', true);
    });

    $('#animation-control-btns button').off('click'); // remove previous listeners
    $('#animation-control-btns button').on('click', function() {
       const btnType = $(this).attr('data-action');
       const timerSensor = document.getElementById(`${model}_modelX3D__${model}-TIMER`);
       switch(btnType){
            case 'play':
                timerSensor.setAttribute('enabled', true); 
                $(`#${model}_modelX3D__${model}-TIMER`).attr('startTime', (new Date()).getTime() / 1000);
                break;

            case 'loop':
                const loop = timerSensor.getAttribute('loop') === 'loop' ?  false : timerSensor.getAttribute('loop') === 'true';
                // I didn't use jquery for attributes here because for some reason $(`#coke_modelX3D__coke-TIMER`).attr('loop', true) is not working
                timerSensor.setAttribute('stopTime', (new Date()).getTime() / 1000);
                timerSensor.setAttribute('loop', !loop); 
                break;

            case 'stop':
                timerSensor.setAttribute('stopTime', (new Date()).getTime() / 1000);
                break;
       }
    });

    $('#render-options-btns button').off('click');
    $('#render-options-btns button').on('click', function() {
        const btnType = $(this).attr('data-action');
        const modelNode = $(`#${model}_model`)[0];
        switch(btnType){
            case 'headlight':
                toggleLight(model);
                break;
            case 'render':
                modelNode.runtime.togglePoints(true);
                break;
            case 'omni':
                toggleOmniLight(model);
                break;
        }
    });
}