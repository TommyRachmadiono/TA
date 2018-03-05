$(document).ready(function(){
    $(document).on('click', '.like', function(){
        var id=$(this).val();
        var $this = $(this);
        $this.toggleClass('like');
        if($this.hasClass('like')){
            $this.html('<i class="fa fa-thumbs-o-up"></i>Like'); 
        } else {
            $this.html('<i class="fa fa-thumbs-o-down"></i>Unlike');
            $this.addClass("unlike"); 
        }
        $.ajax({
            type: "POST",
            url: "postingController.php",
            data: {
                act:'like',
                id: id,
                like: 1,
            },
            success: function(){
                showLike(id);
            }
        });
    });

    $(document).on('click', '.unlike', function(){
        var id=$(this).val();
        var $this = $(this);
        $this.toggleClass('unlike');
        if($this.hasClass('unlike')){
            $this.html('<i class="fa fa-thumbs-o-up"></i>Unlike'); 
        } else {
            $this.html('<i class="fa fa-thumbs-o-up"></i>Like');
            $this.addClass("like"); 
        }
        $.ajax({
            type: "POST",
            url: "postingController.php",
            data: {
                act:'like',
                id: id,
                like: 1,
            },
            success: function(){
                showLike(id);
            }
        });
    });

    function showLike(id){
        $.ajax({
            async: true,
            type: "POST",
            url: 'postingController.php',
            data:{
                act:'show_like',
                id: id,
                showlike: 1
            },
            success: function(response){
                $('#show_like'+id).html(response);   
            }});
    }

});

