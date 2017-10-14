$(document).ready(function() {

	// Constant States
	
	//Visibility Option States
	var visibleState = "Visible ";
	var invisibleState = "Invisible ";
	var ppState = "Password Protected ";
	var visibilityFinalState = visibleState;

	// Publish Option States
	var selectedDay = $("#daySelected").val();
	var selectedMonth = $("#monthSelected").val();
	var selectedYear = $("#yearSelected").val();
	
	var immediatelyState = "Immediately ";
	var newDateState = selectedMonth + " " + selectedDay + ", " + selectedYear + " ";
	
	var publishBtnPublishText = "Publish";
	var publishBtnScheduleText = "Schedule";
	var publishFinalState = immediatelyState;
	var publishBtnFinalText = publishBtnPublishText;	
		
	// Visibility Default State
	var visibilityState = visibleState;

	// Publish Default State
	var publishState = immediatelyState;	
	
	// Publish Button Default State
	var publishBtnState = publishBtnPublishText;
	
	
	// * Units - Add New Option - Selected *
	$("#demo").trigger('click');
	// End of * Units - Add New Option - Selected *
		
	// Default Visibility Option
	$("#visibilityOptionSelected").text(visibilityFinalState);
	
	// Default Publish Option
	$("#publishOptionSelected").text(publishFinalState);
	
	// Default Publish Button Text
	$("#publishConfirmBtn").text(publishBtnFinalText);

	
	// * Visibility Options *
	$("#editVisibility").click(function() {
		
		// Hides 'Edit' Button When Pressed
		if ($("#editVisibility").hasClass("visible")) {
			$("#editVisibility").removeClass('visible').addClass('invisible');		 
		}
		
		// Checks Which Option Is Selected
		if (visibilityFinalState == visibleState) {
			 $("#visibilityOptionRadio1").prop("checked", true);
		}
		if (visibilityFinalState == invisibleState) { 
			 $("#visibilityOptionRadio2").prop("checked", true);
		}
		if (visibilityFinalState == ppState) {	 
			$("#visibilityOptionRadio3").prop("checked", true);
			
			// Opens The Password Panel
			$("#visibilityOptionRadio3").trigger('click');
		}
	});
	
	// Opens or Closes The Password Panel According To The Option Selected
	$("#visibilityOptionRadio1").click(function() {
		if($("#passwordField").css('display') == 'block'){
			$("#passwordField").slideToggle(200);
		}else{
			$("#passwordField").css('display') = 'none';
		}
	});

	$("#visibilityOptionRadio2").click(function() {
		if($("#passwordField").css('display') == 'block'){
			$("#passwordField").slideToggle(200);
		}
	});

	$("#visibilityOptionRadio3").click(function() {
		if($("#passwordField").css('display') == 'none'){
			$("#passwordField").slideToggle(200);
		}else{
			$("#passwordField").css('display') = 'block';
		}
	});
	
	// Appends The Option To The Visibility State  
	$('input[name="visibilityOptionRadio"]').on('change', function(){
		if ($(this).val()=='visibilityOption1') { 
			visibilityState = visibleState;
		} 
		if ($(this).val()=='visibilityOption2') { 
			visibilityState = invisibleState;
		} 
		if ($(this).val()=='visibilityOption3') { 
			visibilityState = ppState;
		} 
	});
	
	// Closes The Options Panel
	$("#cancelVisibility").click(function() {
		
		// Shows The 'Edit' Button Again
		if ($("#editVisibility").hasClass("invisible")) {
			$("#editVisibility").removeClass('invisible').addClass('visible');
		}
		
		// Closes The Password Panel If Opened
		if($("#passwordField").css('display') == 'block'){
			$("#passwordField").toggle();
		}
	});
	
	// Confirms The Selected Option
	$("#visibilityOkBtn").click(function() {	
		if ($("#editVisibility").hasClass("invisible")) {
			$("#editVisibility").removeClass('invisible').addClass('visible');
		}
		if($("#passwordField").css('display') == 'block'){
			$("#passwordField").toggle();
		}
		
		// Appends The Visibility State As Final State
		visibilityFinalState = visibilityState;
		
		// Shows The Selected Option Text
		$("#visibilityOptionSelected").text(visibilityFinalState);
	});
	// End of * Visibility Option *

	
	// * Publish Option *			
	$("#editPublish").click(function() {
		
		// Hides 'Edit' Button When Pressed
		if ($("#editPublish").hasClass("visible")) {
			$("#editPublish").removeClass('visible').addClass('invisible');		 
		}
		
		// Checks Which Option Is Selected
		if (publishFinalState == immediatelyState) { 
			 $("#publishOptionRadio1").prop("checked", true);
		}
		if (publishFinalState == newDateState) {	 
			$("#publishOptionRadio2").prop("checked", true);
			
			// Opens The Date Panel
			$("#publishOptionRadio2").trigger('click');
		}
	});

	// Opens or Closes The Date Panel According To The Option Selected	
	$("#publishOptionRadio1").click(function() {
		if($("#dateField").css('display') == 'block'){
			$("#dateField").slideToggle(200);
		}else{
			$("#dateField").css('display') = 'none';
		}
	});
	
	$("#publishOptionRadio2").click(function() {
		if($("#dateField").css('display') == 'none'){
			$("#dateField").slideToggle(200);
		}else{
			$("#dateField").css('display') = 'block';
		}
	});
	
	// Appends The Option To The Publish State And Publish Button State 
	$('input[name="publishOptionRadio"]').on('change', function(){
		if ($(this).val()=='publishOption1') { 
			publishState = immediatelyState;
			publishBtnState = publishBtnPublishText;
			
		} 
		if ($(this).val()=='publishOption2') { 			
			publishState = newDateState;
			publishBtnState = publishBtnScheduleText;
		}  
	});

	// Defines A New Date
	$('#monthSelected, #daySelected, #yearSelected').click(function () {
		if (this.id == 'monthSelected') {
			selectedMonth = $("#monthSelected").val();
		}else if (this.id == 'daySelected') {
				selectedDay = $("#daySelected").val();
		}else{
			selectedYear = $("#yearSelected").val();
		}
		newDateState = selectedMonth + " " + selectedDay + ", " + selectedYear + " ";
		publishState = newDateState;	
	});
	
	// Closes The Options Panel	
	$("#cancelPublish").click(function() {

		// Shows The 'Edit' Button Again
		if ($("#editPublish").hasClass("invisible")) {
			$("#editPublish").removeClass('invisible').addClass('visible');		 
		}
		
		// Closes The Date Panel If Opened
		if($("#dateField").css('display') == 'block'){
			$("#dateField").toggle();
		}else{
			$("#dateField").css('display') = 'none';
		}
	});
	
	// Confirms The Selected Option
	$("#publishOkBtn").click(function() {	
		if ($("#editPublish").hasClass("invisible")) {
			$("#editPublish").removeClass('invisible').addClass('visible');
		}
		if($("#dateField").css('display') == 'block'){
			$("#dateField").toggle();
		}
		
		// Appends The Publish State As Final State
		publishFinalState = publishState;
		
		// Appends The Final Text To The Publish Button
		publishBtnFinalText = publishBtnState;
		
		// Shows The Selected Option Text
		$("#publishOptionSelected").text(publishFinalState);
		
		// Shows The Selected Option Button Text
		$("#publishConfirmBtn").text(publishBtnFinalText);
	});
	// End of * Publish Option *
	
	
	// * Status Option *			
	$("#editStatus").click(function() {
		if ($("#editStatus").hasClass("visible")) {
			$("#editStatus").removeClass('visible').addClass('invisible');		 
		}
	});
			
	$("#cancelStatus").click(function() {
		if ($("#editStatus").hasClass("invisible")) {
			$("#editStatus").removeClass('invisible').addClass('visible');		 
		}
	});
	// End of * Status Option *
	
});