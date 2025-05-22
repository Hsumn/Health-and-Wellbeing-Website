$(document).ready(function(){
$('#searchbtn').click(function (e){
        $('#results').html("");
        e.preventDefault();
        var keyword = $('#searchbox').val().toLowerCase();
        console.log(keyword);
        if(keyword){
            $.getJSON('../data/quotes.json',function(data){
                items = data.quotes;
                console.log(items);
                var output = '';
                var i=0;
                for(i=0;i<items.length;i++){
                    if(items[i].quote.toLowerCase().includes(keyword) || items[i].author.toLowerCase().includes(keyword)){
                        output='<blockquote>'+"<p>"+items[i].quote+"</p><p>"+items[i].author+"</p> </blockquote></blockquote>";
                        console.log(output);
                        $('#results').append(output);
                    }
                }
             })
        }
    })
})
document.addEventListener('keydown', function(event) {
    if((event.key === 's' || event.key === 'S') && document.activeElement !== document.getElementById('searchbox')) { 
        event.preventDefault();
        $('#searchbox').focus();
    }
})