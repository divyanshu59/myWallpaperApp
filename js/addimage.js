$(document).ready(function(){

	load_image_data();
	load_cato_data();

	function load_image_data(){
		$.ajax({
			url: "api/fetch.php",
			method: "POST",
			success:function(data)
			{
				$('#ShowAllWallpaper').html(data);
			}
		})
	}


function load_cato_data(){
		$.ajax({
			url: "api/fetchCato.php",
			method: "POST",
			success:function(data)
			{
				$('#ShowAllCategory').html(data);
			}
		})
	}
	

});
