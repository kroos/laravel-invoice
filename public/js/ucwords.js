// http://www.jquery4u.com/events/capitalize-letter-word-keypress/

//usage
// $("input").keyup(function() {
//    tch(this);
// });


////////////////////////////////////////////////////////////////////////////////////
// Title Case Helper
function tch(obj) {
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

////////////////////////////////////////////////////////////////////////////////////
// lower case helper
function lch(obj) {
	var mystring = obj.value;
	var sp = mystring.split('  ');
	var wl=0;
	var f ,r;
	var word = new Array();
	for (i = 0 ; i < sp.length ; i ++ ) {
		f = sp[i].substring(0,1).toLowerCase();
		r = sp[i].substring(1).toLowerCase();
		word[i] = f+r;
	}
	newstring = word.join('  ');
	obj.value = newstring;
	return true;
}

///////////////////////////////////////////////////////////////////////////////////////
// UPPER CASE HELPER
function uch(obj) {
	var mystring = obj.value;
	var sp = mystring.split(' ');
	var wl=0;
	var f ,r;
	var word = new Array();
	for (i = 0 ; i < sp.length ; i ++ ) {
		f = sp[i].substring(0,1).toUpperCase();
		r = sp[i].substring(1).toUpperCase();
		word[i] = f+r;
	}
	newstring = word.join(' ');
	obj.value = newstring;
	return true;
}
///////////////////////////////////////////////////////////////////////////////////////