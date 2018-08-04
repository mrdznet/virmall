//商品列表页
function getGoodsList(brandId){
	location.href = WST.U('mobile/goods/lists','brandId='+brandId,true);
}
//获取品牌列表
function brandsList(){
	 $('#Load').show();
	 loading = true;
	 var param = {};
	 param.id = $('#catId').val();
	 param.pagesize = 16;
	 param.page = Number( $('#currPage').val() ) + 1;
    $.post(WST.U('mobile/brands/pageQuery'), param,function(data){
        var json = WST.toJson(data);
        if(json && json.data && json.data.length>0){
	        $('#currPage').val(json.current_page);
	        $('#totalPage').val(json.last_page);
            var gettpl = document.getElementById('list').innerHTML;
            laytpl(gettpl).render(json.data, function(html){
                $('#info-list').append(html);
            });
            echo.init();//图片懒加载
        }
	     loading = false;
	     $('#Load').hide();
    });
}
//选择
function choice(obj,id){
	$(obj).addClass('active').siblings('.brands-tab li').removeClass('active');
    $('#currPage').val(0);
    $('#totalPage').val(0);
    $('#info-list').html('');
    $('#catId').val(id);
    brandsList();
}
var currPage = totalPage = 0;
var loading = false;
$(document).ready(function(){
	WST.initFooter('home');
	brandsList();
    $(window).scroll(function(){  
        if (loading) return;
        if ((5 + $(window).scrollTop()) >= ($(document).height() - screen.height)) {
            currPage = Number( $('#currPage').val() );
            totalPage = Number( $('#totalPage').val() );
            if( totalPage > 0 && currPage < totalPage ){
            	brandsList();
            }
        }
    });
});