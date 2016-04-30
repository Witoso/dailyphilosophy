$(() => {
    $('.details').click((event) => {
        let name = $(event.target).text()
        $.ajax({
            url: '/meet/' + name,
            dataType: 'json',
            error: () => {console.log('error occurred')},
            success: (json) => {
                console.log(json);
                $('#name').text(name);
                $('#image').attr('src', json.imageUrl);
                $('#info').text(json.information);
                $('#moreInfo').attr('href', json.detailsUrl);
                $('#popup').css('display', 'block');
            }
        });
    });


    $('.close').click(() => {
        $('#popup').css("display", "none");
    });
});