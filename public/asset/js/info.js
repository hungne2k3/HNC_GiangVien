document.addEventListener("DOMContentLoaded", (event) => {
  function handleInputDisable() {
    const InputDisable = document.getElementsByClassName("content__input");
    for (let i = 0; i < InputDisable.length; i++) {
      InputDisable[i].setAttribute("disabled", true);
    }
  }
  handleInputDisable();
});

function handleAnimation() {
  gsap.from(".content__info", { duration: 1, y: "28%" });
}

function handleLoader() {
  let loader = document.querySelector("#loading");
  let info = document.querySelector(".content__info");

  window.addEventListener("load", () => {
    setTimeout(() => {
      loader.remove();
      handleAnimation();
      info.style.display = "block";
    }, 1200);
  });
}

handleLoader();
