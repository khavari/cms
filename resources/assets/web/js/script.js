//  scroll-back-to-top.blade.php
//------------------------------------------------------------
$(document).ready(function () {
  $(document).on('scroll', function () {
    if ($(window).scrollTop() > 500) {
      $('#scroll-back-to-top').addClass('show')
    } else {
      $('#scroll-back-to-top').removeClass('show')
    }
  })
  $('#scroll-back-to-top').on('click', scrollToTop)

  function scrollToTop () {
    verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0
    element = $('body')
    offset = element.offset()
    offsetTop = offset.top
    $('html, body').animate({scrollTop: offsetTop}, 500, 'linear')
  }

})

//featured-gallery.blade.php
//------------------------------------------------------------
$(document).ready(function () {
  $('#lightgallery').lightGallery()
})

// owl-customers
//------------------------------------------------------------
$(document).ready(function () {
  $('.customer-carousel').owlCarousel({
      loop: true,
      autoplay: true,
      autoplayTimeout: 2000,
      autoplayHoverPause: true,
      margin: 5,
      nav: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 4
        },
        1000: {
          items: 6
        }
      }
    }
  )
})



// used only on product.blade.php
//------------------------------------------------------------
$(document).ready(function () {
  $('.product-gallery').owlCarousel({
      loop: false,
      autoplay: true,
      autoplayTimeout: 1500,
      autoplayHoverPause: true,
      margin: 5,
      nav: false,
      responsive: {
        0: {
          items: 2
        },
        576: {
          items: 3
        },
        768: {
          items: 3
        },
        992: {
          items: 4
        },
        1200: {
          items: 5
        }
      }
    }
  )
})

// preloader widget
//------------------------------------------------------------
$(document).ready(function () {
  if ($('#preloader').length) {
    setTimeout(function () {$('body').addClass('loaded')}, 2000)
  }
})

// popup widget
//------------------------------------------------------------
$(document).ready(function () {
  if ($('#popup').length) {
    setTimeout(function () {
      $('#popup-modal').modal('show')
    }, 3000)
  }
})


// copy
//------------------------------------------------------------
$('.copy-url').click(function () {

  $(this).addClass('bg-success animated fadeIn')
  var url = $(this).attr('data-url')
  console.log(url);
  var $temp = $('<input>')
  $('body').append($temp)
  $temp.val(url).select()
  document.execCommand('copy')
  $temp.remove()
})
