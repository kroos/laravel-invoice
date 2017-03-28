http://www.jquery4u.com/events/capitalize-letter-word-keypress/

//usage
$("input").keyup(function() {
   toUpper(this);
});


//function
function toUpper(obj) {
    var mystring = obj.value;
    var sp = mystring.split(' ');
    var wl=0;
    var f ,r;
    var word = new Array();
    for (i = 0 ; i < sp.length ; i ++ ) {
        f = sp[i].substring(0,1).toUpperCase();
        r = sp[i].substring(1).toLowerCase();
        word[i] = f+r;
    }
    newstring = word.join(' ');
    obj.value = newstring;
    return true;   
}