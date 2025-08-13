_define(
  'PSApps.NHNGodo.WeatherWidgetFree.MobileFrontBlock',
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
        if (!data['weather']) {
          data['weather'] = {
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
            5 : {
              TMN:0,
              TMX:0,
              code:0
            },
            6 : {
              TMN:0,
              TMX:0,
              code:0
            }
          }
        }
        var html = [];
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
          html.push('<a href="http://www.kma.go.kr" target="_blank" class="meteo"><img src="' + __image_path + 'm/wt_title.png" alt="기상청"></a>')
        }
        html.push(' <select class="locate" name="">');
        var selected;
        for (var i in data.location) {
          selected = (data.base_location === data.location[i]) ? ' selected="selected"' : '';
          html.push('<option' + selected + ' value="' + data.location[i] + '">' + data.location[i] + '</option>');
        }
        html.push('</select>');
        html.push('<div class="week_wrap">');
        html.push('<span class="week">'+week[0]+'요일</span>');
        html.push('<a href="javascript:void(0);" class="refresh"><img src="' + __image_path + 'm/wt_refresh.png" alt="다시보기"></a>');
        html.push('</div>');
        html.push('</div>');
        html.push('<div class="wt_cont">');
        html.push('<div class="wt_img">');
        html.push('<img src="'+__image_path+__weatherImage(data['weather'][0]['code']?data['weather'][0]['code']:0)+'" alt="140*140날씨이미지">');
        html.push('</div>');
        html.push('<div class="wt_box">');
        html.push('<div class="temp_wrap">');
        html.push('<span class="temp">'+(data["weather"][0]["T1H"]?data["weather"][0]["T1H"]:0)+'</span><span class="dc">℃</span>');
        html.push('</div>');
        html.push('<div class="tempthan">'+(data["weather"][0]["TMN"]?data["weather"][0]["TMN"]:0)+'℃/'+(data["weather"][0]["TMX"]?data["weather"][0]["TMX"]:0)+'℃</div>');
        html.push('<div class="wet"><img src="'+__image_path+'/m/ico_wet.png" class="ico_wet" alt="습도">습도'+(data["weather"][0]["REH"]?data["weather"][0]["REH"]:0)+'%</div>');
        if (__widget_link_usable_setting == 0 ) {
          html.push(('<a href="http://www.weather.go.kr/weather/main.jsp" target="_blank" class="meteo"><img src="'+__image_path+'m/wt_title.png" alt="기상청"></a>'));
        }
        html.push('</div>');
        html.push('</div>');
        html.push('</div>');
        html.push('<div class="wt_week">');
        html.push('<ul>');
        html.push('<li>');
        html.push('<span class="week">'+week[1]+'</span>');
        html.push('<span class="wt_img"><img src="'+__image_path+__weatherMobileImage(data['weather'][1]['code']?data['weather'][1]['code']:0) +'" alt="날씨이미지"></span>');
        html.push('<span class="tempthan">'+(data['weather'][1]['TMN']?data['weather'][1]['TMN']:0)+'/'+(data['weather'][1]['TMX']?data['weather'][1]['TMX']:0)+'℃</span>');
        html.push('</li>');
        html.push('<li>');
        html.push('<span class="week">'+week[2]+'</span>');
        html.push('<span class="wt_img"><img src="'+__image_path+__weatherMobileImage(data['weather'][2]['code']?data['weather'][2]['code']:0) +'" alt="날씨이미지"></span>');
        html.push('<span class="tempthan">'+data['weather'][2]['TMN']+'/'+data['weather'][2]['TMX']+'℃</span>');
        html.push('</li>');
        html.push('<li>');
        html.push('<span class="week">'+week[3]+'</span>');
        html.push('<span class="wt_img"><img src="'+__image_path+__weatherMobileImage(data['weather'][3]['code']?data['weather'][3]['code']:0) +'" alt="날씨이미지"></span>');
        html.push('<span class="tempthan">'+(data['weather'][3]['TMN']?data['weather'][3]['TMN']:0)+'/'+(data['weather'][3]['TMX']?data['weather'][3]['TMX']:0)+'℃</span>');
        html.push('</li>');
        html.push('<li>');
        html.push('<span class="week">'+week[4]+'</span>');
        html.push('<span class="wt_img"><img src="'+__image_path+__weatherMobileImage(data['weather'][4]['code']?data['weather'][4]['code']:0) +'" alt="날씨이미지"></span>');
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
          html.push('<a href="http://www.kma.go.kr" target="_blank" class="meteo"><img src="' + __image_path + 'm/wt_title.png" alt="기상청"></a>')
        }
        html.push(' <select class="locate" name="">');
        var selected;
        for (var i in data.location) {
          selected = (data.base_location === data.location[i]) ? ' selected="selected"' : '';
          html.push('<option' + selected + ' value="' + data.location[i] + '">' + data.location[i] + '</option>');
        }
        html.push('</select>');
        html.push('<div class="week_wrap">');
        html.push('<span class="week">'+week[0]+'요일</span>');
        html.push('<a href="javascript:void(0);" class="refresh"><img src="' + __image_path + 'm/wt_refresh.png" alt="다시보기"></a>');
        html.push('</div>');
        html.push('</div>');
        html.push('<div class="wt_cont">');
        html.push('<div class="wt_img">');
        html.push('<img src="'+__image_path+__weatherImage(data['weather'][0]['code']?data['weather'][0]['code']:0)+'" alt="140*140날씨이미지">');
        html.push('</div>');
        html.push('<div class="wt_box">');
        html.push('<div class="temp_wrap">');
        html.push('<span class="temp">'+(data["weather"][0]["T1H"]?data["weather"][0]["T1H"]:0)+'</span><span class="dc">℃</span>');
        html.push('</div>');
        html.push('<div class="tempthan">'+(data["weather"][0]["TMN"]?data["weather"][0]["TMN"]:0)+'℃/'+(data["weather"][0]["TMX"]?data["weather"][0]["TMX"]:0)+'℃</div>');
        html.push('<div class="wet"><img src="'+__image_path+'/m/ico_wet.png" class="ico_wet" alt="습도">습도'+(data["weather"][0]["REH"]?data["weather"][0]["REH"]:0)+'%</div>');
        if (__widget_link_usable_setting == 0 ) {
          html.push(('<a href="http://www.weather.go.kr/weather/main.jsp" target="_blank" class="meteo"><img src="'+__image_path+'m/wt_title.png" alt="기상청"></a>'));
        }
        html.push('</div>');
        html.push('</div>');
        html.push('</div>');
        html.push('<div class="wt_week">');
        html.push('<ul>');
        html.push('<li class="on">');
        html.push('<span class="week">'+week[0]+'</span>');
        html.push('<span class="wt_img"><img src="'+__image_path+__weatherMobileImage(data['weather'][0]['code']?data['weather'][0]['code']:0) +'" alt="날씨이미지"></span>');
        html.push('<span class="tempthan">'+(data['weather'][0]['TMN']?data['weather'][0]['TMN']:0)+'/'+(data['weather'][0]['TMX']?data['weather'][0]['TMX']:0)+'℃</span>');
        html.push('</li>');
        html.push('<li class="on">');
        html.push('<span class="week">'+week[1]+'</span>');
        html.push('<span class="wt_img"><img src="'+__image_path+__weatherMobileImage(data['weather'][1]['code']?data['weather'][1]['code']:0) +'" alt="날씨이미지"></span>');
        html.push('<span class="tempthan">'+(data['weather'][1]['TMN']?data['weather'][1]['TMN']:0)+'/'+(data['weather'][1]['TMX']?data['weather'][1]['TMX']:0)+'℃</span>');
        html.push('</li>');
        html.push('<li class="on">');
        html.push('<span class="week">'+week[2]+'</span>');
        html.push('<span class="wt_img"><img src="'+__image_path+__weatherMobileImage(data['weather'][2]['code']?data['weather'][2]['code']:0) +'" alt="날씨이미지"></span>');
        html.push('<span class="tempthan">'+(data['weather'][2]['TMN']?data['weather'][2]['TMN']:0)+'/'+(data['weather'][2]['TMX']?data['weather'][2]['TMX']:0)+'℃</span>');
        html.push('</li>');
        html.push('<li class="on">');
        html.push('<span class="week">'+week[3]+'</span>');
        html.push('<span class="wt_img"><img src="'+__image_path+__weatherMobileImage(data['weather'][3]['code']?data['weather'][3]['code']:0) +'" alt="날씨이미지"></span>');
        html.push('<span class="tempthan">'+(data['weather'][3]['TMN']?data['weather'][3]['TMN']:0)+'/'+(data['weather'][3]['TMX']?data['weather'][3]['TMX']:0)+'℃</span>');
        html.push('</li>');
        html.push('<li class="on">');
        html.push('<span class="week">'+week[4]+'</span>');
        html.push('<span class="wt_img"><img src="'+__image_path+__weatherMobileImage(data['weather'][4]['code']?data['weather'][4]['code']:0) +'" alt="날씨이미지"></span>');
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
          html.push('<a href="http://www.kma.go.kr" target="_blank" class="meteo"><img src="' + __image_path + 'm/wt_title.png" alt="기상청"></a>')
        }
        html.push(' <select class="locate" name="">');
        var selected;
        for (var i in data.location) {
          selected = (data.base_location === data.location[i]) ? ' selected="selected"' : '';
          html.push('<option' + selected + ' value="' + data.location[i] + '">' + data.location[i] + '</option>');
        }
        html.push('</select>');
        html.push('<div class="week_wrap">');
        html.push('<span class="week">'+week[0]+'요일</span>');
        html.push('<a href="javascript:void(0);" class="refresh"><img src="' + __image_path + 'm/wt_refresh.png" alt="다시보기"></a>');
        html.push('</div>');
        html.push('</div>');
        html.push('<div class="wt_cont">');
        html.push('<div class="wt_img">');
        html.push('<img src="'+__image_path+__weatherImage(data['weather'][0]['code']?data['weather'][0]['code']:0)+'" alt="140*140날씨이미지">');
        html.push('</div>');
        html.push('<div class="wt_box">');
        html.push('<div class="temp_wrap">');
        html.push('<span class="temp">'+(data["weather"][0]["T1H"]?data["weather"][0]["T1H"]:0)+'</span><span class="dc">℃</span>');
        html.push('</div>');
        html.push('<div class="tempthan">'+(data["weather"][0]["TMN"]?data["weather"][0]["TMN"]:0)+'℃/'+(data["weather"][0]["TMX"]?data["weather"][0]["TMX"]:0)+'℃</div>');
        html.push('<div class="wet"><img src="'+__image_path+'/m/ico_wet.png" class="ico_wet" alt="습도">습도'+(data["weather"][0]["REH"]?data["weather"][0]["REH"]:0)+'%</div>');
        if (__widget_link_usable_setting == 0 ) {
          html.push(('<a href="http://www.weather.go.kr/weather/main.jsp" target="_blank" class="meteo"><img src="'+__image_path+'m/wt_title.png" alt="작은기상청"></a>'));
        }
        html.push('</div>');
        html.push('</div>');
        html.push('</div>');
        html.push('<div class="wt_week">');
        html.push('<ul>');
        html.push('<li>');
        html.push('<span class="week">'+week[0]+'</span>');
        html.push('<span class="wt_img"><img src="'+__image_path+__weatherMobileImage(data['weather'][0]['code']?data['weather'][0]['code']:0) +'" alt="날씨이미지"></span>');
        html.push('<span class="tempthan">'+(data['weather'][0]['TMN']?data['weather'][0]['TMN']:0)+'/'+(data['weather'][0]['TMX']?data['weather'][0]['TMX']:0)+'℃</span>');
        html.push('</li>');
        html.push('<li>');
        html.push('<span class="week">'+week[1]+'</span>');
        html.push('<span class="wt_img"><img src="'+__image_path+__weatherMobileImage(data['weather'][1]['code']?data['weather'][1]['code']:0) +'" alt="날씨이미지"></span>');
        html.push('<span class="tempthan">'+(data['weather'][1]['TMN']?data['weather'][1]['TMN']:0)+'/'+(data['weather'][1]['TMX']?data['weather'][1]['TMX']:0)+'℃</span>');
        html.push('</li>');
        html.push('<li>');
        html.push('<span class="week">'+week[2]+'</span>');
        html.push('<span class="wt_img"><img src="'+__image_path+__weatherMobileImage(data['weather'][2]['code']?data['weather'][2]['code']:0) +'" alt="날씨이미지"></span>');
        html.push('<span class="tempthan">'+(data['weather'][2]['TMN']?data['weather'][2]['TMN']:0)+'/'+(data['weather'][2]['TMX']?data['weather'][2]['TMX']:0)+'℃</span>');
        html.push('</li>');html.push('<li>');
        html.push('<span class="week">'+week[3]+'</span>');
        html.push('<span class="wt_img"><img src="'+__image_path+__weatherMobileImage(data['weather'][3]['code']?data['weather'][3]['code']:0) +'" alt="날씨이미지"></span>');
        html.push('<span class="tempthan">'+(data['weather'][3]['TMN']?data['weather'][3]['TMN']:0)+'/'+(data['weather'][3]['TMX']?data['weather'][3]['TMX']:0)+'℃</span>');
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
      function __weatherMobileImage(code) {
        var img = '';

        switch (code) {
          case 0 :
            img = 'wt_m01.png';
            break;
          case 1 :
            img = 'wt_m03.png';
            break;
          case 2 :
            img = 'wt_m02.png';
            break;
          case 3 :
            img = 'wt_m04.png';
            break;
          case 4 :
            img = 'wt_m06.png';
            break;
          case 5 :
            img = 'wt_m05.png';
            break;
          case 6 :
            img = 'wt_m08.png';
            break;
          case 7 :
            img = 'wt_m09.png';
            break;
          case 8 :
            img = 'wt_m11.png';
            break;
          case 9 :
            img = 'wt_m10.png';
            break;
          case 10 :
            img = 'wt_m13.png';
            break;
        }
        return img;
      }//end __weatherMobileImage()

      /**
       * @return null
       */
      function bind() {
        var body = $('body');

        body.on('click', '.locate',function(){
          $(this).siblings(".pop_location").show();
        });
        body.on('click', '.ico_x,.pop_location ul li a',function(e){
          $(e.currentTarget).parents('.weather').mask('loading...');
          $(this).parents(".pop_location").hide();
        });

        body.on('change', '.locate',function(e){
          __base_location = $(e.currentTarget).find('option:selected').val();
          $(e.currentTarget).parents('.weather').mask('loading...');
          var post_data = {'base_location' : __base_location};
          _post(post_data, 'cookie');
        });
        body.on('click', '.refresh',function(e){
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
