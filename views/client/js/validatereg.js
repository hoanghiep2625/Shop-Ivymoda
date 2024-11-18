document.querySelector("form").addEventListener("submit", function (event) {
  if (!validateForm()) {
    event.preventDefault();
  }
});

function validateForm() {
  let isValid = true;

  const hoInput = document.querySelector("#ho input");
  const tenInput = document.querySelector("#ten input");
  const emailInput = document.querySelector("#inemail");
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

  const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  const phoneRegex =
    /^(0|\+84)(3[2-9]|5[2689]|7[06-9]|8[1-689]|9[0-46-9])\d{7}$/;
  const RegexKytudacbiet =
    /^[a-zA-ZàáãạảăắằẳẵặâấầẩẫậèéẹẻẽêềếểễệđìíĩỉịòóõọỏôốồổỗộơớờởỡợùúũụủưứừửữựỳỵỷỹýÀÁÃẠẢĂẮẰẲẴẶÂẤẦẨẪẬÈÉẸẺẼÊỀẾỂỄỆĐÌÍĨỈỊÒÓÕỌỎÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦƯỨỪỬỮỰỲỴỶỸÝ\s]+$/;
  const Regexnoidung =
    /^[a-zA-Z0-9àáãạảăắằẳẵặâấầẩẫậèéẹẻẽêềếểễệđìíĩỉịòóõọỏôốồổỗộơớờởỡợùúũụủưứừửữựỳỵỷỹýÀÁÃẠẢĂẮẰẲẴẶÂẤẦẨẪẬÈÉẸẺẼÊỀẾỂỄỆĐÌÍĨỈỊÒÓÕỌỎÔỐỒỔỖỘƠỚỜỞỠỢÙÚŨỤỦƯỨỪỬỮỰỲỴỶỸÝ,.'":;\s]+$/;
  const hoValue = hoInput.value.trim();
  const diachiValue = diachiInput.value.trim();
  if (hoValue === "") {
    hoInput.closest("div").classList.add("border-red-500");
    hoError.textContent = "Không được để trống";
    hoError.classList.remove("hidden");
    isValid = false;
  } else if (!RegexKytudacbiet.test(hoValue)) {
    hoInput.closest("div").classList.add("border-red-500");
    hoError.textContent = "Không được có ký tự đặc biệt và số";
    hoError.classList.remove("hidden");
    isValid = false;
  } else {
    hoInput.closest("div").classList.remove("border-red-500");
    hoError.classList.add("hidden");
  }

  if (tenInput.value.trim() === "") {
    tenInput.closest("div").classList.add("border-red-500");
    tenError.textContent = "Không được để trống";
    tenError.classList.remove("hidden");
    isValid = false;
  } else if (!RegexKytudacbiet.test(tenInput.value.trim())) {
    tenInput.closest("div").classList.add("border-red-500");
    tenError.textContent = "Không được có ký tự đặc biệt và số";
    tenError.classList.remove("hidden");
    isValid = false;
  } else {
    tenInput.closest("div").classList.remove("border-red-500");
    tenError.classList.add("hidden");
  }

  if (emailInput.value.trim() === "") {
    emailInput.closest("div").classList.add("border-red-500");
    emailError.textContent = "Không được để trống";
    emailError.classList.remove("hidden");
    isValid = false;
  } else if (!emailRegex.test(emailInput.value.trim())) {
    emailInput.closest("div").classList.add("border-red-500");
    emailError.textContent = "Email không hợp lệ";
    emailError.classList.remove("hidden");
    isValid = false;
  } else {
    emailInput.closest("div").classList.remove("border-red-500");
    emailError.classList.add("hidden");
  }

  if (sodtInput.value.trim() === "") {
    sodtInput.closest("div").classList.add("border-red-500");
    sodtError.textContent = "Không được để trống";
    sodtError.classList.remove("hidden");
    isValid = false;
  } else if (!phoneRegex.test(sodtInput.value.trim())) {
    sodtInput.closest("div").classList.add("border-red-500");
    sodtError.textContent = "Số điện thoại không hợp lệ";
    sodtError.classList.remove("hidden");
    isValid = false;
  } else {
    sodtInput.closest("div").classList.remove("border-red-500");
    sodtError.classList.add("hidden");
  }

  if (ngaysinhInput.value.trim() === "") {
    ngaysinhInput.closest("div").classList.add("border-red-500");
    ngaysinhError.textContent = "Không được để trống";
    ngaysinhError.classList.remove("hidden");
    isValid = false;
  } else {
    ngaysinhInput.closest("div").classList.remove("border-red-500");
    ngaysinhError.classList.add("hidden");
  }

  if (tinhthanhInput.value.trim() === "") {
    tinhthanhInput.closest("div").classList.add("border-red-500");
    tinhthanhError.textContent = "Không được để trống";
    tinhthanhError.classList.remove("hidden");
    isValid = false;
  } else {
    tinhthanhInput.closest("div").classList.remove("border-red-500");
    tinhthanhError.classList.add("hidden");
  }

  if (quanhuyenInput.value.trim() === "") {
    quanhuyenInput.closest("div").classList.add("border-red-500");
    quanhuyenError.textContent = "Không được để trống";
    quanhuyenError.classList.remove("hidden");
    isValid = false;
  } else {
    quanhuyenInput.closest("div").classList.remove("border-red-500");
    quanhuyenError.classList.add("hidden");
  }

  if (phuongxaInput.value.trim() === "") {
    phuongxaInput.closest("div").classList.add("border-red-500");
    phuongxaError.textContent = "Không được để trống";
    phuongxaError.classList.remove("hidden");
    isValid = false;
  } else {
    phuongxaInput.closest("div").classList.remove("border-red-500");
    phuongxaError.classList.add("hidden");
  }

  if (diachiValue === "") {
    diachiInput.closest("div").classList.add("border-red-500");
    diachiError.textContent = "Không được để trống";
    diachiError.classList.remove("hidden");
    isValid = false;
  } else if (!Regexnoidung.test(diachiValue)) {
    diachiInput.closest("div").classList.add("border-red-500");
    diachiError.textContent = "Địa chỉ không hợp lệ";
    diachiError.classList.remove("hidden");
    isValid = false;
  } else {
    diachiInput.closest("div").classList.remove("border-red-500");
    diachiError.classList.add("hidden");
  }

  if (passwordInput.value.trim() === "") {
    passwordInput.closest("div").classList.add("border-red-500");
    passwordError.textContent = "Không được để trống";
    passwordError.classList.remove("hidden");
    isValid = false;
  } else if (passwordInput.value.trim().length < 6) {
    passwordInput.closest("div").classList.add("border-red-500");
    passwordError.textContent = "Mật khẩu phải có ít nhất 6 ký tự";
    passwordError.classList.remove("hidden");
    isValid = false;
  } else if (!/[a-zA-Z]/.test(passwordInput.value.trim())) {
    passwordInput.closest("div").classList.add("border-red-500");
    passwordError.textContent = "Mật khẩu phải có ít nhất 1 chữ";
    passwordError.classList.remove("hidden");
    isValid = false;
  } else if (!/\d/.test(passwordInput.value.trim())) {
    passwordInput.closest("div").classList.add("border-red-500");
    passwordError.textContent = "Mật khẩu phải có ít nhất 1 số";
    passwordError.classList.remove("hidden");
    isValid = false;
  } else {
    passwordInput.closest("div").classList.remove("border-red-500");
    passwordError.classList.add("hidden");
  }

  if (xacnhanpasswordInput.value.trim() === "") {
    xacnhanpasswordInput.closest("div").classList.add("border-red-500");
    xacnhanpasswordError.textContent = "Không được để trống";
    xacnhanpasswordError.classList.remove("hidden");
    isValid = false;
  } else if (xacnhanpasswordInput.value.trim() !== passwordInput.value.trim()) {
    xacnhanpasswordInput.closest("div").classList.add("border-red-500");
    xacnhanpasswordError.textContent = "Mật khẩu nhập lại không khớp";
    xacnhanpasswordError.classList.remove("hidden");
    isValid = false;
  } else {
    xacnhanpasswordInput.closest("div").classList.remove("border-red-500");
    xacnhanpasswordError.classList.add("hidden");
  }

  return isValid;
}
