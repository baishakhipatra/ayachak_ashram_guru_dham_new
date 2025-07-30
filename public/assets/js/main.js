(function($){



// offcanvas menu jquery
$('.ham').on('click', function(){
    $('.offcanvas-menu').toggleClass('slide');
    $('.overlay').toggleClass('active');
});

$('.cross, .overlay').on('click', function(){
    $('.offcanvas-menu.slide').removeClass('slide');
    $('.overlay').removeClass('active');
});


// open modal start video
document.addEventListener('DOMContentLoaded', function() {
  var videoModal = document.getElementById('videoModal');
  var video = document.getElementById('modalVideo');
  
  // When modal opens
  videoModal.addEventListener('shown.bs.modal', function () {
    video.play();
  });
  
  // When modal closes
  videoModal.addEventListener('hidden.bs.modal', function () {
    video.pause();
    video.currentTime = 0; // Optional: reset to start
  });
});


//match height
equalheight = function(container) {
    var currentTallest = 0,
        currentRowStart = 0,
        rowDivs = new Array(),
        $el,
        topPosition = 0,
        currentDiv; // declare currentDiv variable
    
    $(container).each(function() {
        $el = $(this);
        $el.height('auto');
        topPosition = $el.position().top; // fixed variable name
        
        if (currentRowStart != topPosition) {
            for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
            rowDivs.length = 0; // empty the array
            currentRowStart = topPosition;
            currentTallest = $el.height();
            rowDivs.push($el);
        } else {
            rowDivs.push($el);
            currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
        }
        
        for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }
    });
}

$(window).on('load', function() {
    equalheight('.grid-list li figcaption p');
});

$(window).on('resize', function() {
    equalheight('.grid-list li figcaption p');
});


})(jQuery);