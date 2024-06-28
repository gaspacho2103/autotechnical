async function getContacts() {
    let res = await fetch('http://api.avtotech.ru/contacts');
    let contacts = await res.json();

    document.querySelector('.table').innerHTML = '';

    contacts.forEach((contact) => {
        document.querySelector('.table').innerHTML += `
        
            
           <tbody>
                <tr>
                    <td>${contact.telephone}</td>
                    <td>${contact.telegram}</td>
                    <td>${contact.email}</td>
                    <td>${contact.address}</td>

                    <td>
                        <a class='btn btn-primary btn-sm text-light' href='actions/updateContacts.php'>Редактирование</a>
                    </td>
                </tr>
            </tbody>
        
        
        `
    });
}

async function updateContacts() {
    const telephone = document.getElementById('telephone').value,
        telegram = document.getElementById('telegram').value,
        email = document.getElementById('email').value,
        address = document.getElementById('address').value;

    const data = {
        telephone: telephone,
        telegram: telegram,
        email: email,
        address: address
    }

    const res = await fetch(`http://api.avtotech.ru/contacts`, {
        method: 'PATCH',
        body: JSON.stringify(data)
    });

    let resData = res.json();

    if (resData.status === true) {
        await getContacts();
    }
}

getContacts();