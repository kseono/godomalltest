_define(
  'PSApps.NHNGodo.ExchangeRateWidgetFree.MobileBlock',
  function () {

    var exchangeRateMobileBlockVar = (function () {
      var exchange_rate = null;
      var prefix = 'pa_nhngodo_plusshop_exchange_rate_widget_free_';
      var exchange_rate_widget_free_input_txt_color;

      function init(init_data) {
        var _id = ''+init_data['id'];
        exchange_rate = init_data['data'];
        var btnWid = $(_id).find('.'+prefix+'btn img').innerWidth();
        var btnHei = $(_id).find('.'+prefix+'btn img').innerHeight();
        $(_id).find('.'+prefix+'btn img').css('width', btnWid);
        $(_id).find('.'+prefix+'btn img').css('height', btnHei);
        $(_id).find('.'+prefix+'btn').css('width', btnWid);
        $(_id).find('.'+prefix+'btn').css('height', btnHei);

        __render_widget(init_data, _id);

        var base_opt = $(_id).find('.'+prefix+'ps_ex_base_cur_type');
        var selectedVal = $(_id).find('.'+prefix+'ps_ex_base_cur_type option:selected').val();

        base_opt.prev().find('span').text(__get_country(selectedVal) + ' ' + __get_symbol(selectedVal));
        base_opt.prev().find('.'+prefix+'cur').text(__get_currency(selectedVal));


        var cur_opt = $(_id).find('.'+prefix+'ps_ex_exchange_cur_type');
        selectedVal = $(_id).find('.'+prefix+'ps_ex_exchange_cur_type option:selected').val();

        cur_opt.prev().find('span').text(__get_country(selectedVal) + ' ' + __get_symbol(selectedVal));
        cur_opt.prev().find('.'+prefix+'cur').text(__get_currency(selectedVal));

        __calculate_timer(_id);
      }

      function bind(_id) {
        $(_id).find('.'+prefix+'btn').on({
          'click': function () {
            var _exc_calc_rst = $(_id).offset().left;
            var _exc_calc_wrap = $(_id).find('.'+prefix+"layer");
            _exc_calc_wrap.css({left: -_exc_calc_rst});

            var _width = $(window).innerWidth();
            $(_id).find('.'+prefix+"layer").css('width', _width);

            var btnHeight = $(_id).find('.'+prefix+'btn').innerHeight();
            $(_id).find('.'+prefix+'layer').css('top', btnHeight);


            if ($(_id).find('.'+prefix+'layer').css('display') == 'none') {
              $(_id).find('.'+prefix+'layer').show();
            } else {
              $(_id).find('.'+prefix+'layer').hide();
            }

          }
        });

        $(_id).find('.'+prefix+'layer_close').on({
          'click': function () {
            $(_id).find('.'+prefix+'layer').hide();
          }
        });


        $(_id).find('.'+prefix+'exh_input').on({
          'keyup': function () {
            var thisObject = $(this);
            var str = thisObject.val();

            if (!str) {
              $(_id).find('.'+prefix+'btn_del').removeClass(prefix+'on');
            } else {
              $('.'+prefix+'btn_del').addClass(prefix+'on');
            }
          }
        });

        $(_id).find('.'+prefix+'btn_del').on({
          'click': function () {
            $(_id).find('.'+prefix+'exh_input').val('');
            $(_id).find('.'+prefix+'exh_input').focus();
            __calculate_timer(_id);
            $(this).removeClass(prefix+'on');
          }
        });

        $(_id).find('.'+prefix+'ps_ex_widget_cost').on('keyup', function (e) {
          __calculate_timer(_id);
        });
        $(_id).find('.'+prefix+'ps_ex_widget_cost').on('blur', function (e) {
          this.value = (Number(this.value.replace(/[^0-9\.-]+/g, "")).formatMoney());
        });
        $(_id).find('.'+prefix+'ps_ex_base_cur_type').on('change', function (e) {
          var selectedVal = this.value;
          var span = $(e.currentTarget).parents('.'+prefix+'select_opt').find('.'+prefix+'f_opt').find('span');
          span.eq(0).text(__get_country(selectedVal) + ' ' + __get_symbol(selectedVal));
          span.eq(1).text(__get_currency(selectedVal));
          __calculate_timer(_id);
        });
        $(_id).find('.'+prefix+'ps_ex_exchange_cur_type').on('change', function (e) {
          var selectedVal = this.value;
          var span = $(e.currentTarget).parents('.'+prefix+'select_opt').find('.'+prefix+'f_opt').find('span');
          span.eq(0).text(__get_country(selectedVal) + ' ' + __get_symbol(selectedVal));
          span.eq(1).text(__get_currency(selectedVal));
          __calculate_timer(_id);
        });

      }

      function __get_currency(fullText) {
          var splitText = fullText.split(' ');
          splitText.pop();
          return splitText.pop();
      }

      function __get_symbol(fullText) {
        return fullText.split(' ').pop();
      }

      function __get_country(fullText) {
        var splitText = fullText.split(' ');
        splitText.pop();
        splitText.pop();
        return splitText.join(' ');
      }

      function __calculate_timer(_id) {
        var base_currency = $(_id).find('.'+prefix+'ps_ex_base_cur_type option:checked').attr('data-value');
        var exchange_currency = $(_id).find('.'+prefix+'ps_ex_exchange_cur_type option:checked').attr('data-value');
        __cal_exchange_rate(base_currency, exchange_currency, _id);
      }

      function __cal_exchange_rate(base_currency, exchange_currency, _id) {
        var trans_cost = 0;
        var exCost = $(_id).find('.'+prefix+'ps_ex_widget_cost');
        var exChange = $(_id).find('.'+prefix+'exchange_currency');
        var cost = Number(exCost.val().replace(/[^0-9\.-]+/g, ""));

        if (!cost) {
          cost = 1;
          exchange_rate_widget_free_input_txt_color = exChange.css('color');
          exChange.css('color', 'lightgray');
        } else if (exChange.css('color') === 'rgb(211, 211, 211)') {
          exChange.css('color', exchange_rate_widget_free_input_txt_color);
        }

        var base_cur_rate = Number(exchange_rate[base_currency].replace(/[^0-9\.-]+/g, ""));
        var exchange_cur_rate = Number(exchange_rate[exchange_currency].replace(/[^0-9\.-]+/g, ""));

        if (base_currency !== 'KRW' && exchange_currency === 'KRW') {
          trans_cost = cost * base_cur_rate;
        } else if (base_currency === 'KRW') {
          trans_cost = cost / exchange_cur_rate;
        } else if (base_currency !== 'KRW' && exchange_currency !== 'KRW') {
          trans_cost = cost * (base_cur_rate / exchange_cur_rate);
        }
        if (isNaN(trans_cost)) {
          trans_cost = 0.00;
        }
        exChange.val(trans_cost.formatMoney());
      }


      function __render_widget(data, _id) {
        if (data.setting.widget_type === 'icon_type') {
          if (data.setting.widget_icon_type === 'self_icon') {
            $(_id).find('.'+prefix+'ps_ex_widget_icon').show();
          } else {
            var btn_exchange = $(_id).find('.'+prefix+'btn');
            btn_exchange.css('display', 'inline-block');
            var btnWid = btn_exchange.find('img').innerWidth();
            var btnHei = btn_exchange.find('img').innerHeight();
            btn_exchange.find('img').css('width', btnWid / 2);
            btn_exchange.find('img').css('height', btnHei / 2);
            btn_exchange.css('width', btnWid / 2);
            btn_exchange.css('height', btnHei / 2);
          }
        } else {
          $(_id).addClass(prefix+'type2');
          $(_id).find('.'+prefix+'pop-layer').addClass(prefix+'type2');
          $(_id).find('.'+prefix+'dim-layer').removeClass(prefix+'dim-layer');
          $(_id).find('.'+prefix+'dim-layer' +' .'+prefix+'dimBg').removeClass(prefix+'dimBg');
          $(_id).find('.'+prefix+"layer").css('width', $(window).innerWidth());
          // $(_id).find('.'+prefix+"layer_close").hide();
        }
      }

      Number.prototype.formatMoney = function formatMoney() {
        var amount = this.toFixed(2);
        return amount.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
      };

      return {
        init: init,
        bind: bind
      }
    })();

    return {
      exchangeRateMobileBlockVar: exchangeRateMobileBlockVar
    }
  }
);
