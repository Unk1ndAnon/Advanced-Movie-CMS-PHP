$(document).ready(function(){

    $('.mobile-nav li').each(function(){
        $(this).removeClass("active")
       // console.log($(this).attr('url-base'))
        if($(this).attr('url-base')==url_base)
        {
            $(this).addClass("active")
        }
    })
})

$("select#server-button").change(function(){

    data_src=$(this).val()
    console.log(data_src)
    $("#iframe-embed").attr("src",data_src)

    $('html, body').animate({
        scrollTop: $("#video").offset().top - 80
      }, 500);
})


$("img").error(function(){
    $(this).attr("src", "/no-poster.png");
})

$(document).on("error","img",function(){
    $(this).attr("src", "/no-poster.png");
})

        