document.addEventListener("DOMContentLoaded", () => {
  const menuItems = document.querySelectorAll("a");
  const currentUrl = window.location.href;
  menuItems.forEach((item) => {
    const link = item.getAttribute("href");
    if (currentUrl.includes(link)) {
      item.classList.add("font-semibold", "text-black");
      item.classList.remove("text-gray-500");
    }
  });
});
