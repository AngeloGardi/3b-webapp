$(document).ready( function() {
    // iterate through each one and add event listener that executes swap function
    document.querySelectorAll('a[data-page]').forEach( (button) => {
        button.addEventListener('click', function(e) {
            swap(this.getAttribute('data-page'));
        });
    });
});

function swap(selected) {
    // all pages ids inside an array
	var pages = ['home', 'coke', 'sprite', 'pepper'];
    // iterate through each one and add class d-none which is display: none unless it's the selected page
	pages.forEach( (page) => {
        if(page === selected){
             // remove the class d-none from the selected page
            document.getElementById(page).classList.remove('d-none');
            if(page !== 'home'){
                document.getElementById(`${page}_modelX3D__${page}-TIMER`).setAttribute('startTime', (new Date()).getTime() / 1000);
            }
        } else{
            document.getElementById(page).classList.add('d-none');
        }
    });
	
    // same concept as above
    document.querySelectorAll('a[data-page]').forEach( (button) => {
        if(button.getAttribute('data-page') === selected){
            button.classList.add('active');
        } else{
            button.classList.remove('active');
        }
    });
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