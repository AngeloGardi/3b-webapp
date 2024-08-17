function toggleLight(btn) {
    const newLabel = btn.textContent === 'Off' ? 'On' : 'Off';
    const headlight = document.getElementById('modelX3D__NavInfo001').getAttribute('headlight') === 'true';
    document.getElementById('modelX3D__NavInfo001').setAttribute('headlight', !headlight);
    btn.textContent = newLabel;
}

function playAnimation(model){
    document.getElementById(`modelX3D__${model}-TIMER`).setAttribute('startTime', (new Date()).getTime() / 1000);
}

// wait for DOMContentLoaded
document.addEventListener('DOMContentLoaded', function() {
    $('[data-toggle="popover"]').popover();
    const buttons = document.querySelectorAll('#interaction > button');
    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            // if it's switch light button use toggleLight function instead
            if (this.id === 'switch-light-btn') {
                toggleLight(this);
                return;
            }

            const view = this.getAttribute('data-view'); // get view name from data attribute
            document.getElementById(`modelX3D__${view}_view`).setAttribute('bind', true);
        });
    });
});