// public/js/taskModal.js

document.addEventListener('DOMContentLoaded', () => {
  // ================================
  // 🟢 CREATE / EDIT MODAL
  // ================================
  const taskModal = document.getElementById('taskModal');
  const cancelTaskModalBtn = document.getElementById('cancelTaskModal');
  const taskForm = document.getElementById('taskForm');
  const nameInput = document.getElementById('taskName');
  const descInput = document.getElementById('taskDescription');
  const statusInput = document.getElementById('taskStatus'); // ✅ new
  const modalTitle = document.getElementById('taskModalTitle');
  const submitBtn = document.getElementById('taskSubmitBtn');

  // 🟢 Create Modal
  window.showCreateModal = function (createUrl) {
    modalTitle.textContent = 'Add New Task';
    submitBtn.textContent = 'Create Task';
    taskForm.action = createUrl;
    taskForm.method = 'POST';

    // Reset values
    nameInput.value = '';
    descInput.value = '';
    statusInput.value = 'pending'; // default

    taskModal.classList.remove('hidden');
    taskModal.classList.add('flex');
  };

  // 🟡 Edit Modal
  window.showEditModal = function (editUrl, name, description, status) {
    modalTitle.textContent = 'Edit Task';
    submitBtn.textContent = 'Update Task';
    taskForm.action = editUrl;

    // Remove old method if exists
    const oldMethod = taskForm.querySelector('input[name="_method"]');
    if (oldMethod) oldMethod.remove();

    // Add PUT method
    const methodInput = document.createElement('input');
    methodInput.type = 'hidden';
    methodInput.name = '_method';
    methodInput.value = 'POST'; // or 'PUT' if using resource routes
    taskForm.appendChild(methodInput);

    // Fill existing data
    nameInput.value = name;
    descInput.value = description;
    statusInput.value = status; // set existing status

    taskModal.classList.remove('hidden');
    taskModal.classList.add('flex');
  };

  // ❌ Close Create/Edit Modal
  cancelTaskModalBtn.addEventListener('click', () => {
    taskModal.classList.add('hidden');
    taskModal.classList.remove('flex');
  });


  // ================================
  // 🔴 DELETE MODAL
  // ================================
  const deleteModal = document.getElementById('deleteModal');
  const cancelDeleteBtn = document.getElementById('cancelDelete');
  const deleteForm = document.getElementById('deleteForm');

  window.showDeleteModal = function (deleteUrl) {
    console.log("Delete URL:", deleteUrl);
    deleteForm.setAttribute('action', deleteUrl);
    deleteModal.classList.remove('hidden');
    deleteModal.classList.add('flex');
  };

  window.closeDeleteModal = function () {
    deleteModal.classList.add('hidden');
    deleteModal.classList.remove('flex');
  };

  cancelDeleteBtn.addEventListener('click', () => {
    closeDeleteModal();
  });


  // ================================
  // 🔵 VIEW MODAL
  // ================================
  window.showViewModal = function (url, name, description) {
    document.getElementById('viewTaskName').textContent = name;
    document.getElementById('viewTaskDescription').textContent = description;
    document.getElementById('viewModal').classList.remove('hidden');
    document.getElementById('viewModal').classList.add('flex');
  };

  window.closeViewModal = function () {
    document.getElementById('viewModal').classList.add('hidden');
    document.getElementById('viewModal').classList.remove('flex');
  };

  // success message  fade out
const successMessage = document.getElementById('success-message');
  if (successMessage) {
    setTimeout(() => {
      successMessage.classList.add('opacity-0', 'transition-opacity', 'duration-500');
      setTimeout(() => successMessage.remove(), 500);
    }, 2000); // fade after 2s
  }
  
});
