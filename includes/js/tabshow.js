const tabButtons = document.querySelectorAll(".tab-button");
const tabContents = document.querySelectorAll(".tab-content");

tabButtons.forEach((button, index) => {
  button.addEventListener("click", () => {
    tabContents.forEach((content) => content.classList.add("hidden"));

    tabButtons.forEach((btn) => {
      btn.classList.remove("text-black", "border-b-2", "border-black");
    });

    tabContents[index].classList.remove("hidden");

    button.classList.add("text-black", "border-b-2", "border-black");
  });
});
document.getElementById("tab-gioi-thieu").click();
