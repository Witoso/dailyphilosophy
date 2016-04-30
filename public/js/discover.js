$(() => {
    $.ajax({
        url: '/discover/getArticle',
        dataType: 'json',
        error: () => console.log('error occured'),
        success: (json) => {
            $('#title').text(json.title);
            $('#intro').text(json.intro);
            $('#details').attr('href', json.url);
            $('#loading').toggle();
            $('#article').toggle();
        }
    });
});
