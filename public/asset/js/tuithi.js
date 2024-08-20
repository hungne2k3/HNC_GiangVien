function handletuithi() {
  handleNamhoc();
  handleLoader();
}

function handleNamhoc() {
  // lấy element của select năm
  // lấy năm hiện tại
  let year__selected = document.getElementById("nam__hoc");
  let year__present = new Date().getFullYear();

  for (let year_start = 2014; year_start <= year__present; year_start += 1) {
    let option = document.createElement("option");
    option.value = year_start + "-" + (year_start + 1);
    option.text = year_start + "-" + (year_start + 1);
    option.selected = true;

    year__selected.appendChild(option);
  }
}

// hàm loader
function handleLoader() {
  // load lại trang => sau 3s thì hiện loader
  // tắt loader hiện table
  let loader = document.querySelector("#loading");
  let table = document.querySelector("#table__tuithi");

  window.addEventListener("load", () => {
    setTimeout(() => {
      loader.remove();
      handleAnimationChange();
      table.style.display = "block";
    }, 1200);
  });
}

function handleAnimationChange() {
  gsap.from("#table__tuithi", { duration: 1, y: "100%" });
}

handletuithi();
