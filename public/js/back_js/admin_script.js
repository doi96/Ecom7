
$(document).ready(function () {
	$('#type_slide').change(function(){
        var type_slide = $(this).val();
		$.ajax({
			type: 'POST',
            url: '/admin/admin-slider-getType/',
            data: { type_slide: type_slide },
            success: function(results) {
                console.log(results);
                $("#post_detail").empty();
                if (type_slide=='orther' || type_slide=='news' || type_slide=='uses'||type_slide=='tutorial') {
                    $.each(results, function (id, title) {
                        console.log(title);
                        // $.each(data.subcategories[0].subcategories,function(index,subcategory){
                        $('#post_detail').append('<option value="'+title.id+'">'+title.title+'</option>');
                        // })
                    });
                }else if (type_slide=='product') {
                    $.each(results, function (id, name) {
                        console.log(name);
                        // $.each(data.subcategories[0].subcategories,function(index,subcategory){
                        $('#post_detail').append('<option value="'+name.id+'">'+name.name+'</option>');
                        // })
                    });
                } else {
                    $('#post_detail').append('<option value="silde">Slide</option>');
                }
                
            }
			,error:function(){
				alert("Error");
			}
		});
	});
});
