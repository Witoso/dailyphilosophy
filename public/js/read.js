$(() => {


    // part responsible for moving the screen to the current bookmark
    if (cookieExists('bookmarks')) {
        let content = JSON.parse(getCookie('bookmarks'));
        let titleCurrentPage = $('#title').text();
        if (titleCurrentPage in content) {
            let id = content[titleCurrentPage];
            $('body').animate({
                scrollTop: $(`#${id}`).offset().top
            }, 2000);
        }
    }


    $('p').dblclick(function() {
        console.log('clicked');
        let title = $('#title').text();
        let id = $(this).attr('id');
        if (cookieExists('bookmarks')) {
            let content = JSON.parse(getCookie('bookmarks'));
            content[title] = id;
            setCookie('bookmarks', JSON.stringify(content), 30);
        } else {
            let content = {};
            content[title] = id;
            setCookie('bookmarks', JSON.stringify(content), 30)
        }
        $('#confirmation').toggle().fadeOut(3000);
    });
});


function setCookie(cname, cvalue, exdays) {
    let d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    let name = cname + "=";
    let ca = document.cookie.split(';');
    for(let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}

function cookieExists(name) {
    let cookie = getCookie(name);
    if (cookie != "") {
        return true;
    } else {
        return false;
    }
}
