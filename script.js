// Select the form element and add an event listener for form submission
const form = document.querySelector('.alumni-form');
form.addEventListener('submit', handleSubmit);

function handleSubmit(event) {
  // Prevent the default form submission behavior
  event.preventDefault();

  // Get the form values
  const name = form.elements.name.value;
  const branch = form.elements.branch.value;
  const phone = form.elements.phone.value;
  const email = form.elements.email.value;
  const company = form.elements.company.value;
  const salary = form.elements.salary.value;

  // Create a new FormData object and append the form values
  const formData = new FormData();
  formData.append('name', name);
  formData.append('branch', branch);
  formData.append('phone', phone);
  formData.append('email', email);
  formData.append('company', company);
  formData.append('salary', salary);

  // Send a POST request to the server to store the form data in a database
  fetch('submit.php', {
  method: 'POST',
  body: formData
})
.then(response => response.text())
.then(data => {
  alert('Alumni details submitted successfully!');
  form.reset();
})
.catch(error => {
  alert('Oops! Something went wrong. Please try again.');
  console.error(error);
});
}


