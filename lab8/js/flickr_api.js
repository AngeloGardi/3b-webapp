// DOMContentLoaded
$(function() {
    $('button').on('click', function() {
        loadImages();
    });
});

function loadImages()
    {
        const query = $("#query").val();
        const urlFlickr = "../flickr.php";
        $('button').attr('disabled', '');
        $.getJSON(urlFlickr, {query: query}, function(data) {

            let htmlCode = "";
            $.each(data.items, function(i,item){          
                htmlCode += `<div class="imgBox"><div><h3>Title:${item.title}</h3></div>`;
                htmlCode += `<img src="${item.media.m}" />`;
                htmlCode += `<div><h4>Date: '${item.published}</h4></div></div>`;           
                if ( i == 7) return false;
            });
            $('#images-container').html(htmlCode);
            $('button').removeAttr('disabled');
        }).fail(function() {
            $('#images-container').html('An error occurred');
            $('button').removeAttr('disabled');
        });
    }
