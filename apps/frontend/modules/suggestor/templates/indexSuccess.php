<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
        <div>
                <input type = 'text' id = "searchString" placeholder = 'Search'>
                <div id = "results"  >
			<ul></ul>
		</div>
        </div>
<script>
$('#searchString').keyup(function(e) {
    $("#results ul").html('');
	clearTimeout($.data(this, 'timer'));
    if (e.keyCode == 13)
      search(true);
    else
      $(this).data('timer', setTimeout(search, 500));
});
function search(force) {
    existingString = $('#searchString').val();
	
	if (!force && existingString.length < 3) return; //wasn't enter, not > 2 char
    $.get('Search/query/' + existingString, function(data) {
        data = JSON.parse(data);
	for(var i = 0; i < data.length;i++){
		$("#results ul").append('<li>'+data[i]+'</li>');
	}
//	$('div#results').html(data);
  //      $('#results').show();
    });
}
</script>

</body>
</html>

