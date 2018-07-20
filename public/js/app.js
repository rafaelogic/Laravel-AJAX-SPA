$(function() {
  var header;

  $(document).on('click', '[id^="job-view-"]', function(e){
    defaultFunc(e);
    
    var slug = $(this).data('slug');
    var url = '/job/view/'+slug;
    var token = $(this).data('token');

    $.ajax({
      url: url,
      type: 'post',
      data: {
        _token:token
      }
    }).done(function(res) {
      $("#jobs").hide().html(res).fadeIn('slow');
      $("app-container div h3#header").hide();
    });
  });

  $(document).on('click', '[id^="category-"]', function(e){
    defaultFunc(e);

    var id = $(this).data('id');
    var url = '/job/category-search/'+id;
    var token = $(this).data('token');

    header = $(this).data('name');

    getJobs(url, token, `in ${header}`)
  });

  $(document).on('click', '[id^="location-"]', function(e){
    defaultFunc(e);

    var id = $(this).data('id');
    var url = '/job/location-search/'+id;
    var token = $(this).data('token');

    header = $(this).data('name');

    getJobs(url, token, `in ${header}`)
  });

  $(document).on('click', '.pagination a',function(e)
  {
    var url = $(this).attr('href').split('page=')[0];
    if(url == 'http://127.0.0.1:8000?') return true;
    
    var page=$(this).attr('href').split('page=')[1];
      $('li').removeClass('active');
      $(this).parent('li').addClass('active');
      defaultFunc(e);
      
      $.ajax(
        {
            url: url+'?page='+page,
            type: "get",
            datatype: "html"
        })
        .done(function(res)
        {
          $("#jobs").hide().html(res).fadeIn('slow');
          $("#header").hide().text(`Recent Jobs in ${header}`).fadeIn('slow');
          location.hash = page;
        })
        .fail(function()
        {
              alert('No response from server');
        });
  });

  $(document).ajaxSend(function(event, request, settings) {
    $('#loading-indicator').show();
  });
  
  $(document).ajaxComplete(function(event, request, settings) {
    $('#loading-indicator').hide();
  });
});


var getJobs = function(url, token, header = "") {
  $.ajax({
    url: url,
    type: 'post',
    data: {
      _token:token
    }
  }).done(function(res) {
    scrollToTop();
    $("#jobs").hide().html(res).fadeIn('slow');
    $("#header").hide().text(`Recent Jobs ${header}`).fadeIn('slow');
  });
}

var scrollToTop = function()
{
  $('html, body').animate({
    scrollTop: 0
  }, 800);
  return false;
}

var defaultFunc = function(e) {
  e.preventDefault();
  window.history.pushState("object or string", "Title", "/" + "" );
}