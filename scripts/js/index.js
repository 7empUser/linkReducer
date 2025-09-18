

let submitButtonBlocked = true;
let correctUrl = false;

document.addEventListener("DOMContentLoaded", () => {
  const linkFormInput = document.querySelector(".link-form-input");
  const submitButton = document.querySelector(".form-submit-button");
  const newLinkDiv = document.querySelector(".new-link-div");
  const newLink = document.querySelector(".new-link");
  const qrCodeDiv = document.querySelector(".qr-code-div");

  linkFormInput.addEventListener("input", () => {
    if (linkFormInput.value != "") {
      submitButton.classList.remove("blocked");
      submitButtonBlocked = false;
    } else {
      submitButton.classList.add("blocked");
      submitButtonBlocked = true;
    }
  });

  submitButton.addEventListener("click", () => {
    if (linkFormInput.value.split(".").length > 1) {
      correctUrl = true;
    } else {
      correctUrl = false;
    }
    if (!submitButtonBlocked && correctUrl) {
      let url = linkFormInput.value;
      console.log(url.split("://")[0] == "http", url.split("://")[0] == "https")
      if (!(url.split("://")[0] == "http" || url.split("://")[0] == "https")) {
        url = "http://" + url;
      }
      console.log(url);
      fetch("../scripts/php/linkReduce.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: "data=" + encodeURIComponent(url)
      })
      .then(response => {
        if (!response.ok) {
          throw new Error("Ошибка сети");
        }
        return response.text();
      })
      .then(data => {
        newLinkDiv.classList.remove("hidden");
        newLink.innerHTML = data;
        newLink.setAttribute("href", data);
        qrCodeDiv.innerHTML = "";
        new QRCode(qrCodeDiv, {
          text: data + "qr",
          width: 96,
          height: 96,
          colorDark: "#000",
          colorLight: "#fff",
          correctLevel: QRCode.CorrectLevel.H
        });
      })
      .catch(error => {
        console.error("Произошла ошибка");
        console.error(error.message);
      });
    }
  });


})