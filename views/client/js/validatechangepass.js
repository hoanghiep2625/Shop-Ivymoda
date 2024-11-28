document.querySelector("form").addEventListener("submit", function (event) {
  const oldPassword = document.getElementById("oldpassword");
  const newPassword = document.getElementById("newpassword");
  const reNewPassword = document.getElementById("renewpassword");

  const oldPasswordError = document.getElementById("oldpassword-error");
  const newPasswordError = document.getElementById("newpassword-error");
  const reNewPasswordError = document.getElementById("renewpassword-error");

  let isValid = true;

  // Kiểm tra mật khẩu cũ
  if (!oldPassword.value) {
    oldPasswordError.textContent = "Vui lòng nhập mật khẩu cũ.";
    oldPassword.closest("div").classList.add("border-red-500");
    oldPasswordError.classList.remove("hidden");
    isValid = false;
  } else {
    oldPassword.closest("div").classList.remove("border-red-500");
    oldPasswordError.classList.add("hidden");
  }

  // Kiểm tra mật khẩu mới phải có ít nhất 6 ký tự
  if (newPassword.value.length < 6) {
    newPasswordError.textContent = "Mật khẩu mới phải có ít nhất 6 ký tự.";
    newPassword.closest("div").classList.add("border-red-500");
    newPasswordError.classList.remove("hidden");
    isValid = false;
  } else {
    newPassword.closest("div").classList.remove("border-red-500");
    newPasswordError.classList.add("hidden");
  }

  // Kiểm tra mật khẩu mới có bao gồm chữ và số
  const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)/;
  if (!passwordRegex.test(newPassword.value)) {
    newPasswordError.textContent = "Mật khẩu mới phải bao gồm cả chữ và số.";
    newPassword.closest("div").classList.add("border-red-500");
    newPasswordError.classList.remove("hidden");
    isValid = false;
  } else if (newPassword.value.length >= 6) {
    newPassword.closest("div").classList.remove("border-red-500");
    newPasswordError.classList.add("hidden");
  }

  // Kiểm tra mật khẩu nhập lại
  if (newPassword.value !== reNewPassword.value) {
    reNewPasswordError.textContent = "Mật khẩu nhập lại không khớp.";
    reNewPassword.closest("div").classList.add("border-red-500");
    reNewPasswordError.classList.remove("hidden");
    isValid = false;
  } else {
    reNewPassword.closest("div").classList.remove("border-red-500");
    reNewPasswordError.classList.add("hidden");
  }

  if (!isValid) {
    event.preventDefault();
  }
});
