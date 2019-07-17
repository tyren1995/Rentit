$(document).ready(function() {
  $(".ResponseContainer").hide();
  $("#registerButton").click(function() {
    // using serialize function of jQuery to get all values of form
    var serializedData = $("#registrationForm").serialize();

    // Variable to hold request
    var request;
    // Fire off the request to process_registration_form.php
    request = $.ajax({
      url: "assets/php/auth/user_auth.php",
      type: "post",
      data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function(jqXHR, textStatus, response) {
      // you will get response from your php page (what you echo or print)
      // show successfully for submit message
      var response = $.parseJSON(response.responseText);
      if(response.results){
        var results = response.results;
        $("#registerResponseContainer").show();
        $("#registerResponse").html(results);
      }
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
  $("#login").click(function(){
    console.log("Open Login Modal.");
     $("#loginModal").modal("show");
  });
  $("#loginButton").click(function() {
    // using serialize function of jQuery to get all values of form
    var serializedData = $("#loginForm").serialize();

    // Variable to hold request
    var request;
    // Fire off the request to process_registration_form.php
    request = $.ajax({
      url: "assets/php/auth/user_auth.php",
      type: "post",
      data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function(jqXHR, textStatus, response) {
      // you will get response from your php page (what you echo or print)
      // show successfully for submit message
      var response = $.parseJSON(response.responseText);
      if (response.results) {
        var results = response.results;
        console.log(response);
        $(".ResponseContainer").show();
        $("#loginResponse").html(results);
        if(results == "Logged in."){
          window.location.href = "/";
        }
      }
    });

    // Callback handler that will be called on failure
    request.fail(function(jqXHR, textStatus, errorThrown) {
      // Log the error to the console
      // show error
      $("#result").html("There is some error while submit");
      console.error(
        "The following error occurred: " + textStatus,
        errorThrown
      );
    });

    return false;
  });
  $("#logout").click(function(){
    console.log("Logout.");
    // Variable to hold request
    var request;
    // Fire off the request to process_registration_form.php
    request = $.ajax({
      url: "assets/php/auth/user_auth.php",
      type: "post",
      data: {"action" : "logout"}
    });

    // Callback handler that will be called on success
    request.done(function(jqXHR, textStatus, response) {
      // you will get response from your php page (what you echo or print)
      // show successfully for submit message
      var response = $.parseJSON(response.responseText);
      if (response.results) {
        var results = response.results;
        if(results == "Logout"){
          window.location.href = "/";
        }
      }
    });

    // Callback handler that will be called on failure
    request.fail(function(jqXHR, textStatus, errorThrown) {
      // Log the error to the console
      // show error
      $("#result").html("There is some error while submit");
      console.error(
        "The following error occurred: " + textStatus,
        errorThrown
      );
    });

    return false;
  });
});
