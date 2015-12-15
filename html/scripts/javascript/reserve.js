function asd(SenderID, Sender) {

    $(".game_block").fadeOut(400, function() {
		var imgSrc = $("#"+SenderID+"img").attr('src');
    	var sh2 = $("#"+SenderID+"h2").html();
    	var comment = $("#"+SenderID+"comment").html();

    	$(".game_block_informer h1").html(sh2);
    	$(".game_block_informer img").attr('src', imgSrc);
    	$(".game_block_informer p").html(comment);
        $(".game_block_informer").fadeIn();
    });
}

function dsa() {
    $(".game_block_informer").fadeOut(400, function() {
        $(".game_block").fadeIn();
    });

}
