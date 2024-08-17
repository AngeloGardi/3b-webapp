function toggleLight(btn, model) {
    const newLabel = btn.textContent === 'Off' ? 'On' : 'Off';
    const headlight = document.getElementById(`${model}_modelX3D__NavInfo001`).getAttribute('headlight') === 'true';
    document.getElementById(`${model}_modelX3D__NavInfo001`).setAttribute('headlight', !headlight);
    btn.textContent = newLabel;
}

// wait for DOMContentLoaded
document.addEventListener('DOMContentLoaded', function() {
    $('[data-toggle="popover"]').popover();
    const buttons = document.querySelectorAll('div[data-interaction] > button');
    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            const model = this.parentElement.getAttribute('data-model');
            // if it's switch light button use toggleLight function instead
            if (this.id === 'switch-light-btn') {
                toggleLight(this, model);
                return;
            }

            const view = this.getAttribute('data-view'); // get view name from data attribute
            document.getElementById(`${model}_modelX3D__${view}_view`).setAttribute('bind', true);
        });
    });
});