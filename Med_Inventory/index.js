document.getElementById("#second").selectedIndex = -1;

document.querySelector("#second").addEventListener("click", function() {

    Swal.fire({
  
      title: "Are you sure about deleting this file?",
  
      type: "info",
  
      showCancelButton: true,
  
      confirmButtonText: "Delete It",
  
      confirmButtonColor: "#ff0055",
  
      cancelButtonColor: "#999999",
  
      reverseButtons: true,
  
      focusConfirm: false,
  
      focusCancel: true
  
    });
  
  });
  