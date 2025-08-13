_define(
    'PSApps.NHNGodo.WeatherWidgetFree.FrontBlock',
    function () {
      var block = (function () {

        /**
         *
         * @type {null}
         * @private
         */
        var __widget_link_usable_setting = null;

        /**
         *
         * @type {null}
         * @private
         */
        var __widget_background_color_usable_setting = null;

        /**
         *
         * @type {null}
         * @private
         */
        var __widget_border_usable_setting = null;

        /**
         *
         * @type {null}
         * @private
         */
        var __font_color = null;

        /**
         *
         * @type {null}
         * @private
         */
        var __background_color = null;

        /**
         *
         * @type {null}
         * @private
         */
        var __border_color = null;

        /**
         *
         * @type {null}
         * @private
         */
        var __widget_type = null;

        /**
         *
         * @type {null}
         * @private
         */
        var __image_path = null;

        /**
         *
         * @type {{}}
         */
        var config = {};


        /**
         *
         * @type {null}
         * @private
         */
        var __base_location = null;

        /**
         * @return null
         * @param config
         */
        function init(config) {
          this.config = config;
          __widget_link_usable_setting = config['widget_link_usable_setting'];
          __widget_background_color_usable_setting = config['widget_background_color_usable_setting'];
          __widget_border_usable_setting = config['widget_border_usable_setting'];
          __font_color = config['font_color'];
          __background_color = config['background_color'];
          __border_color = config['border_color'];
          __widget_type = config['widget_type'];
          __image_path = config['image_path'];
          _post({}, '');
        }//end init()

        /**
         * @return null
         * @param post_data
         * @param method
         * @private
         */
        function _post(post_data, method, self) {
          post_data.method = method;

          var post = function () {
            $.post(block.config.process, post_data, function (data) {
              _toHtml(data);
              $(self).parents('.weather').unmask();
            }, "json");
          };
          var post_process = function (callback) {
            callback();
          };
          post_process(post);
        }//end _post

        /**
         *
         * @return {Array}
         * @private
         */
        function _dayOfTheWeek() {
          var week = ['일', '월', '화', '수', '목', '금', '토'];
          var today = new Date().getDay();
          var return_week = [];
          if (today == 0) {
            return_week = week;
          } else if (week == 6) {
            $.merge(return_week, week[6]);
            $.merge(return_week, week.slice(0,5));
          } else {
            $.merge(return_week, week.slice(today));
            $.merge(return_week, week.slice(0, today));
          }
          return return_week;
        }//end _dayOfTheWeek()

        /**
         * @return null
         * @param data
         * @private
         */
        function _toHtml(data) {
          var weather = data['weather'];

          var html = [];
          if (!weather) {
            weather = {
              0 : {
                REH:0,
                T1H:0,
                TMX:0,
                TMN:0,
                code:0
              },
              1 : {
                TMN:0,
                TMX:0,
                code:0
              },
              2 : {
                TMN:0,
                TMX:0,
                code:0
              },
              3 : {
                TMN:0,
                TMX:0,
                code:0
              },
              4 : {
                TMN:0,
                TMX:0,
                code:0
              },
            }
          }
          switch (__widget_type) {
            case "0":
              html = __makeGeneralWidget(data);
              break;
            case "1":
              html = __makeListWidget(data);
              break;
            case "2":
              html = __makeSimpleWidget(data);
              break;
          }


          $('.weather_widget_wrapper').children().remove();
          $('.weather_widget_wrapper').append(html.join(''));


        }//end _toHtml()

        /**
         *
         * @param data
         * @return {Array}
         * @private
         */
        function __makeGeneralWidget(data) {

          var html = [];
          var week = _dayOfTheWeek();

          html.push('<div class="weather" style="border: 1px solid '+__border_color+';">');
          html.push('<div class="wt_top"  style="border-bottom: 1px solid '+__border_color+';">');
          html.push('<div class="wt_title">');

          if (__widget_link_usable_setting == 0 ) {
            html.push('<a href="http://www.weather.go.kr/weather/main.jsp" target="_blank" class="meteo"><img src="' + __image_path + 'wt_title.png" alt="기상청"></a>');
          }
          html.push('<a href="javascript:void(0);" class="locate" value="'+data["base_location"]+'">'+data["base_location"]+'</a>');
          html.push('<div class="week_wrap">');
          html.push('<span class="week">'+week[0]+'요일</span>');
          html.push('<a href="" class="refresh"><img src="'+__image_path+'wt_refresh.png" alt="다시보기"></a>');
          html.push('</div>');
          html.push('<div class="pop_location">');
          html.push('<img src="'+__image_path+'pop_point.png" class="pop_point" alt="꼭지점">');
          html.push('<a href="javascript:void(0);" class="ico_x"><img src="'+__image_path+'ico_x.png" alt="닫기"></a>');
          html.push('<ul class="base_location">');
          var selected;
          for (var i in data.location) {
            selected = (data.base_location === data.location[i]) ? ' class="selected"' : '';
            html.push('<li' + selected + '><a href="javascript:void(0);"><span class="baselocation_options">' +
                data.location[i] + '</span></a></li>');
          }
          html.push('</ul>');
          html.push('</div>');
          html.push('</div>');
          html.push('<div class="wt_cont">');
          html.push('<div class="wt_img">');

          html.push('<img src="'+__image_path+__weatherImage(data['weather'][0]['code']?data['weather'][0]['code']:0)+'" alt="100*100날씨이미지">');
          html.push('</div>');
          html.push('<div class="wt_box">');
          html.push('<div class="temp_wrap">');
          html.push('<span class="temp">'+(data["weather"][0]["T1H"]?data["weather"][0]["T1H"]:0)+'</span><span class="dc">℃</span>');
          html.push('</div>');
          html.push('<div class="tempthan">'+(data["weather"][0]["TMN"]?data["weather"][0]["TMN"]:0)+'℃/'+(data["weather"][0]["TMX"]?data["weather"][0]["TMX"]:0)+'℃</div>');
          html.push('<div class="wet"><img src="'+__image_path+'ico_wet.png" class="ico_wet" alt="습도">습도'+(data["weather"][0]["REH"]?data["weather"][0]["REH"]:0)+'%</div>');
          if (__widget_link_usable_setting == 0 ) {
            html.push(('<a href="http://www.weather.go.kr/weather/main.jsp" target="_blank" class="meteo"><img src="'+__image_path+'wt_title.png" alt="기상청"></a>'));
          }
          html.push('</div>');
          html.push('</div>');
          html.push('</div>');
          html.push('<div class="wt_week">');
          html.push('<ul>');
          html.push('<li>');
          html.push('<span class="week">'+week[1]+'</span>');
          html.push('<span class="wt_img"><img src="'+__image_path+__weatherWeekImage(data['weather'][1]['code']?data['weather'][1]['code']:0) +'" alt="날씨이미지"></span>');
          html.push('<span class="tempthan">'+(data['weather'][1]['TMN']?data['weather'][1]['TMN']:0)+'/'+(data['weather'][1]['TMX']?data['weather'][1]['TMX']:0)+'℃</span>');
          html.push('</li>');
          html.push('<li>');
          html.push('<span class="week">'+week[2]+'</span>');
          html.push('<span class="wt_img"><img src="'+__image_path+__weatherWeekImage(data['weather'][2]['code']?data['weather'][2]['code']:0)+'" alt="날씨이미지"></span>');
          html.push('<span class="tempthan">'+(data['weather'][2]['TMN']?data['weather'][2]['TMN']:0)+'/'+(data['weather'][2]['TMX']?data['weather'][2]['TMX']:0)+'℃</span>');
          html.push('</li>');
          html.push('<li>');
          html.push('<span class="week">'+week[3]+'</span>');
          html.push('<span class="wt_img"><img src="'+__image_path+__weatherWeekImage(data['weather'][3]['code']?data['weather'][3]['code']:0)+'" alt="날씨이미지"></span>');
          html.push('<span class="tempthan">'+(data['weather'][3]['TMN']?data['weather'][3]['TMN']:0)+'/'+(data['weather'][3]['TMX']?data['weather'][3]['TMX']:0)+'℃</span>');
          html.push('</li>');
          html.push('<li>');
          html.push('<span class="week">'+week[4]+'</span>');
          html.push('<span class="wt_img"><img src="'+__image_path+__weatherWeekImage(data['weather'][4]['code']?data['weather'][4]['code']:0)+'" alt="날씨이미지"></span>');
          html.push('<span class="tempthan">'+(data['weather'][4]['TMN']?data['weather'][4]['TMN']:0)+'/'+(data['weather'][4]['TMX']?data['weather'][4]['TMX']:0)+'℃</span>');
          html.push('</li>');
          html.push('</ul>');
          html.push('</div>');
          html.push('</div>');
          return html;
        }//end __makeGeneralWidget()


        /**
         *
         * @param data
         * @return {Array}
         * @private
         */
        function __makeListWidget(data) {
          var html = [];
          var week = _dayOfTheWeek();
          html.push('<div class="weather list"  style="border: 1px solid '+__border_color+';">');
          html.push('<div class="wt_top" "  style="border-bottom: 1px solid '+__border_color+';">');
          html.push('<div class="wt_title">');
          if (__widget_link_usable_setting == 0 ) {
            html.push('<a href="http://www.weather.go.kr/weather/main.jsp" target="_blank" class="meteo"><img src="' + __image_path + 'wt_title.png" alt="기상청"></a>');
          }
          html.push('<a href="javascript:void(0);" class="locate base_location" value="'+data["base_location"]+'">'+data["base_location"]+'</a>');
          html.push('<div class="week_wrap">');
          html.push('<span class="week">'+week[0]+'요일 </span>');
          html.push('<a href="javascript:void(0);" class="refresh"><img src="'+__image_path+'wt_refresh.png" alt="다시보기"></a>');
          html.push('</div>');
          html.push('<div class="pop_location">');
          html.push('<img src="'+__image_path+'pop_point.png" class="pop_point" alt="꼭지점">');
          html.push('<a href="javascript:void(0);" class="ico_x"><img src="'+__image_path+'ico_x.png" alt="닫기"></a>');
          html.push('<ul>');
          var selected;
          for (var i in data.location) {
            selected = (data.base_location === data.location[i]) ? ' class="selected"' : '';
            html.push('<li' + selected + '><a href="javascript:void(0);"><span class="baselocation_options">' +
                data.location[i] + '</span></a></li>');
          }
          html.push('</ul>');
          html.push('</div>');
          html.push('</div>');
          html.push('<div class="wt_cont">');
          html.push('<div class="wt_img"><img src="'+__image_path+'wt_img01.png" alt="100*100날씨이미지"></div>');
          html.push('<div class="wt_box">');
          html.push('<div class="temp_wrap">');
          html.push('<span class="temp">'+data+'</span><span class="dc">℃</span>');
          html.push('</div>');
          html.push('<div class="tempthan">'+(data['weather'][0]['TMN']?data['weather'][0]['TMN']:0)+'℃/'+(data['weather'][0]['TMX']?data['weather'][0]['TMX']:0)+'℃</div>');
          html.push('<div class="wet"><img src="'+__image_path+'ico_wet.png" class="ico_wet" alt="습도">습도'+(data['weather'][0]['REH']?data['weather'][0]['REH']:0)+'%</div>');
          if (__widget_link_usable_setting == 0 ) {
            html.push(('<a href="http://www.weather.go.kr/weather/main.jsp" target="_blank" class="meteo"><img src="'+__image_path+'wt_title.png" alt="기상청"></a>'));
          }
          html.push('</div>');
          html.push('</div>');
          html.push('</div>');
          html.push('<div class="wt_week">');
          html.push('<ul>');
          html.push('<li class="on">');
          html.push('<span class="week">'+week[0]+'</span>');
          html.push('<span class="wt_img"><img src="'+__image_path+__weatherWeekImage(data['weather'][0]['code']?data['weather'][0]['code']:0)+'" alt="날씨이미지"></span>');
          html.push('<span class="tempthan">'+(data['weather'][0]['TMN']?data['weather'][0]['TMN']:0)+'/'+(data['weather'][0]['TMX']?data['weather'][0]['TMX']:0)+'℃</span>');
          html.push('</li>');    // <!-- //리스트형에는 하나더 추가 -->
          html.push('<li class="on">');
          html.push('<span class="week">'+week[1]+'</span>');
          html.push('<span class="wt_img"><img src="'+__image_path+__weatherWeekImage(data['weather'][1]['code']?data['weather'][1]['code']:0)+'" alt="날씨이미지"></span>');
          html.push('<span class="tempthan">'+(data['weather'][1]['TMN']?data['weather'][1]['TMN']:0)+'/'+(data['weather'][1]['TMX']?data['weather'][1]['TMX']:0)+'℃</span>');
          html.push('</li>');
          html.push('<li class="on">');
          html.push('<span class="week">'+week[2]+'</span>');
          html.push('<span class="wt_img"><img src="'+__image_path+__weatherWeekImage(data['weather'][2]['code']?data['weather'][2]['code']:0)+'" alt="날씨이미지"></span>');
          html.push('<span class="tempthan">'+(data['weather'][2]['TMN']?data['weather'][2]['TMN']:0)+'/'+(data['weather'][2]['TMX']?data['weather'][2]['TMX']:0)+'℃</span>');
          html.push('</li>');
          html.push('<li class="on">');
          html.push('<span class="week">'+week[3]+'</span>');
          html.push('<span class="wt_img"><img src="'+__image_path+__weatherWeekImage(data['weather'][3]['code']?data['weather'][3]['code']:0)+'" alt="날씨이미지"></span>');
          html.push('<span class="tempthan">'+(data['weather'][3]['TMN']?data['weather'][3]['TMN']:0)+'/'+(data['weather'][3]['TMX']?data['weather'][3]['TMX']:0)+'℃</span>');
          html.push('</li>');
          html.push('<li class="on">');
          html.push('<span class="week">'+week[4]+'</span>');
          html.push('<span class="wt_img"><img src="'+__image_path+__weatherWeekImage(data['weather'][4]['code']?data['weather'][4]['code']:0)+'" alt="날씨이미지"></span>');
          html.push('<span class="tempthan">'+(data['weather'][4]['TMN']?data['weather'][4]['TMN']:0)+'/'+(data['weather'][4]['TMX']?data['weather'][4]['TMX']:0)+'℃</span>');
          html.push('</li>');
          html.push('</ul>');
          html.push('</div>');
          html.push('</div>');
          return html;
        }//end __makeListWidget()

        /**
         *
         * @param data
         * @return {Array}
         * @private
         */
        function __makeSimpleWidget(data) {
          var html = [];
          var week = _dayOfTheWeek();

          html.push('<div class="weather sim"  style="border: 1px solid '+__border_color+';">');
          html.push('<div class="wt_top">');
          html.push('<div class="wt_title"  style="border-bottom: 1px solid '+__border_color+';">');
          if (__widget_link_usable_setting == 0 ) {
            html.push('<a href="http://www.weather.go.kr/weather/main.jsp" target="_blank" class="meteo"><img src="' + __image_path + 'wt_title.png" alt="기상청"></a>');
          }
          html.push('<a href="javascript:void(0);" class="locate base_location" value="'+data["base_location"]+'">'+data["base_location"]+'</a>');
          html.push('<div class="week_wrap">');
          html.push('<span class="week">'+week[0]+'요일 </span>');
          html.push('<a href="javascript:void(0);" class="refresh"><img src="'+__image_path+'wt_refresh.png" alt="다시보기"></a>');
          html.push('</div>');
          html.push('<div class="pop_location">');
          html.push('<img src="'+__image_path+'pop_point.png" class="pop_point" alt="꼭지점">');
          html.push('<a href="javascript:void(0);" class="ico_x"><img src="'+__image_path+'ico_x.png" alt="닫기"></a>');
          html.push('<ul>');
          var selected;
          for (var i in data.location) {
            selected = (data.base_location === data.location[i]) ? ' class="selected"' : '';
            html.push('<li' + selected + '><a href="javascript:void(0);"><span class="baselocation_options">' +
                data.location[i] + '</span></a></li>');
          }
          html.push('</ul>');
          html.push('</div>');
          html.push('</div>');
          html.push('<div class="wt_cont">');
          html.push('<div class="wt_img"><img src="'+__image_path+__weatherSimpleImage(data['weather'][0]['code']?data['weather'][0]['code']:0)+'" alt="80*80날씨이미지"></div>');
          html.push('<div class="wt_box">');
          html.push('<div class="temp_wrap">');
          html.push('<span class="temp">'+(data['weather'][0]['T1H']?data['weather'][0]['T1H']:0)+'</span><span class="dc">℃</span>');
          html.push('</div>');
          html.push('<div class="tempthan">'+(data['weather'][0]['TMN']?data['weather'][0]['TMN']:0)+'℃/'+(data['weather'][0]['TMX']?data['weather'][0]['TMX']:0)+'℃</div>');

          html.push('<div class="wet"><img src="'+__image_path+'ico_wet.png" class="ico_wet" alt="습도">습도'+(data['weather'][0]['REH']?data['weather'][0]['REH']:0)+'%</div>');
          if (__widget_link_usable_setting == 0 ) {
            html.push('<a href="http://www.weather.go.kr/weather/main.jsp" target="_blank" class="meteo"><img src="'+__image_path+'wt_title_small.png" alt="작은기상청"></a>');
          }
          html.push('</div>');
          html.push('</div>');
          html.push('</div>');
          html.push('<div class="wt_week">');
          html.push('<ul>');
          html.push('<li>');
          html.push('<span class="week">'+week[1]+'</span>');
          html.push('<span class="wt_img"><img src="'+__image_path+'wt_week01.png" alt="날씨이미지"></span>');
          html.push('<span class="tempthan">'+(data['weather'][1]['TMN']?data['weather'][1]['TMN']:0)+'/'+(data['weather'][1]['TMN']?data['weather'][1]['TMN']:0)+'℃</span>');
          html.push('</li>');
          html.push('<li>');
          html.push('<span class="week">'+week[2]+'</span>');
          html.push('<span class="wt_img"><img src="'+__image_path+'wt_week01.png" alt="날씨이미지"></span>');
          html.push('<span class="tempthan">'+(data['weather'][2]['TMN']?data['weather'][2]['TMN']:0)+'/'+(data['weather'][2]['TMN']?data['weather'][2]['TMN']:0)+'℃</span>');
          html.push('</li>');
          html.push('<li>');
          html.push('<span class="week">'+week[3]+'</span>');
          html.push('<span class="wt_img"><img src="'+__image_path+'wt_week01.png" alt="날씨이미지"></span>');
          html.push('<span class="tempthan">'+(data['weather'][3]['TMN']?data['weather'][3]['TMN']:0)+'/'+(data['weather'][3]['TMN']?data['weather'][3]['TMN']:0)+'℃</span>');
          html.push('</li>');
          html.push('<li>');
          html.push('<span class="week">'+week[4]+'</span>');
          html.push('<span class="wt_img"><img src="'+__image_path+'wt_week01.png" alt="날씨이미지"></span>');
          html.push('<span class="tempthan">'+(data['weather'][4]['TMN']?data['weather'][4]['TMN']:0)+'/'+(data['weather'][4]['TMN']?data['weather'][4]['TMN']:0)+'℃</span>');
          html.push('</li>');
          html.push('</ul>');
          html.push('</div>');
          html.push('</div>');
          return html;
        }//end __makeSimpleWidget()

        /**
         *
         * @param code
         * @return {string}
         * @private
         */
        function __weatherImage(code) {
          var img = '';

          switch (code) {
            case 0 :
              img = 'wt_img01.png';
              break;
            case 1 :
              img = 'wt_img03.png';
              break;
            case 2 :
              img = 'wt_img02.png';
              break;
            case 3 :
              img = 'wt_img04.png';
              break;
            case 4 :
              img = 'wt_img06.png';
              break;
            case 5 :
              img = 'wt_img05.png';
              break;
            case 6 :
              img = 'wt_img08.png';
              break;
            case 7 :
              img = 'wt_img09.png';
              break;
            case 8 :
              img = 'wt_img11.png';
              break;
            case 9 :
              img = 'wt_img10.png';
              break;
            case 10 :
              img = 'wt_img13.png';
              break;
          }
          return img;
        }//end __weatherImage()

        /**
         *
         * @param code
         * @return {string}
         * @private
         */
        function __weatherWeekImage(code) {
          var img = '';

          switch (code) {
            case 0 :
              img = 'wt_week01.png';
              break;
            case 1 :
              img = 'wt_week03.png';
              break;
            case 2 :
              img = 'wt_week02.png';
              break;
            case 3 :
              img = 'wt_week04.png';
              break;
            case 4 :
              img = 'wt_week06.png';
              break;
            case 5 :
              img = 'wt_week05.png';
              break;
            case 6 :
              img = 'wt_week08.png';
              break;
            case 7 :
              img = 'wt_week09.png';
              break;
            case 8 :
              img = 'wt_week11.png';
              break;
            case 9 :
              img = 'wt_week10.png';
              break;
            case 10 :
              img = 'wt_week13.png';
              break;
          }
          return img;
        }//end __weatherWeekImage()

        /**
         *
         * @param code
         * @return {string}
         * @private
         */
        function __weatherSimpleImage(code) {
          var img = '';

          switch (code) {
            case 0 :
              img = 'wt_sim01.png';
              break;
            case 1 :
              img = 'wt_sim03.png';
              break;
            case 2 :
              img = 'wt_sim02.png';
              break;
            case 3 :
              img = 'wt_sim04.png';
              break;
            case 4 :
              img = 'wt_sim06.png';
              break;
            case 5 :
              img = 'wt_sim05.png';
              break;
            case 6 :
              img = 'wt_sim08.png';
              break;
            case 7 :
              img = 'wt_sim09.png';
              break;
            case 8 :
              img = 'wt_sim11.png';
              break;
            case 9 :
              img = 'wt_sim10.png';
              break;
            case 10 :
              img = 'wt_sim13.png';
              break;
          }
          return img;
        }//end __weatherSimpleImage()

        /**
         * @return null
         */
        function bind() {
          var body = $('body');

          body.on('click', '.locate',function(){
            $(this).siblings(".pop_location").show();
          });
          body.on('click', '.pop_location ul li a',function(e){
            __base_location = $(e.currentTarget).text();
            $(e.currentTarget).parents('.weather').mask('loading...');
            var post_data = {'base_location' : __base_location};
            _post(post_data, 'cookie');
            $(this).parents(".pop_location").hide();
          });
          body.on('click', '.ico_x',function(e){
            $(this).parents(".pop_location").hide();
          });
          body.on('click', '.refresh',function(e){
            e.preventDefault();
            $(e.currentTarget).parents('.weather').mask('loading...');
            var post_data = {'base_location' : __base_location};
            _post(post_data, '', $(e.currentTarget));
          });
        }//end bind()


        return {
          bind : bind,
          init : init
        }
      })();

      return {
        block : block
      }
    }
);
