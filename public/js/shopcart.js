/**
 * This function adjust the footer to the bottom of the page
 */
function ajustarPie() {
  var winH = $(window).height();
  var docH = $("body").height();
  var pieH = $("footer").height();
  
  if (docH + pieH < winH) {
    $("footer").attr("class", "bottom");
    } else {
      $("footer").attr("class", "");
      }
  }

$(document).ready(ajustarPie);
$(window).on("resize", ajustarPie);
