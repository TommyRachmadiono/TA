$(document).ready(function(){

    $( "#btnshowmore" ).click(function() {
        var lastID = $('#postterakhir').attr('lastID');
        var groupID = $('#postterakhir').attr('groupID');
        var act = $('#postterakhir').attr('act');
        // alert("lastid = "+lastID);
        // alert("groupid = "+groupID);
        // alert("act = "+act);

        if(lastID!=0){
            $.ajax({
                type:'POST',
                url:'getData.php',
                data:{id:+lastID,
                    groupID:+groupID,
                    act:act},
                beforeSend:function(){
                    $('#postterakhir').show();
                },
                success:function(html){
                    $('#postterakhir').remove();
                    $('#postlist').append(html);
                }
            });
        }
    });
    // $(window).scroll(function(){
    //     // alert($(window).scrollTop()+" == "  +($(document).height()-$(window).height()));
    //     var lastID = $('#postterakhir').attr('lastID');
    //     var groupID = $('#postterakhir').attr('groupID');
    //     if(($(window).scrollTop() == $(document).height() - $(window).height()) || ($(window).scrollTop() >= $(document).height() - $(window).height()) && (lastID != 0)){
    //         $.ajax({
    //             type:'POST',
    //             url:'getData.php',
    //             data:{id:+lastID,
    //                 groupID:+groupID},
    //             beforeSend:function(){
    //                 $('#postterakhir').show();
    //             },
    //             success:function(html){
    //                 $('#postterakhir').remove();
    //                 $('#postlist').append(html);
    //             }
    //         });
    //     }
    // });
});
