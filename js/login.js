function tryLogin() {
  let un = $("#txtUsername").val();
  let pw = $("#txtPassword").val();
  if (un.trim() !== "" && pw.trim() != "") {
    //make an ajax call
    $.ajax({
      url: "ajaxhandler/loginAjax.php",
      type: "POST",
      dataType: "json",
      data: { user_name: un, password: pw, action: "verifyUser" },
      beforeSend: function () {
        // do something  before making the call
        $("#diverror").removeClass("applyerrordiv");
        $("#lockscreen").addClass("applylockscreen");
      },
      success: function (rv) {
        //if the ajax call was successful result will be in rv
        $("#lockscreen").removeClass("applylockscreen");
        if (rv["status"] == "ALL OK") {
          document.location.replace("attendance.php");
        } else {
          $("#diverror").addClass("applyerrordiv");
          $("#errormessage").text(rv["status"]);
        }
      },
      error: function () {
        //if the call was unsuccessful
        alert("Oops! Something went wrong.");
      },
    });
  }
}

//do everything only when the document is loaded
$(function (e) {
  $(document).on("keyup", "input", function (e) {
    $("#diverror").removeClass("applyerrordiv");
    let pw = $("#txtPassword").val();
    let un = $("#txtUsername").val();
    if (un.trim() !== "" && pw.trim() !== "") {
      $("#btnLogin").removeClass("inactivecolor");
      $("#btnLogin").addClass("activecolor");
    } else {
      $("#btnLogin").removeClass("activecolor");
      $("#btnLogin").addClass("inactivecolor");
    }
  });
  $(document).on("click", "#btnLogin", function (e) {
    tryLogin();
  });
});
