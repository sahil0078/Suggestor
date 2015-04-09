<html>
<head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
        <div class="form-group">
		<input type = 'text' class="form-control"  id = "searchString" placeholder = 'Search'>
                <div id = "results"  >
		</div>
        </div>
<script>
$('#searchString').keyup(function(e) {
    $("#results").html('');
	clearTimeout($.data(this, 'timer'));
    if (e.keyCode == 13)
      search(true);
    else
      $(this).data('timer', setTimeout(search, 500));
});

function fillList(data){
	
	for(var i = 0; i < data.length;i++){
                $("#results").append('<p>'+data[i].category+' in '+data[i].name+'</p>');
        }
}


function search(force) {
    existingString = $('#searchString').val();
	if(typeof(Storage) !== "undefined" && sessionStorage.getItem(existingString) != undefined){
		data = JSON.parse(sessionStorage.getItem(existingString));
		fillList(data);
		
	}else{	
//	if (!force && existingString.length < 3) return; //wasn't enter, not > 2 char
	if (existingString.length == 0) return; //wasn't enter, not > 2 char
    $.get('Search/query/' + existingString, function(data) {
	parsedData = JSON.parse(data);
	if(data.length != 0){
		sessionStorage.setItem(existingString,data);
	}
    	fillList(parsedData);
	});
 }
}
</script>

</body>
</html>

