// Custom JavaScript for Hospital Management System

// Confirm Delete Action
function confirmDelete() {
  return confirm("Are you sure you want to delete this record?");
}

// Show Toast Notifications (Bootstrap Example)
function showToast(message, type) {
  const toast = document.createElement("div");
  toast.className = `toast align-items-center text-bg-${type} border-0`;
  toast.role = "alert";
  toast.innerHTML = `
        <div class="d-flex">
            <div class="toast-body">${message}</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    `;
  document.body.appendChild(toast);
  const bootstrapToast = new bootstrap.Toast(toast);
  bootstrapToast.show();
  setTimeout(() => toast.remove(), 5000);
}

// Dynamic Table Row Highlight
document.addEventListener("DOMContentLoaded", () => {
  const tableRows = document.querySelectorAll(".table tbody tr");
  tableRows.forEach((row) => {
    row.addEventListener("mouseenter", () => row.classList.add("table-active"));
    row.addEventListener("mouseleave", () =>
      row.classList.remove("table-active")
    );
  });
});
function confirmDelete() {
  return confirm("Are you sure you want to delete this patient?");
}
