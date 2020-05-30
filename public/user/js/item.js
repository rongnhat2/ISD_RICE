
$('.submit_voting').on('click', function(){
	var comment = $(this).parent().find('.comment').val()
	var voting = $(this).parent().find('.voting').val()
	var item_id = $(this).parent().find('.item_id').val()
	if (comment == "")  comment = null
	if (voting == "")  voting = null
	
	$.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/submitVoting',
        type: "GET",
        data: {
            comment: comment,
            voting: voting,
            item_id: item_id,
        },
        success:function(data){ //dữ liệu nhận về
            console.log(data)
            $('.detail_voting').find('.is_login').addClass('is-success')
            $('.detail_voting').find('.is_success').addClass('is-success')
            // $('.item_output').remove();  
            // if ($('.search_button').hasClass('item')) {item(data)}
            // if ($('.search_button').hasClass('warehouse')) {warehouse(data)}
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
    })
})
$('.submit_comment').on('click', function(){
	var father = $(this);
	var comment = $(this).parent().find('.comment').val()
	var item_id = $('.item_id').val()
	var comment_id = $(this).parent().find('.comment_id').val()

	if (comment != ""){
		$.ajax({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        },
	        url: '/submitComment',
	        type: "GET",
	        data: {
	            comment: comment,
	            comment_id: comment_id,
	            item_id: item_id,
	        },
	        success:function(data){ //dữ liệu nhận về
	            console.log(data)
	            father.parent().toggleClass('is-open')
				$('.ch_recomment').append(
					'<div class="recomment_wrapper">'+
					'	<div class="ch_user">'+
					'		<i class="fas fa-user"></i>'+ data +
					'	</div>'+
					'	<div class="ch_comment">'+
							comment+
					'	</div>'+
					'</div>'
				);
				father.parent().find('.comment').val('')
	        },
	        error: function (request, status, error) {
	            alert(request.responseText);
	        }
	    })
	}
	
})

$('.open_form').on('click', function(){
	$(this).parent().parent().find('.ch_action_submit').toggleClass('is-open')
})
$('.open_recomment').on('click', function(){
	$(this).parent().parent().find('.ch_recomment').toggleClass('is-open')
})

$('.bar_value').each(function(index){
	var width = $(this).attr('value')
	$(this).css({
		'width' : width + '%'
	})
});
$('.list_voting').find('.fa-star').each(function(index){
	var index = $('.is_login').find('.voting').val()
	for (var i = 0; i < index; i++) {
		$('.list_voting').find('span').find('i').eq(i).addClass('is-active')
	}
});
$('.list_voting').find('span').on('mouseover', function(){
	var index = $(this).index() - 1;
	for (var i = 0; i < index; i++) {
		$('.list_voting').find('span').find('i').eq(i).addClass('is-focus')
	}
})
$('.list_voting').find('span').on('mouseout', function(){
	$('.list_voting').find('span').find('i').removeClass('is-focus')
})
$('.list_voting').find('span').on('click', function(){
	var index = $(this).index() - 1;
	$('.list_voting').find('span').find('i').removeClass('is-active')
	for (var i = 0; i < index; i++) {
		console.log(i)
		$('.list_voting').find('span').find('i').eq(i).addClass('is-active')
	}
	$('.list_voting').find('.voting').val(index);
})