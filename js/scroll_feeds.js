$(document).ready(function(){
    $(window).scroll(function(){
        var lastID = $('#postterakhir').attr('lastID');
        if(($(window).scrollTop() == $(document).height() - $(window).height()) && (lastID != 0)){
            $.ajax({
                type:'POST',
                url:'getData.php',
                data:'id='+lastID,
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
});
