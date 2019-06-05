function viewCadastro() {
  $('#box-login').slideUp();
  $('#box-nova-senha').slideUp();
  $('#box-facebook-complemento').slideUp();
  $('#box-cadastro').slideDown();
}

function saveToDB(userId) {
  console.log("saving..");
  var points = jQuery('input#points' + userId).val();

  var data = {
    'id': userId,
    'points': points,
  }

  jQuery.post('update_user.php', data, function (response) {

    console.log(response);

    jQuery('#retorno').html(response);

  });
}

$("#add_user_form").submit(function (event) {
  event.preventDefault(); //prevent default action 
  var post_url = $(this).attr("action"); //get form action url
  var request_method = $(this).attr("method"); //get form GET/POST method
  var form_data = $(this).serialize(); //Encode form elements for submission

  jQuery("#add_user_submit").html('<b><i class="fa fa-cog fa-spin"></i></b>');

  $.ajax({
    url: post_url,
    type: request_method,
    data: form_data
  }).done(function (response) { //
    console.log(response);
    if(response.success) window.location.href = 'points.php';
    jQuery('#add_alert').html(response.message);
    jQuery('#add_alert').slideDown();
    jQuery('#add_user_submit').html('CADASTRAR');
  });
});