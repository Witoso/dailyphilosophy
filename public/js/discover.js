$(() => {
    $.ajax({
        url: '/discover/getArticle',
        dataType: 'json',
        error: () => console.log('error occurred'),
        success: (json) => {
            $('#title').text(json.title);
            $('#intro').text(json.intro);
            //console.log(json.toc);
            $('#toc').append(json.toc);

            $( "li a" ).each(function() {
                let part = $(this).attr('href');
                $(this).attr('href', json.url + part);
            });

            $('#details').attr('href', json.url);
            $('#loading').toggle();
            $('#article').toggle();

        }
    });
});
