document.getElementById('giftForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent form submission to validate first

  const firstName = document.getElementById('firstName').value;
  const secondName = document.getElementById('secondName').value;
  const familyName = document.getElementById('familyName').value;
  const email = document.getElementById('email').value;
  const phoneNumber = document.getElementById('phoneNumber').value;

  // Email validation for Gmail
  const emailRegex = /^[^\s@]+@gmail\.com$/;
  if (!emailRegex.test(email)) {
    alert('Please enter a valid Gmail address. \n الرجاء إدخال عنوان جيميل صالح.');
    return false; // Stop the form submission
  }

  const phoneRegex = /^(?:\+967)?(?:7[0-9]{8})$/;
  if (!phoneRegex.test(phoneNumber)) {
    alert('Please enter a valid Yemen phone number. Format: +967 7XX XXX XXX or 07XX XXX XXX \nالرجاء إدخال رقم هاتف يمني صالح. الصيغة: +967 7XX XXX XXX \nأو 07XX XXX XXX.');
    return false; // Stop the form submission
  }
  
  console.log('Form submitted with:', {
      firstName,
      secondName,
      familyName,
      email,
      phoneNumber,
  });

  document.getElementById('giftForm').submit();
});
