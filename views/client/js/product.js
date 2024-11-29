document.addEventListener("DOMContentLoaded", () => {
  const zoomLayout = document.getElementById("zoomLayout");
  const mainImage = document.getElementById("mainImage");

  // Zoom theo chuột
  zoomLayout.addEventListener("mousemove", (e) => {
    const rect = zoomLayout.getBoundingClientRect();
    const x = e.clientX - rect.left; // Tọa độ X so với container
    const y = e.clientY - rect.top; // Tọa độ Y so với container

    // Cập nhật transform-origin cho zoom
    mainImage.style.transformOrigin = `${x}px ${y}px`;
    mainImage.style.transform = "scale(2.5)";
  });

  zoomLayout.addEventListener("mouseleave", () => {
    // Reset lại ảnh về trạng thái ban đầu
    mainImage.style.transformOrigin = "center center";
    mainImage.style.transform = "scale(1)";
  });

  // Thay đổi ảnh chính khi bấm vào slideshow
  const slideshow = document.getElementById("slideshow");
  slideshow.querySelectorAll("img").forEach((slideImg) => {
    slideImg.addEventListener("click", () => {
      mainImage.src = slideImg.src; // Cập nhật ảnh chính
    });
  });

  // Điều hướng slideshow
  const prev = document.getElementById("prev");
  const next = document.getElementById("next");
  let scrollPosition = 0;
  const itemHeight = slideshow.firstElementChild.offsetHeight + 16; // Chiều cao + gap
  const totalItems = slideshow.children.length;
  const visibleItems = 4;

  next.addEventListener("click", () => {
    if (Math.abs(scrollPosition) < (totalItems - visibleItems) * itemHeight) {
      scrollPosition -= itemHeight;
      slideshow.style.transform = `translateY(${scrollPosition}px)`;
    }
  });

  prev.addEventListener("click", () => {
    if (scrollPosition < 0) {
      scrollPosition += itemHeight;
      slideshow.style.transform = `translateY(${scrollPosition}px)`;
    }
  });
});
