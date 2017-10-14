var audio;

// Hide Pause Button on Start
$('#pause').hide();
	
// Initializer - Play First Track
initAudio($('#play-list li:first-child'));	

function initAudio(element){
	var track = element.attr('track');
	var cover = element.attr('cover');
    var title = element.text();

	// Creates a New Audio Object
	audio = new Audio('media/' + track);
	
	// Sets duration to '0' if the track is not playing
	if(!audio.currentTime){
		$('#duration').html('0.00');
	}

	// Adds track name
	$('#track-info .track-name').text(title);
	
	// Inserts Cover Image
	$('img.cover').attr('src','images/covers/' + cover);
	
	// Sets the track as selected (applies the 'blue colour' to the selection)
	$('#play-list li').find('a').removeClass('ui-btn-active');
    element.find('a').addClass('ui-btn-active');
	
	// Sets the track as 'active' or playing
	$('#play-list li').removeClass('active');
    element.addClass('active');
}

// Play Button
$('#play').click(function(){
	audio.play();
	$('#play').hide();
	$('#pause').show();
	$('#duration').fadeIn(400);
	showDuration();
});

// Pause Button
$('#pause').click(function(){
	audio.pause();
	$('#pause').hide();
	$('#play').show();
});
	
// Next Button
$('#next').click(function(){
    audio.pause();
    var next = $('#play-list li.active').next();
    if (next.length == 0) {
        next = $('#play-list li:first-child');
    }
    initAudio(next);
	audio.play();
	showDuration();
});

// Prev Button
$('#prev').click(function(){
    audio.pause();
    var prev = $('#play-list li.active').prev();
    if (prev.length == 0) {
        prev = $('#play-list li:last-child');
    }
    initAudio(prev);
	audio.play();
	showDuration();
});

// Plays Track on Click
$('#play-list li').click(function () {
    audio.pause();
    initAudio($(this));
	$('#play').hide();
	$('#pause').show();
	$('#duration').fadeIn(400);
	audio.play();
	showDuration();
});
 	
// Time Duration
function showDuration(){
	$(audio).bind('timeupdate', function(){
		// Get hours and minutes
		var s = parseInt(audio.currentTime % 60);
		var m = parseInt((audio.currentTime / 60) % 60);
		
		// Add 0 if seconds less than 10
		if (s < 10) {
			s = '0' + s;
		}
		$('#duration').html(m + ':' + s);	
		var value = 0;
		if (audio.currentTime > 0) {
			value = Math.floor((100 / audio.duration) * audio.currentTime);
			
			// Resets everything when the track ends
			if(audio.currentTime == audio.duration){
				value = 0;
				$('#duration').html('0.00');
				$('#pause').hide();
				$('#play').show();
			}
		}
		// Updates the progress bar
		$('#progress').val(value).slider('refresh');
	});
}