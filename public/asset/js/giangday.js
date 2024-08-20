function handleGiangDay() {
  handleNamhoc();
  handleLoader();
}

// hàm loader
function handleLoader() {
  // load lại trang => sau 3s thì hiện loader
  // tắt loader hiện table
  let loader = document.querySelector("#loading");
  let table = document.querySelector("#table__kyluat");

  window.addEventListener("load", () => {
    setTimeout(() => {
      loader.remove();
      handleAnimationkyluat();
      table.style.display = "block";
    }, 1200);
  });
}

function handleNamhoc() {
  // lấy element của select năm
  // lấy năm hiện tại
  let year__selected = document.getElementById("nam__hoc");
  let year__present = new Date().getFullYear();

  for (let year_start = 2010; year_start <= year__present; year_start += 1) {
    let option = document.createElement("option");
    option.value = year_start + "-" + (year_start + 1);
    option.text = year_start + "-" + (year_start + 1);
    option.selected = true;

    year__selected.appendChild(option);
  }
}

function handleAnimationkyluat() {
  gsap.from("#table__kyluat", { duration: 1, y: "100%" });
}

handleGiangDay();
