$(document).ready(function(){
    $.getJSON('../data/quotes.json',function(data){
        items=data.quotes;
        var dayNum=getNumberofDays();
        console.log(dayNum);
        quotedisplay(dayNum);
})
    function getNumberofDays(){
        //Creates a new date object that store's todays date
        var today = new Date();
        //New date object for first day of this year
        var first = new Date(today.getFullYear(), 0, 0);
        var difference = today - first;
        //Difference needs to be divided by 86,400,000 as that's how many milliseconds there are in a day.
        dayNum = Math.floor(difference / (1000 * 60 * 60 * 24));
        return dayNum;
    }
    function quotedisplay(dayNum){
        var curIndex=dayNum%items.length;
        var quoteObj=items[curIndex];
        $("p:nth-child(1)").html(quoteObj.quote);
        $("p:nth-child(2)").html(quoteObj.author);
    }
    $('#left').click(function(){
        if(dayNum!=0)
        dayNum-=1;
        else
           dayNum = 237;
         
        quotedisplay(dayNum);
 
    });
    $('#right').click(function(){
   
        dayNum+=1;
        quotedisplay(dayNum);
});
document.addEventListener('keydown', function(event) {
    if (!$(event.target).is('#searchbox')) {
        if (event.key === 'p' || event.key === 'P') {
            $('#left').click();
        }
        if (event.key === 'n' || event.key === 'N') {
            $('#right').click();
        }
    }
});
});