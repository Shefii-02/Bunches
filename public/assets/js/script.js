$("form .search-icon").hover(function () {
    $("form .search-input").css("display", "block");
    $("form .search-input").mouseleave(function () {
        $("form .search-input").css("display", "none");
    });
});


$(document).ready(function() { 
    $('input[name="phone"]').mask('(000) 000-0000'); 
    $('input[name="s_phone"]').mask('(000) 000-0000'); 
    $('input[name="b_phone"]').mask('(000) 000-0000'); 
    
    $(document).on('DOMNodeInserted', function(e) { 
        $('input[name="phone"]').mask('(000) 000-0000'); 
        $('input[name="s_phone"]').mask('(000) 000-0000'); 
         $('input[name="b_phone"]').mask('(000) 000-0000'); 
        
    }); 
});


$(document).ready(function () {
    $(".blog-slider").slick({
        slidesToShow: 3,
        responsive: [
            {
              breakpoint: 1366,
              settings: {
                slidesToShow: 3,
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 1,
              }
            }
          ]
    });
});

$(document).ready(function(){
    $(".btn_grid_layout").click(function(){
        $(this).addClass("active");
        $(".btn_list_layout").removeClass("active");
        $(".layout_grid").show();
        $(".layout_list").hide();
    });

    $(".btn_list_layout").click(function(){
        $(this).addClass("active");
        $(".layout_list").removeClass('d-none');
        $(".btn_grid_layout").removeClass("active");
        $(".layout_grid").hide();
        $(".layout_list").show();
    });
})