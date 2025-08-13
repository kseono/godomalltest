/**
 * Created by qnibus on 2016-06-08.
 */

// jquery가 없는 경우 스크립트 로드 후 실행한다.
if (typeof jQuery != 'undefined') {
    runScript();
} else {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    if (script.readyState){  //IE
        script.onreadystatechange = function(){
            if (script.readyState == "loaded" ||
                script.readyState == "complete"){
                script.onreadystatechange = null;
                runScript();
            }
        };
    } else {  //Others
        script.onload = function(){
            runScript();
        };
    }
    script.src = '/admin/gd_share/script/jquery/jquery.min.js';
    document.getElementsByTagName("head")[0].appendChild(script);
}

function runScript() {
    // 미리보기 팝업창만 제외 처리
    if (window.location.pathname == '/development/popup_preview.php') {
        return false;
    }

    $(function() {
        // body에 preview를 알려주는 클래스 추가
        $('body').addClass('works-preview');

        // body에 preview 템플릿 추가
        var previewTemplate = '';
        previewTemplate += '<div class="preview-title">';
        previewTemplate += '<span class="title">작업소스 미리보기 상태입니다.</span>';
        previewTemplate += '<button type="button" class="preview-btn">미리보기 해제</button>';
        previewTemplate += '</div>';
        $('body').prepend(previewTemplate);

        // 미리보기 해제하기
        $(document).on('click', '.preview-btn', function(e) {
            // 현재 쿼리스트링 가져오기
            var queryString = getUrlVars();

            // __gd5_work_preview가 있는 경우 제거
            if (!_.isUndefined(queryString['__gd5_work_preview'])) {
                delete queryString['__gd5_work_preview'];
            }

            // __gd5_work_preview를 해제를 위한 값으로 변경
            queryString['__gd5_work_preview'] = 'clear';

            // 해제처리를 위해 URL 투척
            window.location.replace(window.location.pathname + '?' + $.param(queryString));
        });
    });
}

/**
 * 현 주소의 queryString 값을 가져와 object로 반환
 *
 * @returns {{}}
 */
function getUrlVars() {
    if (!window.location.search) {
        return({});   // return empty object
    }
    var parms = {};
    var temp;
    var items = window.location.search.slice(1).split("&");   // remove leading ? and split
    for (var i = 0; i < items.length; i++) {
        temp = items[i].split("=");
        if (temp[0]) {
            if (temp.length < 2) {
                temp.push("");
            }
            parms[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
        }
    }
    return(parms);
}

