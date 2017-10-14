//renamed values and ID's to make it workable 

var audio2;

// Hide Pause Button on Start
$('#pause2').hide();
	
// Initializer - Play First Track
initAudio2($('#play-list2 li:first-child'));	

function initAudio2(element){
	var track2 = element.attr('track');
	var cover2 = element.attr('cover');
    var title2 = element.text();

	// Creates a New Audio Object
	audio2 = new Audio('media/' + track2);
	
	// Sets duration to '0' if the track is not playing
	if(!audio2.currentTime){
		$('#duration2').html('0.00');
	}

	// Adds track name
	$('#track-info2 .track-name').text(title2);
	
	// Inserts Cover Image
	$('img.cover').attr('src','images/covers/' + cover2);
	
	// Sets the track as selected (applies the 'blue colour' to the selection)
	$('#play-list2 li').find('a').removeClass('ui-btn-active');
    element.find('a').addClass('ui-btn-active');
	
	// Sets the track as 'active' or playing
	$('#play-list2 li').removeClass('active');
    element.addClass('active');
}

// Play Button
$('#play2').click(function(){
	audio2.play();
	$('#play2').hide();
	$('#pause2').show();
	$('#duration2').fadeIn(400);
	showDuration2();
});

// Pause Button
$('#pause2').click(function(){
	audio2.pause();
	$('#pause2').hide();
	$('#play2').show();
});
	
// Next Button
$('#next2').click(function(){
    audio2.pause();
    var next = $('#play-list2 li.active').next();
    if (next.length == 0) {
        next = $('#play-list2 li:first-child');
    }
    initAudio2(next);
	audio2.play();
	showDuration2();
});

// Prev Button
$('#prev2').click(function(){
    audio2.pause();
    var prev = $('#play-list2 li.active').prev();
    if (prev.length == 0) {
        prev = $('#play-list2 li:last-child');
    }
    initAudio2(prev);
	audio2.play();
	showDuration2();
});

// Plays Track on Click
$('#play-list2 li').click(function () {
    audio2.pause();
    initAudio2($(this));
	$('#play2').hide();
	$('#pause2').show();
	$('#duration2').fadeIn(400);
	audio2.play();
	showDuration2();
});
 	
// Time Duration
function showDuration2(){
	$(audio2).bind('timeupdate', function(){
		// Get hours and minutes
		var s = parseInt(audio2.currentTime % 60);
		var m = parseInt((audio2.currentTime / 60) % 60);
		
		// Add 0 if seconds less than 10
		if (s < 10) {
			s = '0' + s;
		}
		$('#duration2').html(m + ':' + s);	
		var value = 0;
		if (audio2.currentTime > 0) {
			value = Math.floor((100 / audio2.duration) * audio2.currentTime);
			
			// Resets everything when the track ends
			if(audio2.currentTime == audio2.duration){
				value = 0;
				$('#duration2').html('0.00');
				$('#pause2').hide();
				$('#play2').show();
			}
		}
		// Updates the progress bar
		$('#progress2').val(value).slider('refresh');
	});
}