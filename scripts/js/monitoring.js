const dayInSecond = 24 * 60 * 60;
const weekInSecond = 7 * dayInSecond;
const monthInSecond = 30 * dayInSecond;

let submitButtonBlocked = true;

document.addEventListener("DOMContentLoaded", () => {
  const formInput = document.querySelector(".link-form-input");
  const submitButton = document.querySelector(".form-submit-button");
  const monitoringDiv = document.querySelector(".monitoring-div");

  const pAllAll = document.querySelector("#all-all");
  const pAllLink = document.querySelector("#all-link");
  const pAllQr = document.querySelector("#all-qr");
  const pCategoryAll = document.querySelector("#category-all");
  const pCategoryLink = document.querySelector("#category-link");
  const pCategoryQr = document.querySelector("#category-qr");

  formInput.addEventListener("input", () => {
    if (formInput.value != "") {
      submitButton.classList.remove("blocked");
      submitButtonBlocked = false;
    } else {
      submitButton.classList.add("blocked");
      submitButtonBlocked = true;
    }
  });

  submitButton.addEventListener("click", () => {
    if (!submitButtonBlocked) {
      monitoringDiv.classList.remove("hidden");
      let shortUrl = formInput.value;
      if (shortUrl.length > 6) {
        shortUrl = shortUrl.split("/").pop();
      }
      fetch("../scripts/php/getClicks.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "data=" + encodeURIComponent(shortUrl)
      })
      .then(response => {
        if (!response.ok) {
          throw new Error("Ошибка сети");
        }
        return response.json();
      })
      .then(data => {
        let currentDate = Math.floor(new Date() / 1000);
        let all = 0; let allLink = 0; let allQr = 0;
        let dayAll = 0; let dayLink = 0; let dayQr = 0; 
        let weekAll = 0; let weekLink = 0; let weekQr = 0; 
        let monthAll = 0; let monthLink = 0; let monthQr = 0;

        data.forEach(elem => {
          let timeDifference = currentDate - elem["time"];

          all += 1
          elem["clickType"] == "link" ? allLink += 1 : allQr += 1;
          if (timeDifference < dayInSecond) {
            dayAll += 1;
            elem["clickType"] == "link" ? dayLink += 1 : dayQr += 1;
          } 
          if (timeDifference < weekInSecond) {
            weekAll += 1;
            elem["clickType"] == "link" ? weekLink += 1 : weekQr += 1;
          }
          if (timeDifference < monthInSecond) {
            monthAll += 1;
            elem["clickType"] == "link" ? monthLink += 1 : monthQr += 1;
          }
          pAllAll.innerHTML = all; pAllLink.innerHTML = allLink; pAllQr.innerHTML = allQr;
          pCategoryAll.innerHTML = dayAll + "/" + weekAll + "/" + monthAll;
          pCategoryLink.innerHTML = dayLink + "/" + weekLink + "/" + monthLink;
          pCategoryQr.innerHTML = dayQr + "/" + weekQr + "/" + monthQr;
        });
      })
      .catch(error => {
        console.error("Произошла ошибка");
        console.error(error.message);
      });
    }
  })
});