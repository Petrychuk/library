
$(document).ready(function () {
  $("form").submit(function (event) {
    event.preventDefault();
    console.log("Form submitted"); // Отладочное сообщение
    $.ajax({
      type: "POST",
      url: "../php/signup_procces.php",
      data: $(this).serialize(),
      dataType: "json",
      success: function (response) {
        console.log("Ajax response:", response); // Отладочное сообщение
        if (response.success) {
          showMessage(response.message);
          setTimeout(function () {
            window.location.href = "../php/display_books.php";
          }, 3000);
        } else {
          showMessage(response.message);
        }
      },
    });
  });

  function showMessage(message) {
    $("#popup-message").text(message).fadeIn().delay(3000).fadeOut();
  }
});
if (response.success) {
  showMessage(response.message);
  console.log("Registration successful. Redirecting..."); // Отладочное сообщение
  setTimeout(function () {
    window.location.href = "display_books.php";
  }, 3000);
} else {
  showMessage(response.message);
}

