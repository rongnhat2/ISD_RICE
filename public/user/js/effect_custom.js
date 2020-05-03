
$('.I-subitem').find('.val_calc').html($('.I-subitem').find('.value_input').val())
$('.I-subitem').find('.down_calc').on('click', function(){
	var data = $(this).parent().find('.value_input').val()
	if (data > 0) data = data - 1;
	$(this).parent().find('.value_input').val(data)
	$(this).parent().find('.val_calc').html($(this).parent().find('.value_input').val())
})
$('.I-subitem').find('.up_calc').on('click', function(){
	var data = $(this).parent().find('.value_input').val()
	data = data - -1;
	$(this).parent().find('.value_input').val(data)
	$(this).parent().find('.val_calc').html($(this).parent().find('.value_input').val())
})
$('.open_nav').on('click', function(){
	$('.sub_nav').toggleClass('is-open')
})
$('.open_subnav').on('click', function(){
	$('.sub_menu_wrapper').toggleClass('is-open')
})


