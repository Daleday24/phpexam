function openModal() {
  document.getElementById("modal-container").style.display = "flex";
}
function closeModal() {
  document.getElementById("modal-container").style.display = "none";
}

function openAdd() {
  openModal();
  document.getElementById("form-add").style.display = "flex";
  document.getElementById("form-edit").style.display = "none";
}
function closeAdd() {
  closeModal();
  document.getElementById("form-add").style.display = "none";
  document.getElementById("form-edit").style.display = "none";
}

function openEdit() {
  openModal();
  document.getElementById("form-add").style.display = "none";
  document.getElementById("form-edit").style.display = "flex";
}
function closeEdit() {
  closeModal();
  document.getElementById("form-add").style.display = "none";
  document.getElementById("form-edit").style.display = "none";
  window.location = "index.php";
}

function deleteItem(id) {
  swal({
    title: "Are you sure?",
    text: "Delete this item",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      swal("Person's info has been deleted!", {
        icon: "success",
      }).then(function () {
        window.location = "index.php?delete_id=" + id;
      });
    } else {
      swal("Delete canceled");
    }
  });
}
