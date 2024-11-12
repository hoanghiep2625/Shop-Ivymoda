document.querySelector("form").addEventListener("submit", function (event) {
  // Kiểm tra tính hợp lệ của form
  if (!validateForm()) {
    event.preventDefault(); // Ngừng hành động gửi form nếu không hợp lệ
  }
});

function validateForm() {
  let isValid = true;

  // Lấy các trường cần kiểm tra
  const hoInput = document.querySelector("#ho input");
  const tenInput = document.querySelector("#ten input");
  const emailInput = document.querySelector("#email input");
  const sodtInput = document.querySelector("#sodt input");
  const ngaysinhInput = document.querySelector("#ngaysinh input");
  const tinhthanhInput = document.querySelector("#tinhthanh select");
  const quanhuyenInput = document.querySelector("#quanhuyen select");
  const phuongxaInput = document.querySelector("#phuongxa select");
  const passwordInput = document.querySelector("#password input");
  const diachiInput = document.querySelector("#diachi input");
  const xacnhanpasswordInput = document.querySelector("#xacnhanpassword input");
  const hoError = document.querySelector("#ho-error");
  const tenError = document.querySelector("#ten-error");
  const emailError = document.querySelector("#email-error");
  const sodtError = document.querySelector("#sodt-error");
  const ngaysinhError = document.querySelector("#ngaysinh-error");
  const tinhthanhError = document.querySelector("#tinhthanh-error");
  const quanhuyenError = document.querySelector("#quanhuyen-error");
  const phuongxaError = document.querySelector("#phuongxa-error");
  const passwordError = document.querySelector("#password-error");
  const diachiError = document.querySelector("#diachi-error");
  const xacnhanpasswordError = document.querySelector("#xacnhanpassword-error");

  // Kiểm tra các trường input
  if (hoInput.value.trim() === "") {
    hoInput.closest("div").classList.add("border-red-500");
    hoError.classList.remove("hidden"); // Hiển thị thông báo lỗi
    isValid = false;
  } else {
    hoInput.closest("div").classList.remove("border-red-500");
    hoError.classList.add("hidden"); // Ẩn thông báo lỗi khi trường hợp hợp lệ
  }

  if (tenInput.value.trim() === "") {
    tenInput.closest("div").classList.add("border-red-500");
    tenError.classList.remove("hidden");
    isValid = false;
  } else {
    tenInput.closest("div").classList.remove("border-red-500");
    tenError.classList.add("hidden");
  }

  if (emailInput.value.trim() === "") {
    emailInput.closest("div").classList.add("border-red-500");
    emailError.classList.remove("hidden");
    isValid = false;
  } else {
    emailInput.closest("div").classList.remove("border-red-500");
    emailError.classList.add("hidden");
  }

  if (sodtInput.value.trim() === "") {
    sodtInput.closest("div").classList.add("border-red-500");
    sodtError.classList.remove("hidden");
    isValid = false;
  } else {
    sodtInput.closest("div").classList.remove("border-red-500");
    sodtError.classList.add("hidden");
  }

  if (ngaysinhInput.value.trim() === "") {
    ngaysinhInput.closest("div").classList.add("border-red-500");
    ngaysinhError.classList.remove("hidden");
    isValid = false;
  } else {
    ngaysinhInput.closest("div").classList.remove("border-red-500");
    ngaysinhError.classList.add("hidden");
  }

  if (tinhthanhInput.value.trim() === "") {
    tinhthanhInput.closest("div").classList.add("border-red-500");
    tinhthanhError.classList.remove("hidden");
    isValid = false;
  } else {
    tinhthanhInput.closest("div").classList.remove("border-red-500");
    tinhthanhError.classList.add("hidden");
  }

  if (quanhuyenInput.value.trim() === "") {
    quanhuyenInput.closest("div").classList.add("border-red-500");
    quanhuyenError.classList.remove("hidden");
    isValid = false;
  } else {
    quanhuyenInput.closest("div").classList.remove("border-red-500");
    quanhuyenError.classList.add("hidden");
  }

  if (phuongxaInput.value.trim() === "") {
    phuongxaInput.closest("div").classList.add("border-red-500");
    phuongxaError.classList.remove("hidden");
    isValid = false;
  } else {
    phuongxaInput.closest("div").classList.remove("border-red-500");
    phuongxaError.classList.add("hidden");
  }

  if (diachiInput.value.trim() === "") {
    diachiInput.closest("div").classList.add("border-red-500");
    diachiError.classList.remove("hidden");
    isValid = false;
  } else {
    diachiInput.closest("div").classList.remove("border-red-500");
    diachiError.classList.add("hidden");
  }

  if (passwordInput.value.trim() === "") {
    passwordInput.closest("div").classList.add("border-red-500");
    passwordError.classList.remove("hidden");
    isValid = false;
  } else {
    passwordInput.closest("div").classList.remove("border-red-500");
    passwordError.classList.add("hidden");
  }

  if (xacnhanpasswordInput.value.trim() === "") {
    xacnhanpasswordInput.closest("div").classList.add("border-red-500");
    xacnhanpasswordError.classList.remove("hidden");
    isValid = false;
  } else {
    xacnhanpasswordInput.closest("div").classList.remove("border-red-500");
    xacnhanpasswordError.classList.add("hidden");
  }

  return isValid;
}
