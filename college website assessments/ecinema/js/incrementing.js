$(function() {

  $(".cart_quantity_button").append('<a class="inc button cart_quantity_up">+</a><a class="dec button cart_quantity_down">-</a>');

  $(".button").on("click", function() {

    var $button = $(this);
    var oldValue = $button.parent().find("input").val();

    if ($button.text() == "+") {
  	  var newVal = parseFloat(oldValue) + 1;
  	} else {
	   // Don't allow decrementing below one
      if (oldValue > 1) {
        var newVal = parseFloat(oldValue) - 1;
	    } else {
        newVal = 1;
      }
	  }

    $button.parent().find("input").val(newVal);

  });

});