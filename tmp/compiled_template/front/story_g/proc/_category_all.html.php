<?php /* Template_ 2.2.7 2025/07/30 05:47:24 /www/newmanjoo14_godomall_com/data/skin/front/story_g/proc/_category_all.html 000003642 */ ?>
<div class="all-category category">
    <a href="#"><?php echo __('전체 카테고리')?></a>
    <div class="all-category-layer category">

    </div>
</div>


<script type="text/javascript">
    <!--
    $(document).ready(function(){

        $('.header .top-service .all-category.category > a').on('click', function(){

            $.ajax({
                method: "POST",
                cache: false,
                url: "../goods/goods_ps.php",
                data: "mode=get_all_category",
                success: function(data) {
                    var getData = $.parseJSON(data);

                    if(data =='false') {
                        $(".all-category-layer.category").html('');
                    } else {
                        var addHtml = "<div><h2><?php echo __('전체 카테고리')?></h2>";
                        $.each(getData, function (categoryKey, categoryVal) {
                            addHtml += "<ul>";
                            $.each(categoryVal, function (key, val) {

                                addHtml += '<li><strong><a href="../goods/goods_list.php?cateCd='+val.cateCd+'">'+val.cateNm+'</strong></a>';
                                if(val.children) {
                                    addHtml += '<ul>';
                                    $.each(val.children, function (key1, val1) {
                                        addHtml += '<li><a href="../goods/goods_list.php?cateCd='+val1.cateCd+'">'+val1.cateNm+'</a>';
                                        if(val1.children) {
                                            addHtml += '<ul>';
                                            $.each(val1.children, function (key2, val2) {
                                                addHtml += '<li><a href="../goods/goods_list.php?cateCd='+val2.cateCd+'">'+val2.cateNm+'</a></li>';
                                                if(val2.children) {
                                                    addHtml += '<ul>';
                                                    $.each(val2.children, function (key3, val3) {
                                                        addHtml += '<li><a href="../goods/goods_list.php?cateCd='+val3.cateCd+'">'+val3.cateNm+'</a></li>';
                                                    });
                                                    addHtml += '</ul>';
                                                }
                                            });
                                            addHtml += '</ul>';
                                        }
                                        addHtml += '</li>';

                                    });
                                    addHtml += '</ul>';
                                }

                                addHtml += '</li>';
                            });
                            addHtml += "</ul>";
                        });
                        addHtml += "<button type=\"button\" title=\"<?php echo __('닫기')?>\"><span><?php echo __('닫기')?></span></button></div>";

                        $(".all-category-layer.category").html(addHtml);
                        $(".all-category-layer.category").addClass('db');
                    }

                },
                error: function (data) {
                    alert(data.message);
                }
            });

        });

    });

    //-->
</script>