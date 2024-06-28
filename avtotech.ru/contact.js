async function getContacts() {
    let res = await fetch('http://api.avtotech.ru/contacts');
    let contacts = await res.json();

    // document.querySelector('.table').innerHTML = '';

    contacts.forEach((contact) => {
        document.querySelector('.telephone').innerHTML += `
        
            
           <img src="assets/icons/russia.png" alt="" class="ru">
            <a class="phone" href="">${contact.telephone}</a>
        
        
        `

        document.querySelector('.footer__container').innerHTML += `
        
            
           <div class="contacts">
				<h2 class="footer__title">Наши контакты:</h2>
				<ul>
					<li><a href="#!"><img src="assets/icons/telega.svg"> ${contact.telegram}</a></li>
					<li><a href="#!"><img src="assets/icons/telephone.svg"> ${contact.telephone}</a></li>
					<li><a href="#!"><img src="assets/icons/mail.svg"> ${contact.email}</a></li>
				</ul>
			</div>
			<div class="adress">
				<h2 class="footer__title">Наш адрес:</h2>
				<h3 class="adress__desc">${contact.address}</h3>
			</div>
        
        
        `
    });
}

getContacts();