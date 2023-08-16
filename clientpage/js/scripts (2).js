// get references to the buttons and card elements
const personalInfoBtn = document.querySelector('#personal-info button');
const contactInfoBtns = document.querySelectorAll('#contact-info button');
const accountDetailsBtn = document.querySelector('#account-details button');
const personalInfoCard = document.querySelector('#personal-info');
const contactInfoCard = document.querySelector('#contact-info');
const accountDetailsCard = document.querySelector('#account-details');

// add event listeners to the buttons to toggle the visibility of the card elements
personalInfoBtn.addEventListener('click', () => {
  personalInfoCard.style.display = 'none';
  contactInfoCard.style.display = 'block';
});

contactInfoBtns[0].addEventListener('click', () => {
  contactInfoCard.style.display = 'none';
  personalInfoCard.style.display = 'block';
});

contactInfoBtns[1].addEventListener('click', () => {
  contactInfoCard.style.display = 'none';
  accountDetailsCard.style.display = 'block';
});

accountDetailsBtn[0].addEventListener('click', () => {
  contactInfoCard.style.display = 'block';
  accountDetailsCard.style.display = 'none';
});
accountDetailsBtn.addEventListener('click', () => {
  // collect form data
  const firstName = document.querySelector('input[name="firstName"]').value;
  const middleName = document.querySelector('input[name="middleName"]').value;
  const lastName = document.querySelector('input[name="lastName"]').value;
  const address = document.querySelector('input[name="address"]').value;
  const phoneNumber = document.querySelector('input[name="phoneNumber"]').value;
  const email = document.querySelector('input[name="email"]').value;
  const accountName = document.querySelector('input[name="accountName"]').value;
  const accountNumber = document.querySelector('input[name="accountNumber"]').value;
  const bankName = document.querySelector('input[name="bankName"]').value;

  // create an object with the form data
  const formData = {
    firstName,
    middleName,
    lastName,
    address,
    phoneNumber,
    email,
    accountName,
    accountNumber,
    bankName,
  };

  // submit the form data to the server here
  console.log(formData);
});
