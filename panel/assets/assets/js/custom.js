$(document).ready(function(){

	

	$(".sortable").sortable();

	$(".content-container, .image_list_container").on('click', '.remove-btn', function(){

		var $data_url = $(this).data("url");
		Swal.fire({
			title: 'Emin misiniz?',
			text: "Bu işlemi geri alamayacaksınız!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Evet, Sil!',
			cancelButtonText: "Hayır"
		}).then((result) => {
			if (result.value) {
				window.location.href = $data_url;
				Swal.fire(
					'Silindi!',
					
					)
				
			}
		});

	})

	$(".content-container, .image_list_container").on('change', '.isActive', function(){

		var $data     = $(this).prop("checked");
		var $data_url = $(this).data("url");

		if(typeof $data !== "undefined" && typeof $data_url !== "undefined"){

			$.post($data_url, { data : $data }, function(response){

				

			});
		} 

	})

    //image_list_container class ı içerisindeki isCover elementini dinlemek istiyorum. bunun için 'change' eventini dinler değişikliği kaydederim.

	$(".image_list_container").on('change', '.isCover', function(){

		var $data     = $(this).prop("checked");
		var $data_url = $(this).data("url");

		if(typeof $data !== "undefined" && typeof $data_url !== "undefined"){

			$.post($data_url, { data : $data }, function(response){

				
				$(".image_list_container").html(response);
				$('[data-switchery]').each(function(){
					var $this = $(this),
					color = $this.attr('data-color') || '#188ae2',
					jackColor = $this.attr('data-jackColor') || '#ffffff',
					size = $this.attr('data-size') || 'default'

					new Switchery(this, {
						color: color,
						size: size,
						jackColor: jackColor
					});
				});
				$(".sortable").sortable();

			});
		} 

	})

	$(".content-container, .image_list_container").on('sortupdate', '.sortable', function(event,ui){

		var $data = $(this).sortable("serialize");
		var $data_url = $(this).data("url");

		$.post($data_url , {data : $data} , function(response){

			

		})
	})

	var uploadSection = Dropzone.forElement("#dropzone");

	uploadSection.on("complete",function(file){
		var $data_url = $("#dropzone").data("url");

     //console.log(file);

     $.post($data_url, {}, function(response){

     	$(".image_list_container").html(response);
     	$('[data-switchery]').each(function(){
     		var $this = $(this),
     		color = $this.attr('data-color') || '#188ae2',
     		jackColor = $this.attr('data-jackColor') || '#ffffff',
     		size = $this.attr('data-size') || 'default'

     		new Switchery(this, {
     			color: color,
     			size: size,
     			jackColor: jackColor
     		});
     	});
     	$(".sortable").sortable();

     });
 })


	

	
})
