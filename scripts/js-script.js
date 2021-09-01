function myFunc() {
    let username = document.getElementById('account-name');
    if (username.innerText === 'Войти') {
        document.getElementById('account-page-button').checked = true;
    } else {
        document.getElementById('number-of-char').innerText = '0/180';
        let textElem = document.getElementById("new-comment-typing").value;
        if (textElem !== '') {
            let now = new Date();
            let newElem = document.createElement("div"); // создаем новый элемент <button>
            newElem.className = "comment";
            // newElem.appendChild( text ); // добавляем текстовое содержимое элементу <button>
            newElem.innerHTML = "<div class=\"comment-author-name\">" + username.innerText + "</div>\n" +
                "<div class=\"comment-text\">\n" +
                textElem +
                "</div>\n" +
                "<div class='comment-date'>\n" +
                now.toString("dd.MM.yyyy") + "</div>" +
                "<div class='comment-likes'>" + "<img src='img/likeheart.png' alt='Лайки'>" +
                    "<span class='comment-likes-amount'>0</span>" +
                "</div>";
            // document.body.appendChild( newElem );  // добавляем наш элемент в элемент <body>
            document.getElementById("block-comments").append(newElem);
            document.getElementById("new-comment-typing").value = '';
        }
    }
}

function newLike(id) {
    document.getElementById(id).innerText++;
}

function memo_onkeyup()
{
    let now = new Date();
    document.getElementById('datee').value = now.toString("dd.MM.yyyy");
    document.getElementById('authorr').value = document.getElementById('account-name').innerText;
    document.getElementById('commentt').value = document.getElementById('new-comment-typing').innerText;
    let s = document.getElementById('new-comment-typing').value;
    let c = s.length;
    document.getElementById('number-of-char').innerText = c + '/180';

}

