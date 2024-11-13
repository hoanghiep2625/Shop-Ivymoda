document
  .querySelector("#loginForm")
  .addEventListener("submit", function (event) {
    if (!validateForm()) {
      event.preventDefault(); // Ngừng gửi form nếu không hợp lệ
    }
  });

function validateForm() {
  let isValid = true;

  const usernameInput = document.querySelector("#username"); // Chỉnh sửa selector
  const passwordInput = document.querySelector("#password");

  const usernameError = document.querySelector("#username-error");
  const passwordError = document.querySelector("#password-error");

  // Kiểm tra trường email/SĐT
  if (usernameInput.value.trim() === "") {
    usernameInput.closest("div").classList.add("border-red-500");
    usernameError.textContent = "Không được để trống";
    usernameError.classList.remove("hidden");
    isValid = false;
  } else {
    usernameInput.closest("div").classList.remove("border-red-500");
    usernameError.classList.add("hidden");
  }

  // Kiểm tra trường mật khẩu
  if (passwordInput.value.trim() === "") {
    passwordInput.closest("div").classList.add("border-red-500");
    passwordError.textContent = "Không được để trống";
    passwordError.classList.remove("hidden");
    isValid = false;
  } else {
    passwordInput.closest("div").classList.remove("border-red-500");
    passwordError.classList.add("hidden");
  }

  return isValid; // Trả về true hoặc false tùy thuộc vào kết quả kiểm tra
}
