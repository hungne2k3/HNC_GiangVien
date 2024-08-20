function handleDanhmuc() {
  handleLoader();
}

function handleLoader() {
  let loader = document.querySelector("#loading");
  let tableDanhmuc = document.querySelector("#table__danhmuc");

  window.addEventListener("load", () => {
    setTimeout(() => {
      loader.remove();
      handleAnimation();
      tableDanhmuc.style.display = "block";
    }, 1200);
  });
}

function handleAnimation() {
  gsap.from(".content__danhmuc", { duration: 1, y: "28%" });
}

handleDanhmuc();
