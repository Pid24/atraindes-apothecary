$(() => {
  // Configuration for flickity slider
  const options = {
    cellAlign: 'left',
    contain: false,
    prevNextButtons: false,
    pageDots: false,
    groupCells: 2,
  }

  $('#categoriesSlider').flickity(options);
  $('#proudctsSlider').flickity(options);
  $('#featureSlider').flickity(options);

  $('.flickity-slider').css({
    'left': '16px'
  })

  $('#featureSlider .flickity-slider').css({
    'left': '24px'
  })
})