import Swal from "sweetalert2";

export const convertToThousands = (price) => {
  return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
};

export const showSuccess = (message) => {
  Swal.fire({
    icon: "success",
    title: "Success",
    text: message,
  });
};

export const showError = (message) => {
  Swal.fire({
    icon: "error",
    title: "Error",
    text: message,
  });
};
