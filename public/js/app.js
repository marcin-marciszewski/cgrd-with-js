$( document ).ready(function() {
    $( ".btn-edit" ).each(function(index) {
        $(this).on("click", function(){
            const newsId = $(this).attr("data-id");
            const newsItem = `.news-item-${newsId}`;
            $(".add-form").addClass("hide");
            $(".edit-form").removeClass("hide");
            $(".title-edit").val($(`${newsItem} .news-info-title`).text())
            $(".description-edit").val($(`${newsItem} .news-info-description`).text())
            if( $('.edit-form').length )   
            {
                $(".edit-form").attr('action', `${$(location).attr('protocol')}//${$(location).attr('host')}/news/edit/${newsId}` )
            } 
        });
    });

    $(".close-edit").on("click", function(){
        $(".add-form").removeClass("hide");
        $(".edit-form").addClass("hide");
    })
});
