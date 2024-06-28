async function getReviews() {
    let res = await fetch('http://api.avtotech.ru/reviews');
    let reviews = await res.json();

    // document.querySelector('.table').innerHTML = '';

    reviews.forEach((review) => {
        document.querySelector('.reviews').innerHTML += `
        
            
           <div class="review_card">
                            <h5 class="nickname">${review.name}</h5>
                            <p class="comment">${review.review}</p>
            </div>
        
        
        `
    });
}

async function addReview() {
    const name = document.getElementById('name').value,
        review = document.getElementById('review').value;

    let formData = new FormData();
    formData.append('name', name);
    formData.append('review', review);

    const res = await fetch('http://api.avtotech.ru/reviews', {
        method: 'POST',
        body: formData
    });

    const data = await res.json();

    console.log(data);
}

getReviews();