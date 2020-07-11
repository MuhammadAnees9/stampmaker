function ajaxCall() {
  var Txtemail = $("#email").val();
  var Txtpass = $("#pass").val();
  var TxtlangSource = $("#langS").val();
  var TxtlangTarget = $("#langTarget").val();
  var TxtReason = $("#reason").val();
  var TxtUsername = $("#usernametext").val();

  if (TxtlangSource == null || TxtlangSource == "" || TxtlangSource == undefined) {
    TxtlangSource = $("#lang2").val();
  }
  if (TxtlangTarget == null || TxtlangTarget == "" || TxtlangTarget == undefined) {
    TxtlangTarget = $("#lang3").val();
  }
  if ($('input[id="notatranslator"]').is(':checked')) {

    TxtlangSource = "Not A Translator";
    TxtlangTarget = "Not A Translator";
  } else {

  }

  //Ajax Call
  $.ajax({
    url: "signup.php", //the page containing php script
    type: "post", //request type,
    dataType: 'json',
    data: {
      email: Txtemail,
      pass: Txtpass,
      langS: TxtlangSource,
      langT: TxtlangTarget,
      username: TxtUsername,
      reason: TxtReason
    },
    success: function (response) {
      console.log(response);
      var iduser = response.id;
      if (response.abc == "done") {
        $('#myModalLogin').modal('hide');
        $("#username").css("border", "1px solid green");
        $("#email").css("border", "1px solid green");

        $('#myModal').modal('toggle');
        $.ajax({
          url: "mailActivate.php", //the page containing php script
          type: "post", //request type,
          dataType: 'json',
          data: {
            email: Txtemail,
            id: iduser
          },
          success: function (response) {
            $.ajax({
              url: "mailAdmin.php", //the page containing php script
              type: "post", //request type,
              dataType: 'json',
              data: {
                id: iduser
              },
              success: function (response) {
                location.href = location.href;
              },
              error: function (jqXHR, textStatus, errorThrown) {
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
              }
            });
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
          }


        });
        swal("You Have Been Registered", "Activation Link has been sent to your email!.Click on activation link to verfiy your account.", "success");

      }
      if (response.abc == "email") {
        $("#email").css("border", "1px solid red");
        $("#username").css("border", "1px solid green");
        swal("Email already exists", "The Email that you have entered already exists, try new one.!", "warning");

      }
      if (response.abc == "username") {
        $("#username").css("border", "1px solid red");
        $("#email").css("border", "1px solid green");
        swal("Username already exists", "The Username that you have entered already exists, try new one.!", "warning");

      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(JSON.stringify(jqXHR));
      console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }
  });
}

function addUser() {
  var Txtemail = $("#email").val();
  var Txtpass = $("#pass").val();
  var TxtlangSource = $("#langS").val();
  var TxtUsername = $("#usernametext").val();
  var action = $("#action").val();
  var role = $("#role").val();
  var isActive = $("#isActive").val();
  $.ajax({
    url: "adminActivity.php", //the page containing php script
    type: "post", //request type,
    dataType: 'json',
    data: {
      email: Txtemail,
      pass: Txtpass,
      langS: TxtlangSource,
      username: TxtUsername,
      role: role,
      isActive: isActive,
      action: action,
    },
    success: function (response) {
      console.log(response);
      var iduser = response.id;
      if (response.abc == "done") {
        $('#myModalLogin').modal('hide');
        swal("You Have Been Registered", "New user added Successfully", "success");
        location.reload();
      }
      if (response.abc == "email") {
        $("#email").css("border", "1px solid red");
        $("#username").css("border", "1px solid green");
        swal("Email already exists", "The Email that you have entered already exists, try new one.!", "warning");

      }
      if (response.abc == "username") {
        $("#username").css("border", "1px solid red");
        $("#email").css("border", "1px solid green");
        swal("Username already exists", "The Username that you have entered already exists, try new one.!", "warning");

      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(JSON.stringify(jqXHR));
      console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }
  });


}

function UpdatePassword(ele) {
  if (event.key === 'Enter') {
    const pass = ele.value;
    const id = ele.id;
    var regularExpression = /^[a-zA-Z]$/;
    if (pass.trim() == "") {
      swal("Password Field Empty", "Password field is required", "warning");
    }
    if (pass.trim().length < 5) {
      swal("Miniumum 5 characters are required", "Password length must be 5 minimum character", "warning");
    }

    $.ajax({
      url: "adminActivity.php", //the page containing php script
      type: "post", //request type,
      dataType: 'json',
      data: {
        pass: pass,
        id: id,
        action: 'updatePass'
      },
      success: function (response) {
        if (response.abc == "done") {
          swal("Password Updated", "Password updated Successfully", "success");
          location.reload();
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
      }
    });


  }
}

function logout() {
  $.ajax({
    url: "logout.php", //the page containing php script
    type: "post", //request type,
    dataType: 'json',
    success: function (response) {
      location.reload();
    }
  });
}

function login() {


  var txtusername = $("#usernameLogin").val();
  var txtpassword = $("#passLogin").val();
  //validate login form
  if (txtusername.trim() == "") {
    $("#usernameLogin").css("border", "1px solid red");
    swal("Username Required", "", "warning");
  }
  if (txtpassword.trim() == "") {
    $("#passLogin").css("border", "1px solid red");
    swal("Password Required", "", "warning");
  }
  if (txtpassword.length < 5) {
    $("#passLogin").css("border", "1px solid red");
    swal("Password Minimum 5 characher", "", "warning");
  } else $.ajax({
    url: "login.php", //the page containing php script
    type: "post", //request type,
    dataType: 'json',
    data: {
      username: txtusername,
      password: txtpassword
    },
    success: function (response) {
      console.log(response.abc);
      if (response.abc == "done") {
        $('#myModalLogin').modal('hide');
        $("#usernameLogin").css("border", "1px solid green");
        $("#passLogin").css("border", "1px solid green");
        swal("Welcome!", "You have loged in successfully.", "success").then(function () {
          //Checking if the user turn from the  download
          if ($("#info").html() != "") {
            download();
          } else {
            location.reload();
          }
        });

      } else if (response.abc == "fail") {

        $("#usernameLogin").css("border", "1px solid red");
        $("#passLogin").css("border", "1px solid red");
        swal("incorrect Credentials", "The credentials you provide are incorrect.", "warning");
      } else if (response.abc == "admin") {
        swal("Welcome! Admin", "You have loged in successfully.", "success").then(function () {

          if ($("#info").html() != "") {
            download();
          } else {
            location.reload();
          }

        });

      }

    }
  });
}

function download() {
  var canvas = document.getElementsByTagName('canvas')[0];
  if (canvas.msToBlob) { //for IE
    var blob = canvas.msToBlob();
    window.navigator.msSaveBlob(blob, 'dicomimage.png');
  } else {
    //other browsers
    var link = document.createElement('a');
    link.href = canvas.toDataURL();
    link.download = "dicomimage.png";
    link.click();
    location.reload();
  }
  //location.reload();
  //   var link = document.createElement('a');
  // link.download = 'amazinglogo.png';
  // link.href = document.getElementById('can').toDataURL();
  // link.click();
}

function reset() {
  $("#info").html("");
}

function Dashboard() {
  window.location = "dashboard/index.php";
}

//Function for not a user on sign up form
function notauser() {
  $("#myModalLogin").modal('toggle');
  $("#myModal").modal('toggle');

};

function togglesuggestions() {

  $(".suggest").slideToggle();
}

function suggestion() {

  var suggestText = $("#suggestText").val();
  $.ajax({
    url: "suggest.php", //the page containing php script
    type: "post", //request type,
    dataType: 'json',
    data: {
      text: suggestText
    },
    success: function (response) {
      console.log(response);
      if (response.abc == "done") {
        swal("Thanks!", "Thanks for your suggestion, we will be notified.", "success");
      }
    }
  });
}