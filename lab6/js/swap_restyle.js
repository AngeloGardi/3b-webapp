$(document).ready( function() {
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