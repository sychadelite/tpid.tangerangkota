/* STICKY */
var stickyHeaders = (function () {

  var $window = $(window),
    $stickies,
    $vardians = {};

  var load = function (stickies, tag, distance = 0) {
    $vardians[tag] = {
      "stickies": stickies,
      "distance": distance,
    };
    if (typeof stickies === "object" && stickies instanceof jQuery && stickies.length > 0) {
      $stickies = stickies.each(function () {
        if (!$(this).parent().hasClass('followWrap')) {
          var $thisSticky = $(this).wrap(`<div class="followWrap" data-tag="${tag}" />`);
          $thisSticky
            .data('originalPosition', $thisSticky.offset().top)
            .data('originalHeight', $thisSticky.outerHeight())
            .parent()
            .height('fit-content')
            .css('min-height', $thisSticky.outerHeight() * 2);
        } else {
          setTimeout(() => {
            $(this).data('originalPosition', $(this).parent().offset().top);
            $(this).data('originalHeight', $(this).parent().outerHeight());
          }, 300);
        }
      });
      $window.off("scroll.stickies").on("scroll.stickies", function () {
        _whenScrolling();
      });
    }
  };

  var _whenScrolling = function () {
    const vardKey = Object.keys($vardians);
    vardKey.forEach(vk => {
      $vardians[vk].stickies.each(function (i) {
        var $thisSticky = $(this),
          $stickyPosition = $thisSticky.data('originalPosition');

        if ($stickyPosition - $vardians[vk].distance <= $window.scrollTop()) {
          var $nextSticky = $vardians[vk].stickies.eq(i + 1),
            $nextStickyPosition = $nextSticky.data('originalPosition') - $thisSticky.data('originalHeight');
          $thisSticky.addClass("fixed");
          if ($nextSticky.length > 0 && $thisSticky.offset().top >= $nextStickyPosition) {
            $thisSticky.addClass("absolute").css("top", $nextStickyPosition);
          }
        } else {
          var $prevSticky = $vardians[vk].stickies.eq(i - 1);
          $thisSticky.removeClass("fixed");

          if ($prevSticky.length > 0 && $window.scrollTop() <= $thisSticky.data('originalPosition') - $thisSticky.data('originalHeight')) {
            $prevSticky.removeClass("absolute").removeAttr("style");
          }
        }
      });
    });
  };

  return {
    load: load
  };
})();

var initSticky = (function () {
  let hierarchy = []

  $('.followMeBar').each(function (index) {
    const value = $(this).data("follow");
    // Check if the value is not already in the array
    if (hierarchy.indexOf(value) === -1) {
      hierarchy.push(value)
    }
  }).promise().done(function () {
    hierarchy.forEach(arc => {
      const el = $(`.followMeBar[data-follow="${arc}"]`);
      const dt = el.data('distanceIntersect')
      stickyHeaders.load(el, arc, dt);
    });
  });
})

$(function () {
  initSticky();
});