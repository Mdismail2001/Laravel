document.addEventListener('DOMContentLoaded', () => {
  const modal = document.getElementById('taskModal');
  const cancelBtn = document.getElementById('cancelTaskModal');
  const form = document.getElementById('taskForm');
  const nameInput = document.getElementById('taskName');
  const descInput = document.getElementById('taskDescription');
  const statusInput = document.getElementById('taskStatus'); // ✅ new
  const modalTitle = document.getElementById('taskModalTitle');
  const submitBtn = document.getElementById('taskSubmitBtn');

  // 🟢 CREATE MODAL
  window.showCreateModal = function (createUrl) {
    modalTitle.textContent = 'Add New Task';
    submitBtn.textContent = 'Create Task';
    form.action = createUrl;
    form.method = 'POST';

    // Reset values
    nameInput.value = '';
    descInput.value = '';
    statusInput.value = 'pending'; // default

    modal.classList.remove('hidden');
    modal.classList.add('flex');
  };

  // 🟡 EDIT MODAL
  window.showEditModal = function (editUrl, name, description, status) {
    modalTitle.textContent = 'Edit Task';
    submitBtn.textContent = 'Update Task';
    form.action = editUrl;

    // Remove old PUT if any
    const oldMethod = form.querySelector('input[name="_method"]');
    if (oldMethod) oldMethod.remove();

    // Add PUT method
    const methodInput = document.createElement('input');
    methodInput.type = 'hidden';
    methodInput.name = '_method';
    methodInput.value = 'POST';
    form.appendChild(methodInput);

    // Fill existing values
    nameInput.value = name;
    descInput.value = description;
    statusInput.value = status; // ✅ set status dynamically

    modal.classList.remove('hidden');
    modal.classList.add('flex');
  };

  // ❌ Close modal
  cancelBtn.addEventListener('click', () => {
    modal.classList.add('hidden');
    modal.classList.remove('flex');
  });
});
