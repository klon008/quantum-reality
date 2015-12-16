function selectFromGameList(SenderID, Sender) {

    $(".game_block").fadeOut(400, function() {
		var imgSrc = $("#game"+SenderID+"img").attr('src');
    	var sh2 = $("#game"+SenderID+"h2").html();
    	var comment = $("#game"+SenderID+"comment").html();

        $("div#Input-selectbox.bfh-selectbox").addClass('disabled').attr('disabled', true).val(SenderID);

    	$(".game_block_informer h1").html(sh2);
    	$(".game_block_informer img").attr('src', imgSrc);
    	$(".game_block_informer p").html(comment);
        $(".game_block_informer").fadeIn();
    });
}

function backToGameList() {
    $(".game_block_informer").fadeOut(400, function() {
        $(".game_block").fadeIn();
    });

}
