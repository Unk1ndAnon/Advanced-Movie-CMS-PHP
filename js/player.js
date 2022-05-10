var player = jwplayer('watch-player'), sources, tracks, player_title = '', retried = false, watchId;

function setup_player() {
    var config = {
        autostart: false,
        displaytitle: true,
        title: player_title,
        sources: sources,
        tracks: tracks,
        cast: {},
        captions: {
            color: '#f3f378',
            fontSize: 14,
            backgroundOpacity: 0,
            fontfamily: "Helvetica",
            edgeStyle: "raised"
        },
    };
    player.setup(config);
    player.on('complete', function () {
        if (movie.type == 2) {
            setTimeout(function () {
                $('#sv-tabContent a.active').parent().next().find('a').click();
            }, 2000);
        }
    });
    player.on('play', function () {

    });
    player.on('ready', function () {
        setTimeout(function () {
            player.play();
        }, 1000);
    });
    player.on('seek', function (e) {

    });
    player.on('time', function () {

    });
    player.on('error', function (e) {
        console.log('player error');
        if (!retried) {
            get_source_backup();
        }
    });
    player.on('setupError', function (e) {
        console.log('player setup error: ' + JSON.stringify(e));
        if (!retried) {
            get_source_backup();
        }
    });
}

function get_source_backup() {
    retried = true;
    grecaptcha.execute(recaptcha_site_key, {action: 'retry_get_link'}).then(function (token) {
        $.get("/ajax/retry_get_link/" + watchId + "?_token=" + token, function (res) {
            sources = res.sources;
            setup_player();
        });
    });
}

function get_source(watch_id) {
    retried = false;
    watchId = watch_id;
    $('#watch-' + watch_id).addClass('active');
    $('#mask-player').show();
    $('#iframe-embed').attr('src', '');
    $('#watch-iframe').hide();
    $('#watch-player').hide();

    // if (typeof recaptcha_site_key !== 'undefined') {
    //     grecaptcha.execute(recaptcha_site_key, {action: 'get_link'}).then(function (token) {
    //         request(watch_id, token);
    //     });
    // } else {
    //     request(watch_id, '');
    // }
    request(watch_id, '')
}

function request(watch_id, token) {
    $.get("/ajax/get_link/" + watch_id + "?_type=" + movie.type, function (res) {
        $('#mask-player').hide();
        if (res.type == 'direct') {
            sources = res.sources;
            tracks = res.tracks;
            if (movie.type == 2) {
                player_title = res.title;
            }
            setup_player();
            $('#iframe-embed').attr('src', '');
            $('#watch-iframe').hide();
            $('#watch-player').show();
        } else {
            player.stop();
            $('#iframe-embed').attr('src', res.link);
            $('#watch-iframe').show();
            $('#watch-player').hide();
        }
    });
}

var eventMethod = window.addEventListener
    ? "addEventListener"
    : "attachEvent";
var eventer = window[eventMethod];
var messageEvent = eventMethod === "attachEvent"
    ? "onmessage"
    : "message";
eventer(messageEvent, function (e) {
    if (e.data === "player_complete" || e.message === "player_complete") {
        if (movie.type == 2) {
            setTimeout(function () {
                $('#sv-tabContent a.active').parent().next().find('a').click();
            }, 2000);
        }
    }
});