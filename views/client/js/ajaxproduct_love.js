document
  .querySelectorAll(".add-wishlist, .remove-wishlist")
  .forEach((button) => {
    button.addEventListener("click", function () {
      const productId = this.getAttribute("data-id");
      const isRemove = this.classList.contains("remove-wishlist");
      const actionUrl = isRemove
        ? "?action=removeFromWishlist&id="
        : "?action=addToWishlist&id=";
      fetch(actionUrl + productId, {
        method: "GET",
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            const addBtn = document.querySelector(
              '.add-wishlist[data-id="' + productId + '"]'
            );
            const removeBtn = document.querySelector(
              '.remove-wishlist[data-id="' + productId + '"]'
            );
            if (addBtn && removeBtn) {
              if (data.action === "added") {
                addBtn.classList.add("hidden");
                removeBtn.classList.remove("hidden");
              } else if (data.action === "removed") {
                removeBtn.classList.add("hidden");
                addBtn.classList.remove("hidden");
              }
            } else {
              console.error("Không tìm thấy nút với productId:", productId);
            }
          } else {
            console.error(data.message || "Có lỗi xảy ra");
          }
        })
        .catch((error) => {
          console.error("Có lỗi xảy ra:", error);
        });
    });
  });
