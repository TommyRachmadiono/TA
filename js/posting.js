$("#posting_status").submit(function(event){
    event.preventDefault(); //prevent default action 
    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = new FormData(this); //Creates new FormData object
    $.ajax({
        url : post_url,
        type: request_method,
        data : form_data,
        contentType: false,
        cache: false,
        processData:false
    }).done(function(response){ //
        $("#status_postingan").html(response);
    });
});

$("#posting_komentar").submit(function(event){
    event.preventDefault(); //prevent default action 
    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = new FormData(this); //Creates new FormData object
    $.ajax({
        url : post_url,
        type: request_method,
        data : form_data,
        contentType: false,
        cache: false,
        processData:false
    }).done(function(response){ //
        $("#comment").html(response);
    });
});

// setTimeout(function()
// {
//     $.ajax({
//         type: "POST",
//         url: "getdata.php",
//         data: "action=get&type=29",
//         success: function(arg){
//             // do something
//         }
//     });
// }, 1000); // This will "refresh" every 1 second