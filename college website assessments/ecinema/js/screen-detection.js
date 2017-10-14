// Mobile Portrait
var mql = window.matchMedia("only screen and (max-width:320px)");

// Tablet Portrait
var mql2 = window.matchMedia("only screen and (min-width:321px) and (max-width:768px)");

// Desktop
var mql3 = window.matchMedia("only screen and (min-width:769px)");

var w = window,
	d = document,
	e = d.documentElement,
	g = d.getElementsByTagName('body')[0],
	x = w.innerWidth || e.clientWidth || g.clientWidth,
	y = w.innerHeight|| e.clientHeight|| g.clientHeight,
	ref = document.referrer,
	urls = new Array("index.php","m.index.php"),
	n = ref.match(urls[0]),
	m = ref.match(urls[1]);

if (mql.matches){ // If media query matches
	if ((m!==null) || (n!==null)) {
		stop;
	}else if (ref=='') {
		var comment = "Mobile Screen Detected! Redirecting...";
		var newParagraph = document.createElement('p');
		newParagraph.textContent = comment;
		document.getElementById("message").appendChild(newParagraph);
		setTimeout(function () {
			window.location.href = "m.index.php"; //We will redirect to the Mobile Version Website
		}, 3000); //after 3 secs.
	}
}else if (mql2.matches){ // If media query matches
	if ((m!==null) || (n!==null)) {
		stop;
	}else if (ref=='') {
		var comment = "Tablet Screen Detected! Redirecting...";
		var newParagraph = document.createElement('p');
		newParagraph.textContent = comment;
		document.getElementById("message").appendChild(newParagraph);
		setTimeout(function () {
			window.location.href = "m.index.php"; //We will redirect to the Mobile Version Website
		}, 3000); //after 3 secs.
	}
}else{
	var comment = "Desktop Screen Detected! Redirecting...";
	var newParagraph = document.createElement('p');
	newParagraph.textContent = comment;
	document.getElementById("message").appendChild(newParagraph);
}

	
