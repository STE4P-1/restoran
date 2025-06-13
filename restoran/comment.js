// Обработчик для звезд рейтинга
document.querySelectorAll('.rating-input .star').forEach((star) => {
    star.addEventListener('click', () => {
        const rating = star.dataset.rating;
        document.getElementById('ratingValue').value = rating;
        updateStars(rating);
    });

    star.addEventListener('mouseover', () => {
        const rating = star.dataset.rating;
        highlightStars(rating);
    });

    star.addEventListener('mouseout', () => {
        const currentRating = document.getElementById('ratingValue').value;
        if (currentRating) {
            updateStars(currentRating);
        } else {
            resetStars();
        }
    });
});

// Функция для подсветки звезд при наведении
function highlightStars(rating) {
    document.querySelectorAll('.rating-input .star').forEach((star, index) => {
        if (index < rating) {
            star.classList.add('hover');
        } else {
            star.classList.remove('hover');
        }
    });
}

// Функция для обновления состояния звезд
function updateStars(rating) {
    document.querySelectorAll('.rating-input .star').forEach((star, index) => {
        if (index < rating) {
            star.classList.add('active');
            star.classList.remove('hover');
        } else {
            star.classList.remove('active');
            star.classList.remove('hover');
        }
    });
}

// Функция для сброса всех звезд
function resetStars() {
    document.querySelectorAll('.rating-input .star').forEach((star) => {
        star.classList.remove('active');
        star.classList.remove('hover');
    });
}

// Функция для загрузки комментариев
function loadComments() {
    fetch('load_comments.php')
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                const commentsBlock = document.querySelector('.comments-block');
                commentsBlock.innerHTML = '';

                data.comments.forEach(comment => {
                    const newComment = document.createElement('div');
                    newComment.classList.add('comment');

                    const ratingDiv = document.createElement('div');
                    ratingDiv.classList.add('rating');
                    ratingDiv.innerHTML = '★'.repeat(comment.rating) + '☆'.repeat(5 - comment.rating);
                    newComment.appendChild(ratingDiv);

                    const commentContent = document.createElement('div');
                    commentContent.classList.add('comment-content');

                    const commentTextP = document.createElement('p');
                    commentTextP.classList.add('comment-text');
                    commentTextP.textContent = comment.comment;

                    const commentAuthor = document.createElement('span');
                    commentAuthor.classList.add('comment-author');
                    commentAuthor.textContent = `— ${comment.author}`;

                    commentContent.appendChild(commentTextP);
                    commentContent.appendChild(commentAuthor);
                    newComment.appendChild(commentContent);

                    commentsBlock.appendChild(newComment);
                });
            } else {
                console.error('Ошибка при загрузке комментариев');
            }
        })
        .catch(error => {
            console.error('Ошибка:', error);
        });
}

// Загружаем комментарии при загрузке страницы
document.addEventListener('DOMContentLoaded', loadComments);

// Обработчик отправки формы
document.getElementById('addCommentForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const rating = document.getElementById('ratingValue').value;
    const commentText = document.getElementById('commentInput').value.trim();
    const author = document.getElementById('authorInput').value.trim();

    if (!rating || !commentText || !author) {
        alert('Пожалуйста, заполните все поля!');
        return;
    }

    fetch('submit_comment.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `author=${encodeURIComponent(author)}&comment=${encodeURIComponent(commentText)}&rating=${encodeURIComponent(rating)}`,
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            loadComments();
            document.getElementById('addCommentForm').reset();
            resetStars();
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Ошибка:', error);
        alert('Произошла ошибка при отправке комментария');
    });
});