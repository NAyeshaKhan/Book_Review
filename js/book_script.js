$(document).ready(function(){
	$("#searchform").submit(function(){
		var search=$("#books").val();
		if (search==''){
			alert("Type your search into the bar.");
		}else{
			var url='';
			var img='';
			var title='';
			var author='';
			
			$.get("https://www.googleapis.com/books/v1/volumes?q= " + search, function(response){
				console.log(response);
			});
			
		}
	});
	
});