async function addOrder() {
    const name = document.getElementById('name').value,
        telephone = document.getElementById('phone').value,
        company = document.getElementById('company').value,
        service = document.getElementById('service').value,
        type = document.getElementById('type').value,
        avto = document.getElementById('avto').value;

    let formData = new FormData();
    formData.append('name', name);
    formData.append('telephone', telephone);
    formData.append('company', company);
    formData.append('service', service);
    formData.append('type', type);
    formData.append('avto', avto);

    const res = await fetch('http://api.avtotech.ru/orders', {
        method: 'POST',
        body: formData
    });

    const data = await res.json();

    console.log(data);
}

