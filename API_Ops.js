function validateWhatsApp() {
	const countryCode = document.getElementById('countryCode').value;
	const number = document.getElementById('whatsapp').value;
	const phoneNumber = countryCode + number;
	const data = JSON.stringify({ phone_number: phoneNumber });
	const xhr = new XMLHttpRequest();
	xhr.withCredentials = false;

	xhr.addEventListener('readystatechange', function () {
	  if (this.readyState === this.DONE) {
		console.log(this.responseText);
		const response = JSON.parse(this.responseText);
		var message = "";
		if(response.status === "valid"){
			message="Your WhatsApp number is valid.";
		}
		else if(response.status === "invalid"){
			message="Your WhatsApp number is not valid.";
		}
		else{
			message="API is currently not available.";
		}
		document.getElementById('validation').textContent = message;
		document.getElementById('validation').style.color = response.status === "valid" ? "green" : "red";
	  }
	});

	xhr.open('POST', 'https://whatsapp-number-validator3.p.rapidapi.com/WhatsappNumberHasItWithToken');
	xhr.setRequestHeader('Content-Type', 'application/json');
	xhr.setRequestHeader('x-rapidapi-key', '1c98c27dc9msh73b2effbd8694d9p15a56djsn4717ee9c6af4');
	xhr.setRequestHeader('x-rapidapi-host', 'whatsapp-number-validator3.p.rapidapi.com');

	xhr.send(data);
  }
