 $(document).ready(function(){
    var topMain=$("#webhead").height()+70//��ͷ���ĸ߶ȼ�ͷ����nav����֮��ľ���
    var nav=$(".nav");
    $(window).scroll(function(){
    if ($(window).scrollTop()>topMain){//��������������ľ������topMain���nav�����������.nav_scroll��������Ƴ�
    nav.addClass("nav_scroll");
    }else{
    nav.removeClass("nav_scroll");
    }
    });
    })
	
	
	     //���ض���js
function b(){
	h = $(window).height();
	t = $(document).scrollTop();
	if(t > h){
		$('#gotop').show();
	}else{
		$('#gotop').hide();
	}
}
$(document).ready(function(e) {
	b();
	$('#gotop').click(function(){
		$(document).scrollTop(0);	
	})
	$('#code').hover(function(){
			$(this).attr('id','code_hover');
			$('#code_img').show();
		},function(){
			$(this).attr('id','code');
			$('#code_img').hide();
	})
	
});

$(window).scroll(function(e){
	b();		
})

