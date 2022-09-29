// Email JS
function validate() {
    let name = document.querySelector(".name");
    let email = document.querySelector(".email");
    let msg = document.querySelector(".message");
    let sendBtn = document.querySelector(".send-btn");
  
    sendBtn.addEventListener("click", (e) => {
      e.preventDefault();
      if (name.value == "" || email.value == "" || msg.value == "") {
        emptyerror();
      } else {
        sendmail(name.value, email.value, msg.value);
        success();
      }
    });
  }
  validate();
  
  function sendmail(name, email, msg) {
    // User Your Service id and template id here
    emailjs.send("service_id", "template_id", {
      from_name: email,
      to_name: name,
      message: msg,
    });
  }
  
  function emptyerror() {
    swal({
      title: "Oh No....",
      text: "Certains champs sont vide !",
      icon: "error",
    });
  }
  function success() {
    swal({
      title: "Email envoyé avec succées",
      text: "Réponse sous 24 heure",
      icon: "success",
    });
  }