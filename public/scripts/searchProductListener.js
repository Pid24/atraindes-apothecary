$(() => {
  $('form#searchForm').submit(function(e) {
    e.preventDefault();
    
    window.location.href = '/public/pages/search.html'
  })
})