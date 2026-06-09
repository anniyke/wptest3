/*  CLEAR SCROLL POSITION ON RESIZE    */
// Scroll top if resized from small to large for homepage

jQuery.fn.extend({
  classList: function( value ) {
    if( value ){
      if( jQuery.isArray(value)){
        this.attr('class', '')
        for(var i in value){
          this.addClass(value[i])
        }
        return this;
      }
      if( typeof value == 'string'){          
        this.attr('class', '').addClass(value);
        return this;
      }
    }
    return this.attr('class').split(/\s+/)
  }
});

;(function ($) {

  "use strict";

    /*  SCROLL ANIMATION BEGINS    */

    // SETTERS

    var toogleScrollEvent = true;
    // in future scroll count equals index and equals lenght of array - 5
    var index = $('.pxl-gallery-scroll').data('item');
    var count_item_min = $('.pxl-gallery-scroll').data('item');
    var scrollDirection = '';


    // GETTERS

    // Array of page numbers 01 - 05
    var pagesArray = $('.pxl-gallery--nav .pxl-group--number .pxl-item--number');
    const lastPage = pagesArray[0];
    const firstPage = pagesArray[pagesArray.length - 1];

    // Array of image slides left side
    var slidesArrayLeft = $('.pxl-gallery-front .pxl--item');
    const lastSlideLeft = slidesArrayLeft[0];
    const firstSlideLeft = slidesArrayLeft[slidesArrayLeft.length - 1];

    // Animation on scroll forward / DOWN
    function animateDown() {

        // Beginning of loop
        if (index > 0) {


            // ANIMATE TITLES AND SLIDES
            // TITLES
            // Drop current down
            // SLIDES
            // Drop current down
            slidesArrayLeft[index].classList.remove('active');
            // wait until current animated


            setTimeout(function () {
                // TITLES
                // SLIDES
                slidesArrayLeft[index - 1].classList.add('active');

                index--;
                
                // Drop pagination rotated
                $('.pxl-gallery--nav .rotated').removeClass('rotated');

            }, 900);


            // ANIMATE PAGINATION
            // Rotate current down
            pagesArray[index].classList.add('rotated');
            pagesArray[index].classList.remove('active');
            // Show next number
            pagesArray[index - 1].classList.add('active');
            pagesArray[index - 1].classList.remove('rotated');
            // Drop styles for rotated
            if (pagesArray[index + 1]) {
                pagesArray[index + 1].classList.remove('rotated');
            }

        } else {

            // ANIMATE TITLES AND SLIDES
            // Start loop over
            // Drop last element
            // TITLES
            // SLIDES
            lastSlideLeft.classList.remove('active');
            // wait until current animated
            setTimeout(function () {
                // Show first element
                // TITLES
                // SLIDES
                firstSlideLeft.classList.add('active');
                // Drop index to initial
                index = count_item_min;

                // Call loop over
                // myLoop();
                // duration = transition in styles

                // Drop pagination rotated
                $('.pxl-gallery--nav .rotated').removeClass('rotated');

            }, 900);


            // ANIMATE PAGINATION
            // Rotate last element
            lastPage.classList.add('rotated');
            lastPage.classList.remove('active');

            // Show first element
            firstPage.classList.add('active');
            firstPage.classList.remove('rotated');

            // Drop styles for prev last element
            pagesArray[index + 1].classList.remove('rotated');

        }


    }


    // Animation on scroll backward / UP
    function animateUp() {

        // Beginning of loop
        if (index < count_item_min) {


            // ANIMATE TITLES AND SLIDES
            // TITLES
            // SLIDES
            // Drop current down
            slidesArrayLeft[index].classList.remove('active');


            // wait until current animated
            setTimeout(function () {
                // TITLES
                // SLIDES
                slidesArrayLeft[index + 1].classList.add('active');

                index++;

                // Drop pagination rotated
                $('.pxl-gallery--nav .rotated').removeClass('rotated');

                // duration = transition in styles
            }, 900);


            // ANIMATE PAGINATION
            firstPage.classList.remove('rotated');

            // Rotate current down
            pagesArray[index].classList.add('rotated');
            pagesArray[index].classList.remove('active');
            // Show next number
            pagesArray[index + 1].classList.add('active');
            pagesArray[index + 1].classList.remove('rotated');
            // Drop styles for rotated
            if (pagesArray[index - 1]) {
                pagesArray[index - 1].classList.remove('rotated');
            }


        } else {

            // ANIMATE TITLES AND SLIDES
            // Start loop over
            // Drop first element
            // TITLES
            // SLIDES
            firstSlideLeft.classList.remove('active');
            // wait until current animated
            setTimeout(function () {
                // Show last element
                // TITLES
                // SLIDES
                lastSlideLeft.classList.add('active');
                // Drop index to last
                index = 0;

                // Drop pagination rotated
                 $('.pxl-gallery--nav .rotated').removeClass('rotated');

            }, 900);


            // ANIMATE PAGINATION
            // Rotate first element
            firstPage.classList.add('rotated');
            firstPage.classList.remove('active');

            // Show last element
            lastPage.classList.add('active');
            lastPage.classList.remove('rotated');

            // Drop styles for prev first element
            pagesArray[index - 1].classList.remove('rotated');


        }
    }


    // Main loop for animation
    function myLoop() {

        // Scrolled down
        if (scrollDirection === 'down') {
            animateDown();
        } else {
            animateUp();
        }
    }


    // Global animation for desktop
    function animate() {
        // Get scroll direction
        if (event.deltaY > 0) {
            scrollDirection = 'down';
        } else if (event.deltaY < 0) {
            scrollDirection = 'up';
        }
        myLoop();

        // Run animation
        setTimeout(function () {
            $('.page').bind('mousewheel', wheelHandler);
            toogleScrollEvent = true;
        }, 2000);
    }

    // Global animation for mobile devices
    function animateMobile() {
        // Get scroll direction
        if (swipeDirection === 'down') {
            scrollDirection = 'down';
        } else if (swipeDirection === 'up') {
            scrollDirection = 'up';
        }
        myLoop();

        // Run animation
        setTimeout(function () {
            mc.on("swipedown", function (e) {
                // scroll down analog - next items animation
                swipeDirection = 'up';
                swipeHandler();
            });

            mc.on("swipeup", function (e) {
                // scroll up analog - previuos items animation
                swipeDirection = 'down';
                swipeHandler();
            });
            toogleScrollEvent = true;
        }, 2000);
    }

    // Prevent from many scrolling
    function wheelHandler() {
        // console.log(event.deltaX, event.deltaY, event.deltaFactor);
        if (toogleScrollEvent === true) {
            toogleScrollEvent = false;


            // Disable scrolling
            $('.page').unbind('mousewheel', wheelHandler);
            animate();
        }
    }

    function swipeHandler() {
        if (toogleScrollEvent === true) {
            toogleScrollEvent = false;


            // Disable swiping
            mc.off("swipedown", function (e) {
            });
            mc.off("swipeup", function (e) {
            });
            animateMobile();
        }
    }


    // Main scroll event listener
    // desktop
    $('.page').mousewheel(wheelHandler);


    /*  SCROLL ANIMATION ENDS    */

})(jQuery);
