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


$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});