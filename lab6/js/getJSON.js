$(document).ready(function(){
    $.getJSON('./model/data.json', function(obj) {
        const data = obj.pageTextData;
        localStorage.setItem('strings', JSON.stringify(data));

        // home page text on slider
        $('#main_text h3').text(data[0]['title']);
        $('#main_text h4').text(data[0]['subTitle']);
        $('#main_text p').text(data[0]['description']);

        // main products cards
        $('#main-products-cards .card-body').each(function(i,e){
            $(this).find('.card-title').text(data[i+1]['title']);
            $(this).find('.card-subtitle').text(data[i+1]['subTitle']);
            $(this).find('.card-text').text(data[i+1]['description']);
        });

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
});








