async function getReviews() {
    let res = await fetch('http://api.avtotech.ru/reviews');
    let reviews = await res.json();

    document.querySelector('.table').innerHTML = '';

    reviews.forEach((review) => {
        document.querySelector('.table').innerHTML += `
        
            
            <tbody>
                <tr>
                    <td>${review.id}</td>
                    <td>${review.name}</td>
                    <td>${review.review}</td>

                    <td>
                        <a class='btn btn-danger btn-sm text-light' onclick='deleteReview(${review.id})'>Удаление</a>
                    </td>
                </tr>
            </tbody>
        
        
        `
    });
}

async function deleteReview(id) {
    const res = await fetch(`http://api.avtotech.ru/reviews/${id}`, {
        method: 'DELETE'
    });

    const data = await res.json();

    if (data.status === true) {
        await getReviews();
    }
}

getReviews();