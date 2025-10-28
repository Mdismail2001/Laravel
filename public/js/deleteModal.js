document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById('deleteModal');
  const cancelBtn = document.getElementById('cancelDelete');
  const deleteForm = document.getElementById('deleteForm');

  window.showDeleteModal = function (deleteUrl) {
    console.log("Delete URL:", deleteUrl);
    deleteForm.setAttribute('action', deleteUrl); // ✅ correct way
    modal.classList.remove('hidden');
    modal.classList.add('flex');
  };

  window.closeModal = function () {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
  };

  cancelBtn.addEventListener('click', () => {
    closeModal();
  });
});
