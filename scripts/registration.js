function submitForm() {
  const formData = {
    firstName: document.getElementById("firstName").value,
    lastName: document.getElementById("lastName").value,
    nickname: document.getElementById("nickname").value,
    phoneNumber: document.getElementById("phoneNumber").value,
  };

  fetch("api/registration.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(formData),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        // Handle successful registration
        alert(data.message);
      } else {
        // Handle errors
        alert(data.message);
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

document.querySelector("form").addEventListener("submit", (e) => {
  e.preventDefault();
  submitForm();
});
