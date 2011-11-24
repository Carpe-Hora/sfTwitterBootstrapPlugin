$(document).ready(function(){

  $('.topbar').dropdown();

  // table sort example
  // ==================

  $("#sortTableExample").tablesorter( { sortList: [[ 1, 0 ]] } )


  // add on logic
  // ============

  $('.add-on :checkbox').click(function () {
    if ($(this).attr('checked')) {
      $(this).parents('.add-on').addClass('active')
    } else {
      $(this).parents('.add-on').removeClass('active')
    }
  })

  // POSITION STATIC TWIPSIES
  // ========================

  $(window).bind( 'load resize', function () {
    $(".twipsies a").each(function () {
       $(this)
        .twipsy({
          live: false
        , placement: $(this).attr('title')
        , trigger: 'manual'
        , offset: 2
        })
        .twipsy('show')
      })
  })

  $('a.link-to-fieldset').click(function() {
    field = $(this).attr('href').substr(1, $(this).attr('href').length);
    $(window).scrollTop($('#sf_fieldset_'+field).position().top + 30);
    return false;
  })
});

/**
 * Function to copy ids[] on a batch actions to and hidden fields beacause chackboxes
 * can't be into a form
 */
function copyIds()
{
  $('.sf_admin_batch_checkbox:checked').each(function() {
    $('#batch_checked_ids').append('<option value="'+$(this).val()+'" selected="selected">'+$(this).val()+'</option>');
  });
}

