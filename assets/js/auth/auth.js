$(document).ready(function() {
  $("#registerButton").click(function() {
    // using serialize function of jQuery to get all values of form
    var serializedData = $("#registrationForm").serialize();

    // Variable to hold request
    var request;
    // Fire off the request to process_registration_form.php
    request = $.ajax({
      url: "assets/php/auth/register_user.php",
      type: "post",
      data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function(jqXHR, textStatus, response) {
      // you will get response from your php page (what you echo or print)
      // show successfully for submit message
      $("#result").html(response);
    });

    // Callback handler that will be called on failure
    request.fail(function(jqXHR, textStatus, errorThrown) {
      // Log the error to the console
      // show error
      $("#result").html("There is some error while submit");
      console.error("The following error occurred: " + textStatus, errorThrown);
    });

    return false;
  });
});
