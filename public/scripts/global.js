$(() => {
  $('[data-expand]').on('click', function (e) {
    $(this).children('img').toggleClass('-rotate-180')
    let target = $(`#${$(this).data('expand')}`)
    target.slideToggle()
  })

  // Toggle manual payment details 
  $('input[name=payment_method]').on('change', function (e) {
    let target = $('#manualPaymentDetail')
    if ($(this).is(':checked') && $(this).attr('id') == 'manualMethod') target.show()
    else target.hide()
  })
})