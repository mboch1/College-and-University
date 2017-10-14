// Fade Out the Splashscreen after 5 Seconds.
$('#splashscreen').delay(3000).fadeOut(500);

// Show the Menu Panel when the Menu Button is pressed. 
$('#menuBtn').on('click', function () {
    var leftPanel = $('#menu-panel');
    if (leftPanel.hasClass("visible")) {
        leftPanel.removeClass('visible').animate({
            'left': '-800px'
        });
    } else {
        leftPanel.addClass('visible').animate({
            'left': '0'
        });
    }
    return false;
});

// Show the orange Overlay Panel when the Menu Button is pressed.  
$('#menuBtn').on('click', function () {
    var panelOverlay = $('#main-cover');
    if (panelOverlay.hasClass("visible")) {
        panelOverlay.removeClass('visible').addClass('invisible');		 
    } else {
        panelOverlay.removeClass('invisible').addClass('visible');
    }
    return false;
});

// Show the orange Overlay Panel when a Category One is pressed.  
$('.category-one').on('click', function () {
    var catOneOrangePanelOverlay = $('#category-one-overlay-btn');
	if (catOneOrangePanelOverlay.hasClass("invisible")) {
        catOneOrangePanelOverlay.removeClass('invisible').addClass('visible');
    }
	return false;
});

// Show the orange Overlay Panel when a Category Two is pressed.  
$('.category-two').on('click', function () {
    var catTwoOrangePanelOverlay = $('#category-two-overlay-btn');
	if (catTwoOrangePanelOverlay.hasClass("invisible")) {
        catTwoOrangePanelOverlay.removeClass('invisible').addClass('visible');
    }
	return false;
});

// Show the orange Overlay Panel Three when a Category Two is pressed.  
$('.category-three').on('click', function () {
    var catThreeOrangePanelOverlay = $('#category-three-overlay-btn');
	if (catThreeOrangePanelOverlay.hasClass("invisible")) {
        catThreeOrangePanelOverlay.removeClass('invisible').addClass('visible');
    }
	return false;
});

// Show the orange Overlay Panel Four when a Category Two is pressed.  
$('.category-four').on('click', function () {
    var catFourOrangePanelOverlay = $('#category-four-overlay-btn');
	if (catFourOrangePanelOverlay.hasClass("invisible")) {
        catFourOrangePanelOverlay.removeClass('invisible').addClass('visible');
    }
	return false;
});

// Show the orange Overlay Panel Four when a Category Two is pressed.  
$('.category-five').on('click', function () {
    var catFiveOrangePanelOverlay = $('#category-five-overlay-btn');
	if (catFiveOrangePanelOverlay.hasClass("invisible")) {
        catFiveOrangePanelOverlay.removeClass('invisible').addClass('visible');
    }
	return false;
});


/* Open Categories Panels */
// Opens Category One Products. 
$('.categoryOneBtn').click(function() {
	var categoryOneAllProducts = $('#view-all-products-by-category-panel-one');
	var menuPanel = $('#menu-panel');
	var menuPanelOverlayCover = $('#main-cover');
	
// Close The Menu Panel Before Open Another Panel	
	// If the Menu Panel is open close it.
	if (menuPanel.hasClass("visible")) {
        menuPanel.removeClass('visible').animate({
			'left': '-800px'
        });
    }
	 
	// If the orange Overlay Panel is open close it.
	if (menuPanelOverlayCover.hasClass("visible")) {
        menuPanelOverlayCover.removeClass('visible').addClass('invisible');	 
    }
// End
	
// Opens the Right Panel After Selection
	// Open Category One Panel
	categoryOneAllProducts.addClass('visible').animate({
		'right': '0'
    });
// End
	
    return false;
});

// Opens Category Two Products. 
$('.categoryTwoBtn').click(function() {
	var categoryTwoAllProducts = $('#view-all-products-by-category-panel-two');
	var menuPanel = $('#menu-panel');
	var menuPanelOverlayCover = $('#main-cover');
	
// Close The Menu Panel Before Open Another Panel	
	// If the Menu Panel is open close it.
	if (menuPanel.hasClass("visible")) {
        menuPanel.removeClass('visible').animate({
			'left': '-800px'
        });
    }
	 
	// If the orange Overlay Panel is open close it.
	if (menuPanelOverlayCover.hasClass("visible")) {
        menuPanelOverlayCover.removeClass('visible').addClass('invisible');	 
    }
// End
	
// Opens the Right Panel After Selection
	// Open Category Two Panel
	categoryTwoAllProducts.addClass('visible').animate({
		'right': '0'
    });
// End
	
    return false;
});

// Opens Category Three Products. 
$('.categoryThreeBtn').click(function() {
	var categoryThreeAllProducts = $('#view-all-products-by-category-panel-three');
	var menuPanel = $('#menu-panel');
	var menuPanelOverlayCover = $('#main-cover');
	
// Close The Menu Panel Before Open Another Panel	
	// If the Menu Panel is open close it.
	if (menuPanel.hasClass("visible")) {
        menuPanel.removeClass('visible').animate({
			'left': '-800px'
        });
    }
	 
	// If the orange Overlay Panel is open close it.
	if (menuPanelOverlayCover.hasClass("visible")) {
        menuPanelOverlayCover.removeClass('visible').addClass('invisible');	 
    }
// End
	
// Opens the Right Panel After Selection
	// Open Category Three Panel
	categoryThreeAllProducts.addClass('visible').animate({
		'right': '0'
    });
// End
	
    return false;
});

// Opens Category Four Products. 
$('.categoryFourBtn').click(function() {
	var categoryFourAllProducts = $('#view-all-products-by-category-panel-four');
	var menuPanel = $('#menu-panel');
	var menuPanelOverlayCover = $('#main-cover');
	
// Close The Menu Panel Before Open Another Panel	
	// If the Menu Panel is open close it.
	if (menuPanel.hasClass("visible")) {
        menuPanel.removeClass('visible').animate({
			'left': '-800px'
        });
    }
	 
	// If the orange Overlay Panel is open close it.
	if (menuPanelOverlayCover.hasClass("visible")) {
        menuPanelOverlayCover.removeClass('visible').addClass('invisible');	 
    }
// End
	
// Opens the Right Panel After Selection
	// Open Category Four Panel
	categoryFourAllProducts.addClass('visible').animate({
		'right': '0'
    });
// End
	
    return false;
});

// Opens Category Five Products. 
$('.categoryFiveBtn').click(function() {
	var categoryFiveAllProducts = $('#view-all-products-by-category-panel-five');
	var menuPanel = $('#menu-panel');
	var menuPanelOverlayCover = $('#main-cover');
	
// Close The Menu Panel Before Open Another Panel	
	// If the Menu Panel is open close it.
	if (menuPanel.hasClass("visible")) {
        menuPanel.removeClass('visible').animate({
			'left': '-800px'
        });
    }
	 
	// If the orange Overlay Panel is open close it.
	if (menuPanelOverlayCover.hasClass("visible")) {
        menuPanelOverlayCover.removeClass('visible').addClass('invisible');	 
    }
// End
	
// Opens the Right Panel After Selection
	// Open Category Five Panel
	categoryFiveAllProducts.addClass('visible').animate({
		'right': '0'
    });
// End
	
    return false;
});

// Opens Suggestions Products. 
$('.suggestionsBtn').click(function() {
	var randomProducts = $('#view-random-products-panel');
	var menuPanel = $('#menu-panel');
	var menuPanelOverlayCover = $('#main-cover');
	
// Close The Menu Panel Before Open Another Panel	
	// If the Menu Panel is open close it.
	if (menuPanel.hasClass("visible")) {
        menuPanel.removeClass('visible').animate({
			'left': '-800px'
        });
    }
	 
	// If the orange Overlay Panel is open close it.
	if (menuPanelOverlayCover.hasClass("visible")) {
        menuPanelOverlayCover.removeClass('visible').addClass('invisible');	 
    }
// End
	
// Opens the Right Panel After Selection
	// Open Suggestions Panel
	randomProducts.addClass('visible').animate({
		'right': '0'
    });
// End

    return false;
});

// Opens All Products.
$('.viewAllProductsBtn').click(function() {
	var allProducts = $('#view-all-products-panel');
	var menuPanel = $('#menu-panel');
	var menuPanelOverlayCover = $('#main-cover');
	
// Close The Menu Panel Before Open Another Panel	
	// If the Menu Panel is open close it.
	if (menuPanel.hasClass("visible")) {
        menuPanel.removeClass('visible').animate({
			'left': '-800px'
        });
    }
	 
	// If the orange Overlay Panel is open close it.
	if (menuPanelOverlayCover.hasClass("visible")) {
        menuPanelOverlayCover.removeClass('visible').addClass('invisible');	 
    }
// End
	
// Opens the Right Panel After Selection
	// Open Suggestions Panel	 
	allProducts.addClass('visible').animate({
		'right': '0'
    });
// End

    return false;
});

// Opens Login Panel.
$('.loginBtn').click(function() {
	var loginPanel = $('#login-panel');
	var menuPanel = $('#menu-panel');
	var menuPanelOverlayCover = $('#main-cover');
	
// Close The Menu Panel Before Open Another Panel	
	// If the Menu Panel is open close it.
	if (menuPanel.hasClass("visible")) {
        menuPanel.removeClass('visible').animate({
			'left': '-800px'
        });
    }
	 
	// If the orange Overlay Panel is open close it.
	if (menuPanelOverlayCover.hasClass("visible")) {
        menuPanelOverlayCover.removeClass('visible').addClass('invisible');	 
    }
// End
	
// Opens the Right Panel After Selection
	// Open Login Panel
	loginPanel.addClass('visible').animate({
		'right': '0'
    });
// End

    return false;
});

// Opens Register Panel. 
$('.registerBtn').click(function() {
	var registerPanel = $('#register-panel');

// Open Right Panels After Selection
	// Open Register Panel
	registerPanel.addClass('visible').animate({
		'right': '0'
    });	
    return false;
});

// Opens The Shopping Cart Panel.
$('.cartFromMenuBtn').click(function() {
	var shoppingCartPanel = $('#shopping-cart-panel');
	var menuPanel = $('#menu-panel');
	var menuPanelOverlayCover = $('#main-cover');
	
	$(".shopping-cart-box").fadeOut();
	
// Close The Menu Panel Before Open Another Panel	
	// If the Menu Panel is open close it.
	if (menuPanel.hasClass("visible")) {
        menuPanel.removeClass('visible').animate({
			'left': '-800px'
        });
    }
	 
	// If the orange Overlay Panel is open close it.
	if (menuPanelOverlayCover.hasClass("visible")) {
        menuPanelOverlayCover.removeClass('visible').addClass('invisible');	 
    }
// End
	
	// If the Shopping Cart Panel is open close it.
    if (shoppingCartPanel.hasClass("visible")) {
        shoppingCartPanel.removeClass('visible').animate({
            'right': '-800px'
        });
    } else {
        shoppingCartPanel.addClass('visible').animate({
            'right': '0'
        });
    }
    return false;
});


/* Enables Mouse Scroll on Some Panels */
$(window).scroll(function(){
	if ($('#view-all-products-panel').hasClass("visible")) {
		if ($(this).scrollTop() > 25) {
			$('#all-products-scroll-title').removeClass('all-products-title').addClass('all-products-title-fixed');
			$('#all-products-scroll-items').removeClass('all-products-title-items').addClass('all-products-title-items-fixed');
			$('#back-btn-left').removeClass('ui-back-btn-right').addClass('ui-back-btn-right-fixed');
		} else {
			$('#all-products-scroll-title').removeClass('all-products-title-fixed').addClass('all-products-title');
			$('#all-products-scroll-items').removeClass('all-products-title-items-fixed').addClass('all-products-title-items');
			$('#back-btn-left').removeClass('ui-back-btn-right-fixed').addClass('ui-back-btn-right');
		}
    }
	
	if ($('#view-all-products-by-category-panel-one').hasClass("visible")) {
		if ($(this).scrollTop() > 25) {
			$('#category-one-products-scroll-title').removeClass('category-one-product-title').addClass('category-one-product-title-fixed');
			$('#category-one-products-scroll-items').removeClass('category-one-product-title-items').addClass('category-one-product-title-items-fixed');
			$('#closeCategoryOneProducts').removeClass('ui-back-btn-right').addClass('ui-back-btn-right-fixed');
		} else {
			$('#category-one-products-scroll-title').removeClass('category-one-product-title-fixed').addClass('category-one-product-title');
			$('#category-one-products-scroll-items').removeClass('category-one-product-title-items-fixed').addClass('category-one-product-title-items');
			$('#closeCategoryOneProducts').removeClass('ui-back-btn-right-fixed').addClass('ui-back-btn-right');
		}
		if ($(this).scrollTop() > 100) {

		}
    }
	
	if ($('#view-all-products-by-category-panel-two').hasClass("visible")) {
		if ($(this).scrollTop() > 25) {
			$('#category-two-products-scroll-title').removeClass('category-two-product-title').addClass('category-two-product-title-fixed');
			$('#category-two-products-scroll-items').removeClass('category-two-product-title-items').addClass('category-two-product-title-items-fixed');
			$('#closeCategoryTwoProducts').removeClass('ui-back-btn-right').addClass('ui-back-btn-right-fixed');
		} else {
			$('#category-two-products-scroll-title').removeClass('category-two-product-title-fixed').addClass('category-two-product-title');
			$('#category-two-products-scroll-items').removeClass('category-two-product-title-items-fixed').addClass('category-two-product-title-items');
			$('#closeCategoryTwoProducts').removeClass('ui-back-btn-right-fixed').addClass('ui-back-btn-right');
		}
		if ($(this).scrollTop() > 100) {

		}
    }
	
	if ($('#view-all-products-by-category-panel-three').hasClass("visible")) {
		if ($(this).scrollTop() > 25) {
			$('#category-three-products-scroll-title').removeClass('category-three-product-title').addClass('category-three-product-title-fixed');
			$('#category-three-products-scroll-items').removeClass('category-three-product-title-items').addClass('category-three-product-title-items-fixed');
			$('#closeCategoryThreeProducts').removeClass('ui-back-btn-right').addClass('ui-back-btn-right-fixed');
		} else {
			$('#category-three-products-scroll-title').removeClass('category-three-product-title-fixed').addClass('category-three-product-title');
			$('#category-three-products-scroll-items').removeClass('category-three-product-title-items-fixed').addClass('category-three-product-title-items');
			$('#closeCategoryThreeProducts').removeClass('ui-back-btn-right-fixed').addClass('ui-back-btn-right');
		}
		if ($(this).scrollTop() > 25) {
			
		}
    }
	
	if ($('#view-all-products-by-category-panel-four').hasClass("visible")) {
		if ($(this).scrollTop() > 25) {
			$('#category-four-products-scroll-title').removeClass('category-four-product-title').addClass('category-four-product-title-fixed');
			$('#category-four-products-scroll-items').removeClass('category-four-product-title-items').addClass('category-four-product-title-items-fixed');
			$('#closeCategoryFourProducts').removeClass('ui-back-btn-right').addClass('ui-back-btn-right-fixed');
		} else {
			$('#category-four-products-scroll-title').removeClass('category-four-product-title-fixed').addClass('category-four-product-title');
			$('#category-four-products-scroll-items').removeClass('category-four-product-title-items-fixed').addClass('category-four-product-title-items');
			$('#closeCategoryFourProducts').removeClass('ui-back-btn-right-fixed').addClass('ui-back-btn-right');
		}
    }
	
	if ($('#view-all-products-by-category-panel-five').hasClass("visible")) {
		if ($(this).scrollTop() > 25) {
			$('#category-five-products-scroll-title').removeClass('category-five-product-title').addClass('category-five-product-title-fixed');
			$('#category-five-products-scroll-items').removeClass('category-five-product-title-items').addClass('category-five-product-title-items-fixed');
			$('#closeCategoryFiveProducts').removeClass('ui-back-btn-right').addClass('ui-back-btn-right-fixed');
		} else {
			$('#category-five-products-scroll-title').removeClass('category-five-product-title-fixed').addClass('category-five-product-title');
			$('#category-five-products-scroll-items').removeClass('category-five-product-title-items-fixed').addClass('category-five-product-title-items');
			$('#closeCategoryFiveProducts').removeClass('ui-back-btn-right-fixed').addClass('ui-back-btn-right');
		}
		if ($(this).scrollTop() > 100) {
			
		}
    }
	
	if ($('#view-random-products-panel').hasClass("visible")) {
		if ($(this).scrollTop() > 25) {
			$('#random-products-scroll').removeClass('random-products-title').addClass('random-products-title-fixed');
			$('#closeRandomProducts').removeClass('ui-back-btn-right').addClass('ui-back-btn-right-fixed');
		} else {
			$('#random-products-scroll').removeClass('random-products-title-fixed').addClass('random-products-title');
			$('#closeCategoryFiveProducts').removeClass('ui-back-btn-right-fixed').addClass('ui-back-btn-right');
		}
    }
	
});


/* Close Categories Panels */








// If the Menu Panel is open close it. 
$('.closeRandomProductsPanel').click(function() {
	var rightPanelOneTwo = $('#view-random-products-panel');

	// If the Category Panel is open close it.
    if (rightPanelOneTwo.hasClass("visible")) {
        rightPanelOneTwo.removeClass('visible').animate({
            'right': '-800px'
        });
    } else {
        rightPanelOneTwo.addClass('visible').animate({
            'right': '0'
        });
    }
    return false;
});

// If the Menu Panel is open close it. 
$('.closeShoppingCartPanel').click(function() {
	var rightPanelOneTwo = $('#shopping-cart-panel');

	// If the Category Panel is open close it.
    if (rightPanelOneTwo.hasClass("visible")) {
        rightPanelOneTwo.removeClass('visible').animate({
            'right': '-800px'
        });
    } else {
        rightPanelOneTwo.addClass('visible').animate({
            'right': '0'
        });
    }
    return false;
});

// If the Menu Panel is open close it. 
$('.closeLoginPanelBtn').click(function() {
	var rightPanelOneTwo = $('#login-panel');

	// If the Category Panel is open close it.
    if (rightPanelOneTwo.hasClass("visible")) {
        rightPanelOneTwo.removeClass('visible').animate({
            'right': '-800px'
        });
    } else {
        rightPanelOneTwo.addClass('visible').animate({
            'right': '0'
        });
    }
    return false;
});

// If the Menu Panel is open close it. 
$('.closeRegisterPanelBtn').click(function() {
	var rightPanelOneTwo = $('#register-panel');

	// If the Category Panel is open close it.
    if (rightPanelOneTwo.hasClass("visible")) {
        rightPanelOneTwo.removeClass('visible').animate({
            'right': '-800px'
        });
    } else {
        rightPanelOneTwo.addClass('visible').animate({
            'right': '0'
        });
    }
    return false;
});

$(".addtocartbtn").on("click", function() {
	//$('#cart-image').attr('src', 'images/cart_with_product.png'); 
    $(".alert").removeClass("in").show();
	$(".alert").delay(200).addClass("in").fadeOut(2000);
});

$(".product-one-image").on("click", function() {
	var zommImagePanelOverlayOne = $('#zoom-image-one');
	var zommImagePanelOverlayTwo = $('#zoom-image-two');
	var zommImagePanelOverlayThree = $('#zoom-image-three');
	var zommImagePanelOverlayFour = $('#zoom-image-four');
	var zommImagePanelOverlayFive = $('#zoom-image-five');
	var zommImagePanelOverlaySix = $('#zoom-image-six');
	var zommImagePanelOverlaySeven = $('#zoom-image-seven');
	
	if (zommImagePanelOverlayOne.hasClass("invisible")) {
        zommImagePanelOverlayOne.removeClass('invisible').addClass('visible');
    }
	
	if (zommImagePanelOverlayTwo.hasClass("invisible")) {
        zommImagePanelOverlayTwo.removeClass('invisible').addClass('visible');
    }

	if (zommImagePanelOverlayThree.hasClass("invisible")) {
        zommImagePanelOverlayThree.removeClass('invisible').addClass('visible');
    }
	
	if (zommImagePanelOverlayFour.hasClass("invisible")) {
        zommImagePanelOverlayFour.removeClass('invisible').addClass('visible');
    }
	
	if (zommImagePanelOverlayFive.hasClass("invisible")) {
        zommImagePanelOverlayFive.removeClass('invisible').addClass('visible');
    }

	if (zommImagePanelOverlaySix.hasClass("invisible")) {
        zommImagePanelOverlaySix.removeClass('invisible').addClass('visible');
    }
	
	if (zommImagePanelOverlaySeven.hasClass("invisible")) {
        zommImagePanelOverlaySeven.removeClass('invisible').addClass('visible');
    }
});


$(".close-product-image").on("click", function() {
	var zommImagePanelOverlayOne = $('#zoom-image-one');
	var zommImagePanelOverlayTwo = $('#zoom-image-two');
	var zommImagePanelOverlayThree = $('#zoom-image-three');
	var zommImagePanelOverlayFour = $('#zoom-image-four');
	var zommImagePanelOverlayFive = $('#zoom-image-five');
	var zommImagePanelOverlaySix = $('#zoom-image-six');
	var zommImagePanelOverlaySeven = $('#zoom-image-seven');
	
	if (zommImagePanelOverlayOne.hasClass("visible")) {
        zommImagePanelOverlayOne.removeClass('visible').addClass('invisible');
    }

	if (zommImagePanelOverlayTwo.hasClass("visible")) {
        zommImagePanelOverlayTwo.removeClass('visible').addClass('invisible');
    }
	
	if (zommImagePanelOverlayThree.hasClass("visible")) {
        zommImagePanelOverlayThree.removeClass('visible').addClass('invisible');
    }
	
	if (zommImagePanelOverlayFour.hasClass("visible")) {
        zommImagePanelOverlayFour.removeClass('visible').addClass('invisible');
    }
	
	if (zommImagePanelOverlayFive.hasClass("visible")) {
        zommImagePanelOverlayFive.removeClass('visible').addClass('invisible');
    }
	
	if (zommImagePanelOverlaySix.hasClass("visible")) {
        zommImagePanelOverlaySix.removeClass('visible').addClass('invisible');
    }
	
	if (zommImagePanelOverlaySeven.hasClass("visible")) {
        zommImagePanelOverlaySeven.removeClass('visible').addClass('invisible');
    }
});

// Close the Category Panel and go back to the Home page. 
$('.backBtn').click(function() {
	var catOneOrangePanelOverlay = $('#category-one-overlay-btn');
	var catTwoOrangePanelOverlay = $('#category-two-overlay-btn');
	var catThreeOrangePanelOverlay = $('#category-three-overlay-btn');
	var catFourOrangePanelOverlay = $('#category-four-overlay-btn');
	var catFiveOrangePanelOverlay = $('#category-five-overlay-btn');
	
	var rightPanelOne = $('#product-list-view-panel-one');
	var rightPanelTwo = $('#product-list-view-panel-two');
	var rightPanelThree = $('#product-list-view-panel-three');
	var rightPanelFour = $('#product-list-view-panel-four');
	var rightPanelFive = $('#product-list-view-panel-five');
	
	if (catOneOrangePanelOverlay.hasClass("visible")) {
        catOneOrangePanelOverlay.removeClass('visible').addClass('invisible');
    }
	
	if (catTwoOrangePanelOverlay.hasClass("visible")) {
        catTwoOrangePanelOverlay.removeClass('visible').addClass('invisible');
    }
	
	if (catThreeOrangePanelOverlay.hasClass("visible")) {
        catThreeOrangePanelOverlay.removeClass('visible').addClass('invisible');
    }
	
	if (catFourOrangePanelOverlay.hasClass("visible")) {
        catFourOrangePanelOverlay.removeClass('visible').addClass('invisible');
    }
	
	if (catFiveOrangePanelOverlay.hasClass("visible")) {
        catFiveOrangePanelOverlay.removeClass('visible').addClass('invisible');
    }
	
	if (rightPanelOne.hasClass("visible")) {
		rightPanelOne.removeClass('visible').animate({
			'right': '-800px'
		});
	}
	
	if (rightPanelTwo.hasClass("visible")) {
		rightPanelTwo.removeClass('visible').animate({
			'right': '-800px'
		});
	}
	
	if (rightPanelThree.hasClass("visible")) {
		rightPanelThree.removeClass('visible').animate({
			'right': '-800px'
		});
	}
	
	if (rightPanelFour.hasClass("visible")) {
		rightPanelFour.removeClass('visible').animate({
			'right': '-800px'
		});
	}
	
	if (rightPanelFive.hasClass("visible")) {
		rightPanelFive.removeClass('visible').animate({
			'right': '-800px'
		});
	}
	return false;
});

// Close the Sub-Category Panel and go back to the Category Panel. 
$('.backBtn2').click(function() {
	var rightPanelTwo = $('#view-all-products-panel');
	// Needs to be fixed...
//	var rightPanelThree = $('#all-products-list-view-title');
	
//	$('html, body').animate({
//		scrollTop: $("#view-all-products-panel").offset().top-60}, 0);

//	if (rightPanelThree.hasClass("visible")) {
//        rightPanelThree.removeClass('visible').addClass('invisible');	 
//    }
					
	if (rightPanelTwo.hasClass("visible")) {
		rightPanelTwo.removeClass('visible').animate({
			'right': '-800px'
		});
	}
	
	return false;
});

// Close the Sub-Category Panel and go back to the Category Panel. 
$('.backToProductsByCategoryListBtn').click(function() {
	var rightPanelTwoOne = $('#view-all-products-by-category-panel-one');
	var rightPanelTwoTwo = $('#view-all-products-by-category-panel-two');
	var rightPanelTwoThree = $('#view-all-products-by-category-panel-three');
	var rightPanelTwoFour = $('#view-all-products-by-category-panel-four');
	var rightPanelTwoFive = $('#view-all-products-by-category-panel-five');
	
	if (rightPanelTwoOne.hasClass("visible")) {
		rightPanelTwoOne.removeClass('visible').animate({
			'right': '-800px'
		});
	}
	
	if (rightPanelTwoTwo.hasClass("visible")) {
		rightPanelTwoTwo.removeClass('visible').animate({
			'right': '-800px'
		});
	}
	
	if (rightPanelTwoThree.hasClass("visible")) {
		rightPanelTwoThree.removeClass('visible').animate({
			'right': '-800px'
		});
	}
	
	if (rightPanelTwoFour.hasClass("visible")) {
		rightPanelTwoFour.removeClass('visible').animate({
			'right': '-800px'
		});
	}
	
	if (rightPanelTwoFive.hasClass("visible")) {
		rightPanelTwoFive.removeClass('visible').animate({
			'right': '-800px'
		});
	}
	return false;
});

// Close the Product Title View Panel and go back to previous panel. 
$('.backBtn3').click(function() {
	var productOneOrangePanelOverlay = $('#product-one-overlay-btn');
	var rightPanelThree = $('#single-product-view-panel');
	
	if (productOneOrangePanelOverlay.hasClass("visible")) {
        productOneOrangePanelOverlay.removeClass('visible').addClass('invisible');
    }
	
	if (rightPanelThree.hasClass("visible")) {
		rightPanelThree.removeClass('visible').animate({
			'right': '-800px'
		});
	}
	return false;
});

// Close the Product Title View Panel and go back to previous panel. 
$('.backBtn4').click(function() {
	var productOneOrangePanelOverlay = $('#product-one-overlay-btn');
	var rightPanelFour = $('#right-panel-four');
	
	if (productOneOrangePanelOverlay.hasClass("visible")) {
        productOneOrangePanelOverlay.removeClass('visible').addClass('invisible');
    }
	
	if (rightPanelFour.hasClass("visible")) {
		rightPanelFour.removeClass('visible').animate({
			'right': '-800px'
		});
	}
	return false;
});

// Close the Sub-Category Panel and go back to the Category Panel. 
$('.backToHomePageBtn').click(function() {
	var rightPanelSix = $('#login-panel');
	
	if (rightPanelSix.hasClass("visible")) {
		rightPanelSix.removeClass('visible').animate({
			'right': '-800px'
		});
	}
	return false;
});

//Add Item to Cart
$(".item-box button").click(function(e){ //user click "add to cart" button
	e.preventDefault(); 
	var button_content = $(this); //this triggered button
	var iqty = $(this).parent().children("select.p-qty").val(); //get quantity 
	var i_id = $(this).parent().children("input.p-id").val(); //get product code
	button_content.html('Adding...'); //Loading button text 
	//button_content.attr('disabled','disabled'); //disable button before Ajax request
	$.ajax({ //make ajax request to cart_process.php
		url: "cart_process.php",
		type: "POST",
		dataType:"json", //expect json value from server
		data: { quantity: iqty, product_id: i_id}
	}).done(function(data){ //on Ajax success
	 	//$("#cart-info").html(data.items); //total items in cart-info element
		button_content.html('Add to Cart'); //reset button text to original text
		//alert("Item added to Cart!"); //alert user
		if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
			$(".cart-box").trigger( "click" ); //trigger click to update the cart box.
		}
	})
});

//Show Items in Cart
$( ".cart-box").click(function(e) { //when user clicks on cart box
	e.preventDefault(); 
	$(".shopping-cart-box").fadeIn(); //display cart box
	$("#shopping-cart-results").html('<img class="cart-loading-items" src="images/ajax-loader.gif">'); //show loading image
	$("#shopping-cart-results" ).load( "cart_process.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
});

//Close Cart
$( ".close-shopping-cart-box").click(function(e){ //user click on cart box close link
	e.preventDefault(); 
	$(".shopping-cart-box").fadeOut(); //close cart-box
});

//Remove items from cart
$("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
	e.preventDefault(); 
	var pid = $(this).attr("prod-id"); //get product id
	$(this).parent().fadeOut(); //remove item element from box
	$.getJSON( "cart_process.php", {"remove_id":pid} , function(data){ //get Item count from Server
		$(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
	});
	
	$("#cart_item_list_result").html('<img class="cart-loading-items" src="images/ajax-loader.gif">'); //show loading image
	$("#cart_item_list_result" ).load( "view_cart.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
});

//Show Items in Shopping Cart Panel
$( ".cartFromMenuBtn").click(function(e) { //when user clicks on cart box
	e.preventDefault(); 
	$("#cart_item_list_result").html('<img class="cart-loading-items" src="images/ajax-loader.gif">'); //show loading image
	$("#cart_item_list_result" ).load( "view_cart.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
});








/* Back to Home Page*/ 
$('.backToHomePageBtn').click(function() {
	var categoryOneAllProducts = $('#view-all-products-by-category-panel-one');
	var categoryTwoAllProducts = $('#view-all-products-by-category-panel-two');
	var categoryThreeAllProducts = $('#view-all-products-by-category-panel-three');
	var categoryFourAllProducts = $('#view-all-products-by-category-panel-four');
	var categoryFiveAllProducts = $('#view-all-products-by-category-panel-five');
	
	var categoryOneOrangePanelOverlay = $('#category-one-overlay-btn');
	var categoryTwoOrangePanelOverlay = $('#category-two-overlay-btn');
	var categoryThreeOrangePanelOverlay = $('#category-three-overlay-btn');
	var categoryFourOrangePanelOverlay = $('#category-four-overlay-btn');
	var categoryFiveOrangePanelOverlay = $('#category-five-overlay-btn');
	
	
	// Close All Categories If Visible
	if (categoryOneAllProducts.hasClass("visible")) {
		categoryOneAllProducts.removeClass('visible').animate({
			'right': '-800px'
		});
	}
	
	if (categoryTwoAllProducts.hasClass("visible")) {
		categoryTwoAllProducts.removeClass('visible').animate({
			'right': '-800px'
		});
	}
	
	if (categoryThreeAllProducts.hasClass("visible")) {
		categoryThreeAllProducts.removeClass('visible').animate({
			'right': '-800px'
		});
	}
	
	if (categoryFourAllProducts.hasClass("visible")) {
		categoryFourAllProducts.removeClass('visible').animate({
			'right': '-800px'
		});
	}
	
	if (categoryFiveAllProducts.hasClass("visible")) {
		categoryFiveAllProducts.removeClass('visible').animate({
			'right': '-800px'
		});
	}
	
	// Close All Orange Overlay Panel on Categories If Visible
	if (categoryOneOrangePanelOverlay.hasClass("visible")) {
        categoryOneOrangePanelOverlay.removeClass('visible').addClass('invisible');
    }
	
	if (categoryTwoOrangePanelOverlay.hasClass("visible")) {
        categoryTwoOrangePanelOverlay.removeClass('visible').addClass('invisible');
    }

	if (categoryThreeOrangePanelOverlay.hasClass("visible")) {
        categoryThreeOrangePanelOverlay.removeClass('visible').addClass('invisible');
    }

	if (categoryFourOrangePanelOverlay.hasClass("visible")) {
        categoryFourOrangePanelOverlay.removeClass('visible').addClass('invisible');
    }

	if (categoryFiveOrangePanelOverlay.hasClass("visible")) {
        categoryFiveOrangePanelOverlay.removeClass('visible').addClass('invisible');
    }
	
	return false;
});







 
/* Disables Mouse Wheel Scrolling*/
$(document).ready(function(){
    
	$('#splashscreen').on({
		'mousewheel': function(e) {
			e.preventDefault();
			e.stopPropagation();
		}
	})
});

$(document).ready(function(){
    
	$('#menu-panel').on({
		'mousewheel': function(e) {
			e.preventDefault();
			e.stopPropagation();
		}
	})
});

$(document).ready(function(){
    
	$('#myCarousel').on({
		'mousewheel': function(e) {
			e.preventDefault();
			e.stopPropagation();
		}
	})
});

$(document).ready(function(){
    
	$('#home-page-container').on({
		'mousewheel': function(e) {
			e.preventDefault();
			e.stopPropagation();
		}
	})
});

$(document).ready(function(){
    
	$('#main-cover').on({
		'mousewheel': function(e) {
			e.preventDefault();
			e.stopPropagation();
		}
	})
});

$(document).ready(function(){
    
	$('#product-list-view-panel-one').on({
		'mousewheel': function(e) {
			e.preventDefault();
			e.stopPropagation();
		}
	})
});

$(document).ready(function(){
    
	$('#view-all-products-by-category-panel').on({
		'mousewheel': function(e) {
			e.preventDefault();
			e.stopPropagation();
		}
	})
});

$(document).ready(function(){
    
	$('#single-product-view-panel').on({
		'mousewheel': function(e) {
			e.preventDefault();
			e.stopPropagation();
		}
	})
});

$(document).ready(function(){
    
	$('#shopping-cart-panel').on({
		'mousewheel': function(e) {
			e.preventDefault();
			e.stopPropagation();
		}
	})
});

$(document).ready(function(){
    
	$('#login-panel').on({
		'mousewheel': function(e) {
			e.preventDefault();
			e.stopPropagation();
		}
	})
});

$(document).ready(function(){
    
	$('#register-panel').on({
		'mousewheel': function(e) {
			e.preventDefault();
			e.stopPropagation();
		}
	})
});

/* Disables Arrow Keys Scrolling*/
$(document).keydown(function (e) {
     if (e.keyCode > 36 && e.keyCode < 41){ 
		e.preventDefault();
	 }
});


