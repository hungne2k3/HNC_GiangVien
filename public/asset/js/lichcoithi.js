function handleLichcoithi() {
  SelectYears();
  handleLoader();
}

// select option years
function SelectYears() {
  // lấy id của select
  // lấy năm hiện tại
  // loop qua từng năm từ năm 2014 đến năm hiện tại => thêm option vào select
  // thêm value và text cho option
  // selected option đầu tiên
  //h thêm option và select vào html
  let selectElement = document.getElementById("nam__hoc");
  let currentYear = new Date().getFullYear(); // lấy năm hiện tại

  for (let year = 2014; year <= currentYear; year += 1) {
    let option = document.createElement("option"); // thêm option vào select
    option.value = year + "-" + (year + 1);
    option.text = year + "-" + (year + 1);
    option.selected = true;
    selectElement.appendChild(option);
  }
}

// hàm loader
function handleLoader() {
  // load lại trang => sau 3s thì hiện loader
  // tắt loader hiện table
  let loader = document.querySelector("#loading");
  let table = document.querySelector("#table__lichcoithi");

  window.addEventListener("load", () => {
    setTimeout(() => {
      loader.remove();
      handleAnimationChange();
      table.style.display = "block";
    }, 1200);
  });
}

function handleAnimationChange() {
  gsap.from("#table__lichcoithi", { duration: 1, y: "100%" });
}
handleLichcoithi();
